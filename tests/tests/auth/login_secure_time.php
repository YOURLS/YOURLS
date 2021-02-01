<?php

require_once( 'login_base.php' );

/**
 * Login tests - API + "secure passwordless" and a time limited token
 *
 * @group auth
 * @group login
 * @since 0.1
 */
class Auth_Login_API_Secure_TimeToken_Tests extends Login_Base {

    public static function setUpBeforeClass(): void {
        yourls_add_filter( 'is_API', 'yourls_return_true' );
        $_REQUEST['timestamp'] = time();
        $_REQUEST['signature'] = md5( yourls_auth_signature( 'yourls' ) . time() );
        /* Attempt login with valid signature & timestamp. Tests with invalid signatures are made directly
         *  against the check function, not in a full login procedure. See auth.php
         */
    }

    public static function tearDownAfterClass(): void {
        yourls_remove_filter( 'is_API', 'yourls_return_true' );
        unset( $_REQUEST['timestamp'] );
        unset( $_REQUEST['signature'] );
    }

}
