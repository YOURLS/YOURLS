<?php
/**
 * Boot YOURLS in a fresh PHP process, run a scenario, and report on constants and included files.
 *
 * Some behaviors cannot be checked from within the test suite process: constants cannot be
 * undefined or redefined, and files loaded with require_once are only ever loaded once, so
 * whatever the first test to trigger them decided is true for the whole run. This script boots a
 * complete YOURLS in a new process, with arbitrary constants defined *before* bootstrap, runs a
 * scenario file, and reports what ended up defined and loaded.
 *
 * Scenarios are plain PHP files in scripts/scenarios/, executed once YOURLS is fully booted.
 *
 * Usage:   php run-scenario.php <scenario> [<constants as a JSON object>]
 * Example: php run-scenario.php maybe-require-auth '{"YOURLS_PRIVATE":false}'
 *
 * Outputs one line of JSON:
 *   {"scenario":"...", "constants":{"YOURLS_PRIVATE":false,...}, "included":["includes/....php",...]}
 * where "constants" holds every defined YOURLS_* constant and "included" every loaded file below
 * YOURLS_ABSPATH, as a path relative to it, in loading order.
 *
 * The test suite side of this is tests/includes/new-process.php (NewProcessTrait).
 */

// Scenario to run: a file name in scenarios/, no path allowed
$scenario      = isset( $argv[1] ) ? basename( $argv[1], '.php' ) : '';
$scenario_file = __DIR__ . '/scenarios/' . $scenario . '.php';
if( $scenario === '' || !is_readable( $scenario_file ) ) {
    fwrite( STDERR, sprintf( "Unknown scenario: '%s'\n", $scenario ) );
    exit( 1 );
}

// Constants to define before YOURLS boots, so that config and core see them
$constants = isset( $argv[2] ) ? json_decode( $argv[2], true ) : array();
if( !is_array( $constants ) ) {
    fwrite( STDERR, sprintf( "Could not decode constants: %s\n", $argv[2] ) );
    exit( 1 );
}
foreach( $constants as $name => $value ) {
    define( $name, $value );
}

// Same config file and same bootstrap as the test suite. Unlike tests/bootstrap.php we do read
// from the database: tables are expected to be already installed by the test suite we're run from.
require_once dirname( __DIR__, 2 ) . '/includes/boot.php';
yut_boot_yourls();

// Safety net: whatever a scenario does, it must never rewrite the config file of the test suite
yourls_add_filter( 'skip_password_hashing', 'yourls_return_true' );

require $scenario_file;

// Report every YOURLS_* constant...
$constants = array_filter(
    get_defined_constants( true )['user'],
    function( $name ) { return str_starts_with( $name, 'YOURLS_' ); },
    ARRAY_FILTER_USE_KEY
);

// ...and every included file below YOURLS_ABSPATH, relative to it
$root     = rtrim( str_replace( '\\', '/', YOURLS_ABSPATH ), '/' ) . '/';
$included = array();
foreach( get_included_files() as $file ) {
    $file = str_replace( '\\', '/', $file );
    if( str_starts_with( $file, $root ) ) {
        $included[] = substr( $file, strlen( $root ) );
    }
}

echo json_encode( array(
    'scenario'  => $scenario,
    'constants' => $constants,
    'included'  => $included,
), JSON_UNESCAPED_SLASHES );
