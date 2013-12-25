<?php

/**
 * Formatting functions.
 *
 * @since 0.1
 */
class Option_Format extends PHPUnit_Framework_TestCase {

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
	 * Attribute escaping
	 *
	 * @since 0.1
	 */	
	function test_esc_attr() {
		$attr = '"double quotes"';
		$this->assertEquals( '&quot;double quotes&quot;', yourls_esc_attr( $attr ) );

		$attr = "'single quotes'";
		$this->assertEquals( '&#039;single quotes&#039;', yourls_esc_attr( $attr ) );

		$attr = "'mixed' " . '"quotes"';
		$this->assertEquals( '&#039;mixed&#039; &quot;quotes&quot;', yourls_esc_attr( $attr ) );

		// Handles double encoding?
		$attr = '"double quotes"';
		$this->assertEquals( '&quot;double quotes&quot;', yourls_esc_attr( yourls_esc_attr( $attr ) ) );

		$attr = "'single quotes'";
		$this->assertEquals( '&#039;single quotes&#039;', yourls_esc_attr( yourls_esc_attr( $attr ) ) );

		$attr = "'mixed' " . '"quotes"';
		$this->assertEquals( '&#039;mixed&#039; &quot;quotes&quot;', yourls_esc_attr( yourls_esc_attr( $attr ) ) );

		$out = yourls_esc_attr( 'foo & bar &baz; &apos;' );
		$this->assertEquals( "foo &amp; bar &amp;baz; &apos;", $out );
	}
	
	/**
	 * HTML escaping
	 *
	 * @since 0.1
	 */	
	function test_esc_html() {
		// Simple string
		$html = "The quick brown fox.";
		$this->assertEquals( $html, yourls_esc_html( $html ) );

		// URL with &
		$html = "https://127.0.0.1/admin/admin-ajax.php?id=y1120844669&action=edit&keyword=1a&nonce=bf3115ac3a";
		$escaped = "https://127.0.0.1/admin/admin-ajax.php?id=y1120844669&amp;action=edit&amp;keyword=1a&amp;nonce=bf3115ac3a";
		$this->assertEquals( $escaped, yourls_esc_html( $html ) );
		
		// More ampersands
		$source = "H&M and Dungeons & Dragons";
		$escaped = "H&amp;M and Dungeons &amp; Dragons";
		$this->assertEquals( $escaped, yourls_esc_html($source) );

		// Simple quotes
		$html = "SELECT stuff FROM table WHERE blah IN ('omg', 'wtf') AND foo = 1";
		$escaped = "SELECT stuff FROM table WHERE blah IN (&#039;omg&#039;, &#039;wtf&#039;) AND foo = 1";
		$this->assertEquals( $escaped, yourls_esc_html( $html ) );

		// Double quotes
		$html = 'I am "special"';
		$escaped = 'I am &quot;special&quot;';
		$this->assertEquals( $escaped, yourls_esc_html( $html ) );
		
		// Greater and less than
		$source = "this > that < that <randomhtml />";
		$escaped = "this &gt; that &lt; that &lt;randomhtml /&gt;";
		$this->assertEquals( $escaped, yourls_esc_html( $source ) );
		
		// Ignore actual entities
		$source = '&#038; &#x00A3; &#x22; &amp;';
		$escaped = '&amp; &#xA3; &quot; &amp;';
		$this->assertEquals( $escaped, yourls_esc_html( $source ) );
	}

	/**
	 * URL with spaces
	 *
	 * @since 0.1
	 */		
	function test_url_with_spaces() {
		$this->assertEquals( 'http://example.com/HelloWorld', yourls_sanitize_url( 'http://example.com/Hello World' ) );
		$this->assertEquals( 'http://example.com/Hello%20World', yourls_sanitize_url( 'http://example.com/Hello%20World' ) );
	}

	/**
	 * URL with bad chars
	 *
	 * @since 0.1
	 */	
	function test_url_with_bad_characters() {
		$this->assertEquals( 'http://example.com/watchthelinefeedgo', yourls_sanitize_url( 'http://example.com/watchthelinefeed%0Ago' ) );
		$this->assertEquals( 'http://example.com/watchthelinefeedgo', yourls_sanitize_url( 'http://example.com/watchthelinefeed%0ago' ) );
		$this->assertEquals( 'http://example.com/watchthecarriagereturngo', yourls_sanitize_url( 'http://example.com/watchthecarriagereturn%0Dgo' ) );
		$this->assertEquals( 'http://example.com/watchthecarriagereturngo', yourls_sanitize_url( 'http://example.com/watchthecarriagereturn%0dgo' ) );
		//Nesting Checks
		$this->assertEquals( 'http://example.com/watchthecarriagereturngo', yourls_sanitize_url( 'http://example.com/watchthecarriagereturn%0%0ddgo' ) );
		$this->assertEquals( 'http://example.com/watchthecarriagereturngo', yourls_sanitize_url( 'http://example.com/watchthecarriagereturn%0%0DDgo' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url( 'http://example.com/%0%0%0DAD' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url( 'http://example.com/%0%0%0ADA' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url( 'http://example.com/%0%0%0DAd' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url( 'http://example.com/%0%0%0ADa' ) );
	}

	/**
	 * Test valid, missing and fake protocols
	 *
	 * @since 0.1
	 */	
	function test_url_with_protocols() {
		$this->assertEquals( 'http://example.com', yourls_sanitize_url( 'http://example.com' ) );
		$this->assertEquals( 'http://example.php', yourls_sanitize_url( 'example.php' ) );
		$this->assertEquals( '', yourls_sanitize_url( 'htttp://example.com' ) );
		$this->assertEquals( 'mailto:ozh@ozh.org', yourls_sanitize_url( 'mailto:ozh@ozh.org' ) );
		$this->assertEquals( '', yourls_sanitize_url( 'nasty://example.com/' ) );
	}

	/**
	 * Protocol and domain case
	 *
	 * @since 0.1
	 */	
	function test_url_with_protocol_case() {
		$this->assertEquals( 'http://example.com', yourls_sanitize_url( 'HTTP://example.com' ) );
		$this->assertEquals( 'http://example.com', yourls_sanitize_url( 'Http://example.com' ) );
		$this->assertEquals( 'http://example.com', yourls_sanitize_url( 'Http://ExAmPlE.com' ) );
	}
	
	/*
	More stuff to test:
	At some point, the following URLs should be equal, as this is correctly handled by YOURLS
	- http://example.org/%D0%B1%D0%B0%D0%B1%D0%B0 and http://example.org/баба
	- http://example.com/?foo%5Bbar%5D=baz and http://example.com/?foo[bar]=baz
	- http://example.com/?baz=bar&#038;foo%5Bbar%5D=baz and http://example.com/?baz=bar&foo[bar]=baz
	- ...
	*/

}