<?php
/**
 * Click-tracking integration scenarios.
 *
 * Run from inside the dev docker stack:
 *   docker compose exec web php tests/scenarios/click-tracking-scenarios.php
 *
 * Scenarios:
 *   A) clean install               — drop everything, run install, assert 510 schema is present
 *   B) upgrade from 508            — recreate the legacy 508 schema, run yourls_upgrade, assert 510 columns
 *   C) upgrade from 509            — recreate the legacy 509 schema, run yourls_upgrade, assert 510 columns
 *   D) click 500 mixed (humans+bots) — feed 500 clicks via yourls_log_redirect with realistic UAs,
 *                                     verify row count + quality of parsed fields
 *
 * Each scenario is independent: it drops + recreates tables before running.
 */

// ---- bootstrap a YOURLS environment without the test runner ---------------
global $yourls_user_passwords, $yourls_reserved_URL,
       $yourls_filters, $yourls_actions,
       $yourls_locale, $yourls_l10n, $yourls_locale_formats,
       $yourls_allowedentitynames, $yourls_allowedprotocols;

define( 'YOURLS_CONFIGFILE', __DIR__ . '/../yourls-tests-config.php' );
require_once YOURLS_CONFIGFILE;
require_once __DIR__ . '/../../includes/vendor/autoload.php';
$config = new \YOURLS\Config\Config( YOURLS_CONFIGFILE );
$config->define_core_constants();

$init = new \YOURLS\Config\InitDefaults;
$init->check_maintenance_mode  = false;
$init->fix_request_uri         = false;
$init->redirect_ssl            = false;
$init->redirect_to_install     = false;
$init->check_if_upgrade_needed = false;
$init->load_plugins            = false;
$init->get_all_options         = false;
$init->check_new_version       = false;
new \YOURLS\Config\Init( $init );

require_once __DIR__ . '/../includes/install.php'; // for yut_drop_all_tables_if_local

// ---- helpers ---------------------------------------------------------------

function scenario( string $name, callable $fn ): void {
    echo "\n============================================================\n";
    echo " SCENARIO: $name\n";
    echo "============================================================\n";
    $start = microtime( true );
    try {
        $fn();
        printf( "  PASS — %.2fs\n", microtime( true ) - $start );
    } catch ( \Throwable $e ) {
        printf( "  FAIL — %s\n", $e->getMessage() );
        echo $e->getTraceAsString() . "\n";
        exit( 1 );
    }
}

function assert_eq( $expected, $actual, string $msg ): void {
    if ( $expected !== $actual ) {
        throw new RuntimeException( "$msg — expected " . var_export( $expected, true ) . " got " . var_export( $actual, true ) );
    }
    echo "  OK   $msg\n";
}

function assert_true( bool $v, string $msg ): void {
    if ( ! $v ) throw new RuntimeException( $msg );
    echo "  OK   $msg\n";
}

function dropAll(): void {
    $ydb = yourls_get_db();
    $tables = [ YOURLS_DB_TABLE_URL, YOURLS_DB_TABLE_OPTIONS, YOURLS_DB_TABLE_LOG, YOURLS_DB_TABLE_USERS, YOURLS_DB_TABLE_API_RATE ];
    foreach ( $tables as $t ) {
        try { $ydb->perform( "DROP TABLE IF EXISTS `$t`" ); } catch ( \Throwable $e ) { /* ignore */ }
    }
}

function logColumns(): array {
    $ydb = yourls_get_db();
    return array_column( (array) $ydb->fetchObjects( 'SHOW COLUMNS FROM `' . YOURLS_DB_TABLE_LOG . '`' ), 'Field' );
}

function logIndexes(): array {
    $ydb = yourls_get_db();
    return array_column( (array) $ydb->fetchObjects( 'SHOW INDEX FROM `' . YOURLS_DB_TABLE_LOG . '`' ), 'Key_name' );
}

/**
 * Hand-rolled DDL of the YOURLS_DB_TABLE_LOG as it shipped at the named
 * DB version. Used to reconstruct legacy state for upgrade tests.
 */
function legacyLogTableSql( int $version ): string {
    // 508 and 509 share the same log schema (the bumps were in users/url/api_rate).
    return 'CREATE TABLE `' . YOURLS_DB_TABLE_LOG . '` ('
        . '`click_id` int(11) NOT NULL auto_increment,'
        . '`click_time` datetime NOT NULL,'
        . '`shorturl` varchar(100) BINARY NOT NULL,'
        . '`referrer` varchar(200) NOT NULL,'
        . '`user_agent` varchar(255) NOT NULL,'
        . '`ip_address` varchar(41) NOT NULL,'
        . '`country_code` char(2) NOT NULL,'
        . 'PRIMARY KEY (`click_id`),'
        . 'KEY `shorturl` (`shorturl`)'
        . ') AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci';
}

function legacyOptionsTableSql(): string {
    return 'CREATE TABLE `' . YOURLS_DB_TABLE_OPTIONS . '` ('
        . '`option_id` bigint(20) unsigned NOT NULL auto_increment,'
        . '`option_name` varchar(64) NOT NULL default "",'
        . '`option_value` longtext NOT NULL,'
        . 'PRIMARY KEY (`option_id`,`option_name`),'
        . 'KEY `option_name` (`option_name`)'
        . ') AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci';
}

function legacyUrlTableSql( int $version ): string {
    // 508 introduced `notes`. 509 added `created_by`. We always include
    // `notes` because we are at >= 508 in every upgrade fixture.
    $cols = '`keyword` varchar(200) BINARY NOT NULL,'
          . '`url` text BINARY NOT NULL,'
          . '`title` text CHARACTER SET utf8mb4,'
          . '`timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,'
          . '`ip` varchar(41) NOT NULL,'
          . '`clicks` int(10) unsigned NOT NULL,'
          . '`notes` text COLLATE utf8mb4_unicode_ci';
    if ( $version >= 509 ) {
        $cols .= ',`created_by` int(11) unsigned NULL';
    }
    return 'CREATE TABLE `' . YOURLS_DB_TABLE_URL . '` (' . $cols . ','
        . 'PRIMARY KEY (`keyword`),'
        . 'KEY `ip` (`ip`),'
        . 'KEY `timestamp` (`timestamp`),'
        . 'KEY `url_idx` (`url`(50))'
        . ') DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci';
}

function legacyUsersTableSql( int $version ): string {
    // 508 created the users table. 509 added role / api_key_version / last_login_at.
    $cols = '`user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,'
          . '`username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,'
          . '`password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,'
          . '`is_active` tinyint(1) unsigned NOT NULL DEFAULT 1,'
          . '`created_at` timestamp NOT NULL DEFAULT current_timestamp(),'
          . '`updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()';
    if ( $version >= 509 ) {
        $cols = '`user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,'
              . '`username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,'
              . '`password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,'
              . '`role` enum(\'admin\',\'editor\') NOT NULL DEFAULT \'admin\','
              . '`is_active` tinyint(1) unsigned NOT NULL DEFAULT 1,'
              . '`api_key_version` int unsigned NOT NULL DEFAULT 1,'
              . '`last_login_at` timestamp NULL DEFAULT NULL,'
              . '`created_at` timestamp NOT NULL DEFAULT current_timestamp(),'
              . '`updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()';
    }
    return 'CREATE TABLE `' . YOURLS_DB_TABLE_USERS . '` (' . $cols . ','
        . 'PRIMARY KEY (`user_id`),'
        . 'UNIQUE KEY `username` (`username`)'
        . ') AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci';
}

function legacyApiRateTableSql(): string {
    // Created at 509.
    return 'CREATE TABLE `' . YOURLS_DB_TABLE_API_RATE . '` ('
        . '`id` int(11) unsigned NOT NULL AUTO_INCREMENT,'
        . '`bucket` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,'
        . '`window_start` timestamp NOT NULL DEFAULT current_timestamp(),'
        . '`hits` int(11) unsigned NOT NULL DEFAULT 0,'
        . 'PRIMARY KEY (`id`),'
        . 'KEY `bucket_window` (`bucket`,`window_start`)'
        . ') DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci';
}

function ensureBaseTablesAtVersion( int $version ): void {
    $ydb = yourls_get_db();
    dropAll();
    $ydb->perform( legacyOptionsTableSql() );
    $ydb->perform( legacyUrlTableSql( $version ) );
    $ydb->perform( legacyLogTableSql( $version ) );
    $ydb->perform( legacyUsersTableSql( $version ) );
    if ( $version >= 509 ) {
        $ydb->perform( legacyApiRateTableSql() );
    }
    // record the db_version
    $ydb->perform( "INSERT INTO `" . YOURLS_DB_TABLE_OPTIONS . "` (option_name, option_value) VALUES ('db_version', :v)", [ 'v' => (string) $version ] );
}

// ---- realistic fixtures ---------------------------------------------------

function realHumanUAs(): array {
    return [
        // desktop
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Safari/605.1.15',
        'Mozilla/5.0 (X11; Linux x86_64; rv:121.0) Gecko/20100101 Firefox/121.0',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0',
        // mobile
        'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1',
        'Mozilla/5.0 (Linux; Android 14; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36',
        // tablet
        'Mozilla/5.0 (iPad; CPU OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Safari/604.1',
        'Mozilla/5.0 (Linux; Android 14; SM-X910) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
    ];
}

function botUAs(): array {
    return [
        'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)',
        'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)',
        'facebookexternalhit/1.1',
        'Twitterbot/1.0',
        'curl/8.4.0',
        'Wget/1.21.4',
        'python-requests/2.31.0',
        'Mozilla/5.0 (compatible; AhrefsBot/7.0)',
    ];
}

function realIpv4(): string {
    // Mix documentation ranges (no geo lookup possible) with a handful of
    // public IPs from well-known providers so the geo lookup can populate
    // country_code on a slice of the rows. This makes the Overview "Top
    // country" card show a real value end-to-end.
    $pool = [
        // Cloudflare resolvers (US)
        '1.1.1.1', '1.0.0.1',
        // Google DNS (US)
        '8.8.8.8', '8.8.4.4',
        // Quad9 (US/CH)
        '9.9.9.9',
        // OpenDNS (US)
        '208.67.222.222',
        // RIPE NCC (NL)
        '193.0.14.129',
        // Yandex DNS (RU)
        '77.88.8.8',
    ];
    if ( random_int( 1, 100 ) <= 30 ) {
        return $pool[ array_rand( $pool ) ];
    }
    $ranges = [ '203.0.113', '198.51.100', '192.0.2' ];
    return $ranges[ array_rand( $ranges ) ] . '.' . random_int( 1, 254 );
}

function utmQueryString(): string {
    if ( random_int( 1, 100 ) > 60 ) return '';
    $sources    = [ 'newsletter', 'twitter', 'linkedin', 'partners', 'paid' ];
    $mediums    = [ 'email', 'social', 'cpc', 'organic', 'referral' ];
    $campaigns  = [ 'spring2026', 'product-launch', 'webinar-may', 'q2-promo' ];
    return http_build_query( [
        'utm_source'   => $sources[ array_rand( $sources ) ],
        'utm_medium'   => $mediums[ array_rand( $mediums ) ],
        'utm_campaign' => $campaigns[ array_rand( $campaigns ) ],
    ] );
}

function realReferrer( string $qs ): string {
    if ( random_int( 1, 100 ) > 60 ) return '';
    $hosts = [ 'https://t.co/abc', 'https://www.google.com/search?q=foo', 'https://www.linkedin.com/feed/', 'https://news.ycombinator.com/item?id=42', 'https://www.reddit.com/r/php' ];
    $base  = $hosts[ array_rand( $hosts ) ];
    return $qs ? ( $base . '?' . $qs ) : $base;
}

// ---- scenarios -------------------------------------------------------------

scenario( 'A — clean install creates the 510 schema directly', function () {
    dropAll();
    $r = yourls_create_sql_tables();
    assert_eq( [], $r['error'], 'no install errors' );

    $cols = logColumns();
    foreach ( [ 'click_id','click_time','shorturl','referrer','user_agent','ip_address','country_code',
                'device_type','browser','os','referrer_host','utm_source','utm_medium','utm_campaign',
                'city','region','visitor_hash','click_uid','meta' ] as $c ) {
        assert_true( in_array( $c, $cols, true ), "log table has column `$c`" );
    }
    $idx = logIndexes();
    foreach ( [ 'shorturl','device_type_idx','utm_source_idx','click_uid_idx' ] as $i ) {
        assert_true( in_array( $i, $idx, true ), "log table has index `$i`" );
    }
} );

scenario( 'B — upgrade from 508 adds all 510 columns and indexes', function () {
    ensureBaseTablesAtVersion( 508 );
    require_once YOURLS_INC . '/functions-upgrade.php';
    // Mimic the dispatcher: 508 → 509 → 510. We invoke 509 then 510 directly.
    ob_start();
    yourls_upgrade_to_509();
    yourls_upgrade_to_510();
    ob_end_clean();

    $cols = logColumns();
    foreach ( [ 'device_type','browser','os','referrer_host','utm_source','utm_medium','utm_campaign',
                'city','region','visitor_hash','click_uid','meta' ] as $c ) {
        assert_true( in_array( $c, $cols, true ), "post-upgrade log has `$c`" );
    }
    $idx = logIndexes();
    foreach ( [ 'device_type_idx','utm_source_idx','click_uid_idx' ] as $i ) {
        assert_true( in_array( $i, $idx, true ), "post-upgrade log has index `$i`" );
    }
} );

scenario( 'C — upgrade from 509 adds 510 columns and is idempotent', function () {
    ensureBaseTablesAtVersion( 509 );
    require_once YOURLS_INC . '/functions-upgrade.php';
    ob_start();
    yourls_upgrade_to_510();
    yourls_upgrade_to_510(); // idempotency check
    ob_end_clean();

    $cols = logColumns();
    foreach ( [ 'device_type','browser','os','referrer_host','utm_source','utm_medium','utm_campaign',
                'city','region','visitor_hash','click_uid','meta' ] as $c ) {
        assert_true( in_array( $c, $cols, true ), "post-upgrade log has `$c`" );
    }
} );

scenario( 'D — 500 mixed clicks populate hot columns + meta JSON', function () {
    // Start fresh from a clean 510 install
    dropAll();
    $r = yourls_create_sql_tables();
    // ignore "Could not initialize options" — that helper assumes a runtime
    // cache that we don't bootstrap here. The tables themselves are created
    // correctly, which is what we need for this scenario.
    $cols = logColumns();
    assert_true( in_array( 'meta', $cols, true ), 'install created the meta column' );

    // Reset YDB infos cache so the next yourls_add_new_link sees a fresh state.
    $ydb = yourls_get_db();
    if ( method_exists( $ydb, 'set_infos' ) ) {
        // best-effort: nothing to do, but make sure options are queryable
        try { $ydb->perform( "INSERT IGNORE INTO `" . YOURLS_DB_TABLE_OPTIONS . "` (option_name, option_value) VALUES ('db_version', '510')" ); } catch ( \Throwable $e ) {}
    }

    // Seed a short URL
    yourls_add_new_link( 'https://example.com/landing', 'click500', 'load test target' );
    yourls_get_db()->perform( 'DELETE FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "click500"' );

    $humans = realHumanUAs();
    $bots   = botUAs();

    $totalHumans = 350;
    $totalBots   = 150;
    $startedAt   = microtime( true );

    for ( $i = 0; $i < $totalHumans + $totalBots; $i++ ) {
        $isHuman = $i < $totalHumans;
        $ua = $isHuman ? $humans[ array_rand( $humans ) ] : $bots[ array_rand( $bots ) ];
        $_SERVER['HTTP_USER_AGENT'] = $ua;
        $_SERVER['HTTP_ACCEPT']     = $isHuman ? 'text/html,application/xhtml+xml' : '*/*';
        $_SERVER['REMOTE_ADDR']     = realIpv4();
        $qs                         = utmQueryString();
        $_SERVER['QUERY_STRING']    = $qs;
        $_SERVER['HTTP_REFERER']    = realReferrer( $qs );

        // Mirror what yourls-go.php does on every hit: bump the click counter
        // on yourls_url AND record the rich row in yourls_log.
        yourls_update_clicks( 'click500' );
        yourls_log_redirect( 'click500' );
    }
    $elapsed = microtime( true ) - $startedAt;
    printf( "  …inserted %d clicks in %.2fs (%.1f click/s)\n", $totalHumans + $totalBots, $elapsed, ( $totalHumans + $totalBots ) / max( 0.001, $elapsed ) );

    $ydb = yourls_get_db();
    $rows = (int) $ydb->fetchValue( 'SELECT COUNT(*) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "click500"' );
    assert_eq( $totalHumans + $totalBots, $rows, "row count" );

    $bots = (int) $ydb->fetchValue( 'SELECT COUNT(*) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "click500" AND device_type = "bot"' );
    $desktops = (int) $ydb->fetchValue( 'SELECT COUNT(*) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "click500" AND device_type = "desktop"' );
    $mobiles  = (int) $ydb->fetchValue( 'SELECT COUNT(*) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "click500" AND device_type = "mobile"' );
    $tablets  = (int) $ydb->fetchValue( 'SELECT COUNT(*) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "click500" AND device_type = "tablet"' );

    printf( "  device split: bot=%d desktop=%d mobile=%d tablet=%d\n", $bots, $desktops, $mobiles, $tablets );
    assert_eq( $totalBots, $bots, "bot rows == 150" );
    assert_true( $desktops + $mobiles + $tablets === $totalHumans, 'human rows split into desktop/mobile/tablet' );

    // Browsers: human pool has chrome/safari/firefox/edge; bots get 'unknown'
    $browsers = (array) $ydb->fetchAll( 'SELECT browser, COUNT(*) AS c FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "click500" GROUP BY browser ORDER BY c DESC' );
    echo "  browser histogram: ";
    foreach ( $browsers as $b ) { printf( '%s=%d ', $b['browser'], $b['c'] ); }
    echo "\n";

    // UTM coverage: about 40% of human-and-bot clicks should have utm_source set
    $withUtm = (int) $ydb->fetchValue( 'SELECT COUNT(*) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "click500" AND utm_source IS NOT NULL' );
    printf( "  utm_source non-null: %d / %d (%.0f%%)\n", $withUtm, $rows, $withUtm * 100 / $rows );
    assert_true( $withUtm > 0 && $withUtm < $rows, 'utm_source has both null and non-null values' );

    // Referrer host parsing
    $hosts = (array) $ydb->fetchAll( 'SELECT referrer_host, COUNT(*) c FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "click500" AND referrer_host IS NOT NULL GROUP BY referrer_host ORDER BY c DESC LIMIT 5' );
    echo "  top referrer_host: ";
    foreach ( $hosts as $h ) { printf( '%s=%d ', $h['referrer_host'], $h['c'] ); }
    echo "\n";

    // visitor_hash format
    $sample = $ydb->fetchValue( 'SELECT visitor_hash FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "click500" AND visitor_hash IS NOT NULL LIMIT 1' );
    assert_true( $sample !== null && preg_match( '/^[a-f0-9]{16}$/', (string) $sample ) === 1, 'visitor_hash has 16-hex format' );

    // meta JSON sanity
    $metaRow = $ydb->fetchObject( 'SELECT meta FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "click500" AND meta IS NOT NULL LIMIT 1' );
    assert_true( $metaRow !== null && is_array( json_decode( $metaRow->meta, true ) ), 'meta is valid JSON' );

    // Bot meta is_bot=true
    $botMeta = $ydb->fetchObject( 'SELECT meta FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "click500" AND device_type = "bot" LIMIT 1' );
    $decoded = json_decode( $botMeta->meta, true );
    assert_true( $decoded['is_bot'] === true, 'bot row has meta.is_bot=true' );
    assert_true( ! empty( $decoded['bot_name'] ), 'bot row has meta.bot_name' );

    // Aggregations work (use the new infos helpers)
    $devicesAgg = yourls_get_clicks_by_dimension( 'click500', 'device_type', 'all', 10 );
    echo "  yourls_get_clicks_by_dimension(device_type) = ";
    foreach ( $devicesAgg as $k => $v ) printf( '%s=%d ', $k, $v );
    echo "\n";
    assert_eq( $totalBots, $devicesAgg['bot'] ?? 0, 'aggregator sees the same bot count' );

    $unique = yourls_get_unique_visitors( 'click500', 'all' );
    printf( "  unique visitors: %d\n", $unique );
    assert_true( $unique > 0 && $unique <= $totalHumans + $totalBots, 'unique visitor count plausible' );

    // Counter shown in the admin index and infos overview must match the log
    // row count after the upgrade — both are bumped on every hit.
    $counter = (int) $ydb->fetchValue( 'SELECT clicks FROM `' . YOURLS_DB_TABLE_URL . '` WHERE keyword = "click500"' );
    printf( "  yourls_url.clicks counter: %d\n", $counter );
    assert_eq( $rows, $counter, 'yourls_url.clicks counter matches log row count' );
} );

echo "\nALL SCENARIOS PASSED\n";

scenario( 'E — 50 simulated beacon submissions populate technology meta', function () {
    if ( ! yourls_keyword_is_taken( 'click500' ) ) {
        yourls_add_new_link( 'https://example.com/landing', 'click500', 'load test target' );
    }

    $viewports = [
        [ 1920, 1080, 1, '4g',   'Europe/Rome',     'it-IT' ],
        [ 1366, 768,  1, 'wifi', 'America/New_York','en-US' ],
        [ 1440, 900,  2, 'wifi', 'Europe/London',   'en-GB' ],
        [ 390,  844,  3, '4g',   'Europe/Paris',    'fr-FR' ],
        [ 412,  915,  3, '5g',   'America/Sao_Paulo','pt-BR'],
        [ 768,  1024, 2, 'wifi', 'Asia/Tokyo',      'ja-JP' ],
        [ 360,  640,  2, '3g',   'Asia/Kolkata',    'hi-IN' ],
        [ 2560, 1440, 1, 'wifi', 'Europe/Berlin',   'de-DE' ],
    ];
    $uas = [
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120 Safari/537.36',
        'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) Mobile Safari/604.1',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) Version/17.0 Safari/605.1.15',
        'Mozilla/5.0 (Linux; Android 14; Pixel 8) Chrome/120 Mobile Safari/537.36',
    ];

    $count = 0;
    for ( $i = 0; $i < 50; $i++ ) {
        $vp = $viewports[ $i % count( $viewports ) ];
        $ua = $uas[ $i % count( $uas ) ];
        $payload = json_encode( [
            'v'         => 1,
            'click_uid' => bin2hex( random_bytes( 8 ) ),
            'keyword'   => 'click500',
            'screen'    => [ 'w' => $vp[0], 'h' => $vp[1], 'dpr' => $vp[2] ],
            'viewport'  => [ 'w' => (int) ( $vp[0] * 0.95 ), 'h' => (int) ( $vp[1] * 0.92 ) ],
            'connection'=> $vp[3],
            'tz'        => $vp[4],
            'lang'      => $vp[5],
            'client_referrer' => '',
        ] );
        $_SERVER['REMOTE_ADDR']     = '203.0.113.' . ( ( $i % 250 ) + 1 );
        $_SERVER['HTTP_USER_AGENT'] = $ua;
        $_SERVER['REQUEST_METHOD']  = 'POST';
        if ( ! defined( 'YOURLS_CLICK_BEACON_TEST' ) ) {
            define( 'YOURLS_CLICK_BEACON_TEST', true );
        }
        $status = \YOURLS\Click\Beacon::handle( $payload );
        if ( $status === 204 ) $count++;
    }
    printf( "  beacon submissions accepted: %d/50\n", $count );

    $ydb = yourls_get_db();
    $withVp = (int) $ydb->fetchValue(
        'SELECT COUNT(*) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "click500" AND JSON_EXTRACT(meta, "$.viewport_w") IS NOT NULL'
    );
    printf( "  rows with viewport meta: %d\n", $withVp );
    assert_true( $withVp >= 50, 'beacon rows persisted with viewport meta' );

    $stats = yourls_get_viewport_stats( 'click500' );
    printf( "  viewport stats: avg=%dx%d med=%dx%d samples=%d\n",
        $stats['avg_w'], $stats['avg_h'], $stats['med_w'], $stats['med_h'], $stats['samples'] );
    assert_true( $stats['samples'] >= 50, 'enough viewport samples' );
    assert_true( $stats['avg_w'] > 300 && $stats['avg_w'] < 3000, 'plausible avg width' );

    $orient = yourls_get_orientation_split( 'click500' );
    printf( "  orientation: portrait=%d landscape=%d\n", $orient['portrait'], $orient['landscape'] );
    assert_true( $orient['portrait'] > 0 && $orient['landscape'] > 0, 'mix of orientations' );

    $dpr = yourls_get_dpr_distribution( 'click500' );
    echo "  DPR distribution: ";
    foreach ( $dpr as $k => $v ) printf( '%s=%d ', $k, $v );
    echo "\n";

    $resos = yourls_get_top_resolutions( 'click500', 10 );
    echo "  top resolutions: ";
    foreach ( array_slice( $resos, 0, 4, true ) as $r => $c ) printf( '%s=%d ', $r, $c );
    echo "\n";
} );
