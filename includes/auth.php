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
            'errorCode' => '403',
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
 * by storing a password hash and removing the plaintext or md5
 *
 * TODO: Remove this once real user management is implemented
 */

// Did we just fail at encrypting passwords, or did we just notice md5 passwords?
if ( isset( $_GET['dismiss'] ) ) {
    // Bold assumption: the user has either a md5 password or a hashing error. If they have both, they'll
    // see the 2 messages on successive page loads, and can dismiss each one separately.

    if ($_GET['dismiss'] == 'hasherror' ) {
        yourls_update_option('defer_hashing_error', time() + 86400 * 7); // now + 1 week
    }

    if ($_GET['dismiss'] == 'md5warning' ) {
        yourls_update_option('defer_md5_warning', time() + 86400 * 7); // now + 1 week
    }

} else {

    // Encrypt passwords that are clear text
    if ( yourls_maybe_hash_passwords() ) {
        $hash = yourls_hash_passwords_now( YOURLS_CONFIGFILE );
        if ( $hash === true ) {
            // Hashing successful. Remove flag from DB if any.
            if( yourls_get_option( 'defer_hashing_error' ) ) {
                yourls_delete_option('defer_hashing_error');
            }
        } else {
            // It failed, display message for first time or if last time was a week ago
            if ( time() > yourls_get_option( 'defer_hashing_error' ) or !yourls_get_option( 'defer_hashing_error' ) ) {
                $message  = yourls_s( 'Could not auto-encrypt passwords. Error was: "%s".', $hash );
                $message .= ' ';
                $message .= yourls_s( '<a href="%s">Get help</a>.', 'http://yourls.org/userpassword' );
                $message .= '</p><p>';
                $message .= yourls_s( '<a href="%s">Click here</a> to dismiss this message for one week.', '?dismiss=hasherror' );

                yourls_add_notice( $message );
            }
        }
    }

    // Warn about deprecated MD5 passwords
    if ( yourls_has_md5_passwords() ) {
        if ( time() > yourls_get_option( 'defer_md5_warning' ) or !yourls_get_option( 'defer_md5_warning' ) ) {
            $message  = yourls_s( 'Password stored as MD5 hash. Please update your config.php file to use more secure password hashes.' );
            $message .= ' ';
            $message .= yourls_s( '<a href="%s">Get help</a>.', 'http://yourls.org/userpassword' );
            $message .= '</p><p>';
            $message .= yourls_s( '<a href="%s">Click here</a> to dismiss this message for one week.', '?dismiss=md5warning' );

            yourls_add_notice( $message );
        }
    } else {
        // No md5 password, remove flag from DB if any.
        if( yourls_get_option( 'defer_md5_warning' ) ) {
            yourls_delete_option('defer_md5_warning');
        }
    }

}
