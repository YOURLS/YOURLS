<?php

/**
 * Login tests - via API
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
#[\PHPUnit\Framework\Attributes\Group('login')]
class LoginAPITest extends LoginBaseTestCase {

    public static function setUpBeforeClass(): void {
        yourls_add_filter( 'is_API', 'yourls_return_true' );
    }

    public static function tearDownAfterClass(): void {
        yourls_remove_filter( 'is_API', 'yourls_return_true' );
    }

}
