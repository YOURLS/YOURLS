<?php

/**
 * Login tests - API + "secure passwordless" without a time limited token
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
#[\PHPUnit\Framework\Attributes\Group('login')]
class LoginAPISecureTest extends LoginBaseTestCase {

    public static function setUpBeforeClass(): void {
        yourls_add_filter( 'is_API', 'yourls_return_true' );
        $_REQUEST['signature'] = yourls_auth_signature( 'yourls' );
        /* Attempt login with valid signature & timestamp. Tests with invalid signatures are made directly
         *  against the check function, not in a full login procedure. See auth.php
         */
    }

    public static function tearDownAfterClass(): void {
        yourls_remove_filter( 'is_API', 'yourls_return_true' );
        unset( $_REQUEST['signature'] );
    }

}
