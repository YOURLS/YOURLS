<?php
// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

$auth = yourls_is_valid_user();

if( $auth !== true ) {

	// API mode, 
	if ( yourls_is_API() ) {
		$format = ( isset($_REQUEST['format']) ? $_REQUEST['format'] : 'xml' );
		$callback = ( isset($_REQUEST['callback']) ? $_REQUEST['callback'] : '' );
		yourls_api_output( $format, array(
			'simple' => $auth,
			'message' => $auth,
			'errorCode' => 403,
			'callback' => $callback,
		) );

	// Regular mode
	} else {
		yourls_login_screen( $auth );
	}
	
	die();
}

yourls_do_action( 'auth_successful' );

/*
 * The following code is a shim that helps users store passwords securely in config.php
 * by storing a password hash and removing the plaintext.
 * 
 * TODO: Remove this once real user management is implemented.
 */
$dismiss_url = yourls_admin_url( 'index.php?dismiss=hasherror' );
$message = <<<EOD
Something went wrong with automatic password hashing. Maybe <tt>config.php</tt> isn't writable?<br>
You may <a href="$dismiss_url">dismiss this message for one week.</a> or see <a href="http://yourls.org/userpassword">UsernamePassword</a> for details.
EOD;

if ( isset( $_GET['dismiss'] ) && $_GET['dismiss'] == 'hasherror' ) {
	yourls_update_option( 'defer_hashing_error', time() + 86400 * 7 );
}

if ( !defined( 'YOURLS_NO_HASH_PASSWORD' ) ) {
	if ( yourls_has_cleartext_passwords() ) {
		$success = yourls_hash_passwords_now();
		if ( !$success ) {
			$ignore_time = yourls_get_option( 'defer_hashing_error' );
			if ( time() > $ignore_time ) {
				yourls_add_notice( $message );
			}
		}
	}
}
