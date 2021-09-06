<?php

/**
 * Formatting functions for URLs
 *
 * @group formatting
 * @group referrer
 * @since 0.1
 */
class Format_Referrer extends PHPUnit\Framework\TestCase {

    protected $backup;

    protected function setUp(): void {
        $this->backup = $_SERVER;
    }

    protected function tearDown(): void {
        $_REQUEST = $this->backup;
    }

    function test_no_referrer() {
        unset($_SERVER['HTTP_REFERER']);
        $this->assertEquals(yourls_get_referrer(), 'direct');
    }

    function test_referrer() {
        $ref = 'http://'.rand_str();
        $_SERVER['HTTP_REFERER'] = $ref;
        $this->assertEquals(yourls_get_referrer(), $ref);
    }

    function test_long_referrer() {
        $ref = 'http://'.str_repeat(rand_str(), 10);
        $_SERVER['HTTP_REFERER'] = $ref;
        $this->assertNotEquals(yourls_get_referrer(), $ref);
    }

}
