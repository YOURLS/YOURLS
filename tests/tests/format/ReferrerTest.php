<?php

/**
 * Formatting functions for URLs
 */
#[\PHPUnit\Framework\Attributes\Group('formatting')]
#[\PHPUnit\Framework\Attributes\Group('referrer')]
class ReferrerTest extends PHPUnit\Framework\TestCase {

    protected $backup;

    protected function setUp(): void {
        $this->backup = $_SERVER;
    }

    protected function tearDown(): void {
        $_SERVER = $this->backup;
    }

    function test_no_referrer() {
        unset($_SERVER['HTTP_REFERER']);
        $this->assertEquals('direct', yourls_get_referrer());
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

    /**
     * Referrers with a scheme hidden behind character references
     */
    public static function list_of_entity_encoded_referrers(): \Iterator {
        yield 'numeric entity'        => ['&#106;avascript:alert(document.domain)'];
        yield 'padded numeric entity' => ['&#0000106;avascript:alert(1)'];
        yield 'hex entity'            => ['&#x6A;avascript:alert(1)'];
        yield 'data scheme'           => ['&#100;ata:text/html,alert(1)'];
    }

    /**
     * A referrer with an entity-encoded scheme is not stored, and not linked
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('list_of_entity_encoded_referrers')]
    function test_entity_encoded_referrer_is_rejected(string $ref) {
        $_SERVER['HTTP_REFERER'] = $ref;
        $this->assertSame('', yourls_get_referrer());

        ob_start();
        yourls_html_link($ref);
        $this->assertStringContainsString('href=""', ob_get_clean());
    }

}
