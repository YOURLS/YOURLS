<?php
define( 'YOURLS_GO', true );
require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );

if ( PHP_SAPI !== 'cli' && ( $_SERVER['REQUEST_METHOD'] ?? 'GET' ) !== 'POST' ) {
    http_response_code( 204 );
    exit;
}

if ( ! defined( 'YOURLS_CLICK_BEACON_TEST' ) && PHP_SAPI !== 'cli' ) {
    \YOURLS\Click\Beacon::handle();
}
