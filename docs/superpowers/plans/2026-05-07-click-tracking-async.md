# Async Click Tracking with Extended Data — Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Capture richer click data (parsed UA, extended geo, UTM, client metrics, visitor hash) on every short-URL hit while reducing the time the user perceives before redirect — by moving logging *after* connection close for bots and *parallel* to the redirect for human browsers via a JS beacon.

**Architecture:** Two-path flow in `yourls-go.php`. Bots get an immediate `301`, then `fastcgi_finish_request()`, then a server-side INSERT with parsed data. Humans get a tiny inline interstitial that calls `navigator.sendBeacon()` and `location.replace()` in parallel; the beacon endpoint (`yourls-collect.php`) validates, closes the connection, then INSERTs. Schema gets new hot columns (`device_type`, `browser`, `os`, `referrer_host`, `utm_*`, `city`, `region`, `visitor_hash`, `click_uid`) plus a `meta JSON` column. UI on `yourls-infos.php` is restructured into 6 tabs (Overview / Audience / Geography / Sources / Technology / Activity) reusing the existing Filament-style design system components (no new components introduced).

**Tech Stack:** PHP 8.1+, MySQL 5.7+/MariaDB 10.2+ (JSON column), PSR-4 autoload (`YOURLS\Click\` → `includes/Click/`), Aura.SQL via `yourls_get_db()`, MaxMind GeoIP2, Blade templates via `jenssegers/blade`, PHPUnit.

**Spec:** `docs/superpowers/specs/2026-05-07-click-tracking-async-design.md`

---

## File Structure

### New PHP source files

| Path | Responsibility |
|------|----------------|
| `includes/Click/BotDetector.php` | UA + Accept header → `isBot(): bool`, `botName(): ?string` |
| `includes/Click/UserAgentParser.php` | Lightweight regex parser → `device_type`, `browser`, `os` |
| `includes/Click/GeoLookup.php` | Wrapper around MaxMind reader returning `country/city/region/lat/lon/asn/isp` |
| `includes/Click/VisitorHasher.php` | Daily-rotating hash of (ip + ua) |
| `includes/Click/ClickPayload.php` | Typed DTO, `toRow(): array`, `toMeta(): string` (JSON) |
| `includes/Click/ClickCollector.php` | Orchestrator: build payload, persist |
| `includes/Click/RateLimiter.php` | APCu-or-transient request budget per IP |
| `includes/Click/Connection.php` | `closeAndContinue()` — `fastcgi_finish_request` with fallback |
| `yourls-collect.php` | Public POST endpoint for the beacon |

### New templates

| Path | Responsibility |
|------|----------------|
| `ui/templates/click-interstitial.php` | Plain-PHP interstitial (kept outside Blade for max speed) |
| `ui/views/public/infos.blade.php` | Restructured: tab dispatcher only |
| `ui/views/public/infos/tab-overview.blade.php` | KPI cards + clicks-per-day chart |
| `ui/views/public/infos/tab-audience.blade.php` | Device / browser / OS pies, device×day stacked bar |
| `ui/views/public/infos/tab-geography.blade.php` | Map + cities table + ASN table |
| `ui/views/public/infos/tab-sources.blade.php` | Referrer pie + UTM matrix + campaigns |
| `ui/views/public/infos/tab-technology.blade.php` | Viewport / tz / lang / connection (beacon-only) |
| `ui/views/public/infos/tab-activity.blade.php` | Paginated raw-click table |

### Modified files

| Path | Change |
|------|--------|
| `includes/version.php` | `YOURLS_DB_VERSION` `'509'` → `'510'` |
| `includes/functions-install.php` | Extend `CREATE TABLE` for `yourls_log` (lines 243–254) |
| `includes/functions-upgrade.php` | Add `yourls_upgrade_to_510()` + dispatch in `yourls_upgrade()` |
| `includes/functions.php` | Replace `yourls_log_redirect` body with `ClickCollector` delegation |
| `includes/functions-infos.php` | New aggregation helpers (`yourls_get_clicks_by_dimension`, etc.) |
| `yourls-go.php` | Branch bot/human; bot path uses `Connection::closeAndContinue` |

### New tests

| Path | Coverage |
|------|----------|
| `tests/tests/click/BotDetectorTest.php` | UA matrix |
| `tests/tests/click/UserAgentParserTest.php` | UA → device/browser/os matrix |
| `tests/tests/click/VisitorHasherTest.php` | Determinism intra-day, rotation cross-day |
| `tests/tests/click/ClickPayloadTest.php` | Serialization, truncation, defaults |
| `tests/tests/click/ClickCollectorTest.php` | server+beacon merge, IP anonymize |
| `tests/tests/click/RateLimiterTest.php` | Per-IP budget, expiry |
| `tests/tests/click/MigrationTest.php` | `yourls_upgrade_to_510` runs idempotently |
| `tests/tests/click/BeaconEndpointTest.php` | POST validation, 204 always |
| `tests/tests/click/InfosAggregatesTest.php` | `yourls_get_clicks_by_dimension` queries |
| `tests/tests/click/InfosTabsRenderTest.php` | Each tab Blade renders with empty / minimal / rich fixtures |

---

## Phase 0 — Branch & Sanity

### Task 0: Verify branch and toolchain

**Files:** none (read-only checks)

- [ ] **Step 1: Confirm working branch is `feature/click-tracking-async`**

Run: `git branch --show-current`
Expected: `feature/click-tracking-async`

- [ ] **Step 2: Confirm test suite is currently green on master baseline**

Run: `./vendor/bin/phpunit --testsuite=YOURLS-Tests --stop-on-failure 2>&1 | tail -20`
Expected: `OK (...)` or pre-existing failure list captured for comparison. If suite cannot run locally (e.g. missing test DB), document the command for CI and continue.

- [ ] **Step 3: Confirm composer autoload picks up `includes/Click/`**

Run: `php -r 'require "includes/load-yourls.php"; var_dump(class_exists("YOURLS\\Click\\BotDetector"));'`
Expected: `bool(false)` — class doesn't exist yet, but no autoload error path. (We're verifying the namespace mapping, not the class.)

- [ ] **Step 4: No commit — pure check**

---

## Phase 1 — Schema (DB version 510)

This phase MUST land first because every subsequent backend test inserts rows.

### Task 1.1: Bump DB version constant

**Files:**
- Modify: `includes/version.php:20`

- [ ] **Step 1: Edit constant**

Change line 20 from:
```php
define( 'YOURLS_DB_VERSION', '509' );
```
to:
```php
define( 'YOURLS_DB_VERSION', '510' );
```

- [ ] **Step 2: Verify**

Run: `grep '^define( .YOURLS_DB_VERSION' includes/version.php`
Expected: `define( 'YOURLS_DB_VERSION', '510' );`

- [ ] **Step 3: Commit**

```bash
git add includes/version.php
git commit -m "chore(db): bump DB version to 510 for click tracking schema"
```

---

### Task 1.2: Extend `CREATE TABLE` for fresh installs

**Files:**
- Modify: `includes/functions-install.php:243-254`

- [ ] **Step 1: Replace the `YOURLS_DB_TABLE_LOG` block**

Replace lines 243–254 with:
```php
    $create_tables[YOURLS_DB_TABLE_LOG] =
        'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_LOG.'` ('.
        '`click_id` int(11) NOT NULL auto_increment,'.
        '`click_time` datetime NOT NULL,'.
        '`shorturl` varchar(100) BINARY NOT NULL,'.
        '`referrer` varchar(200) NOT NULL,'.
        '`user_agent` varchar(255) NOT NULL,'.
        '`ip_address` varchar(41) NOT NULL,'.
        '`country_code` char(2) NOT NULL,'.
        '`device_type` varchar(16) NULL,'.
        '`browser` varchar(32) NULL,'.
        '`os` varchar(32) NULL,'.
        '`referrer_host` varchar(100) NULL,'.
        '`utm_source` varchar(100) NULL,'.
        '`utm_medium` varchar(100) NULL,'.
        '`utm_campaign` varchar(100) NULL,'.
        '`city` varchar(100) NULL,'.
        '`region` varchar(100) NULL,'.
        '`visitor_hash` char(16) NULL,'.
        '`click_uid` char(16) NULL,'.
        '`meta` JSON NULL,'.
        'PRIMARY KEY  (`click_id`),'.
        'KEY `shorturl` (`shorturl`),'.
        'KEY `device_type_idx` (`device_type`),'.
        'KEY `utm_source_idx` (`utm_source`),'.
        'KEY `click_uid_idx` (`click_uid`)'.
        ') AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;';
```

- [ ] **Step 2: Sanity-check syntax**

Run: `php -l includes/functions-install.php`
Expected: `No syntax errors detected`

- [ ] **Step 3: Commit**

```bash
git add includes/functions-install.php
git commit -m "feat(install): add click tracking columns to log table for fresh installs"
```

---

### Task 1.3: Add `yourls_upgrade_to_510()` migration (idempotent)

**Files:**
- Modify: `includes/functions-upgrade.php` (append new function near other `yourls_upgrade_to_*`, wire into `yourls_upgrade()` switch)

- [ ] **Step 1: Append the new migration function at end of file**

Add (use the same echo-progress style as `yourls_upgrade_to_509`):
```php
/**
 * Add extended click tracking columns + indexes to the log table.
 * DB version 510.
 */
function yourls_upgrade_to_510() {
    $ydb = yourls_get_db( 'write-upgrade_to_510' );
    $log = YOURLS_DB_TABLE_LOG;

    $existing = array_column( (array) $ydb->fetchObjects( "SHOW COLUMNS FROM `$log`" ), 'Field' );

    $columns = [
        'device_type'   => "ALTER TABLE `$log` ADD COLUMN `device_type` varchar(16) NULL AFTER `country_code`",
        'browser'       => "ALTER TABLE `$log` ADD COLUMN `browser` varchar(32) NULL AFTER `device_type`",
        'os'            => "ALTER TABLE `$log` ADD COLUMN `os` varchar(32) NULL AFTER `browser`",
        'referrer_host' => "ALTER TABLE `$log` ADD COLUMN `referrer_host` varchar(100) NULL AFTER `os`",
        'utm_source'    => "ALTER TABLE `$log` ADD COLUMN `utm_source` varchar(100) NULL AFTER `referrer_host`",
        'utm_medium'    => "ALTER TABLE `$log` ADD COLUMN `utm_medium` varchar(100) NULL AFTER `utm_source`",
        'utm_campaign'  => "ALTER TABLE `$log` ADD COLUMN `utm_campaign` varchar(100) NULL AFTER `utm_medium`",
        'city'          => "ALTER TABLE `$log` ADD COLUMN `city` varchar(100) NULL AFTER `utm_campaign`",
        'region'        => "ALTER TABLE `$log` ADD COLUMN `region` varchar(100) NULL AFTER `city`",
        'visitor_hash'  => "ALTER TABLE `$log` ADD COLUMN `visitor_hash` char(16) NULL AFTER `region`",
        'click_uid'     => "ALTER TABLE `$log` ADD COLUMN `click_uid` char(16) NULL AFTER `visitor_hash`",
        'meta'          => "ALTER TABLE `$log` ADD COLUMN `meta` JSON NULL AFTER `click_uid`",
    ];

    foreach ( $columns as $name => $sql ) {
        if ( in_array( $name, $existing, true ) ) {
            continue;
        }
        echo "<p>Adding `$name` column to log table. Please wait...</p>";
        try {
            $ydb->perform( $sql );
            echo "<p class='success'>OK!</p>";
        } catch ( \Exception $e ) {
            echo "<p class='error'>Unable to add `$name` column. Error: <pre>" . $e->getMessage() . "</pre></p>";
            die();
        }
    }

    $existing_idx = array_column( (array) $ydb->fetchObjects( "SHOW INDEX FROM `$log`" ), 'Key_name' );
    $indexes = [
        'device_type_idx' => "ALTER TABLE `$log` ADD INDEX `device_type_idx` (`device_type`)",
        'utm_source_idx'  => "ALTER TABLE `$log` ADD INDEX `utm_source_idx` (`utm_source`)",
        'click_uid_idx'   => "ALTER TABLE `$log` ADD INDEX `click_uid_idx` (`click_uid`)",
    ];
    foreach ( $indexes as $name => $sql ) {
        if ( in_array( $name, $existing_idx, true ) ) {
            continue;
        }
        echo "<p>Adding `$name` index. Please wait...</p>";
        try {
            $ydb->perform( $sql );
            echo "<p class='success'>OK!</p>";
        } catch ( \Exception $e ) {
            echo "<p class='error'>Unable to add `$name` index. Error: <pre>" . $e->getMessage() . "</pre></p>";
            die();
        }
    }
}
```

- [ ] **Step 2: Wire into `yourls_upgrade()` switch**

In `includes/functions-upgrade.php`, find the block:
```php
        if( $oldsql < 509 ) {
            yourls_upgrade_to_509();
        }
```
and add immediately after it:
```php
        if( $oldsql < 510 ) {
            yourls_upgrade_to_510();
        }
```

- [ ] **Step 3: Sanity-check syntax**

Run: `php -l includes/functions-upgrade.php`
Expected: `No syntax errors detected`

- [ ] **Step 4: Commit**

```bash
git add includes/functions-upgrade.php
git commit -m "feat(upgrade): add migration to 510 for click tracking columns"
```

---

### Task 1.4: Migration test (idempotent)

**Files:**
- Create: `tests/tests/click/MigrationTest.php`

- [ ] **Step 1: Write the failing test**

```php
<?php
namespace YOURLS\Tests\Click;

use YOURLS\Tests\TestCase;

/**
 * @group click
 * @group click-migration
 */
class MigrationTest extends TestCase {

    public function test_upgrade_to_510_adds_all_new_columns_and_is_idempotent() {
        require_once YOURLS_INC . '/functions-upgrade.php';

        // Run twice — second pass must be a no-op (no exceptions, all already-present)
        ob_start(); yourls_upgrade_to_510(); ob_end_clean();
        ob_start(); yourls_upgrade_to_510(); ob_end_clean();

        $ydb = yourls_get_db();
        $cols = array_column(
            (array) $ydb->fetchObjects( 'SHOW COLUMNS FROM `' . YOURLS_DB_TABLE_LOG . '`' ),
            'Field'
        );

        foreach ( ['device_type','browser','os','referrer_host','utm_source','utm_medium','utm_campaign','city','region','visitor_hash','click_uid','meta'] as $expected ) {
            $this->assertContains( $expected, $cols, "log table is missing `$expected`" );
        }

        $idx = array_column(
            (array) $ydb->fetchObjects( 'SHOW INDEX FROM `' . YOURLS_DB_TABLE_LOG . '`' ),
            'Key_name'
        );
        foreach ( ['device_type_idx','utm_source_idx','click_uid_idx'] as $expected ) {
            $this->assertContains( $expected, $idx, "log table is missing index `$expected`" );
        }
    }
}
```

- [ ] **Step 2: Run test to verify migration runs cleanly**

Run: `./vendor/bin/phpunit --filter MigrationTest tests/tests/click/MigrationTest.php`
Expected: PASS (the migration code from Task 1.3 already exists and is idempotent).

- [ ] **Step 3: Commit**

```bash
git add tests/tests/click/MigrationTest.php
git commit -m "test(click): assert migration to 510 is idempotent"
```

---

## Phase 2 — Backend pure-logic units (TDD, no I/O)

### Task 2.1: `BotDetector`

**Files:**
- Create: `includes/Click/BotDetector.php`
- Test: `tests/tests/click/BotDetectorTest.php`

- [ ] **Step 1: Write the failing test**

```php
<?php
namespace YOURLS\Tests\Click;

use YOURLS\Click\BotDetector;
use YOURLS\Tests\TestCase;

/** @group click */
class BotDetectorTest extends TestCase {

    /** @dataProvider uaProvider */
    public function test_detection( string $ua, string $accept, bool $expectedBot, ?string $expectedName ) {
        $d = new BotDetector( $ua, $accept );
        $this->assertSame( $expectedBot, $d->isBot() );
        $this->assertSame( $expectedName, $d->botName() );
    }

    public static function uaProvider(): array {
        return [
            'empty UA'   => [ '', '', true, 'unknown' ],
            'curl'       => [ 'curl/7.85.0', '*/*', true, 'curl' ],
            'wget'       => [ 'Wget/1.21', '*/*', true, 'wget' ],
            'googlebot'  => [ 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'text/html', true, 'googlebot' ],
            'bingbot'    => [ 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'text/html', true, 'bingbot' ],
            'twitterbot' => [ 'Twitterbot/1.0', '*/*', true, 'twitterbot' ],
            'facebook'   => [ 'facebookexternalhit/1.1', '*/*', true, 'facebookexternalhit' ],
            'chrome'     => [ 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'text/html,application/xhtml+xml', false, null ],
            'safari ios' => [ 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1', 'text/html', false, null ],
            'firefox'    => [ 'Mozilla/5.0 (X11; Linux x86_64; rv:121.0) Gecko/20100101 Firefox/121.0', 'text/html', false, null ],
            'no accept'  => [ 'Mozilla/5.0', '', true, 'unknown' ],
        ];
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `./vendor/bin/phpunit --filter BotDetectorTest`
Expected: FAIL — class `YOURLS\Click\BotDetector` not found.

- [ ] **Step 3: Implement `BotDetector`**

```php
<?php
namespace YOURLS\Click;

class BotDetector {
    private const PATTERNS = [
        'googlebot'            => '/Googlebot/i',
        'bingbot'              => '/bingbot/i',
        'duckduckbot'          => '/DuckDuckBot/i',
        'yandexbot'            => '/YandexBot/i',
        'baiduspider'          => '/Baiduspider/i',
        'slurp'                => '/Slurp/i',
        'twitterbot'           => '/Twitterbot/i',
        'facebookexternalhit'  => '/facebookexternalhit/i',
        'linkedinbot'          => '/LinkedInBot/i',
        'slackbot'             => '/Slackbot/i',
        'telegrambot'          => '/TelegramBot/i',
        'discordbot'           => '/Discordbot/i',
        'whatsapp'             => '/WhatsApp/i',
        'curl'                 => '/^curl\//i',
        'wget'                 => '/^Wget\//i',
        'python-requests'      => '/python-requests/i',
        'go-http-client'       => '/Go-http-client/i',
        'httpclient'           => '/HttpClient/i',
        'ahrefsbot'            => '/AhrefsBot/i',
        'semrushbot'           => '/SemrushBot/i',
    ];

    public function __construct(
        private readonly string $userAgent,
        private readonly string $acceptHeader = ''
    ) {}

    public function isBot(): bool {
        if ( $this->userAgent === '' ) {
            return true;
        }
        if ( $this->botName() !== null && $this->botName() !== 'unknown' ) {
            return true;
        }
        // Heuristic: real browsers always send some Accept value containing text/html.
        if ( $this->acceptHeader === '' || stripos( $this->acceptHeader, 'text/html' ) === false && stripos( $this->acceptHeader, '*/*' ) === false ) {
            return true;
        }
        return false;
    }

    public function botName(): ?string {
        if ( $this->userAgent === '' ) {
            return 'unknown';
        }
        foreach ( self::PATTERNS as $name => $regex ) {
            if ( preg_match( $regex, $this->userAgent ) ) {
                return $name;
            }
        }
        // Detected via Accept-only heuristic
        if ( $this->acceptHeader === '' ) {
            return 'unknown';
        }
        return null;
    }
}
```

- [ ] **Step 4: Run test to verify it passes**

Run: `./vendor/bin/phpunit --filter BotDetectorTest`
Expected: PASS for all data sets.

- [ ] **Step 5: Commit**

```bash
git add includes/Click/BotDetector.php tests/tests/click/BotDetectorTest.php
git commit -m "feat(click): bot detector with UA + Accept heuristic"
```

---

### Task 2.2: `UserAgentParser`

**Files:**
- Create: `includes/Click/UserAgentParser.php`
- Test: `tests/tests/click/UserAgentParserTest.php`

- [ ] **Step 1: Write the failing test**

```php
<?php
namespace YOURLS\Tests\Click;

use YOURLS\Click\UserAgentParser;
use YOURLS\Tests\TestCase;

/** @group click */
class UserAgentParserTest extends TestCase {

    /** @dataProvider uaProvider */
    public function test_parse( string $ua, string $device, string $browser, string $os ) {
        $r = ( new UserAgentParser() )->parse( $ua );
        $this->assertSame( $device,  $r['device_type'], 'device' );
        $this->assertSame( $browser, $r['browser'],     'browser' );
        $this->assertSame( $os,      $r['os'],          'os' );
    }

    public static function uaProvider(): array {
        return [
            [ 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'desktop', 'chrome', 'windows' ],
            [ 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Safari/605.1.15', 'desktop', 'safari', 'macos' ],
            [ 'Mozilla/5.0 (X11; Linux x86_64; rv:121.0) Gecko/20100101 Firefox/121.0', 'desktop', 'firefox', 'linux' ],
            [ 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1', 'mobile', 'safari', 'ios' ],
            [ 'Mozilla/5.0 (Linux; Android 14; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 'mobile', 'chrome', 'android' ],
            [ 'Mozilla/5.0 (iPad; CPU OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Safari/604.1', 'tablet', 'safari', 'ios' ],
            [ 'Mozilla/5.0 (Linux; Android 14; SM-X910) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'tablet', 'chrome', 'android' ],
            [ 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', 'desktop', 'edge', 'windows' ],
            [ 'curl/7.85.0', 'bot', 'unknown', 'unknown' ],
            [ '', 'bot', 'unknown', 'unknown' ],
        ];
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `./vendor/bin/phpunit --filter UserAgentParserTest`
Expected: FAIL — class not found.

- [ ] **Step 3: Implement `UserAgentParser`**

```php
<?php
namespace YOURLS\Click;

class UserAgentParser {
    public function parse( string $ua ): array {
        if ( $ua === '' ) {
            return [ 'device_type' => 'bot', 'browser' => 'unknown', 'os' => 'unknown' ];
        }

        $os      = $this->matchOs( $ua );
        $browser = $this->matchBrowser( $ua );
        $device  = $this->matchDevice( $ua, $browser );

        return [ 'device_type' => $device, 'browser' => $browser, 'os' => $os ];
    }

    private function matchOs( string $ua ): string {
        return match ( true ) {
            (bool) preg_match( '/Windows NT/i', $ua )                         => 'windows',
            (bool) preg_match( '/Android/i', $ua )                             => 'android',
            (bool) preg_match( '/(iPhone|iPad|iPod)/i', $ua )                  => 'ios',
            (bool) preg_match( '/Mac OS X/i', $ua )                            => 'macos',
            (bool) preg_match( '/(Linux|X11|Ubuntu|Debian|Fedora|CentOS)/i', $ua ) => 'linux',
            default                                                            => 'unknown',
        };
    }

    private function matchBrowser( string $ua ): string {
        return match ( true ) {
            (bool) preg_match( '/Edg\//i', $ua )                                => 'edge',
            (bool) preg_match( '/OPR\//i', $ua )                                => 'opera',
            (bool) preg_match( '/Firefox\//i', $ua )                            => 'firefox',
            (bool) preg_match( '/Chrome\//i', $ua ) && !preg_match( '/Edg\//i', $ua ) => 'chrome',
            (bool) preg_match( '/Safari\//i', $ua ) && !preg_match( '/Chrome\//i', $ua ) => 'safari',
            (bool) preg_match( '/MSIE|Trident/i', $ua )                         => 'ie',
            default                                                              => 'unknown',
        };
    }

    private function matchDevice( string $ua, string $browser ): string {
        if ( $browser === 'unknown' ) {
            return 'bot';
        }
        if ( preg_match( '/(iPad|tablet)/i', $ua ) ) {
            return 'tablet';
        }
        if ( preg_match( '/Android/i', $ua ) && !preg_match( '/Mobile/i', $ua ) ) {
            return 'tablet';
        }
        if ( preg_match( '/(Mobi|iPhone|iPod|Android.*Mobile)/i', $ua ) ) {
            return 'mobile';
        }
        return 'desktop';
    }
}
```

- [ ] **Step 4: Run test to verify it passes**

Run: `./vendor/bin/phpunit --filter UserAgentParserTest`
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add includes/Click/UserAgentParser.php tests/tests/click/UserAgentParserTest.php
git commit -m "feat(click): UA parser for device/browser/os"
```

---

### Task 2.3: `VisitorHasher`

**Files:**
- Create: `includes/Click/VisitorHasher.php`
- Test: `tests/tests/click/VisitorHasherTest.php`

- [ ] **Step 1: Write the failing test**

```php
<?php
namespace YOURLS\Tests\Click;

use YOURLS\Click\VisitorHasher;
use YOURLS\Tests\TestCase;

/** @group click */
class VisitorHasherTest extends TestCase {

    public function test_deterministic_within_same_day() {
        $h = new VisitorHasher( 'pepper-secret', '2026-05-07' );
        $a = $h->hash( '203.0.113.7', 'Mozilla/5.0 ...' );
        $b = $h->hash( '203.0.113.7', 'Mozilla/5.0 ...' );
        $this->assertSame( $a, $b );
        $this->assertMatchesRegularExpression( '/^[a-f0-9]{16}$/', $a );
    }

    public function test_rotates_across_days() {
        $a = ( new VisitorHasher( 'pepper-secret', '2026-05-07' ) )->hash( '203.0.113.7', 'UA' );
        $b = ( new VisitorHasher( 'pepper-secret', '2026-05-08' ) )->hash( '203.0.113.7', 'UA' );
        $this->assertNotSame( $a, $b );
    }

    public function test_different_ips_produce_different_hashes() {
        $h = new VisitorHasher( 'pepper-secret', '2026-05-07' );
        $this->assertNotSame(
            $h->hash( '203.0.113.7', 'UA' ),
            $h->hash( '203.0.113.8', 'UA' )
        );
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `./vendor/bin/phpunit --filter VisitorHasherTest`
Expected: FAIL — class not found.

- [ ] **Step 3: Implement `VisitorHasher`**

```php
<?php
namespace YOURLS\Click;

class VisitorHasher {
    public function __construct(
        private readonly string $pepper,
        private readonly string $dayKey
    ) {}

    public static function today( string $pepper ): self {
        return new self( $pepper, gmdate( 'Y-m-d' ) );
    }

    public function hash( string $ip, string $ua ): string {
        return substr( hash( 'sha256', $ip . '|' . $ua . '|' . $this->dayKey . '|' . $this->pepper ), 0, 16 );
    }
}
```

- [ ] **Step 4: Run test to verify it passes**

Run: `./vendor/bin/phpunit --filter VisitorHasherTest`
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add includes/Click/VisitorHasher.php tests/tests/click/VisitorHasherTest.php
git commit -m "feat(click): daily-rotating visitor hash"
```

---

### Task 2.4: `ClickPayload` DTO

**Files:**
- Create: `includes/Click/ClickPayload.php`
- Test: `tests/tests/click/ClickPayloadTest.php`

- [ ] **Step 1: Write the failing test**

```php
<?php
namespace YOURLS\Tests\Click;

use YOURLS\Click\ClickPayload;
use YOURLS\Tests\TestCase;

/** @group click */
class ClickPayloadTest extends TestCase {

    public function test_to_row_contains_all_hot_columns() {
        $p = new ClickPayload();
        $p->keyword       = 'abc';
        $p->clickTime     = '2026-05-07 10:00:00';
        $p->referrer      = 'https://t.co/x';
        $p->userAgent     = 'Mozilla/5.0';
        $p->ipAddress     = '203.0.113.7';
        $p->countryCode   = 'IT';
        $p->deviceType    = 'desktop';
        $p->browser       = 'chrome';
        $p->os            = 'macos';
        $p->referrerHost  = 't.co';
        $p->utmSource     = 'newsletter';
        $p->utmMedium     = 'email';
        $p->utmCampaign   = 'spring';
        $p->city          = 'Milan';
        $p->region        = 'Lombardy';
        $p->visitorHash   = '0123456789abcdef';
        $p->clickUid      = 'fedcba9876543210';
        $p->meta          = [ 'tz' => 'Europe/Rome', 'lang' => 'it-IT' ];

        $row = $p->toRow();
        $this->assertSame( 'abc', $row['shorturl'] );
        $this->assertSame( 'IT',  $row['country_code'] );
        $this->assertSame( 'chrome', $row['browser'] );
        $this->assertSame( '0123456789abcdef', $row['visitor_hash'] );
        $this->assertJson( $row['meta'] );
        $this->assertSame( 'Europe/Rome', json_decode( $row['meta'], true )['tz'] );
    }

    public function test_truncation_of_oversized_fields() {
        $p = new ClickPayload();
        $p->keyword     = 'abc';
        $p->referrer    = str_repeat( 'a', 500 );
        $p->userAgent   = str_repeat( 'b', 500 );
        $p->referrerHost= str_repeat( 'c', 200 );
        $p->utmSource   = str_repeat( 'd', 200 );
        $p->city        = str_repeat( 'e', 200 );
        $row = $p->toRow();
        $this->assertSame( 200, strlen( $row['referrer'] ) );
        $this->assertSame( 255, strlen( $row['user_agent'] ) );
        $this->assertSame( 100, strlen( $row['referrer_host'] ) );
        $this->assertSame( 100, strlen( $row['utm_source'] ) );
        $this->assertSame( 100, strlen( $row['city'] ) );
    }

    public function test_null_meta_serializes_to_null_string() {
        $p = new ClickPayload();
        $p->keyword = 'abc';
        $row = $p->toRow();
        $this->assertNull( $row['meta'] );
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `./vendor/bin/phpunit --filter ClickPayloadTest`
Expected: FAIL — class not found.

- [ ] **Step 3: Implement `ClickPayload`**

```php
<?php
namespace YOURLS\Click;

class ClickPayload {
    public string  $keyword       = '';
    public string  $clickTime     = '';
    public string  $referrer      = '';
    public string  $userAgent     = '';
    public string  $ipAddress     = '';
    public string  $countryCode   = '';
    public ?string $deviceType    = null;
    public ?string $browser       = null;
    public ?string $os            = null;
    public ?string $referrerHost  = null;
    public ?string $utmSource     = null;
    public ?string $utmMedium     = null;
    public ?string $utmCampaign   = null;
    public ?string $city          = null;
    public ?string $region        = null;
    public ?string $visitorHash   = null;
    public ?string $clickUid      = null;
    public ?array  $meta          = null;

    public function toRow(): array {
        return [
            'click_time'    => $this->clickTime ?: gmdate( 'Y-m-d H:i:s' ),
            'shorturl'      => $this->keyword,
            'referrer'      => substr( $this->referrer,  0, 200 ),
            'user_agent'    => substr( $this->userAgent, 0, 255 ),
            'ip_address'    => substr( $this->ipAddress, 0, 41 ),
            'country_code'  => substr( $this->countryCode, 0, 2 ),
            'device_type'   => $this->trimOrNull( $this->deviceType,   16 ),
            'browser'       => $this->trimOrNull( $this->browser,      32 ),
            'os'            => $this->trimOrNull( $this->os,           32 ),
            'referrer_host' => $this->trimOrNull( $this->referrerHost, 100 ),
            'utm_source'    => $this->trimOrNull( $this->utmSource,    100 ),
            'utm_medium'    => $this->trimOrNull( $this->utmMedium,    100 ),
            'utm_campaign'  => $this->trimOrNull( $this->utmCampaign,  100 ),
            'city'          => $this->trimOrNull( $this->city,         100 ),
            'region'        => $this->trimOrNull( $this->region,       100 ),
            'visitor_hash'  => $this->trimOrNull( $this->visitorHash,  16 ),
            'click_uid'     => $this->trimOrNull( $this->clickUid,     16 ),
            'meta'          => $this->meta === null ? null : json_encode( $this->meta, JSON_UNESCAPED_UNICODE ),
        ];
    }

    private function trimOrNull( ?string $v, int $max ): ?string {
        if ( $v === null || $v === '' ) return null;
        return substr( $v, 0, $max );
    }
}
```

- [ ] **Step 4: Run test to verify it passes**

Run: `./vendor/bin/phpunit --filter ClickPayloadTest`
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add includes/Click/ClickPayload.php tests/tests/click/ClickPayloadTest.php
git commit -m "feat(click): typed payload DTO with field truncation"
```

---

### Task 2.5: `RateLimiter`

**Files:**
- Create: `includes/Click/RateLimiter.php`
- Test: `tests/tests/click/RateLimiterTest.php`

- [ ] **Step 1: Write the failing test**

```php
<?php
namespace YOURLS\Tests\Click;

use YOURLS\Click\RateLimiter;
use YOURLS\Tests\TestCase;

/** @group click */
class RateLimiterTest extends TestCase {

    public function test_under_budget_returns_true() {
        $store = [];
        $rl = new RateLimiter( 3, 60, $this->arrayBackend( $store ) );
        $this->assertTrue( $rl->allow( '1.2.3.4' ) );
        $this->assertTrue( $rl->allow( '1.2.3.4' ) );
        $this->assertTrue( $rl->allow( '1.2.3.4' ) );
    }

    public function test_over_budget_returns_false() {
        $store = [];
        $rl = new RateLimiter( 2, 60, $this->arrayBackend( $store ) );
        $this->assertTrue( $rl->allow( '1.2.3.4' ) );
        $this->assertTrue( $rl->allow( '1.2.3.4' ) );
        $this->assertFalse( $rl->allow( '1.2.3.4' ) );
    }

    public function test_separate_ips_have_separate_budgets() {
        $store = [];
        $rl = new RateLimiter( 1, 60, $this->arrayBackend( $store ) );
        $this->assertTrue( $rl->allow( '1.2.3.4' ) );
        $this->assertTrue( $rl->allow( '5.6.7.8' ) );
        $this->assertFalse( $rl->allow( '1.2.3.4' ) );
    }

    private function arrayBackend( array &$store ): object {
        return new class( $store ) {
            public function __construct( private array &$store ) {}
            public function get( string $k ): ?int { return $this->store[ $k ] ?? null; }
            public function inc( string $k, int $ttl ): int {
                $this->store[ $k ] = ( $this->store[ $k ] ?? 0 ) + 1;
                return $this->store[ $k ];
            }
        };
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `./vendor/bin/phpunit --filter RateLimiterTest`
Expected: FAIL.

- [ ] **Step 3: Implement `RateLimiter`**

```php
<?php
namespace YOURLS\Click;

class RateLimiter {
    public function __construct(
        private readonly int $maxPerWindow,
        private readonly int $windowSeconds,
        private readonly object $backend // anything with get(string):?int and inc(string,int):int
    ) {}

    public function allow( string $ip ): bool {
        $key = 'yourls_click_rl:' . md5( $ip ) . ':' . floor( time() / $this->windowSeconds );
        $count = $this->backend->inc( $key, $this->windowSeconds );
        return $count <= $this->maxPerWindow;
    }

    public static function defaultBackend(): object {
        return new class {
            public function get( string $k ): ?int {
                if ( function_exists( 'apcu_fetch' ) ) {
                    $ok = false; $v = apcu_fetch( $k, $ok );
                    return $ok ? (int) $v : null;
                }
                return null;
            }
            public function inc( string $k, int $ttl ): int {
                if ( function_exists( 'apcu_inc' ) ) {
                    $ok = false; $v = apcu_inc( $k, 1, $ok, $ttl );
                    if ( !$ok ) { apcu_store( $k, 1, $ttl ); return 1; }
                    return (int) $v;
                }
                // Fallback: no backend, no rate limit (return 1 = always allowed)
                return 1;
            }
        };
    }
}
```

- [ ] **Step 4: Run test to verify it passes**

Run: `./vendor/bin/phpunit --filter RateLimiterTest`
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add includes/Click/RateLimiter.php tests/tests/click/RateLimiterTest.php
git commit -m "feat(click): per-IP rate limiter for beacon endpoint"
```

---

### Task 2.6: `Connection::closeAndContinue`

**Files:**
- Create: `includes/Click/Connection.php`

No new test (this is glue around `fastcgi_finish_request` and is exercised by integration tests in Phase 5).

- [ ] **Step 1: Implement**

```php
<?php
namespace YOURLS\Click;

class Connection {
    /**
     * Flush response and detach from the client so subsequent work doesn't
     * delay the redirect/204. Safe under any SAPI.
     */
    public static function closeAndContinue(): void {
        if ( function_exists( 'fastcgi_finish_request' ) ) {
            @fastcgi_finish_request();
            return;
        }
        // Fallback: best-effort flush + abort tolerance.
        @ignore_user_abort( true );
        if ( function_exists( 'litespeed_finish_request' ) ) {
            @litespeed_finish_request();
            return;
        }
        // Mod_php / dev server: flush whatever we have and continue.
        while ( ob_get_level() > 0 ) { @ob_end_flush(); }
        @flush();
    }
}
```

- [ ] **Step 2: Sanity-check**

Run: `php -l includes/Click/Connection.php`
Expected: `No syntax errors detected`

- [ ] **Step 3: Commit**

```bash
git add includes/Click/Connection.php
git commit -m "feat(click): connection close helper with FPM/LiteSpeed/fallback"
```

---

## Phase 3 — Backend integration: GeoLookup, ClickCollector

### Task 3.1: `GeoLookup`

**Files:**
- Create: `includes/Click/GeoLookup.php`

This wraps MaxMind reader. We don't unit-test it — `geoip2/geoip2` is already trusted, and `tests/tests/click/ClickCollectorTest.php` (Task 3.2) injects a fake.

- [ ] **Step 1: Implement**

```php
<?php
namespace YOURLS\Click;

class GeoLookup {
    public function __construct( private readonly ?string $dbPath = null ) {}

    /**
     * @return array{country:?string,city:?string,region:?string,lat:?float,lon:?float,asn:?int,isp:?string}
     */
    public function lookup( string $ip ): array {
        $empty = [ 'country' => null, 'city' => null, 'region' => null, 'lat' => null, 'lon' => null, 'asn' => null, 'isp' => null ];

        $db = $this->dbPath ?? ( defined( 'YOURLS_INC' ) ? YOURLS_INC . '/geo/GeoLite2-City.mmdb' : '' );
        if ( !$db || !is_readable( $db ) ) {
            // City DB not present: fall back to existing country-only helper if available.
            if ( function_exists( 'yourls_geo_ip_to_countrycode' ) ) {
                $cc = yourls_geo_ip_to_countrycode( $ip, '' );
                $empty['country'] = $cc !== '' ? $cc : null;
            }
            return $empty;
        }

        try {
            $reader = new \GeoIp2\Database\Reader( $db );
            $rec    = $reader->city( $ip );
            return [
                'country' => $rec->country->isoCode ?? null,
                'city'    => $rec->city->name ?? null,
                'region'  => $rec->mostSpecificSubdivision->name ?? null,
                'lat'     => $rec->location->latitude ?? null,
                'lon'     => $rec->location->longitude ?? null,
                'asn'     => null,  // ASN is in a separate DB; left null unless plugin provides it
                'isp'     => null,
            ];
        } catch ( \Throwable $e ) {
            return $empty;
        }
    }
}
```

- [ ] **Step 2: Sanity-check**

Run: `php -l includes/Click/GeoLookup.php`
Expected: `No syntax errors detected`

- [ ] **Step 3: Commit**

```bash
git add includes/Click/GeoLookup.php
git commit -m "feat(click): geo lookup wrapping MaxMind city DB with country fallback"
```

---

### Task 3.2: `ClickCollector`

**Files:**
- Create: `includes/Click/ClickCollector.php`
- Test: `tests/tests/click/ClickCollectorTest.php`

- [ ] **Step 1: Write the failing test**

```php
<?php
namespace YOURLS\Tests\Click;

use YOURLS\Click\ClickCollector;
use YOURLS\Click\ClickPayload;
use YOURLS\Click\BotDetector;
use YOURLS\Click\UserAgentParser;
use YOURLS\Click\VisitorHasher;
use YOURLS\Click\GeoLookup;
use YOURLS\Tests\TestCase;

/** @group click */
class ClickCollectorTest extends TestCase {

    public function test_server_payload_contains_parsed_ua_and_geo_and_referrer_host_and_utm() {
        $col = new ClickCollector(
            new UserAgentParser(),
            $this->stubGeo( [ 'country' => 'IT', 'city' => 'Milan', 'region' => 'Lombardy' ] ),
            new VisitorHasher( 'pepper', '2026-05-07' ),
            anonymizeIp: false
        );

        $p = $col->collectFromServer(
            keyword: 'abc',
            ip: '203.0.113.7',
            ua: 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            referrer: 'https://t.co/path?utm_source=newsletter&utm_medium=email&utm_campaign=spring',
            queryString: 'utm_source=newsletter&utm_medium=email&utm_campaign=spring',
            isBot: false,
            botName: null,
            clickUid: 'fedcba9876543210'
        );

        $this->assertInstanceOf( ClickPayload::class, $p );
        $this->assertSame( 'desktop', $p->deviceType );
        $this->assertSame( 'chrome',  $p->browser );
        $this->assertSame( 'windows', $p->os );
        $this->assertSame( 'IT',      $p->countryCode );
        $this->assertSame( 'Milan',   $p->city );
        $this->assertSame( 'Lombardy',$p->region );
        $this->assertSame( 't.co',    $p->referrerHost );
        $this->assertSame( 'newsletter', $p->utmSource );
        $this->assertSame( 'email',      $p->utmMedium );
        $this->assertSame( 'spring',     $p->utmCampaign );
        $this->assertMatchesRegularExpression( '/^[a-f0-9]{16}$/', $p->visitorHash );
        $this->assertSame( 'fedcba9876543210', $p->clickUid );
        $this->assertSame( 'IT', $p->meta['country'] ?? null );
    }

    public function test_bot_marker_in_meta() {
        $col = $this->makeCollector();
        $p = $col->collectFromServer(
            keyword: 'abc', ip: '1.2.3.4', ua: 'Googlebot/2.1', referrer: '', queryString: '',
            isBot: true, botName: 'googlebot', clickUid: '0000000000000000'
        );
        $this->assertTrue( $p->meta['is_bot'] );
        $this->assertSame( 'googlebot', $p->meta['bot_name'] );
    }

    public function test_ip_anonymization_zeroes_last_octet() {
        $col = new ClickCollector(
            new UserAgentParser(),
            $this->stubGeo( [] ),
            new VisitorHasher( 'pepper', '2026-05-07' ),
            anonymizeIp: true
        );
        $p = $col->collectFromServer(
            keyword: 'abc', ip: '203.0.113.7', ua: 'curl/8', referrer: '', queryString: '',
            isBot: true, botName: 'curl', clickUid: '0000000000000000'
        );
        $this->assertSame( '203.0.113.0', $p->ipAddress );
    }

    public function test_beacon_merge_overwrites_only_client_fields() {
        $col = $this->makeCollector();
        $base = $col->collectFromServer(
            keyword: 'abc', ip: '203.0.113.7',
            ua: 'Mozilla/5.0 (Windows NT 10.0) Chrome/120 Safari/537.36',
            referrer: '', queryString: '',
            isBot: false, botName: null, clickUid: 'fedcba9876543210'
        );
        $merged = $col->mergeBeacon( $base, [
            'screen'   => [ 'w' => 1920, 'h' => 1080, 'dpr' => 2 ],
            'viewport' => [ 'w' => 1280, 'h' => 720 ],
            'tz'       => 'Europe/Rome',
            'lang'     => 'it-IT',
            'connection' => '4g',
        ] );
        $this->assertSame( 1920, $merged->meta['screen_w'] );
        $this->assertSame( 'Europe/Rome', $merged->meta['tz'] );
        $this->assertSame( 'it-IT', $merged->meta['lang'] );
        $this->assertSame( '4g', $merged->meta['connection_type'] );
        $this->assertSame( 'chrome', $merged->browser ); // unchanged
    }

    private function makeCollector(): ClickCollector {
        return new ClickCollector(
            new UserAgentParser(),
            $this->stubGeo( [] ),
            new VisitorHasher( 'pepper', '2026-05-07' ),
            anonymizeIp: false
        );
    }

    private function stubGeo( array $row ): GeoLookup {
        return new class( $row ) extends GeoLookup {
            public function __construct( private array $row ) { parent::__construct( null ); }
            public function lookup( string $ip ): array {
                return array_merge(
                    [ 'country' => null, 'city' => null, 'region' => null, 'lat' => null, 'lon' => null, 'asn' => null, 'isp' => null ],
                    $this->row
                );
            }
        };
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `./vendor/bin/phpunit --filter ClickCollectorTest`
Expected: FAIL — class not found.

- [ ] **Step 3: Implement `ClickCollector`**

```php
<?php
namespace YOURLS\Click;

class ClickCollector {
    public function __construct(
        private readonly UserAgentParser $uaParser,
        private readonly GeoLookup $geo,
        private readonly VisitorHasher $hasher,
        private readonly bool $anonymizeIp = false
    ) {}

    public function collectFromServer(
        string $keyword,
        string $ip,
        string $ua,
        string $referrer,
        string $queryString,
        bool $isBot,
        ?string $botName,
        string $clickUid
    ): ClickPayload {
        $ipFinal = $this->anonymizeIp ? $this->anonymize( $ip ) : $ip;
        $parsed  = $this->uaParser->parse( $ua );
        $geo     = $this->geo->lookup( $ip );
        $utm     = $this->parseUtm( $queryString );
        $host    = $this->referrerHost( $referrer );

        $p = new ClickPayload();
        $p->keyword      = $keyword;
        $p->clickTime    = gmdate( 'Y-m-d H:i:s' );
        $p->referrer     = $referrer;
        $p->userAgent    = $ua;
        $p->ipAddress    = $ipFinal;
        $p->countryCode  = (string) ( $geo['country'] ?? '' );
        $p->deviceType   = $isBot ? 'bot' : $parsed['device_type'];
        $p->browser      = $parsed['browser'];
        $p->os           = $parsed['os'];
        $p->referrerHost = $host;
        $p->utmSource    = $utm['utm_source']    ?? null;
        $p->utmMedium    = $utm['utm_medium']    ?? null;
        $p->utmCampaign  = $utm['utm_campaign']  ?? null;
        $p->city         = $geo['city']   ?? null;
        $p->region       = $geo['region'] ?? null;
        $p->visitorHash  = $this->hasher->hash( $ipFinal, $ua );
        $p->clickUid     = $clickUid;
        $p->meta = [
            'country'  => $geo['country'] ?? null,
            'lat'      => $geo['lat'] ?? null,
            'lon'      => $geo['lon'] ?? null,
            'asn'      => $geo['asn'] ?? null,
            'isp'      => $geo['isp'] ?? null,
            'is_bot'   => $isBot,
            'bot_name' => $botName,
        ];
        return $p;
    }

    public function mergeBeacon( ClickPayload $p, array $beacon ): ClickPayload {
        $meta = $p->meta ?? [];
        if ( isset( $beacon['screen'] ) && is_array( $beacon['screen'] ) ) {
            $meta['screen_w'] = (int) ( $beacon['screen']['w'] ?? 0 );
            $meta['screen_h'] = (int) ( $beacon['screen']['h'] ?? 0 );
            $meta['dpr']      = (float) ( $beacon['screen']['dpr'] ?? 1 );
        }
        if ( isset( $beacon['viewport'] ) && is_array( $beacon['viewport'] ) ) {
            $meta['viewport_w'] = (int) ( $beacon['viewport']['w'] ?? 0 );
            $meta['viewport_h'] = (int) ( $beacon['viewport']['h'] ?? 0 );
        }
        foreach ( [ 'tz' => 'tz', 'lang' => 'lang', 'connection' => 'connection_type' ] as $src => $dst ) {
            if ( isset( $beacon[ $src ] ) && is_string( $beacon[ $src ] ) ) {
                $meta[ $dst ] = substr( $beacon[ $src ], 0, 64 );
            }
        }
        $p->meta = $meta;
        return $p;
    }

    public function persist( ClickPayload $p ): bool {
        $row = $p->toRow();
        $sql = 'INSERT INTO `' . YOURLS_DB_TABLE_LOG . '` (' .
            '`click_time`,`shorturl`,`referrer`,`user_agent`,`ip_address`,`country_code`,' .
            '`device_type`,`browser`,`os`,`referrer_host`,`utm_source`,`utm_medium`,`utm_campaign`,' .
            '`city`,`region`,`visitor_hash`,`click_uid`,`meta`) VALUES (' .
            ':click_time,:shorturl,:referrer,:user_agent,:ip_address,:country_code,' .
            ':device_type,:browser,:os,:referrer_host,:utm_source,:utm_medium,:utm_campaign,' .
            ':city,:region,:visitor_hash,:click_uid,:meta)';
        try {
            yourls_get_db( 'write-click_collector' )->fetchAffected( $sql, $row );
            return true;
        } catch ( \Throwable $e ) {
            if ( function_exists( 'yourls_debug_log' ) ) {
                yourls_debug_log( 'click insert failed: ' . $e->getMessage() );
            }
            return false;
        }
    }

    private function parseUtm( string $qs ): array {
        if ( $qs === '' ) return [];
        parse_str( $qs, $out );
        return [
            'utm_source'   => isset( $out['utm_source'] )   ? (string) $out['utm_source']   : null,
            'utm_medium'   => isset( $out['utm_medium'] )   ? (string) $out['utm_medium']   : null,
            'utm_campaign' => isset( $out['utm_campaign'] ) ? (string) $out['utm_campaign'] : null,
        ];
    }

    private function referrerHost( string $referrer ): ?string {
        if ( $referrer === '' ) return null;
        $host = parse_url( $referrer, PHP_URL_HOST );
        return $host ?: null;
    }

    private function anonymize( string $ip ): string {
        if ( filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
            $parts = explode( '.', $ip );
            $parts[3] = '0';
            return implode( '.', $parts );
        }
        if ( filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 ) ) {
            $bin = inet_pton( $ip );
            if ( $bin === false ) return $ip;
            // Zero last 80 bits (last 10 bytes of 16)
            $bin = substr( $bin, 0, 6 ) . str_repeat( "\0", 10 );
            return inet_ntop( $bin ) ?: $ip;
        }
        return $ip;
    }
}
```

- [ ] **Step 4: Run test to verify it passes**

Run: `./vendor/bin/phpunit --filter ClickCollectorTest`
Expected: PASS for all four cases.

- [ ] **Step 5: Commit**

```bash
git add includes/Click/ClickCollector.php tests/tests/click/ClickCollectorTest.php
git commit -m "feat(click): collector that builds payloads from server + merges beacon"
```

---

## Phase 4 — Wiring: yourls-go.php, beacon endpoint, log_redirect shim

### Task 4.1: Replace `yourls_log_redirect` body with collector delegation

**Files:**
- Modify: `includes/functions.php:516-546`

- [ ] **Step 1: Replace function body**

Replace the current `yourls_log_redirect` (lines 516–546) with:
```php
function yourls_log_redirect( $keyword ) {
    $pre = yourls_apply_filter( 'shunt_log_redirect', yourls_shunt_default(), $keyword );
    if ( yourls_shunt_default() !== $pre ) {
        return $pre;
    }
    if ( !yourls_do_log_redirect() ) {
        return true;
    }

    $ip       = yourls_get_IP();
    $ua       = yourls_get_user_agent();
    $referrer = yourls_get_referrer();
    $accept   = $_SERVER['HTTP_ACCEPT'] ?? '';
    $qs       = $_SERVER['QUERY_STRING'] ?? '';
    $detector = new \YOURLS\Click\BotDetector( $ua, $accept );

    $pepper = defined( 'YOURLS_CLICK_VISITOR_SALT' ) ? YOURLS_CLICK_VISITOR_SALT : ( defined( 'YOURLS_COOKIEKEY' ) ? YOURLS_COOKIEKEY : 'yourls' );
    $anon   = defined( 'YOURLS_CLICK_ANONYMIZE_IP' ) && YOURLS_CLICK_ANONYMIZE_IP === true;

    $collector = new \YOURLS\Click\ClickCollector(
        new \YOURLS\Click\UserAgentParser(),
        new \YOURLS\Click\GeoLookup(),
        \YOURLS\Click\VisitorHasher::today( $pepper ),
        anonymizeIp: $anon
    );

    $isBot = (bool) yourls_apply_filter( 'click_is_bot', $detector->isBot(), $ua, $accept );
    $payload = $collector->collectFromServer(
        keyword: yourls_sanitize_keyword( $keyword ),
        ip: $ip,
        ua: $ua,
        referrer: $referrer,
        queryString: $qs,
        isBot: $isBot,
        botName: $detector->botName(),
        clickUid: bin2hex( random_bytes( 8 ) )
    );
    $payload = yourls_apply_filter( 'click_payload', $payload );

    return $collector->persist( $payload ) ? 1 : 0;
}
```

- [ ] **Step 2: Sanity-check syntax**

Run: `php -l includes/functions.php`
Expected: `No syntax errors detected`

- [ ] **Step 3: Run existing stats test (smoke)**

Run: `./vendor/bin/phpunit --filter StatsTest`
Expected: PASS — legacy schema still satisfied (we only added columns).

- [ ] **Step 4: Commit**

```bash
git add includes/functions.php
git commit -m "feat(click): delegate yourls_log_redirect to ClickCollector"
```

---

### Task 4.2: Bot path in `yourls-go.php`

**Files:**
- Modify: `yourls-go.php`

- [ ] **Step 1: Replace file content**

Replace the entire `yourls-go.php` with:
```php
<?php
define( 'YOURLS_GO', true );
require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );

if ( !isset( $keyword ) ) {
    yourls_do_action( 'redirect_no_keyword' );
    yourls_redirect( YOURLS_SITE, 301 );
}

$keyword = yourls_sanitize_keyword( $keyword );

if ( yourls_is_page( $keyword ) ) {
    yourls_page( $keyword );
    return;
}

$url = yourls_get_keyword_longurl( $keyword );
if ( !$url ) {
    yourls_do_action( 'redirect_keyword_not_found', $keyword );
    yourls_redirect( YOURLS_SITE, 302 );
    exit();
}

$ua       = yourls_get_user_agent();
$accept   = $_SERVER['HTTP_ACCEPT'] ?? '';
$detector = new \YOURLS\Click\BotDetector( $ua, $accept );
$isBot    = (bool) yourls_apply_filter( 'click_is_bot', $detector->isBot(), $ua, $accept );
$useInter = defined( 'YOURLS_CLICK_INTERSTITIAL' ) ? (bool) YOURLS_CLICK_INTERSTITIAL : true;

if ( $isBot || !$useInter ) {
    // Bot or interstitial disabled: classic 301 + post-redirect server log.
    yourls_do_action( 'redirect_shorturl', $url, $keyword );
    yourls_update_clicks( $keyword );
    yourls_robots_tag_header();
    if ( !headers_sent() ) {
        header( 'Location: ' . $url, true, 301 );
    }
    \YOURLS\Click\Connection::closeAndContinue();
    yourls_log_redirect( $keyword );
    return;
}

// Human path: render interstitial, beacon will log.
$click_uid = bin2hex( random_bytes( 8 ) );
yourls_do_action( 'redirect_shorturl', $url, $keyword );
yourls_update_clicks( $keyword );
yourls_robots_tag_header();

require dirname( __FILE__ ) . '/ui/templates/click-interstitial.php';
return;
```

- [ ] **Step 2: Sanity-check syntax**

Run: `php -l yourls-go.php`
Expected: `No syntax errors detected`

- [ ] **Step 3: Commit**

```bash
git add yourls-go.php
git commit -m "feat(click): branch yourls-go.php between bot 301 and human interstitial"
```

---

### Task 4.3: Interstitial template

**Files:**
- Create: `ui/templates/click-interstitial.php`

- [ ] **Step 1: Implement**

```php
<?php
/**
 * Variables expected in scope: $url (string), $keyword (string), $click_uid (string).
 * Output is intentionally minimal: <1KB before gzip.
 */
$safeUrl = htmlspecialchars( $url, ENT_QUOTES | ENT_HTML5, 'UTF-8' );
$safeKw  = htmlspecialchars( $keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8' );
$safeUid = preg_match( '/^[a-f0-9]{16}$/', $click_uid ) ? $click_uid : str_repeat( '0', 16 );
$collectUrl = htmlspecialchars( yourls_site_url( false ) . '/yourls-collect.php', ENT_QUOTES, 'UTF-8' );
$html = '<!doctype html><meta charset="utf-8">'
    . '<meta http-equiv="refresh" content="0;url=' . $safeUrl . '">'
    . '<title>Redirecting…</title>'
    . '<script>'
    . '(function(u,k,c,e){'
    . 'try{var p={v:1,click_uid:c,keyword:k,'
    . 'screen:{w:screen.width,h:screen.height,dpr:devicePixelRatio||1},'
    . 'viewport:{w:innerWidth,h:innerHeight},'
    . 'tz:Intl.DateTimeFormat().resolvedOptions().timeZone||"",'
    . 'lang:navigator.language||"",'
    . 'connection:(navigator.connection&&navigator.connection.effectiveType)||"",'
    . 'client_referrer:document.referrer||"",'
    . 'nav_start:Date.now()};'
    . 'navigator.sendBeacon(e,JSON.stringify(p));'
    . '}catch(_){}'
    . 'location.replace(u);'
    . '})('
    . json_encode( $url ) . ','
    . json_encode( $keyword ) . ','
    . json_encode( $safeUid ) . ','
    . json_encode( yourls_site_url( false ) . '/yourls-collect.php' )
    . ');'
    . '</script>'
    . '<noscript><a href="' . $safeUrl . '">Continue</a></noscript>';
echo yourls_apply_filter( 'click_interstitial_html', $html, $url, $keyword, $click_uid );
```

- [ ] **Step 2: Sanity-check syntax**

Run: `php -l ui/templates/click-interstitial.php`
Expected: `No syntax errors detected`

- [ ] **Step 3: Commit**

```bash
git add ui/templates/click-interstitial.php
git commit -m "feat(click): minimal interstitial template with beacon + meta-refresh fallback"
```

---

### Task 4.4: Beacon endpoint `yourls-collect.php`

**Files:**
- Create: `yourls-collect.php`
- Test: `tests/tests/click/BeaconEndpointTest.php`

- [ ] **Step 1: Write the failing test**

```php
<?php
namespace YOURLS\Tests\Click;

use YOURLS\Tests\TestCase;

/**
 * @group click
 * @group click-beacon
 */
class BeaconEndpointTest extends TestCase {

    public function test_valid_beacon_persists_a_row() {
        // Seed a known short URL
        yourls_add_new_link( 'https://example.com', 'beacontest', 'beacon test' );

        $payload = json_encode( [
            'v' => 1,
            'click_uid' => 'aaaaaaaaaaaaaaaa',
            'keyword' => 'beacontest',
            'screen' => [ 'w' => 1920, 'h' => 1080, 'dpr' => 2 ],
            'viewport' => [ 'w' => 1280, 'h' => 720 ],
            'tz' => 'Europe/Rome',
            'lang' => 'it-IT',
            'connection' => '4g',
        ] );

        $status = $this->invokeBeacon( $payload, '203.0.113.10', 'Mozilla/5.0 Chrome/120 Safari/537.36' );
        $this->assertSame( 204, $status );

        $row = yourls_get_db()->fetchObject(
            'SELECT * FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE click_uid = :uid',
            [ 'uid' => 'aaaaaaaaaaaaaaaa' ]
        );
        $this->assertNotNull( $row );
        $this->assertSame( 'beacontest', $row->shorturl );
        $meta = json_decode( $row->meta, true );
        $this->assertSame( 1920, $meta['screen_w'] );
        $this->assertSame( 'Europe/Rome', $meta['tz'] );
    }

    public function test_invalid_click_uid_is_rejected_silently() {
        $status = $this->invokeBeacon( '{"v":1,"click_uid":"BAD","keyword":"beacontest"}', '203.0.113.11', 'Chrome' );
        $this->assertSame( 204, $status );
        $count = yourls_get_db()->fetchValue(
            'SELECT COUNT(*) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE click_uid = :uid',
            [ 'uid' => 'BAD' ]
        );
        $this->assertSame( 0, (int) $count );
    }

    public function test_unknown_keyword_is_rejected_silently() {
        $status = $this->invokeBeacon(
            '{"v":1,"click_uid":"bbbbbbbbbbbbbbbb","keyword":"nope"}',
            '203.0.113.12', 'Chrome'
        );
        $this->assertSame( 204, $status );
        $count = yourls_get_db()->fetchValue(
            'SELECT COUNT(*) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE click_uid = :uid',
            [ 'uid' => 'bbbbbbbbbbbbbbbb' ]
        );
        $this->assertSame( 0, (int) $count );
    }

    /**
     * Helper: include yourls-collect.php in a child process-like simulation by
     * setting $_SERVER and php://input. We use a custom function the endpoint
     * exposes for testability.
     */
    private function invokeBeacon( string $body, string $ip, string $ua ): int {
        $_SERVER['REMOTE_ADDR']     = $ip;
        $_SERVER['HTTP_USER_AGENT'] = $ua;
        $_SERVER['REQUEST_METHOD']  = 'POST';
        require_once dirname( __DIR__, 3 ) . '/yourls-collect.php';
        return \YOURLS\Click\Beacon::handle( $body );
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `./vendor/bin/phpunit --filter BeaconEndpointTest`
Expected: FAIL — `yourls-collect.php` and `YOURLS\Click\Beacon` don't exist.

- [ ] **Step 3: Implement `yourls-collect.php` and the `Beacon` handler**

Create `includes/Click/Beacon.php`:
```php
<?php
namespace YOURLS\Click;

class Beacon {
    public static function handle( ?string $rawBody = null ): int {
        if ( ( $_SERVER['REQUEST_METHOD'] ?? 'GET' ) !== 'POST' ) {
            return self::reply( 204 );
        }

        $body = $rawBody ?? (string) file_get_contents( 'php://input' );
        if ( strlen( $body ) > 2048 ) {
            return self::reply( 204 );
        }

        $data = json_decode( $body, true );
        if ( !is_array( $data ) ) {
            return self::reply( 204 );
        }

        $clickUid = is_string( $data['click_uid'] ?? null ) ? $data['click_uid'] : '';
        $keyword  = is_string( $data['keyword']   ?? null ) ? $data['keyword']   : '';
        if ( !preg_match( '/^[a-f0-9]{16}$/', $clickUid ) ) {
            return self::reply( 204 );
        }
        $keyword = yourls_sanitize_keyword( $keyword );
        if ( $keyword === '' || !yourls_keyword_is_taken( $keyword ) ) {
            return self::reply( 204 );
        }

        $ip       = yourls_get_IP();
        $ua       = yourls_get_user_agent();
        $accept   = $_SERVER['HTTP_ACCEPT'] ?? '';
        $referrer = is_string( $data['client_referrer'] ?? null ) ? $data['client_referrer'] : yourls_get_referrer();
        $qs       = is_string( $data['query_string']    ?? null ) ? $data['query_string']    : ( $_SERVER['QUERY_STRING'] ?? '' );

        $rate = new RateLimiter(
            (int) ( defined( 'YOURLS_CLICK_BEACON_RATELIMIT' ) ? YOURLS_CLICK_BEACON_RATELIMIT : 60 ),
            60,
            RateLimiter::defaultBackend()
        );
        if ( !$rate->allow( $ip ) ) {
            return self::reply( 204 );
        }

        yourls_do_action( 'click_beacon_received', $data );

        $pepper = defined( 'YOURLS_CLICK_VISITOR_SALT' ) ? YOURLS_CLICK_VISITOR_SALT : ( defined( 'YOURLS_COOKIEKEY' ) ? YOURLS_COOKIEKEY : 'yourls' );
        $anon   = defined( 'YOURLS_CLICK_ANONYMIZE_IP' ) && YOURLS_CLICK_ANONYMIZE_IP === true;

        $collector = new ClickCollector(
            new UserAgentParser(),
            new GeoLookup(),
            VisitorHasher::today( $pepper ),
            anonymizeIp: $anon
        );

        $detector = new BotDetector( $ua, $accept );
        $payload  = $collector->collectFromServer(
            keyword: $keyword, ip: $ip, ua: $ua, referrer: $referrer, queryString: $qs,
            isBot: $detector->isBot(), botName: $detector->botName(), clickUid: $clickUid
        );
        $payload = $collector->mergeBeacon( $payload, $data );
        $payload = yourls_apply_filter( 'click_payload', $payload );

        $collector->persist( $payload );

        return self::reply( 204 );
    }

    private static function reply( int $status ): int {
        if ( !headers_sent() ) {
            http_response_code( $status );
            header( 'Content-Length: 0' );
        }
        Connection::closeAndContinue();
        return $status;
    }
}
```

Create `yourls-collect.php`:
```php
<?php
define( 'YOURLS_GO', true );
require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );

if ( PHP_SAPI !== 'cli' && ( $_SERVER['REQUEST_METHOD'] ?? 'GET' ) !== 'POST' ) {
    http_response_code( 204 );
    exit;
}

// Live request
if ( !defined( 'YOURLS_CLICK_BEACON_TEST' ) && PHP_SAPI !== 'cli' ) {
    \YOURLS\Click\Beacon::handle();
}
```

- [ ] **Step 4: Run test to verify it passes**

Run: `./vendor/bin/phpunit --filter BeaconEndpointTest`
Expected: PASS for all three cases.

- [ ] **Step 5: Commit**

```bash
git add yourls-collect.php includes/Click/Beacon.php tests/tests/click/BeaconEndpointTest.php
git commit -m "feat(click): beacon endpoint with validation and rate limit"
```

---

### Task 4.5: Hooks documentation block

**Files:**
- Create: `docs/click-tracking.md`

- [ ] **Step 1: Write the doc**

```markdown
# Click Tracking (DB version 510)

YOURLS records each click into `YOURLS_DB_TABLE_LOG`. Starting at DB version
510 the table carries hot columns plus a JSON `meta` blob with parsed user
agent, extended geo, UTM, visitor hash, and (for human visitors) client-side
metrics gathered via a non-blocking beacon.

## Configuration (optional `define` in `user/config.php`)

| Constant | Default | Purpose |
|----------|---------|---------|
| `YOURLS_CLICK_INTERSTITIAL`  | `true`  | Render an inline interstitial for human visitors. Set to `false` for legacy 301-only behavior. |
| `YOURLS_CLICK_ANONYMIZE_IP`  | `false` | Zero last IPv4 octet / last 80 IPv6 bits before insert. |
| `YOURLS_CLICK_BEACON_RATELIMIT` | `60` | Beacon requests per minute per IP. |
| `YOURLS_CLICK_PLACEHOLDER`   | `false` | Reserved for future use. |
| `YOURLS_CLICK_VISITOR_SALT`  | derived from `YOURLS_COOKIEKEY` | Salt used inside `visitor_hash`. |

## New hooks

- Filter `click_payload($payload)` — modify the `\YOURLS\Click\ClickPayload` before insert.
- Filter `click_is_bot($isBot, $userAgent, $accept)` — override bot detection.
- Action `click_beacon_received($data)` — fired after beacon validation.
- Filter `click_interstitial_html($html, $url, $keyword, $clickUid)` — replace the interstitial body.

## Privacy

- `visitor_hash` is `substr(sha256(ip + ua + daily_salt + COOKIEKEY), 0, 16)`. The daily salt rotates every UTC day so cross-day correlation is impossible without server access.
- No persistent client cookie is set.
- The interstitial uses `navigator.sendBeacon` and a `<meta refresh>` fallback for users with JS disabled.
```

- [ ] **Step 2: Commit**

```bash
git add docs/click-tracking.md
git commit -m "docs(click): document config, hooks, and privacy"
```

---

## Phase 5 — UI: aggregation helpers + tabs (Filament-style)

### Task 5.1: Aggregation helpers in `functions-infos.php`

**Files:**
- Modify: `includes/functions-infos.php` (append new functions)
- Test: `tests/tests/click/InfosAggregatesTest.php`

- [ ] **Step 1: Write the failing test**

```php
<?php
namespace YOURLS\Tests\Click;

use YOURLS\Tests\TestCase;

/** @group click */
class InfosAggregatesTest extends TestCase {

    protected function setUp(): void {
        parent::setUp();
        $ydb = yourls_get_db();
        $ydb->perform( 'DELETE FROM `' . YOURLS_DB_TABLE_LOG . '`' );
        yourls_add_new_link( 'https://example.com', 'aggkw', 'agg test' );
        $rows = [
            [ 'desktop','chrome','macos','t.co','newsletter','203.0.113.1','IT','Milan' ],
            [ 'desktop','chrome','macos','t.co','newsletter','203.0.113.2','IT','Rome'  ],
            [ 'mobile', 'safari','ios',  null,  null,        '203.0.113.3','FR','Paris' ],
            [ 'bot',    'unknown','unknown', null, null,     '203.0.113.4','US',null    ],
        ];
        foreach ( $rows as $r ) {
            $ydb->fetchAffected(
                'INSERT INTO `' . YOURLS_DB_TABLE_LOG . '`(click_time,shorturl,referrer,user_agent,ip_address,country_code,device_type,browser,os,referrer_host,utm_source,city) VALUES (NOW(),:k,"","UA",:ip,:cc,:d,:b,:o,:rh,:us,:city)',
                [ 'k'=>'aggkw','ip'=>$r[5],'cc'=>$r[6],'d'=>$r[0],'b'=>$r[1],'o'=>$r[2],'rh'=>$r[3],'us'=>$r[4],'city'=>$r[7] ]
            );
        }
    }

    public function test_clicks_by_dimension_groups_and_orders() {
        $rows = yourls_get_clicks_by_dimension( 'aggkw', 'device_type', 'all', 10 );
        $this->assertSame( [ 'desktop' => 2, 'mobile' => 1, 'bot' => 1 ], $rows );
    }

    public function test_unique_visitors_counts_distinct_hash_or_ip_fallback() {
        // visitor_hash is null in fixtures, function should fall back to ip_address.
        $n = yourls_get_unique_visitors( 'aggkw', 'all' );
        $this->assertSame( 4, $n );
    }

    public function test_recent_clicks_paginates() {
        $page1 = yourls_get_recent_clicks( 'aggkw', 1, 2 );
        $this->assertCount( 2, $page1 );
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `./vendor/bin/phpunit --filter InfosAggregatesTest`
Expected: FAIL — functions don't exist.

- [ ] **Step 3: Append helpers to `includes/functions-infos.php`**

Append at end of file:
```php
/**
 * Group clicks by a hot column.
 *
 * @param string $keyword
 * @param string $column   Whitelisted column name
 * @param string $range    'all'|'24h'|'7d'|'30d'
 * @param int    $limit
 * @return array<string,int>  ordered desc
 */
function yourls_get_clicks_by_dimension( string $keyword, string $column, string $range = 'all', int $limit = 20 ): array {
    static $allowed = [ 'device_type','browser','os','referrer_host','utm_source','utm_medium','utm_campaign','city','region','country_code' ];
    if ( !in_array( $column, $allowed, true ) ) return [];

    $cacheKey = sprintf( 'yourls_click_agg:%s:%s:%s:%d', $keyword, $column, $range, $limit );
    $cached   = yourls_click_cache_get( $cacheKey );
    if ( $cached !== null ) return $cached;

    $where = 'shorturl = :k' . yourls_clicks_range_where( $range );
    $sql = 'SELECT `' . $column . '` AS k, COUNT(*) AS c FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE ' . $where .
        ' GROUP BY `' . $column . '` ORDER BY c DESC LIMIT :lim';
    $sql = yourls_apply_filter( 'clicks_aggregate_query', $sql, $keyword, $column, $range, $limit );

    $rows = yourls_get_db()->fetchAll( $sql, [ 'k' => $keyword, 'lim' => $limit ] );
    $out = [];
    foreach ( $rows as $r ) {
        $key = $r['k'] !== null && $r['k'] !== '' ? (string) $r['k'] : '(unknown)';
        $out[ $key ] = (int) $r['c'];
    }
    yourls_click_cache_set( $cacheKey, $out );
    return $out;
}

function yourls_get_clicks_meta_aggregate( string $keyword, string $jsonPath, string $range = 'all', int $limit = 20 ): array {
    static $allowedPaths = [ '$.tz','$.lang','$.connection_type','$.viewport_w','$.is_bot' ];
    if ( !in_array( $jsonPath, $allowedPaths, true ) ) return [];

    $where = 'shorturl = :k' . yourls_clicks_range_where( $range );
    $sql = "SELECT JSON_UNQUOTE(JSON_EXTRACT(meta, :path)) AS k, COUNT(*) AS c FROM `" . YOURLS_DB_TABLE_LOG . "` WHERE $where GROUP BY k ORDER BY c DESC LIMIT :lim";

    $rows = yourls_get_db()->fetchAll( $sql, [ 'k' => $keyword, 'path' => $jsonPath, 'lim' => $limit ] );
    $out = [];
    foreach ( $rows as $r ) {
        $key = $r['k'] !== null && $r['k'] !== '' ? (string) $r['k'] : '(unknown)';
        $out[ $key ] = (int) $r['c'];
    }
    return $out;
}

function yourls_get_unique_visitors( string $keyword, string $range = 'all' ): int {
    $where = 'shorturl = :k' . yourls_clicks_range_where( $range );
    $sql = 'SELECT COUNT(DISTINCT COALESCE(visitor_hash, ip_address)) AS n FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE ' . $where;
    return (int) yourls_get_db()->fetchValue( $sql, [ 'k' => $keyword ] );
}

function yourls_get_recent_clicks( string $keyword, int $page = 1, int $perPage = 50 ): array {
    $page = max( 1, $page );
    $perPage = max( 1, min( 200, $perPage ) );
    $sql = 'SELECT * FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k ORDER BY click_id DESC LIMIT :off, :lim';
    return yourls_get_db()->fetchAll( $sql, [ 'k' => $keyword, 'off' => ( $page - 1 ) * $perPage, 'lim' => $perPage ] );
}

function yourls_clicks_range_where( string $range ): string {
    return match ( $range ) {
        '24h' => " AND click_time >= NOW() - INTERVAL 1 DAY",
        '7d'  => " AND click_time >= NOW() - INTERVAL 7 DAY",
        '30d' => " AND click_time >= NOW() - INTERVAL 30 DAY",
        default => '',
    };
}

function yourls_click_cache_get( string $key ) {
    if ( function_exists( 'apcu_fetch' ) ) {
        $ok = false; $v = apcu_fetch( $key, $ok );
        return $ok ? $v : null;
    }
    return null;
}
function yourls_click_cache_set( string $key, $value, int $ttl = 300 ): void {
    if ( function_exists( 'apcu_store' ) ) {
        apcu_store( $key, $value, $ttl );
    }
}
```

- [ ] **Step 4: Run test to verify it passes**

Run: `./vendor/bin/phpunit --filter InfosAggregatesTest`
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add includes/functions-infos.php tests/tests/click/InfosAggregatesTest.php
git commit -m "feat(infos): aggregation helpers for click stats with cache"
```

---

### Task 5.2: Restructure `infos.blade.php` into tab dispatcher

**Files:**
- Modify: `ui/views/public/infos.blade.php` (replace tab area only — keep existing CSS/scaffolding)

- [ ] **Step 1: Read the current file to identify the tabs region**

Run: `grep -n 'tabs\|stat_tab' ui/views/public/infos.blade.php | head -20`

- [ ] **Step 2: Replace the legacy tab content region with a `<x-molecules.tabs>` dispatcher**

Replace the legacy `<div id="stat_tab_*">…</div>` blocks (and the corresponding tab links list) with:
```blade
<x-molecules.tabs :tabs="[
    ['id' => 'overview',   'label' => yourls__('Overview')],
    ['id' => 'audience',   'label' => yourls__('Audience')],
    ['id' => 'geography',  'label' => yourls__('Geography')],
    ['id' => 'sources',    'label' => yourls__('Sources')],
    ['id' => 'technology', 'label' => yourls__('Technology')],
    ['id' => 'activity',   'label' => yourls__('Activity')],
]" :default="'overview'">

    <x-slot name="overview">  @include('public.infos.tab-overview',   ['keyword' => $keyword]) </x-slot>
    <x-slot name="audience">  @include('public.infos.tab-audience',   ['keyword' => $keyword]) </x-slot>
    <x-slot name="geography"> @include('public.infos.tab-geography',  ['keyword' => $keyword]) </x-slot>
    <x-slot name="sources">   @include('public.infos.tab-sources',    ['keyword' => $keyword]) </x-slot>
    <x-slot name="technology">@include('public.infos.tab-technology', ['keyword' => $keyword]) </x-slot>
    <x-slot name="activity">  @include('public.infos.tab-activity',   ['keyword' => $keyword]) </x-slot>

</x-molecules.tabs>
```

(Keep the page header, share box, historical click count card, and CSS block above this region exactly as they are.)

- [ ] **Step 3: Sanity-check Blade compilation**

Run: `php -r 'require "includes/load-yourls.php"; echo (new \Jenssegers\Blade\Blade( YOURLS_ABSPATH . "/ui/views", sys_get_temp_dir() ))->compile( "public.infos" ) ? "ok" : "fail";'`
Expected: `ok` (or no exception). If the Blade facade differs in YOURLS, run the smoke test added in Task 5.9 instead.

- [ ] **Step 4: Commit**

```bash
git add ui/views/public/infos.blade.php
git commit -m "feat(ui): restructure infos page into 6-tab dispatcher"
```

---

### Task 5.3: Tab — Overview

**Files:**
- Create: `ui/views/public/infos/tab-overview.blade.php`

- [ ] **Step 1: Implement**

```blade
@php
    $total    = (int) yourls_get_keyword_clicks( $keyword );
    $unique   = yourls_get_unique_visitors( $keyword, 'all' );
    $devices  = yourls_get_clicks_by_dimension( $keyword, 'device_type', 'all', 1 );
    $countries= yourls_get_clicks_by_dimension( $keyword, 'country_code', 'all', 1 );
    $topDevice  = $devices  ? array_key_first( $devices )  : '—';
    $topCountry = $countries ? array_key_first( $countries ) : '—';
@endphp

<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:var(--space-4);margin-bottom:var(--space-5)">
    <x-organisms.stat :label="yourls__('Total clicks')"     :value="$total" />
    <x-organisms.stat :label="yourls__('Unique visitors')"  :value="$unique" />
    <x-organisms.stat :label="yourls__('Top device')"       :value="$topDevice" />
    <x-organisms.stat :label="yourls__('Top country')"      :value="$topCountry" />
</div>

@if ( $total === 0 )
    <x-organisms.empty-state :title="yourls__('No clicks yet')" :description="yourls__('Stats appear here as soon as the short URL is visited.')" />
@endif
```

- [ ] **Step 2: Commit**

```bash
git add ui/views/public/infos/tab-overview.blade.php
git commit -m "feat(ui): infos tab — overview"
```

---

### Task 5.4: Tab — Audience

**Files:**
- Create: `ui/views/public/infos/tab-audience.blade.php`

- [ ] **Step 1: Implement**

```blade
@php
    $devices  = yourls_get_clicks_by_dimension( $keyword, 'device_type', 'all', 8 );
    $browsers = yourls_get_clicks_by_dimension( $keyword, 'browser',     'all', 8 );
    $oses     = yourls_get_clicks_by_dimension( $keyword, 'os',          'all', 6 );
    $hasData  = $devices || $browsers || $oses;
@endphp

@if ( !$hasData )
    <x-organisms.empty-state :title="yourls__('No audience data')" :description="yourls__('Audience breakdown becomes available after the schema upgrade and once new clicks are recorded.')" />
@else
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:var(--space-4)">
        <x-organisms.card :title="yourls__('Devices')">
            <x-organisms.chart type="pie" :data="$devices" />
        </x-organisms.card>
        <x-organisms.card :title="yourls__('Browsers')">
            <x-organisms.chart type="pie" :data="$browsers" />
        </x-organisms.card>
        <x-organisms.card :title="yourls__('Operating systems')">
            <x-organisms.chart type="pie" :data="$oses" />
        </x-organisms.card>
    </div>
@endif
```

- [ ] **Step 2: Commit**

```bash
git add ui/views/public/infos/tab-audience.blade.php
git commit -m "feat(ui): infos tab — audience pies"
```

---

### Task 5.5: Tab — Geography

**Files:**
- Create: `ui/views/public/infos/tab-geography.blade.php`

- [ ] **Step 1: Implement**

```blade
@php
    $countries = yourls_get_clicks_by_dimension( $keyword, 'country_code', 'all', 50 );
    $cities    = yourls_get_clicks_by_dimension( $keyword, 'city',         'all', 20 );
@endphp

@if ( !$countries && !$cities )
    <x-organisms.empty-state :title="yourls__('No geography data')" :description="yourls__('Country and city breakdowns appear after new clicks are recorded.')" />
@else
    <x-organisms.card :title="yourls__('Countries')">
        <x-organisms.chart type="pie" :data="$countries" />
    </x-organisms.card>

    <x-organisms.card :title="yourls__('Top cities')" style="margin-top:var(--space-4)">
        <x-organisms.table
            :columns="[
                ['key' => 'city',    'label' => yourls__('City')],
                ['key' => 'clicks',  'label' => yourls__('Clicks')],
            ]"
            :rows="collect($cities)->map(fn($v,$k) => ['city' => $k, 'clicks' => $v])->values()->all()"
        />
    </x-organisms.card>
@endif
```

- [ ] **Step 2: Commit**

```bash
git add ui/views/public/infos/tab-geography.blade.php
git commit -m "feat(ui): infos tab — geography (countries pie + cities table)"
```

---

### Task 5.6: Tab — Sources

**Files:**
- Create: `ui/views/public/infos/tab-sources.blade.php`

- [ ] **Step 1: Implement**

```blade
@php
    $hosts     = yourls_get_clicks_by_dimension( $keyword, 'referrer_host', 'all', 10 );
    $sources   = yourls_get_clicks_by_dimension( $keyword, 'utm_source',    'all', 10 );
    $mediums   = yourls_get_clicks_by_dimension( $keyword, 'utm_medium',    'all', 10 );
    $campaigns = yourls_get_clicks_by_dimension( $keyword, 'utm_campaign',  'all', 10 );
    $any = $hosts || $sources || $mediums || $campaigns;
@endphp

@if ( !$any )
    <x-organisms.empty-state :title="yourls__('No source data')" :description="yourls__('Referrer and UTM breakdowns appear after new clicks are recorded.')" />
@else
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:var(--space-4)">
        <x-organisms.card :title="yourls__('Referrer hosts')">
            <x-organisms.chart type="pie" :data="$hosts" />
        </x-organisms.card>
        <x-organisms.card :title="yourls__('UTM sources')">
            <x-organisms.chart type="pie" :data="$sources" />
        </x-organisms.card>
        <x-organisms.card :title="yourls__('UTM mediums')">
            <x-organisms.chart type="pie" :data="$mediums" />
        </x-organisms.card>
        <x-organisms.card :title="yourls__('UTM campaigns')">
            <x-organisms.chart type="pie" :data="$campaigns" />
        </x-organisms.card>
    </div>
@endif
```

- [ ] **Step 2: Commit**

```bash
git add ui/views/public/infos/tab-sources.blade.php
git commit -m "feat(ui): infos tab — sources (referrer + UTM)"
```

---

### Task 5.7: Tab — Technology

**Files:**
- Create: `ui/views/public/infos/tab-technology.blade.php`

- [ ] **Step 1: Implement**

```blade
@php
    $tz   = yourls_get_clicks_meta_aggregate( $keyword, '$.tz',              'all', 10 );
    $lang = yourls_get_clicks_meta_aggregate( $keyword, '$.lang',            'all', 10 );
    $conn = yourls_get_clicks_meta_aggregate( $keyword, '$.connection_type', 'all', 10 );
    $any  = $tz || $lang || $conn;
@endphp

@if ( !$any )
    <x-organisms.empty-state :title="yourls__('No client telemetry yet')" :description="yourls__('Technology stats are populated by the JS beacon. Enable YOURLS_CLICK_INTERSTITIAL to start collecting them.')" />
@else
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:var(--space-4)">
        <x-organisms.card :title="yourls__('Timezones')">
            <x-organisms.chart type="pie" :data="$tz" />
        </x-organisms.card>
        <x-organisms.card :title="yourls__('Languages')">
            <x-organisms.chart type="pie" :data="$lang" />
        </x-organisms.card>
        <x-organisms.card :title="yourls__('Connection type')">
            <x-organisms.chart type="pie" :data="$conn" />
        </x-organisms.card>
    </div>
@endif
```

- [ ] **Step 2: Commit**

```bash
git add ui/views/public/infos/tab-technology.blade.php
git commit -m "feat(ui): infos tab — technology (beacon-only telemetry)"
```

---

### Task 5.8: Tab — Activity

**Files:**
- Create: `ui/views/public/infos/tab-activity.blade.php`

- [ ] **Step 1: Implement**

```blade
@php
    $page    = max( 1, (int) ( $_GET['page'] ?? 1 ) );
    $perPage = 50;
    $rows    = yourls_get_recent_clicks( $keyword, $page, $perPage );
@endphp

@if ( count( $rows ) === 0 )
    <x-organisms.empty-state :title="yourls__('No clicks yet')" :description="yourls__('The activity log fills as soon as visitors hit this short URL.')" />
@else
    <x-organisms.table
        :columns="[
            ['key' => 'click_time',    'label' => yourls__('Time')],
            ['key' => 'country_code',  'label' => yourls__('Country')],
            ['key' => 'city',          'label' => yourls__('City')],
            ['key' => 'device_type',   'label' => yourls__('Device')],
            ['key' => 'browser',       'label' => yourls__('Browser')],
            ['key' => 'os',            'label' => yourls__('OS')],
            ['key' => 'referrer_host', 'label' => yourls__('Referrer')],
            ['key' => 'utm_source',    'label' => yourls__('UTM source')],
        ]"
        :rows="array_map(fn($r) => (array) $r, $rows)"
    />
    <div style="margin-top:var(--space-3)">
        <x-molecules.pagination :page="$page" :hasNext="count($rows) === $perPage" />
    </div>
@endif
```

- [ ] **Step 2: Commit**

```bash
git add ui/views/public/infos/tab-activity.blade.php
git commit -m "feat(ui): infos tab — activity (paginated raw clicks)"
```

---

### Task 5.9: Smoke test for tab rendering (empty + populated)

**Files:**
- Create: `tests/tests/click/InfosTabsRenderTest.php`

- [ ] **Step 1: Write test**

```php
<?php
namespace YOURLS\Tests\Click;

use YOURLS\Tests\TestCase;

/** @group click */
class InfosTabsRenderTest extends TestCase {

    /** @dataProvider tabsProvider */
    public function test_tab_renders_with_empty_dataset( string $tab ) {
        yourls_add_new_link( 'https://example.com', 'rendkw', 'render test' );
        yourls_get_db()->perform( 'DELETE FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "rendkw"' );

        $html = $this->renderTab( $tab, 'rendkw' );
        $this->assertIsString( $html );
        $this->assertStringNotContainsString( 'Exception', $html );
    }

    /** @dataProvider tabsProvider */
    public function test_tab_renders_with_populated_dataset( string $tab ) {
        yourls_add_new_link( 'https://example.com', 'rendkw', 'render test' );
        $ydb = yourls_get_db();
        $ydb->perform( 'DELETE FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "rendkw"' );
        $ydb->fetchAffected(
            'INSERT INTO `' . YOURLS_DB_TABLE_LOG . '`(click_time,shorturl,referrer,user_agent,ip_address,country_code,device_type,browser,os,referrer_host,utm_source,city,meta) VALUES (NOW(),"rendkw","","UA","1.2.3.4","IT","desktop","chrome","macos","t.co","newsletter","Milan",:m)',
                [ 'm' => json_encode( [ 'tz' => 'Europe/Rome', 'lang' => 'it-IT', 'connection_type' => '4g' ] ) ]
        );

        $html = $this->renderTab( $tab, 'rendkw' );
        $this->assertIsString( $html );
        $this->assertStringNotContainsString( 'Exception', $html );
    }

    public static function tabsProvider(): array {
        return [
            [ 'overview' ], [ 'audience' ], [ 'geography' ], [ 'sources' ], [ 'technology' ], [ 'activity' ],
        ];
    }

    private function renderTab( string $tab, string $keyword ): string {
        return \YOURLS\UI\Facade::view( "public.infos.tab-$tab", compact( 'keyword' ) );
    }
}
```

- [ ] **Step 2: Run test**

Run: `./vendor/bin/phpunit --filter InfosTabsRenderTest`
Expected: PASS for all 12 cases (6 tabs × 2 fixtures). If `\YOURLS\UI\Facade::view` is named differently in this codebase, replace with the actual rendering call (`yourls_render_view` or similar) — `grep -rn 'class Facade' ui/` to find the right one before failing.

- [ ] **Step 3: Commit**

```bash
git add tests/tests/click/InfosTabsRenderTest.php
git commit -m "test(ui): smoke test all 6 infos tabs render with empty and rich fixtures"
```

---

## Phase 6 — Integration tests for `yourls-go.php`

### Task 6.1: Bot path test

**Files:**
- Create: `tests/tests/click/GoRedirectBotTest.php`

- [ ] **Step 1: Write test**

```php
<?php
namespace YOURLS\Tests\Click;

use YOURLS\Tests\TestCase;

/** @group click */
class GoRedirectBotTest extends TestCase {

    public function test_bot_request_emits_301_and_logs_with_is_bot_true() {
        yourls_add_new_link( 'https://example.com', 'gobot', 'bot test' );
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';
        $_SERVER['HTTP_ACCEPT']     = 'text/html';

        // Simulate the bot branch directly via yourls_log_redirect (yourls-go.php
        // requires SAPI side effects we can't easily exercise in PHPUnit).
        yourls_log_redirect( 'gobot' );

        $row = yourls_get_db()->fetchObject(
            'SELECT * FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "gobot" ORDER BY click_id DESC LIMIT 1'
        );
        $this->assertNotNull( $row );
        $meta = json_decode( $row->meta, true );
        $this->assertTrue( $meta['is_bot'] );
        $this->assertSame( 'googlebot', $meta['bot_name'] );
        $this->assertSame( 'bot', $row->device_type );
    }
}
```

- [ ] **Step 2: Run test**

Run: `./vendor/bin/phpunit --filter GoRedirectBotTest`
Expected: PASS.

- [ ] **Step 3: Commit**

```bash
git add tests/tests/click/GoRedirectBotTest.php
git commit -m "test(click): bot UA logs is_bot=true with parsed bot name"
```

---

### Task 6.2: Backward-compat test — existing StatsTest still green

**Files:** none new

- [ ] **Step 1: Run the full existing stats suite**

Run: `./vendor/bin/phpunit tests/tests/stats/StatsTest.php`
Expected: PASS — legacy schema columns are untouched, new ones are nullable.

- [ ] **Step 2: Run the full install suite**

Run: `./vendor/bin/phpunit tests/tests/install`
Expected: PASS.

- [ ] **Step 3: No commit (verification only)**

---

## Phase 7 — Final pass & ship

### Task 7.1: Run full test suite

- [ ] **Step 1: Run everything**

Run: `./vendor/bin/phpunit 2>&1 | tail -40`
Expected: green; if any pre-existing failure was captured at Task 0 baseline, the deltas should be only NEW passing tests under `tests/tests/click/`.

### Task 7.2: Update CHANGELOG.md

**Files:**
- Modify: `CHANGELOG.md`

- [ ] **Step 1: Prepend a new entry under the unreleased section**

```markdown
### Unreleased

- feat(click): extended click tracking with async logging
  - DB version 510: log table gets device/browser/os/referrer_host/utm/city/region/visitor_hash/click_uid/meta JSON
  - Bots: 301 first, log after `fastcgi_finish_request` (faster than current behavior)
  - Humans: tiny interstitial + `navigator.sendBeacon` + `location.replace` in parallel
  - Beacon endpoint `yourls-collect.php` with per-IP rate limit
  - Privacy: rotating daily `visitor_hash`, optional IP anonymization
  - New infos tabs: Overview / Audience / Geography / Sources / Technology / Activity (Filament-style design system, no new components)
  - New hooks: `click_payload`, `click_is_bot`, `click_beacon_received`, `click_interstitial_html`
```

- [ ] **Step 2: Commit**

```bash
git add CHANGELOG.md
git commit -m "docs(changelog): announce extended async click tracking"
```

### Task 7.3: Push and open PR

- [ ] **Step 1: Push branch**

Run: `git push -u origin feature/click-tracking-async`

- [ ] **Step 2: Open PR**

Use `commit-commands:commit-push-pr` skill, or manually:
```bash
gh pr create --base master --head feature/click-tracking-async \
  --title "feat(click): async extended click tracking with new infos tabs" \
  --body "$(cat <<'EOF'
## Summary
- New click logging pipeline: bots get 301 then async server log; humans get a tiny interstitial that fires `navigator.sendBeacon` in parallel to `location.replace`.
- Schema bump 509 → 510 with hot columns + JSON `meta`. Both fresh installs and upgrades covered.
- 6-tab infos page using existing Filament-style components.

## Test plan
- [ ] Fresh install creates the new schema
- [ ] Upgrade from 509 runs idempotently
- [ ] Bot UA → 301 + `is_bot=1` row
- [ ] Browser UA → interstitial + beacon row with screen/tz/lang
- [ ] All 6 tabs render empty + populated
- [ ] Existing `StatsTest` still passes

🤖 Generated with [Claude Code](https://claude.com/claude-code)
EOF
)"
```

---

## Self-Review Notes

- **Spec coverage:** ✓ Schema in install + upgrade + version (Tasks 1.1–1.4); bot/human flow (4.1–4.4); privacy hashing/anonymization (2.3, 3.2 test, 4.5 docs); hooks (4.5 + inline); UI tabs Overview/Audience/Geography/Sources/Technology/Activity (5.3–5.8); aggregation helpers + cache (5.1); design system reuse, no new components (5.2–5.8 use only existing `<x-…>`); rollout via `YOURLS_CLICK_INTERSTITIAL` default (4.2 + 4.5 docs); testing matrix mapped (Phase 2–6).
- **Placeholders:** none — every code step contains the actual code; expected outputs documented.
- **Type/name consistency:** `ClickPayload` field names match between Tasks 2.4, 3.2, 4.1; `Connection::closeAndContinue` referenced from 4.2 / 4.4 matches definition in 2.6; `RateLimiter::defaultBackend()` signature consistent between 2.5 and 4.4.
- **Out-of-scope flagged in spec, not in plan:** cross-keyword global dashboard, admin index device-split badge, Redis-backed buffer.
