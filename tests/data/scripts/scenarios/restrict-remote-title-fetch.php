<?php
/**
 * Scenario: check whether yourls_restrict_remote_title_fetch() restricts the fetch, depending on
 * whether we have and authenticated user
 *
 * Run by scripts/run-scenario.php, in a process where YOURLS_PRIVATE has been defined to the
 * value under test
 *
 * (Credentials and nonce are needed so that the `YOURLS_PRIVATE = true` scenario actually completes a login.)
 *
 */

if( !defined( 'YOURLS_ABSPATH' ) ) die();

$_REQUEST['username'] = 'yourls';
$_REQUEST['password'] = 'secret-ci-test';
$_REQUEST['nonce']    = yourls_create_nonce( 'admin_login' );

yourls_maybe_require_auth();

define( 'YOURLS_TEST_RESTRICT_FETCH', yourls_restrict_remote_title_fetch() );
