<?php

/**
 * Logout function
 *
 * @group auth
 */
class Logout_Func_Tests extends PHPUnit\Framework\TestCase {

    /**
     * Check logout procedure
     */
    public function test_logout() {

        $valid = yourls_is_valid_user();
        $this->assertTrue( $valid );

        $_GET['action'] = 'logout';
        $invalid = yourls_is_valid_user();
        $this->assertNotTrue( $invalid );

        unset( $_GET['action'] );
        $valid = yourls_is_valid_user();
        $this->assertTrue( $valid );
    }

}
