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
if ( isset( $_GET['pwhash'] ) ) {
	switch ( $_GET['pwhash'] ) {
		case 'always':
			yourls_update_option('pwhash', 'always');
			yourls_add_notice( 'Password hashing turned on.' );
			break;
		case 'never':
			yourls_update_option( 'pwhash', 'never' );
			yourls_add_notice( 'Password hashing turned off.' );
			break;
		case 'once':
			yourls_update_option( 'pwhash', 'prompt' );
			$success = yourls_hash_passwords_now();
			if ( $success ) {
				yourls_add_notice( 'Plaintext passwords were secured with hashing.' );
			} else {
				yourls_add_notice( 'Password hashing failed.' );
			}
			break;
	}
}

if ( yourls_has_cleartext_passwords() ) {	
	if ( yourls_get_option( 'pwhash' ) === 'always' ) {
		$success = yourls_hash_passwords_now();
		if ( $success ) {
			yourls_add_notice( 'Plaintext passwords were converted to password hashes.' );
		} else {
			yourls_add_notice( 'Password hashing failed.' );
		}
	} else if ( yourls_get_option( 'pwhash' ) != 'never' ) {
		$url_always = yourls_admin_url( 'index.php?pwhash=always' );
		$url_never = yourls_admin_url( 'index.php?pwhash=never' );
		$url_once = yourls_admin_url( 'index.php?pwhash=once' );
		$message = <<< EOT
			<strong>Notice</strong>: Your password is stored insecurely in <tt>config.php</tt>.
			Your installation of YOURLS can be made more securely by choosing to hash your passwords.
			See <a href="http://yourls.org/userpassword">UsernamePassword</a> for details.
			<ul>
				<li><a href="$url_always">Yes, always hash passwords.</a></li>
				<li><a href="$url_once">Yes, convert to hashed passwords this time.</a></li>
				<li><a href="$url_never">No, never prompt me about hashed passwords.</a></li>
			</ul>
EOT;
		yourls_add_notice( $message, 'notice' );	
	}
}