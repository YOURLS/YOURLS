<?php

/**
 * Escaping formatting functions.
 * Note: tests about escaping and sanitizing URLs are in URLTest.php
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
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('html_attributes')]
    function test_esc_attr( $attr, $escaped ) {
        $this->assertSame( $escaped, yourls_esc_attr( $attr ) );
    }

    /**
     * Attribute escaping -- escaping twice shouldn't change
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
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('html_strings')]
    function test_esc_html( $html, $escaped ) {
        $this->assertSame( $escaped, yourls_esc_html( $html ) );
        // Double escaping shouldn't change
        $this->assertSame( $escaped, yourls_esc_html( yourls_esc_html( $html ) ) );
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
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('list_of_textarea')]
    function test_esc_textarea( $text, $escaped ) {
        $this->assertEquals( $escaped, yourls_esc_textarea( $text ) );
    }

    /**
     * Strings, whitelist of allowed tags/attributes, and expected escaped output
     */
    static function list_of_whitelisted_html(): \Iterator
    {
        // yield array( 'string to escape', 'allowed tags/attributes', 'expected escaped output' );

        yield 'empty whitelist escapes everything' => array(
            '<b>only</b>',
            array(),
            '&lt;b&gt;only&lt;/b&gt;',
        );
        // Allowed tag is un-escaped, the rest stays escaped
        yield 'allowed tag, disallowed tag' => array(
            '<b>bold</b> <i>x</i>',
            array( 'b' => array() ),
            '<b>bold</b> &lt;i&gt;x&lt;/i&gt;',
        );
        // Text content of an allowed tag is still escaped
        yield 'text content stays escaped' => array(
            '<b>x & y < z</b>',
            array( 'b' => array() ),
            '<b>x &amp; y &lt; z</b>',
        );
        // Tag matching is case-insensitive and output is lowercased
        yield 'tag name is case-insensitive' => array(
            '<B>x</B>',
            array( 'b' => array() ),
            '<b>x</b>',
        );
        // An allowed tag with an empty attribute list keeps the tag but strips attributes
        yield 'attributes stripped when none allowed' => array(
            '<b class="foo">x</b>',
            array( 'b' => array() ),
            '<b>x</b>',
        );
        // An allowed attribute is kept...
        yield 'allowed attribute kept' => array(
            '<a href="http://example.com">link</a>',
            array( 'a' => array( 'href' => true ) ),
            '<a href="http://example.com">link</a>',
        );
        // ...while non-whitelisted attributes on the same tag are dropped
        yield 'disallowed attribute dropped' => array(
            '<a href="http://example.com" onclick="evil()">x</a>',
            array( 'a' => array( 'href' => true ) ),
            '<a href="http://example.com">x</a>',
        );
        // Single-quoted attribute values are normalized to double quotes
        yield 'single quotes normalized to double quotes' => array(
            "<a href='http://example.com'>x</a>",
            array( 'a' => array( 'href' => true ) ),
            '<a href="http://example.com">x</a>',
        );
        // The allowed tag/attribute map itself is case-insensitive
        yield 'whitelist keys are case-insensitive' => array(
            '<A HREF="http://example.com">x</A>',
            array( 'A' => array( 'HREF' => true ) ),
            '<a href="http://example.com">x</a>',
        );
        // href values are sanitized: a javascript: scheme is neutralized to an empty URL
        yield 'javascript scheme in href is neutralized' => array(
            '<a href="javascript:alert(1)">x</a>',
            array( 'a' => array( 'href' => true ) ),
            '<a href="">x</a>',
        );
    }

    /**
     * Escape HTML but allow a whitelist of tags and attributes
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('list_of_whitelisted_html')]
    function test_esc_html_with_whitelist( $string, $allowed, $escaped ) {
        $this->assertSame( $escaped, yourls_esc_html_with_whitelist( $string, $allowed ) );
    }

    /**
     * With no whitelist argument, yourls_esc_html_with_whitelist() is equivalent to yourls_esc_html()
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('html_strings')]
    function test_esc_html_with_whitelist_defaults_to_esc_html( $html, $escaped ) {
        $this->assertSame( yourls_esc_html( $html ), yourls_esc_html_with_whitelist( $html ) );
        $this->assertSame( $escaped, yourls_esc_html_with_whitelist( $html ) );
    }

}
