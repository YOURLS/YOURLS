<?php

/**
 * General formatting functions.
 *
 * @group formatting
 * @since 0.1
 */
class Option_Format_General extends PHPUnit_Framework_TestCase {

	/**
	 * Serialized data. Stolen from WP.
	 *
	 * @since 0.1
	 */
	public function test_is_serialized() {
		$cases = array(
			serialize(null),
			serialize(true),
			serialize(false),
			serialize(-25),
			serialize(25),
			serialize(1.1),
			serialize('this string will be serialized'),
			serialize("a\nb"),
			serialize(array()),
			serialize(array(1,1,2,3,5,8,13)),
			serialize( (object)array('test' => true, '3', 4) )
		);
		foreach ( $cases as $case )
			$this->assertTrue( yourls_is_serialized($case), "Serialized data: $case" );

		$not_serialized = array(
			'a string',
			'garbage:a:0:garbage;',
			// 'b:4;',  // this test fails in WP test suite, not sure if intentional or what...
			's:4:test;'
		);
		foreach ( $not_serialized as $case )
			$this->assertFalse( yourls_is_serialized($case), "Test data: $case" );
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
	 * Generating valid regexp from the allowed charset
	 *
	 * @since 0.1
	 */
    function test_valid_regexp() {
        $pattern = yourls_make_regexp_pattern( yourls_get_shorturl_charset() );
        
        /* To validate a RegExp just run it against null.
           If it returns explicit false (=== false), it's broken. Otherwise it's valid.
           From: http://stackoverflow.com/a/12941133/36850
           Cool to know :)
           
           We're testing it as used in yourls_sanitize_string()
           TODO: more random char strings to test?           
        */
    
        $this->assertFalse( preg_match( '![^' . $pattern . ']!', null ) === false );
    }
    
	/**
	 * Sanitize titles
	 *
	 * @since 0.1
	 */
    function test_sanitize_title() {
        $expected = "How Will I Laugh Tomorrow When I Can't Even Smile Today";
        $unsane   = "How <strong>Will</strong> I Laugh Tomorrow <em>When I Can't Even Smile Today</em>";
        $this->assertSame( $expected, yourls_sanitize_title( $unsane ) );
        
        $expected = 'Twilight of the Thunder God';
        $unsane   = 'Twilight <bleh omg="wtf" >of</bleh> the <blah something>Thunder God';
        $this->assertSame( $expected, yourls_sanitize_title( $unsane ) );
    }
    
	/**
	 * Sanitize titles with fallback
	 *
	 * @since 0.1
	 */
    function test_sanitize_title_with_fallback() {
        $fallback = rand_str();
        $expected = '';
        $unsane   = '<tag></tag><omg>';
        $this->assertSame( $expected, yourls_sanitize_title( $unsane ) );
        $this->assertSame( $fallback, yourls_sanitize_title( $unsane, $fallback ) );
    }
    
}
