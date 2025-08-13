<?php

/**
 * Utilities
 */
#[\PHPUnit\Framework\Attributes\Group('http')]
class HTTPTest extends PHPUnit\Framework\TestCase {

    public function test_get_user_agent() {
        $this->assertIsString(yourls_get_user_agent());
    }

    public function test_get_user_agent_empty() {
        $copy = yourls_get_user_agent();
        unset($_SERVER['HTTP_USER_AGENT']);

        $this->assertSame("-", yourls_get_user_agent());

        $_SERVER['HTTP_USER_AGENT'] = $copy;
    }

    public function test_yourls_skip_version_check_is_bool() {
        $this->assertIsBool(yourls_skip_version_check());
    }

}
