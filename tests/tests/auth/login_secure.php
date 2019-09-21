<?php

require_once( 'login_base.php' );

/**
 * Login tests - API + "secure passwordless" without a time limited token
 *
 * @group auth
 * @group login
 * @since 0.1
 */
class Auth_Login_API_Secure_Tests extends Login_Base {

    public static function setUpBeforeClass() {
        yourls_add_filter( 'is_API', 'yourls_return_true' );
        $_REQUEST['signature'] = yourls_auth_signature( 'yourls' ); 
        /* Attempt login with valid signature & timestamp. Tests with invalid signatures are made directly
         *  against the check function, not in a full login procedure. See auth.php
         */
    }

    public static function tearDownAfterClass() {
        yourls_remove_filter( 'is_API', 'yourls_return_true' );
        unset( $_REQUEST['signature'] );
    }

}
