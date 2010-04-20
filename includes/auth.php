<?php
$auth = yourls_apply_filter( 'is_valid_user', yourls_is_valid_user() );

if( $auth !== true ) {

	// API mode, 
	if ( yourls_is_API() ) {
		$format = ( isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xml' );
		yourls_api_output( $format, array(
			'simple' => $auth,
			'message' => $auth,
			'errorCode' => 403,
			) );

	// Regular mode
	} else {
		yourls_login_screen( $auth );
	}
	
	die();
}