<?php

/**
 * General formatting functions.
 */
#[\PHPUnit\Framework\Attributes\Group('formatting')]
class FormatTest extends PHPUnit\Framework\TestCase {

    /**
     * Data to serialize
     */
    static function serialize_data(): \Iterator
    {
        yield array( null );
        yield array( true );
        yield array( false );
        yield array( -25 );
        yield array( 25 );
        yield array( 1.1 );
        yield array( 'this string will be serialized' );
        yield array( "a\nb" );
        yield array( array() );
        yield array( array(1,1,2,3,5,8,13) );
        yield array( (object)array('test' => true, '3', 4) );
    }

    /**
     * Unserialized data
     */
    static function not_serialized_data(): \Iterator
    {
        yield array( 'a string' );
        yield array( ['array', 'yarra'] );
        yield array( 'garbage:a:0:garbage;' );
        // array( 'b:4;' ), // this test fails in WP test suite, not sure if intentional or what...
        yield array( 's:4:test;' );
    }

    /**
     * Check that yourls_is_serialized detects serialized data
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('serialize_data')]
    public function test_is_serialized( $data ) {
        $this->assertTrue( yourls_is_serialized( serialize( $data ) ) );
    }

    /**
     * Check that yourls_is_serialized doesn't assume garbage is serialized
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('not_serialized_data')]
    public function test_is_not_serialized( $data ) {
        $this->assertFalse( yourls_is_serialized( $data ) );
    }

    /**
     * yourls_maybe_unserialize() unserializes serialized data, and leaves the rest untouched
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('serialize_data')]
    public function test_maybe_unserialize_serialized( $data ) {
        $this->assertEquals( $data, yourls_maybe_unserialize( serialize( $data ) ) );
    }

    /**
     * yourls_maybe_unserialize() returns non-serialized input as-is
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('not_serialized_data')]
    public function test_maybe_unserialize_passthrough($data) {
        $this->assertSame( $data, yourls_maybe_unserialize( $data ) );
    }

    /**
     * Charsets used by yourls_rnd_string(). Structure: [type, expected character pool]
     */
    static function rnd_string_types(): \Iterator {
        yield 'type 1' => [ '1', '23456789bcdfghjkmnpqrstvwxyz' ];
        yield 'type 2' => [ '2', '23456789bcdfghjkmnpqrstvwxyzBCDFGHJKMNPQRSTVWXYZ' ];
        yield 'type 3' => [ '3', 'abcdefghijklmnopqrstuvwxyz' ];
        yield 'type 4' => [ '4', 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' ];
        yield 'type 5' => [ '5', '0123456789abcdefghijklmnopqrstuvwxyz' ];
        yield 'type 6' => [ '6', '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' ];
    }

    /**
     * yourls_rnd_string() honors the requested length and only uses characters from
     * the pool matching the requested type
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('rnd_string_types')]
    public function test_rnd_string_types( $type, $pool ) {
        $str = yourls_rnd_string( 8, $type );

        $this->assertSame( 8, strlen( $str ) );
        // Every character belongs to the expected pool
        $this->assertSame( '', preg_replace( '/[' . preg_quote( $pool, '/' ) . ']/', '', $str ) );
    }

    /**
     * type 0 with a custom char list uses only that list
     *
     * Note: the result is str_shuffle()+substr(), so its length is capped at the
     * size of the pool ; we use a pool larger than the requested length.
     */
    public function test_rnd_string_custom_charlist() {
        $str = yourls_rnd_string( 6, '0', 'ABCDEFGHIJ' );
        $this->assertSame( 6, strlen( $str ) );
        $this->assertSame( '', preg_replace( '/[ABCDEFGHIJ]/', '', $str ) );
    }

    /**
     * Short URL charsets for the int<->string
     *
     *  - null    : the charset currently in effect (driven by YOURLS_URL_CONVERT)
     *  - base 36 : '0-9a-z'    (YOURLS_URL_CONVERT = 36, or anything but 62/64)
     *  - base 62 : '0-9a-zA-Z' (YOURLS_URL_CONVERT = 62 or 64)
     */
    static function conversion_charsets(): \Iterator {
        yield 'default (YOURLS_URL_CONVERT)' => array( null );
        yield 'base 36' => array( '0123456789abcdefghijklmnopqrstuvwxyz' );
        yield 'base 62' => array( '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' );
    }

    /**
     * Random string using only characters from $chars
     */
    private function rand_str_from( string $chars, int $len ): string {
        $max = strlen( $chars ) - 1;
        $string = '';
        for( $i = 0; $i < $len; $i++ ) {
            $string .= $chars[ mt_rand( 0, $max ) ];
        }
        // Drop leading zeros (int2string never emits them); never return empty
        return ltrim( $string, '0' ) ?: $chars[1];
    }

    /**
     * Integer (1337) to string (3jk) to integer
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('conversion_charsets')]
    public function test_int_to_string_to_int( $chars ) {
        // 10 random integers
        for( $i=0; $i<10; $i++ ) {
            $integer = mt_rand( 1, 1000000 );
            $this->assertEquals( $integer, yourls_string2int( yourls_int2string( $integer, $chars ), $chars ) );
        }
    }

    /**
     * String (3jk) to integer (1337) to string
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('conversion_charsets')]
    public function test_string_to_int_to_string( $chars ) {
        // Generate random strings from the charset actually in use
        $charset = $chars ?? yourls_get_shorturl_charset();

        for( $i=0; $i<10; $i++ ) {
            $string = $this->rand_str_from( $charset, mt_rand( 2, 10 ) );
            $this->assertEquals( $string, yourls_int2string( yourls_string2int( $string, $chars ), $chars ) );
        }
    }

    /**
     * Checking that yourls_unique_element_id is a unique string
     *
     */
    public function test_string2htmlid() {
        $id1 = yourls_unique_element_id();
        $id2 = yourls_unique_element_id();
        $id3 = yourls_unique_element_id('foo', 10);
        $id4 = yourls_unique_element_id();
        $this->assertIsString($id1);
        $this->assertIsString($id2);
        $this->assertNotSame($id1, $id2);
        $this->assertEquals('foo10', $id3, 'ID is built using the specified prefix and counter value.');
        $this->assertStringEndsWith('11', $id4, 'ID counter continues to increment from the last value.');
    }

    /**
     * Generating valid regexp from the allowed charset
     */
    function test_valid_regexp() {
        $pattern = yourls_make_regexp_pattern( yourls_get_shorturl_charset() );

        /* To validate a RegExp just run it against an empty string.
           If it returns explicit false (=== false), it's broken. Otherwise it's valid.
           From: https://stackoverflow.com/a/12941133/36850
           Cool to know :)

           We're testing it as used in yourls_sanitize_keyword()
           TODO: more random char strings to test?
        */

        $this->assertNotFalse( preg_match( '![^' . $pattern . ']!', '' ) );
    }

    /**
     * Trim long strings
     */
    function test_trim_long_strings() {
        $long = "The Plague That Makes Your Booty Move... It's The Infectious Grooves";

        $trim = "The Plague That Makes Your Booty Move... It's The Infec[...]";
        $this->assertSame( $trim, yourls_trim_long_string( $long ) );

        $trim = "The Plague That Makes Your Booty[...]";
        $this->assertSame( $trim, yourls_trim_long_string( $long, 37 ) );

        $trim = "The Plague That Makes Your Booty Mo..";
        $this->assertSame( $trim, yourls_trim_long_string( $long, 37, '..' ) );
    }

    /**
     * Return true for UTF8 strings
     *
     * Note: As of 1.7.1, function yourls_seem_utf8() is still unused. In 2.0 consider simply deleting it if still not needed
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('valid_utf8')]
    function test_is_utf8( $string ) {
        $this->assertTrue( yourls_seems_utf8( $string ) );
    }

    /**
     * Return false for non UTF8 strings
     *
     * Note: As of 1.7.1, function yourls_seem_utf8() is still unused. In 2.0 consider simply deleting it if still not needed
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('invalid_utf8')]
    function test_is_not_utf8( $string ) {
        $this->assertFalse( yourls_seems_utf8( $string ) );
    }

    static function valid_utf8() {
        return self::get_data( YOURLS_TESTDATA_DIR . '/formatting/utf-8.txt' );
    }

    static function invalid_utf8() {
        return self::get_data( YOURLS_TESTDATA_DIR . '/formatting/big5.txt' );
    }

    /**
     * Parse a file and return its content as a data provider
     */
    static function get_data( $filename ) {
        $strings = file( $filename );
        foreach ( $strings as &$string ) {
            $string = (array) trim( $string );
        }
        unset( $string );
        return $strings;
    }

    /**
     * Test yourls_backslashit
     */
    function test_backslashit() {
        $this->assertSame( '\h\e\l\l\o \w\o\r\l\d 123 !', yourls_backslashit( 'hello world 123 !' ) );
        $this->assertSame( '\\\1, 2, 3', yourls_backslashit( '1, 2, 3' ) );
    }

    /**
     * Test the bookmarklet generator
     *
     * Note: we're not testing that the bookmarklet generator produces valid JS code: the
     * bookmarklet class has tests for this, see https://github.com/ozh/bookmarkletgen
     * We're just testing that content is returned
     */
    function test_bookmarklet() {
        $code = yourls_make_bookmarklet( 'hello' );
        $this->assertTrue( is_string( $code ) );
    }

    /**
     * Test yourls_specialchars basics
     */
    function test_specialchars_decode_basics() {
        $html =  "&amp;&lt;hello world&gt;";
        $this->assertEquals( $html, yourls_specialchars( $html ) );

        $double = "&amp;amp;&amp;lt;hello world&amp;gt;";
        $this->assertEquals( $double, yourls_specialchars( $html, ENT_NOQUOTES, true ) );
    }

    /**
     * Test yourls_specialchars escape quotes
     */
    function test_specialchars_escapes_quotes() {
        $source = "\"'hello!'\"";
        $this->assertEquals( '"&#039;hello!&#039;"', yourls_specialchars( $source, 'single' ) );
        $this->assertEquals( "&quot;'hello!'&quot;", yourls_specialchars( $source, 'double' ) );
        $this->assertEquals( '&quot;&#039;hello!&#039;&quot;', yourls_specialchars( $source, ENT_QUOTES, true ) );
        $this->assertEquals( '&quot;&#039;hello!&#039;&quot;', yourls_specialchars( $source, 'omg', true ) ); // unaccepted value should be treated as ENT_QUOTES
        $this->assertEquals( $source, yourls_specialchars( $source ) );
    }

    /**
     * Test yourls_specialchars doesn't change allowed entities
     */
    function test_specialchars_allowed_entities() {
        foreach ( yourls_kses_allowed_entities() as $ent ) {
            $ent = '&' . $ent . ';';
            $this->assertEquals( $ent, yourls_specialchars( $ent ) );
        }
    }

    /**
     * Test yourls_specialchars with unallowed entities
     */
    function test_specialchars_unallowed_entities() {
        $ents = array( 'iacut', 'aposs', 'pos', 'apo', 'apo?', 'apo.*', '.*apo.*', 'apos ', ' apos', ' apos ' );

        foreach ( $ents as $ent ) {
            $escaped = '&amp;' . $ent . ';';
            $ent = '&' . $ent . ';';
            $this->assertEquals( $escaped, yourls_specialchars( $ent ) );
        }
    }

}
