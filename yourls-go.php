<?php
define( 'YOURLS_GO', true );
require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );

// Variables should be defined in yourls-loader.php, if not try GET request (old behavior of yourls-go.php)
if( !isset( $keyword ) && isset( $_GET['id'] ) )
	$keyword = $_GET['id'];
$keyword = yourls_sanitize_string( $keyword );

// First possible exit:
if ( !isset( $keyword ) ) {
	yourls_do_action( 'redirect_no_keyword' );
	yourls_redirect( YOURLS_SITE, 301 );
}

// Get URL From Database
$url = yourls_get_keyword_longurl( $keyword );

// URL found
if( !empty( $url ) ) {
	yourls_do_action( 'redirect_shorturl', $url, $keyword );

	// Update click count in main table
	$update_clicks = yourls_update_clicks( $keyword );

	// Update detailed log for stats
	$log_redirect = yourls_log_redirect( $keyword );
	
	yourls_redirect( $url, 301 );

// URL not found. Either reserved, or page, or doesn't exist
} else {

	// Do we have a page?
	if ( file_exists( YOURLS_PAGEDIR . "/$keyword.php" ) ) {
		yourls_page( $keyword );

	// Either reserved id, or no such id
	} else {
		yourls_do_action( 'redirect_keyword_not_found', $keyword );
		
		yourls_redirect( YOURLS_SITE, 302 ); // no 404 to tell browser this might change, and also to not pollute logs
	}
}
exit();
