<?php

/**
 * Tests for YOURLS_URL_CONVERT related logic: yourls_get_shorturl_charset(),
 * which picks the short URL alphabet depending on the constant.
 */
#[\PHPUnit\Framework\Attributes\Group('formatting')]
#[\PHPUnit\Framework\Attributes\Group('shorturls')]
class UrlConvertTest extends PHPUnit\Framework\TestCase {

    // Short URL charset when YOURLS_URL_CONVERT is 36 (or anything but 62/64)
    const BASE36 = '0123456789abcdefghijklmnopqrstuvwxyz';
    // Short URL charset when YOURLS_URL_CONVERT is 62 or 64
    const BASE62 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    protected function tearDown(): void {
        yourls_remove_all_filters( 'get_shorturl_charset' );
        yourls_remove_all_filters( 'get_url_convert' );
    }

    /**
     * The two real short URL charsets, for base 36 and base 62/64, with their expected length
     */
    public static function shorturl_charsets(): \Iterator {
        yield 'base 36' => array( self::BASE36, 36 );
        yield 'base 62/64' => array( self::BASE62, 62 );
    }

    /**
     * The charset is a non-empty string made of unique characters
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('shorturl_charsets')]
    public function test_charset_is_valid( $charset, $base ) {
        yourls_add_filter( 'get_shorturl_charset', fn() => $charset );

        $returned = yourls_get_shorturl_charset();

        $this->assertIsString( $returned );
        $this->assertNotEmpty( $returned );
        // Charset holds exactly $base characters...
        $this->assertSame( $base, strlen( $returned ) );
        // ...and no duplicate, otherwise int<->string conversion is ambiguous
        $chars = str_split( $returned );
        $this->assertSame( $chars, array_unique( $chars ) );
    }

    /**
     * The 'get_shorturl_charset' filter overrules the constant
     */
    public function test_charset_filter_can_override() {
        yourls_add_filter( 'get_shorturl_charset', function() {
            return 'abcdef';
        } );

        $this->assertSame( 'abcdef', yourls_get_shorturl_charset() );
    }

    /**
     * yourls_get_url_convert() returns an integer
     */
    public function test_url_convert_is_int() {
        $this->assertIsInt( yourls_get_url_convert() );
    }

    /**
     * With nothing overruling it, the conversion base reflects YOURLS_URL_CONVERT
     * (or defaults to 36 when undefined). Holds whatever the constant's value is.
     */
    public function test_url_convert_matches_constant() {
        $expected = defined( 'YOURLS_URL_CONVERT' ) ? (int) YOURLS_URL_CONVERT : 36;

        $this->assertSame( $expected, yourls_get_url_convert() );
    }

    /**
     * The 'get_url_convert' filter overrules the constant
     */
    public function test_url_convert_filter_can_override() {
        yourls_add_filter( 'get_url_convert', fn() => 62 );

        $this->assertSame( 62, yourls_get_url_convert() );
    }

    /**
     * The conversion base each YOURLS_URL_CONVERT value maps to a charset.
     *
     *   array( conversion base, expected charset )
     */
    public static function url_convert_to_charset(): \Iterator {
        yield '36 -> base 36'    => array( 36, self::BASE36 );
        yield '62 -> base 62'    => array( 62, self::BASE62 );
        yield '64 -> base 62'    => array( 64, self::BASE62 );
        yield 'wrong -> base 36' => array( 99, self::BASE36 );
    }

    /**
     * yourls_get_shorturl_charset() follows yourls_get_url_convert(): only 62 and
     * 64 yield the mixed-case charset, anything else falls back to base 36.
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('url_convert_to_charset')]
    public function test_charset_follows_url_convert( $convert, $expected_charset ) {
        yourls_add_filter( 'get_url_convert', fn() => $convert );

        $this->assertSame( $expected_charset, yourls_get_shorturl_charset() );
    }
}
