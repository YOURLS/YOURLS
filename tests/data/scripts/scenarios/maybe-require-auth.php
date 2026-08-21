<?php
/**
 * Scenario: call yourls_maybe_require_auth() with valid credentials at hand.
 *
 * Run by scripts/run-scenario.php, in a process where YOURLS_PRIVATE has been defined to the
 * value under test. Depending on that value, includes/auth.php is loaded (and defines
 * YOURLS_USER) or not.
 *
 * (Credentials and nonce are needed so that the `YOURLS_PRIVATE = true` scenario actually completes a login.
 */

if( !defined( 'YOURLS_ABSPATH' ) ) die();

$_REQUEST['username'] = 'yourls';
$_REQUEST['password'] = 'secret-ci-test';
$_REQUEST['nonce']    = yourls_create_nonce( 'admin_login' );

yourls_maybe_require_auth();
