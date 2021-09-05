<?php

/**
 * Misc test
 *
 * @group auth
 */
class Misc_Auth_Tests extends PHPUnit\Framework\TestCase {

    public function test_yourls_skip_password_hashing_is_bool() {
        $this->assertIsBool(yourls_skip_password_hashing());
    }

}
