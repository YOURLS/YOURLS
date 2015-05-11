<?php

/**
 * Escaping formatting functions.
 * Note: tests about escaping and sanitizing URLs are in urls.php
 *
 * @group formatting
 * @since 0.1
 */
class Format_Esc extends PHPUnit_Framework_TestCase {

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
     * String to escape and what they should look like once escaped
     */
    public function strings_to_escape() {
        return array(
           array( "I'm rock n' rollin'", "I\'m rock n\' rollin\'" ),
           array( 'I am "nice"', 'I am \"nice\"' ),
           array( 'Back\Slash', 'BackSlash' ),
           array( "NULL\0NULL", 'NULL\0NULL' ), // notice the quote change
        );
    }
    
    /**
     * Escape strings
     *
     * @since 0.1
     * @dataProvider strings_to_escape
     */
    public function test_yourls_escape_string( $string, $escaped ) {
        $this->assertSame( yourls_escape( $string ), $escaped );
    }

    /**
     * Escape arrays
     *
     * @since 0.1
     */
    public function test_yourls_escape_array() {
        $arrays = $this->strings_to_escape();
        $array_str = array();
        $array_esc = array();
        
        foreach( $arrays as $array ) {
            $array_str[] = $array[0];
            $array_esc[] = $array[1];
        }
        
        $this->assertSame( yourls_escape( $array_str ), $array_esc );
    }
    
}
