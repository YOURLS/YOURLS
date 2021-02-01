<?php

require_once( 'login_base.php' );

/**
 * Login tests - via API
 *
 * @group auth
 * @group login
 * @since 0.1
 */
class Auth_Login_API_Tests extends Login_Base {

    public static function setUpBeforeClass(): void {
        yourls_add_filter( 'is_API', 'yourls_return_true' );
    }

    public static function tearDownAfterClass(): void {
        yourls_remove_filter( 'is_API', 'yourls_return_true' );
    }

}
