<?php
$auth = yourls_is_valid_user();

if( $auth !== true ) {

	// API mode, 
	if ( defined('YOURLS_API') && YOURLS_API == true ) {
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