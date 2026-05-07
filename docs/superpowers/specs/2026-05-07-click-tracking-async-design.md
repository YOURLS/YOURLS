# Async Click Tracking with Extended Data — Design

- **Date**: 2026-05-07
- **Branch**: `feature/click-tracking-async`
- **Status**: design approved, awaiting implementation plan
- **DB version**: bump `509 → 510`

## Goal

Capture richer click data on every short-URL hit while reducing the time the
user perceives before the redirect. Today `yourls-go.php` performs two blocking
queries (`yourls_update_clicks` + `yourls_log_redirect`) before issuing the
`301`. The new design moves all logging *after* the connection is closed for
bots, and *parallel* to the redirect for human browsers, while collecting a
much wider data set (UA parsed, geo extended, UTM, client metrics, visitor
hashing).

## Non-goals

- Cross-keyword aggregated dashboard (separate sub-project).
- Realtime stats (cache TTL is acceptable).
- Replacing the MaxMind GeoIP integration.
- Canvas/WebGL fingerprinting or any PII beyond what is collected today.

## Constraints

- Must keep self-hosted compatibility: no Redis, no external queue dependency.
- MySQL 5.7+ / MariaDB 10.2+ (already a YOURLS prerequisite, JSON column safe).
- Existing `shunt_log_redirect` and `log_redirect` hooks must keep working.
- Existing tests reading the legacy `yourls_log` columns must keep passing.

## Architecture

```
GET /xxx
  │
  ▼
yourls-go.php
  │ keyword sanitize → get longurl
  ▼
BotDetector::isBot($ua, $accept)
  │
  ├── true  ──► header(301, Location)
  │            fastcgi_finish_request()
  │            ClickCollector::collect(source='server')
  │            ClickCollector::persist()
  │
  └── false ──► render interstitial HTML (~1 KB inline)
                  │ JS: gather screen/tz/connection/lang
                  │ navigator.sendBeacon('yourls-collect.php', payload)
                  │ location.replace(longurl)   ◄── parallel
                  │
                  ▼
               yourls-collect.php (POST)
                  │ validate, rate-limit, 204 No Content
                  │ fastcgi_finish_request()
                  │ ClickCollector::collect(source='beacon', $client)
                  │ ClickCollector::persist()
```

Both paths complete the `INSERT` *after* the user is gone. Connection is closed
via `fastcgi_finish_request()` (PHP-FPM) with a fallback to `flush()` +
`ignore_user_abort(true)` on non-FPM SAPIs. CLI keeps the legacy synchronous
behavior — acceptable degradation.

### New components

| File | Responsibility |
|------|----------------|
| `includes/Click/BotDetector.php` | UA + Accept header → `bool isBot` and `?string botName` |
| `includes/Click/UserAgentParser.php` | Lightweight regex parser → `device_type`, `browser`, `os` |
| `includes/Click/ClickPayload.php` | Typed DTO carrying all click fields |
| `includes/Click/ClickCollector.php` | Orchestrator: build payload (server + optional client), persist |
| `yourls-collect.php` | Public POST endpoint for the JS beacon |
| `ui/templates/click-interstitial.php` | Minimal HTML+JS interstitial |

### Modified components

- `yourls-go.php` — branch bot/human, `fastcgi_finish_request()` integration.
- `includes/functions.php::yourls_log_redirect()` — thin wrapper delegating to
  `ClickCollector` while preserving the existing `shunt_log_redirect` hook.
- `includes/functions-install.php` — extend `CREATE TABLE` for `yourls_log`.
- `includes/functions-upgrade.php` — add `yourls_upgrade_to_510()`.
- `includes/version.php` — `YOURLS_DB_VERSION = '510'`.
- `includes/functions-infos.php` — new aggregation helpers feeding the UI.
- `ui/views/public/infos.blade.php` — restructure into new tabs.
- `ui/views/public/infos/tab-*.blade.php` — one partial per tab.

## Schema changes

Extend `YOURLS_DB_TABLE_LOG` with hot columns + a JSON `meta` column.

### New hot columns (indexable)

| Column | Type | Notes |
|--------|------|-------|
| `device_type` | `VARCHAR(16) NULL` | `desktop|mobile|tablet|bot` |
| `browser` | `VARCHAR(32) NULL` | parsed from UA |
| `os` | `VARCHAR(32) NULL` | parsed from UA |
| `referrer_host` | `VARCHAR(100) NULL` | host portion of `referrer` |
| `utm_source` | `VARCHAR(100) NULL` | from short-URL query string |
| `utm_medium` | `VARCHAR(100) NULL` | |
| `utm_campaign` | `VARCHAR(100) NULL` | |
| `city` | `VARCHAR(100) NULL` | from extended geo lookup |
| `region` | `VARCHAR(100) NULL` | |
| `visitor_hash` | `CHAR(16) NULL` | `sha256(ip+ua+daily_salt+COOKIEKEY)`, truncated |
| `click_uid` | `CHAR(16) NULL` | unique per click, used to dedupe beacon vs placeholder |

### New JSON column

`meta JSON NULL` carrying: `lang`, `lat`, `lon`, `asn`, `isp`, `tz`, `screen_w`,
`screen_h`, `viewport_w`, `viewport_h`, `dpr`, `connection_type`, `is_bot`,
`bot_name`, `server_ms`, `db_ms`.

### New indexes

- `KEY device_type_idx (device_type)`
- `KEY utm_source_idx (utm_source)`
- `KEY click_uid_idx (click_uid)`

### Install + upgrade obligations

Schema changes MUST appear in **both** files:

1. `includes/functions-install.php` (around lines 243–254): the `CREATE TABLE`
   for new installations gets every new column and every new index inline.
2. `includes/functions-upgrade.php`: a new `yourls_upgrade_to_510()` function
   issuing `ALTER TABLE … ADD COLUMN` (with try/catch to be idempotent against
   partial upgrades) and `ADD INDEX`. Wired into `yourls_upgrade()` with
   `if ($oldsql < 510) { yourls_upgrade_to_510(); }` placed right after the 509
   block.
3. `includes/version.php`: `YOURLS_DB_VERSION` bumped to `'510'`.

The migration must be safe to re-run (idempotent) because YOURLS upgrade flow
can retry on partial failure.

## Data flow contracts

### Beacon payload (POST `yourls-collect.php`)

```json
{
  "v": 1,
  "click_uid": "a1b2c3d4e5f6a7b8",
  "keyword": "abc",
  "screen":   {"w": 1920, "h": 1080, "dpr": 2},
  "viewport": {"w": 1280, "h": 720},
  "tz": "Europe/Rome",
  "lang": "it-IT",
  "connection": "4g",
  "client_referrer": "https://t.co/...",
  "nav_start": 1715000000000
}
```

Validation rules:

- `click_uid` matches `^[a-f0-9]{16}$`
- `keyword` exists in DB
- Total payload ≤ 2 KB
- Rate limit: 60 req/min per IP, APCu-backed (or transient fallback)
- Always responds `204 No Content`; never 4xx/5xx (the client never reads it)

### Insert vs update

- **Default**: only the beacon writes for the human path (single `INSERT`).
  No-JS humans simply aren't logged — `<meta refresh>` still redirects them.
- **Optional placeholder mode** (`YOURLS_CLICK_PLACEHOLDER`, default `false`):
  the server inserts immediately with `meta.beacon_pending=true`, then the
  beacon `UPDATE`s by `click_uid` (uses `click_uid_idx`).

## Performance budget per click

| Phase | Bot | Human (perceived) | Human (server total) |
|-------|-----|-------------------|----------------------|
| Keyword lookup | 3–8 ms | 3–8 ms | 3–8 ms |
| Bot detect + render | 1 ms | 2 ms | 2 ms |
| Flush + redirect | 1 ms | — | — |
| Interstitial download + JS exec | — | 30–80 ms | — |
| `location.replace` start | — | here | — |
| Beacon + INSERT (post-redirect) | 20–50 ms | 20–50 ms | 20–50 ms |
| **TTFB → next-page nav start** | **5–10 ms** | **35–90 ms** | — |

Bots are equal or *faster* than today (today's path inserts before the 301).
Humans pay 30–80 ms for substantially richer data. Interstitial mode is opt-in
via `YOURLS_CLICK_INTERSTITIAL` (default `true`); flipping it off reverts to a
pure 301 with server-side enrichment only.

## Error handling

| Scenario | Behavior |
|----------|----------|
| Keyword not found | Unchanged: `302` to `YOURLS_SITE`, no log |
| Empty / unknown UA | Treated as bot (fail-safe to fast 301), `bot_name='unknown'` |
| `fastcgi_finish_request` unavailable | Fallback: `ignore_user_abort(true)` + `flush()`. Last resort: synchronous insert |
| `INSERT` fails | Silent try/catch, debug log only, never blocks redirect |
| Malformed beacon | `204 No Content`, debug log entry |
| Geo extended lookup fails | City/region/asn `NULL`, country preserved by existing `yourls_geo_ip_to_countrycode` |
| UA parser no match | `device_type='desktop'`, `browser='unknown'`, `os='unknown'` |
| MySQL <5.7 (no JSON) | Migration fails explicitly in `admin/upgrade.php`. Documented prerequisite |

## Privacy & GDPR

- `visitor_hash = substr(sha256(ip + ua + daily_salt + YOURLS_COOKIEKEY), 0, 16)`.
  `daily_salt` rotates every UTC day → no cross-day correlation without server
  access.
- No persistent client cookies.
- IP behavior unchanged by default. New `YOURLS_CLICK_ANONYMIZE_IP` config
  (default `false`) zeroes the last IPv4 octet / last 80 IPv6 bits before
  insert.
- `meta` JSON contains no fingerprint vectors beyond what the user explicitly
  provides (screen, tz, connection).

## Configuration

New optional `define()`s in `user/config.php`:

```php
define('YOURLS_CLICK_INTERSTITIAL', true);   // false → pure 301 legacy mode
define('YOURLS_CLICK_ANONYMIZE_IP', false);
define('YOURLS_CLICK_BEACON_RATELIMIT', 60); // req/min/IP
define('YOURLS_CLICK_PLACEHOLDER', false);
// define('YOURLS_CLICK_VISITOR_SALT', '...'); // auto-derived from COOKIEKEY otherwise
```

## Hooks

Preserved:

- `shunt_log_redirect` filter
- `log_redirect` action

Added:

- `click_payload` filter — modify `ClickPayload` before insert
- `click_is_bot` filter — override bot detection
- `click_beacon_received` action — after validation, before persist
- `click_interstitial_html` filter — replace template HTML

## UI (Filament-style design system)

The Filament-style design system is already in place under `ui/components/`.
**No new components are introduced.** Existing primitives cover everything:
`atoms/badge`, `atoms/tag`, `molecules/tabs`, `molecules/date-range`,
`organisms/card`, `organisms/stat`, `organisms/chart`, `organisms/table`,
`organisms/empty-state`.

### Where new data surfaces

- `yourls-infos.php` (per-keyword stats) — main beneficiary, restructured tabs.
- `admin/index.php` — out of scope. A small "device split" hint may follow as a
  separate spec.
- Cross-keyword global dashboard — explicit non-goal of this spec.

### Tab structure for `infos.blade.php`

Replaces the current legacy ports (Share | History | Country | Source) with:

1. **Overview** *(default)* — 4 `<x-organisms.stat>` cards: Total clicks,
   Unique visitors (`COUNT(DISTINCT visitor_hash)`), Top device, Top country.
   Below: line chart clicks/day (existing data).
2. **Audience** — pie charts for `device_type`, `browser` (top 8 + Other),
   `os` (top 6 + Other). Stacked bar `device × day`.
3. **Geography** — existing world map; new top-20 cities table; top-10 ASN/ISP
   table (only when `meta.asn` is populated).
4. **Sources** — existing referrer pie now fed by `referrer_host`. UTM
   `source × medium` matrix as heatmap (CSS background intensity). Top
   campaigns table.
5. **Technology** *(only shown if any beacon data exists)* — viewport buckets,
   timezones top 10, languages top 10, connection type distribution.
6. **Activity** *(rename of legacy raw-log view)* — paginated table of latest
   clicks: time, country/city, device badge, browser, referrer host, UTM.

Each tab lives in its own partial under `ui/views/public/infos/tab-*.blade.php`,
loaded through the existing `<x-molecules.tabs>` component.

### Backend support for UI

New helpers in `includes/functions-infos.php`:

- `yourls_get_clicks_by_dimension($keyword, $col, $range, $limit)` — generic
  group-by, cached.
- `yourls_get_clicks_meta_aggregate($keyword, $json_path, $range, $limit)` —
  group-by on JSON path (`$.tz`, `$.lang`, `$.connection_type`).
- `yourls_get_unique_visitors($keyword, $range)` — distinct `visitor_hash`.
- `yourls_get_recent_clicks($keyword, $page, $per_page)` — Activity tab.

All exposed via filter hooks (`clicks_aggregate_query`, etc.).

### UI performance

- 5-minute APCu / transient cache per `keyword × dimension × range`.
- Cache invalidates by TTL only — stats are not realtime by design.
- All new queries hit the new indexes.
- Activity table uses server-side pagination, default page size 50.

### Rollout for UI

1. Backend ships first with `YOURLS_CLICK_INTERSTITIAL=false` default → only
   server-side enrichment, no user-perceived change.
2. New tabs render with `<x-organisms.empty-state>` while the new columns are
   still empty.
3. Admin opts into the interstitial after validating data flow.

## Testing strategy

### Unit (PHPUnit)

- `BotDetectorTest` — known UAs (Googlebot, curl, Chrome, Safari, empty).
- `UserAgentParserTest` — ~30-row matrix of UA → device/browser/os.
- `ClickPayloadTest` — JSON serialization, field truncation, defaults.
- `ClickCollectorTest` — server+client merge, IP anonymization, intra-day
  visitor hash determinism, cross-day rotation.
- `MigrationTest` — runs `yourls_upgrade_to_510()` on a fresh test DB; asserts
  every new column and index exists; reruns to verify idempotence.

### Integration

- `GoRedirectBotTest` — bot UA → status 301, `Location` header, single log row
  with `is_bot=1`.
- `GoRedirectHumanTest` — human UA → HTML interstitial containing `click_uid`
  and the long URL; no insert before the beacon.
- `BeaconEndpointTest` — valid / invalid / rate-limited POST, 204 always,
  insert behavior matches expectations.

### UI

- Smoke test: each new tab partial renders without exceptions for empty,
  minimal, and rich datasets.
- Snapshot test on `tab-audience` HTML output with a deterministic fixture.
- Manual visual checklist documented in the implementation plan.

### Backward compatibility

- `yourls_log_redirect()` keeps its signature and `shunt_log_redirect` hook.
- Existing tests selecting only legacy log columns must keep passing without
  edits.

## Rollout

1. Migration ships first (DB version 509 → 510).
2. Code ships with `YOURLS_CLICK_INTERSTITIAL=false` → server-side enrichment
   only, zero user-perceived change.
3. Admin opts into the interstitial after validating dashboards.
4. Docs added under `docs/` with screenshots of the new tabs and a privacy
   note.

## Open questions / future work

- Optional global cross-keyword dashboard (separate spec).
- Optional admin index `device split` hint (separate spec).
- Optional Redis-backed buffer for very high-traffic deployments (separate
  spec; the current design works fine for typical self-hosted YOURLS load).
