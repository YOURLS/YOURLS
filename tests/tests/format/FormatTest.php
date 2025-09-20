<?php

/**
 * General formatting functions.
 *
 * @since 0.1
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
        yield array( 'garbage:a:0:garbage;' );
        // array( 'b:4;' ), // this test fails in WP test suite, not sure if intentional or what...
        yield array( 's:4:test;' );
    }

    /**
     * Check that yourls_is_serialized detects serialized data
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('serialize_data')]
    public function test_is_serialized( $data ) {
        $this->assertTrue( yourls_is_serialized( serialize( $data ) ) );
    }

    /**
     * Check that yourls_is_serialized doesn't assume garbage is serialized
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('not_serialized_data')]
    public function test_is_not_serialized( $data ) {
        $this->assertFalse( yourls_is_serialized( $data ) );
    }

    /**
     * Integer (1337) to string (3jk) to integer
     *
     * @since 0.1
     */
    public function test_int_to_string_to_int() {
        // 10 random integers
        $rnd = array();
        for( $i=0; $i<10; $i++ ) {
            $rnd[]= mt_rand( 1, 1000000 );
        }

        foreach( $rnd as $integer ) {
            $this->assertEquals( $integer, yourls_string2int( yourls_int2string( $integer ) ) );
        }

    }

    /**
     * String (3jk) to integer (1337) to string
     *
     * @since 0.1
     */
    public function test_string_to_int_to_string() {
        // 10 random strings that do not start with a zero
        $rnd = array();
        $i = 0;
        while( $i < 10 ) {
            if( $notempty = ltrim( rand_str( mt_rand( 2, 10 ) ), '0' ) ) {
                $rnd[]= $notempty;
                $i++;
            }
        }

        foreach( $rnd as $string ) {
            $this->assertEquals( $string, yourls_int2string( yourls_string2int( $string ) ) );
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
     *
     * @since 0.1
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
     *
     * @since 0.1
     */
    function test_trim_long_strings() {
        $long = "The Plague That Makes Your Booty Move... It's The Infectious Grooves";
        $trim = "The Plague That Makes Your Booty Move... It's The Infec[...]";
        $this->assertSame( $trim, yourls_trim_long_string( $long ) );

        $long = "The Plague That Makes Your Booty Move... It's The Infectious Grooves";
        $trim = "The Plague That Makes Your Booty[...]";
        $this->assertSame( $trim, yourls_trim_long_string( $long, 37 ) );

        $long = "The Plague That Makes Your Booty Move... It's The Infectious Grooves";
        $trim = "The Plague That Makes Your Booty Mo..";
        $this->assertSame( $trim, yourls_trim_long_string( $long, 37, '..' ) );
    }

    /**
     * Return true for UTF8 strings
     *
     * Note: As of 1.7.1, function yourls_seem_utf8() is still unused. In 2.0 consider simply deleting it if still not needed
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('valid_utf8')]
    function test_is_utf8( $string ) {
        $this->assertTrue( yourls_seems_utf8( $string ) );
    }

    /**
     * Return false for non UTF8 strings
     *
     * Note: As of 1.7.1, function yourls_seem_utf8() is still unused. In 2.0 consider simply deleting it if still not needed
     *
     * @since 0.1
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
     *
     * @since 0.1
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
     *
     * @since 0.1
     */
    function test_bookmarklet() {
        $code = yourls_make_bookmarklet( 'hello' );
        $this->assertTrue( is_string( $code ) );
    }

    /**
     * Test yourls_specialchars basics
     *
     * @since 0.1
     */
    function test_specialchars_decode_basics() {
        $html =  "&amp;&lt;hello world&gt;";
        $this->assertEquals( $html, yourls_specialchars( $html ) );

        $double = "&amp;amp;&amp;lt;hello world&amp;gt;";
        $this->assertEquals( $double, yourls_specialchars( $html, ENT_NOQUOTES, true ) );
    }

    /**
     * Test yourls_specialchars escape quotes
     *
     * @since 0.1
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
     *
     * @since 0.1
     */
    function test_specialchars_allowed_entities() {
        foreach ( yourls_kses_allowed_entities() as $ent ) {
            $ent = '&' . $ent . ';';
            $this->assertEquals( $ent, yourls_specialchars( $ent ) );
        }
    }

    /**
     * Test yourls_specialchars with unallowed entities
     *
     * @since 0.1
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
