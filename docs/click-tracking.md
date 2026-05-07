# Click Tracking (DB version 510)

YOURLS records each click into `YOURLS_DB_TABLE_LOG`. Starting at DB version
510 the table carries hot columns plus a JSON `meta` blob with parsed user
agent, extended geo, UTM, visitor hash, and (for human visitors) client-side
metrics gathered via a non-blocking beacon.

## Configuration (optional `define` in `user/config.php`)

| Constant | Default | Purpose |
|----------|---------|---------|
| `YOURLS_CLICK_INTERSTITIAL`     | `true`  | Render an inline interstitial for human visitors. Set to `false` for legacy 301-only behavior. |
| `YOURLS_CLICK_ANONYMIZE_IP`     | `false` | Zero last IPv4 octet / last 80 IPv6 bits before insert. |
| `YOURLS_CLICK_BEACON_RATELIMIT` | `60`    | Beacon requests per minute per IP. |
| `YOURLS_CLICK_PLACEHOLDER`      | `false` | Reserved for future use. |
| `YOURLS_CLICK_VISITOR_SALT`     | derived from `YOURLS_COOKIEKEY` | Salt used inside `visitor_hash`. |

## New hooks

- Filter `click_payload($payload)` — modify the `\YOURLS\Click\ClickPayload` before insert.
- Filter `click_is_bot($isBot, $userAgent, $accept)` — override bot detection.
- Action `click_beacon_received($data)` — fired after beacon validation.
- Filter `click_interstitial_html($html, $url, $keyword, $clickUid)` — replace the interstitial body.

## Privacy

- `visitor_hash` is `substr(sha256(ip + ua + daily_salt + COOKIEKEY), 0, 16)`. The daily salt rotates every UTC day so cross-day correlation is impossible without server access.
- No persistent client cookie is set.
- The interstitial uses `navigator.sendBeacon` and a `<meta refresh>` fallback for users with JS disabled.
