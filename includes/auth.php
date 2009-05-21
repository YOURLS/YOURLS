<?php
require(dirname(__FILE__).'/functions-auth.php');

$auth = yourls_is_valid_user();

if( $auth !== true ) {

	// API mode, 
	if ( defined('YOURLS_API') && YOURLS_API == true ) {
		yourls_api_output( $_REQUEST['format'], array('shorturl' => $auth) );

	// Regular mode
	} else {
		yourls_login_screen( $auth );
	}
	
	die();
}