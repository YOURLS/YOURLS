<?php

/**
 * Short URLs : misc functions
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('shorturls')]
class ShortURLTest extends PHPUnit\Framework\TestCase {

    public function test_reserved_keywords() {
        global $yourls_reserved_URL;
        $reserved = $yourls_reserved_URL[ array_rand( $yourls_reserved_URL, 1 )  ];
        $this->assertTrue( yourls_keyword_is_reserved( $reserved ) );
        $this->assertFalse( yourls_keyword_is_reserved( rand_str() ) );
    }

    public function test_free_keywords() {
        global $yourls_reserved_URL;
        $reserved = $yourls_reserved_URL[ array_rand( $yourls_reserved_URL, 1 )  ];
        $this->assertFalse( yourls_keyword_is_free( $reserved ) );
        $this->assertFalse( yourls_keyword_is_free( 'ozh' ) );
        $this->assertTrue( yourls_keyword_is_free( rand_str() ) );
    }

    public function test_url_exists() {
        $exists = yourls_long_url_exists( 'https://ozh.org/' );
        $this->assertEquals( 'ozh', $exists->keyword );
        $this->assertNull( yourls_long_url_exists( rand_str() ) );
    }

    public function test_log_hits_unknown() {
        $rand = rand_str();
        $this->assertEquals( 0, yourls_update_clicks( $rand ) );
        $this->assertEquals( 0, yourls_get_keyword_clicks( $rand ) );
    }

    public function test_get_shorturl_charset() {
        $this->assertIsString(yourls_get_shorturl_charset());
        $this->assertNotEmpty(yourls_get_shorturl_charset());
    }

}
