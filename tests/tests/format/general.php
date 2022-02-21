<?php

/**
 * General formatting functions.
 *
 * @group formatting
 * @since 0.1
 */
class Format_General extends PHPUnit\Framework\TestCase {

    /**
     * Data to serialize
     */
    function serialize_data() {
        return array(
            array( null ),
            array( true ),
            array( false ),
            array( -25 ),
            array( 25 ),
            array( 1.1 ),
            array( 'this string will be serialized' ),
            array( "a\nb" ),
            array( array() ),
            array( array(1,1,2,3,5,8,13) ),
            array( (object)array('test' => true, '3', 4) ),
        );
    }

    /**
     * Unserialized data
     */
    function not_serialized_data() {
        return array(
            array( 'a string' ),
            array( 'garbage:a:0:garbage;' ),
            // array( 'b:4;' ), // this test fails in WP test suite, not sure if intentional or what...
            array( 's:4:test;' ),
        );
    }

    /**
     * Check that yourls_is_serialized detects serialized data
     *
     * @dataProvider serialize_data
     * @since 0.1
     */
    public function test_is_serialized( $data ) {
        $this->assertTrue( yourls_is_serialized( serialize( $data ) ) );
    }

    /**
     * Check that yourls_is_serialized doesn't assume garbage is serialized
     *
     * @dataProvider not_serialized_data
     * @since 0.1
     */
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
     * Some random keywords
     */
    public function some_random_keywords() {
        return array(
            array( '1' ),
            array( 'a' ),
            array( 'hello-world' ),
            array( '1337ozhOZH' ),
            array( '@#!?*' ),
        );
    }

    /**
     * Checking that string2htmlid is an alphanumeric string
     *
     * @dataProvider some_random_keywords
     * @since 0.1
     */
    public function test_string2htmlid( $string ) {
        $this->assertTrue( ctype_alnum( yourls_string2htmlid( $string ) ) );
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

        $this->assertFalse( preg_match( '![^' . $pattern . ']!', '' ) === false );
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
     * @dataProvider valid_utf8
     * @since 0.1
     */
    function test_is_utf8( $string ) {
        $this->assertTrue( yourls_seems_utf8( $string ) );
    }

    /**
     * Return false for non UTF8 strings
     *
     * Note: As of 1.7.1, function yourls_seem_utf8() is still unused. In 2.0 consider simply deleting it if still not needed
     *
     * @dataProvider invalid_utf8
     * @since 0.1
     */
    function test_is_not_utf8( $string ) {
        $this->assertFalse( yourls_seems_utf8( $string ) );
    }

    function valid_utf8() {
        return $this->get_data( YOURLS_TESTDATA_DIR . '/formatting/utf-8.txt' );
    }

    function invalid_utf8() {
        return $this->get_data( YOURLS_TESTDATA_DIR . '/formatting/big5.txt' );
    }

    /**
     * Parse a file and return its content as a data provider
     */
    function get_data( $filename ) {
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
        $this->assertSame( yourls_backslashit( 'hello world 123 !' ), '\h\e\l\l\o \w\o\r\l\d 123 !' );
        $this->assertSame( yourls_backslashit( '1, 2, 3' ), '\\\1, 2, 3' );
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
