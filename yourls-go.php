<?php
// Require Files
require_once( dirname(__FILE__).'/includes/load-yourls.php' );

// Variables
$id = ( isset( $_GET['id'] ) ? $_GET['id'] : '' );
$keyword = yourls_sanitize_string( $id );

// First possible exit:
if ( !$keyword ) {
	yourls_redirect( $url, 301 );
}

// Get URL From Database
$url = yourls_get_keyword_longurl( $keyword );

// URL found
if( !empty($url) ) {
	// Update click count in main table
	$update_clicks = yourls_update_clicks( $keyword );
	// Update detailed log for stats
	$log_redirect = yourls_log_redirect( $keyword );

	yourls_redirect( $url, 301 );

// URL not found. Either reserved, or page, or doesn't exist
} else {

	// Do we have a page?
	if (file_exists(dirname(__FILE__)."/pages/$keyword.php")) {
		yourls_page($keyword);

	// Either reserved id, or no such id
	} else {
		yourls_redirect( YOURLS_SITE, 307 ); // no 404 to tell browser this might change, and also to not pollute logs
	}
}
exit();
?>