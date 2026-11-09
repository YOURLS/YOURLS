<?php
/**
 * Scenario: run yourls-loader.php on a given request, and report which branch it took.
 *
 * Run by scripts/run-scenario.php, in a process where YOURLS_TEST_REQUEST has been defined to the
 * request under test, relative to YOURLS root (eg 'abc', 'abc+', 'favicon.ico', or '' for the root).
 *
 * The loader runs for real, until it exits. On the way, hooks record what happened in constants:
 *   YOURLS_TEST_GO           keyword passed to 'load_template_go'
 *   YOURLS_TEST_PAGE         page passed to 'pre_page'
 *   YOURLS_TEST_SHORTURL     [url, keyword] passed to 'redirect_shorturl'
 *   YOURLS_TEST_INFOS        keyword passed to 'load_template_infos'
 *   YOURLS_TEST_AGGREGATE    value of $aggregate when the stat page loads
 *   YOURLS_TEST_BOOKMARKLET  URL passed to 'pre_redirect_bookmarklet'
 *   YOURLS_TEST_NOT_FOUND    keyword passed to 'redirect_keyword_not_found'
 *   YOURLS_TEST_FAILED       request passed to 'loader_failed'
 *   YOURLS_TEST_REDIRECT     [location, code] of the redirection
 */

if( !defined( 'YOURLS_ABSPATH' ) ) die();

// What a web server would provide
$_SERVER['REQUEST_URI']     = '/' . YOURLS_TEST_REQUEST;
$_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';
yourls_add_filter( 'shunt_get_request', function() { return YOURLS_TEST_REQUEST; } );

/**
 * Define a YOURLS_TEST_* constant once: some hooks may fire more than once
 *
 * @param string $name
 * @param mixed  $value
 * @return void
 */
function yourls_test_loader_record(string $name, $value): void {
    if( !defined( "YOURLS_TEST_$name" ) ) {
        define( "YOURLS_TEST_$name", $value );
    }
}

yourls_add_action( 'load_template_go', function( $args ) {
    yourls_test_loader_record( 'GO', $args[0] );
} );

yourls_add_action( 'pre_page', function( $args ) {
    yourls_test_loader_record( 'PAGE', $args[0] );
} );

yourls_add_action( 'redirect_shorturl', function( $args ) {
    yourls_test_loader_record( 'SHORTURL', $args );
} );

yourls_add_action( 'load_template_infos', function( $args ) {
    // The loader runs in the global scope, this is where it sets $aggregate
    global $aggregate;
    yourls_test_loader_record( 'INFOS', $args[0] );
    yourls_test_loader_record( 'AGGREGATE', $aggregate );
    exit;
} );

yourls_add_action( 'pre_redirect_bookmarklet', function( $args ) {
    yourls_test_loader_record( 'BOOKMARKLET', $args[0] );
} );

yourls_add_action( 'redirect_keyword_not_found', function( $args ) {
    yourls_test_loader_record( 'NOT_FOUND', $args[0] );
} );

yourls_add_action( 'loader_failed', function( $args ) {
    yourls_test_loader_record( 'FAILED', $args[0] );
} );

yourls_add_filter( 'redirect_location', function( $location, $code ) {
    yourls_test_loader_record( 'REDIRECT', array( $location, $code ) );
    return $location;
}, 10, 2 );

require YOURLS_ABSPATH . '/yourls-loader.php';
