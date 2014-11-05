<?php

/**
 * Escaping formatting functions.
 * Tests about escaping and sanitizing URLs are in urls.php
 *
 * @since 0.1
 */
class Option_Format_Esc extends PHPUnit_Framework_TestCase {

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
    
}