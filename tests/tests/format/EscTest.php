<?php

/**
 * Escaping formatting functions.
 * Note: tests about escaping and sanitizing URLs are in urls.php
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('formatting')]
class EscTest extends PHPUnit\Framework\TestCase {

    /**
     * Attributes and how they should be escaped
     */
    static function html_attributes(): \Iterator
    {
        yield array(
            '"double quotes"',
            '&quot;double quotes&quot;',
        );
        yield array(
            "'single quotes'",
            '&#039;single quotes&#039;',
        );
        yield array(
            "'mixed' " . '"quotes"',
            '&#039;mixed&#039; &quot;quotes&quot;',
        );
        yield array(
            'foo & bar &baz; &apos;',
            'foo &amp; bar &amp;baz; &apos;',
        );
    }


    /**
     * Attribute escaping
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('html_attributes')]
    function test_esc_attr( $attr, $escaped ) {
		$this->assertSame( $escaped, yourls_esc_attr( $attr ) );
	}

    /**
     * Attribute escaping -- escaping twice shouldn't change
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('html_attributes')]
    function test_esc_attr_twice( $attr, $escaped ) {
		$this->assertSame( $escaped, yourls_esc_attr( yourls_esc_attr( $attr ) ) );
	}

    /**
     * HTML string and how they should be escaped
     */
    static function html_strings(): \Iterator
    {
        // Simple string
        yield array(
            'The quick brown fox.',
            'The quick brown fox.',
        );
        // URL with &
        yield array(
            'https://127.0.0.1/admin/admin-ajax.php?id=y1120844669&action=edit&keyword=1a&nonce=bf3115ac3a',
            'https://127.0.0.1/admin/admin-ajax.php?id=y1120844669&amp;action=edit&amp;keyword=1a&amp;nonce=bf3115ac3a',
        );
        // More ampersands
        yield array(
            'H&M and Dungeons & Dragons',
            'H&amp;M and Dungeons &amp; Dragons',
        );
        // Simple quotes
        yield array(
            "SELECT stuff FROM table WHERE blah IN ('omg', 'wtf') AND foo = 1",
            'SELECT stuff FROM table WHERE blah IN (&#039;omg&#039;, &#039;wtf&#039;) AND foo = 1',
        );
        // Double quotes
        yield array(
            'I am "special"',
            'I am &quot;special&quot;',
        );
        // Greater and less than
        yield array(
            'this > that < that <randomhtml />',
            'this &gt; that &lt; that &lt;randomhtml /&gt;',
        );
        // Ignore actual entities
        yield array(
            '&#038; &#x00A3; &#x22; &amp;',
            '&amp; &#xA3; &quot; &amp;',
        );
        // Empty string
        yield array(
            '',
            '',
        );
    }

	/**
     * HTML escaping
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('html_strings')]
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
    static function list_of_URLs(): \Iterator
    {
        yield array(
            'http://example.com/?this=that&that=this',
            'http://example.com/?this=that&#038;that=this',
        );
        yield array(
            'http://example.com/?this=that&that="this"',
            'http://example.com/?this=that&#038;that=this',
        );
        yield array(
            "http://example.com/?this=that&that='this'",
            'http://example.com/?this=that&#038;that=&#039;this&#039;',
        );
        yield array(
            "http://example.com/?this=that&that=<this>",
            'http://example.com/?this=that&#038;that=this',
        );
    }

    /**
     * Escape URLs for display
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('list_of_URLs')]
    #[\PHPUnit\Framework\Attributes\Group('url')]
    function test_esc_urls( $url, $escaped ) {
        $this->assertEquals( $escaped, yourls_esc_url( $url ) );
    }

    /**
     * Some strings and how they should be escaped in javascript
     */
    static function list_of_JS(): \Iterator
    {
        yield array(
            'hello world();',
            'hello world();',
        );
        yield array(
            'hello("world");',
            'hello(&quot;world&quot;);',
        );
        yield array(
            'foo & bar &baz; &apos;',
            'foo &amp; bar &amp;baz; &apos;',
        );
    }

    /**
     * Escape JS
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('list_of_JS')]
    function test_esc_js( $js, $escaped ) {
        $this->assertEquals( $escaped, yourls_esc_js( $js ) );
    }

    /**
     * Strings in a textarea and how they should be escaped
     */
    static function list_of_textarea(): \Iterator
    {
        yield array(
            'hello<br/>world',
            'hello&lt;br/&gt;world',
        );
        yield array(
            '"omg"',
            '&quot;omg&quot;',
        );
        yield array(
            "'omg'",
            '&#039;omg&#039;',
        );
    }

    /**
     * Escape JS
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('list_of_textarea')]
    function test_esc_textarea( $text, $escaped ) {
        $this->assertEquals( $escaped, yourls_esc_textarea( $text ) );
    }

}
