<?php

/**
 * Utilities
 *
 * @group http
 */
 
class Misc_HTTP_Tests extends PHPUnit_Framework_TestCase {

    public function test_get_user_agent() {
        $this->assertInternalType("string", yourls_get_user_agent());
    }

    public function test_get_user_agent_empty() {
        $copy = yourls_get_user_agent();
        unset($_SERVER['HTTP_USER_AGENT']);

        $this->assertSame("-", yourls_get_user_agent());

        $_SERVER['HTTP_USER_AGENT'] = $copy;
    }

}
