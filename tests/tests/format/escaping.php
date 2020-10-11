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
     * Attributes and how they should be escaped
     */
    function html_attributes() {
        return array(
            array(
                '"double quotes"',
                '&quot;double quotes&quot;',
            ),
            array(
                "'single quotes'",
                '&#039;single quotes&#039;',
            ),
            array(
                "'mixed' " . '"quotes"',
                '&#039;mixed&#039; &quot;quotes&quot;',
            ),
            array(
                'foo & bar &baz; &apos;',
                'foo &amp; bar &amp;baz; &apos;',
            ),
        );
    }


    /**
	 * Attribute escaping
	 *
	 * @dataProvider html_attributes
	 * @since 0.1
	 */
	function test_esc_attr( $attr, $escaped ) {
		$this->assertSame( $escaped, yourls_esc_attr( $attr ) );
	}

    /**
	 * Attribute escaping -- escaping twice shouldn't change
	 *
	 * @dataProvider html_attributes
	 * @since 0.1
	 */
	function test_esc_attr_twice( $attr, $escaped ) {
		$this->assertSame( $escaped, yourls_esc_attr( yourls_esc_attr( $attr ) ) );
	}

    /**
     * HTML string and how they should be escaped
     */
    function html_strings() {
        return array(
            // Simple string
            array(
                'The quick brown fox.',
                'The quick brown fox.',
            ),
            // URL with &
            array(
                'https://127.0.0.1/admin/admin-ajax.php?id=y1120844669&action=edit&keyword=1a&nonce=bf3115ac3a',
                'https://127.0.0.1/admin/admin-ajax.php?id=y1120844669&amp;action=edit&amp;keyword=1a&amp;nonce=bf3115ac3a',
            ),
            // More ampersands
            array(
                'H&M and Dungeons & Dragons',
                'H&amp;M and Dungeons &amp; Dragons',
            ),
            // Simple quotes
            array(
                "SELECT stuff FROM table WHERE blah IN ('omg', 'wtf') AND foo = 1",
                'SELECT stuff FROM table WHERE blah IN (&#039;omg&#039;, &#039;wtf&#039;) AND foo = 1',
            ),
            // Double quotes
            array(
                'I am "special"',
                'I am &quot;special&quot;',
            ),
            // Greater and less than
            array(
                'this > that < that <randomhtml />',
                'this &gt; that &lt; that &lt;randomhtml /&gt;',
            ),
            // Ignore actual entities
            array(
                '&#038; &#x00A3; &#x22; &amp;',
                '&amp; &#xA3; &quot; &amp;',
            ),
            // Empty string
            array(
                '',
                '',
            ),
        );
    }

	/**
	 * HTML escaping
	 *
     * @dataProvider html_strings
	 * @since 0.1
	 */
	function test_esc_html( $html, $escaped ) {
		$this->assertSame( $escaped, yourls_esc_html( $html ) );
	}

    /**
     * String to escape and what they should look like once escaped
     */
    public function strings_to_escape() {
        return array(
           array( "I'm rock n' rollin'", "I\'m rock n\' rollin\'" ),
           array( 'I am "nice"', 'I am \"nice\"' ),
           array( 'Back\Slash', 'Back\\\Slash' ),
           array( "NULL\0NULL", 'NULL\0NULL' ), // notice the quote change
        );
    }

    /**
     * List of URLs and how they should be escaped
     */
    function list_of_URLs() {
        return array(
            array(
                'http://example.com/?this=that&that=this',
                'http://example.com/?this=that&#038;that=this',
            ),
            array(
                'http://example.com/?this=that&that="this"',
                'http://example.com/?this=that&#038;that=this',
            ),
            array(
                "http://example.com/?this=that&that='this'",
                'http://example.com/?this=that&#038;that=&#039;this&#039;',
            ),
            array(
                "http://example.com/?this=that&that=<this>",
                'http://example.com/?this=that&#038;that=this',
            ),
        );
    }

    /**
     * Escape URLs for display
     *
     * @since 0.1
     * @group url
     * @dataProvider list_of_URLs
     */
    function test_esc_urls( $url, $escaped ) {
        $this->assertEquals( $escaped, yourls_esc_url( $url ) );
    }

    /**
     * Some strings and how they should be escaped in javascript
     */
    function list_of_JS() {
        return array(
            array(
                'hello world();',
                'hello world();',
            ),
            array(
                'hello("world");',
                'hello(&quot;world&quot;);',
            ),
            array(
                'foo & bar &baz; &apos;',
                'foo &amp; bar &amp;baz; &apos;',
            ),
        );
    }

    /**
     * Escape JS
     *
     * @since 0.1
     * @dataProvider list_of_JS
     */
    function test_esc_js( $js, $escaped ) {
        $this->assertEquals( $escaped, yourls_esc_js( $js ) );
    }

    /**
     * Strings in a textarea and how they should be escaped
     */
    function list_of_textarea() {
        return array(
            array(
                'hello<br/>world',
                'hello&lt;br/&gt;world',
            ),
            array(
                '"omg"',
                '&quot;omg&quot;',
            ),
            array(
                "'omg'",
                '&#039;omg&#039;',
            ),
        );
    }

    /**
     * Escape JS
     *
     * @since 0.1
     * @dataProvider list_of_textarea
     */
    function test_esc_textarea( $text, $escaped ) {
        $this->assertEquals( $escaped, yourls_esc_textarea( $text ) );
    }

}
