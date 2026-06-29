<?php

/**
 * Header plugin functions
 */
#[\PHPUnit\Framework\Attributes\Group('plugins')]
class HeadersTest extends PHPUnit\Framework\TestCase {

    /**
     * Regular header
     */
    public function test_regular_header() {
        $expected = array(
          'Plugin Name' => 'regular',
          'Plugin URI'  => 'regular',
          'Description' => 'regular',
          'Version'     => 'regular',
          'Author'      => 'regular',
          'Author URI'  => 'regular',
        );
        $this->assertEquals($expected, yourls_get_plugin_data( YOURLS_PLUGINDIR . '/headers/header_regular.php' ) );
    }

    /**
     * PHPDoc header
     */
    public function test_phpdoc_header() {
        $expected = array(
          'Plugin Name' => 'phpdoc',
          'Description' => 'phpdoc',
          'Plugin URI'  => 'phpdoc',
          'Version'     => 'phpdoc',
          'Author'      => 'phpdoc',
          'Author URI'  => 'phpdoc',
        );
        $this->assertEquals($expected, yourls_get_plugin_data( YOURLS_PLUGINDIR . '/headers/header_phpdoc.php' ) );
    }

    /**
     * Incomplete header
     */
    public function test_incomplete_header() {
        $expected = array(
          'Plugin Name' => 'incomplete',
          'Description' => 'incomplete',
        );
        $this->assertEquals($expected, yourls_get_plugin_data( YOURLS_PLUGINDIR . '/headers/header_incomplete.php' ) );

    }

    /**
     * Incorrect header
     */
    public function test_incorrect_header() {
        $this->assertEquals( [] , yourls_get_plugin_data( YOURLS_PLUGINDIR . '/headers/header_incorrect.php' ) );
    }

    /**
     * Missing header
     */
    public function test_missing_header() {
        $this->assertEquals( [] , yourls_get_plugin_data( YOURLS_PLUGINDIR . '/headers/header_missing.php' ) );
    }

    /**
     * Missing header - no comment at all
     */
    public function test_missing_header_no_comment() {
        $this->assertEquals( [] , yourls_get_plugin_data( YOURLS_PLUGINDIR . '/headers/header_nocomment.php' ) );
    }

    /**
     * Header containing HTML.
     *
     * Only the Description field allows a few whitelisted tags (see yourls_get_plugin_data()),
     * every other field is fully escaped.
     */
    public function test_html_in_header() {
        $data = yourls_get_plugin_data( YOURLS_PLUGINDIR . '/headers/header_html.php' );

        // Non-Description fields are fully escaped: no tag survives.
        $this->assertSame( 'HTML &lt;script&gt;alert(1)&lt;/script&gt;', $data['Plugin Name'] );
        $this->assertSame( '&lt;b&gt;Bold&lt;/b&gt; Author', $data['Author'] );
        // & in a URL is encoded too
        $this->assertSame( 'https://example.com/?a=1&amp;b=2', $data['Plugin URI'] );
    }

    /**
     * The Description field keeps whitelisted inline tags...
     */
    public function test_html_in_description_keeps_whitelisted_tags() {
        $data = yourls_get_plugin_data( YOURLS_PLUGINDIR . '/headers/header_html.php' );
        $desc = $data['Description'];

        $this->assertStringContainsString( '<strong>bold</strong>', $desc );
        $this->assertStringContainsString( '<em>italic</em>', $desc );
        $this->assertStringContainsString( '<code>some_code()</code>', $desc );
        // <a> keeps its whitelisted href and title attributes
        $this->assertStringContainsString( '<a href="https://example.com" title="Homepage">homepage</a>', $desc );
    }

    /**
     * ...but escapes tags that are not whitelisted, and sanitizes attributes.
     */
    public function test_html_in_description_escapes_disallowed() {
        $data = yourls_get_plugin_data( YOURLS_PLUGINDIR . '/headers/header_html.php' );
        $desc = $data['Description'];

        // Not whitelisted: escaped, not rendered
        $this->assertStringNotContainsString( '<script>', $desc );
        $this->assertStringContainsString( '&lt;script&gt;alert(&#039;xss&#039;)&lt;/script&gt;', $desc );
        $this->assertStringNotContainsString( '<span>', $desc );
        $this->assertStringContainsString( '&lt;span&gt;span&lt;/span&gt;', $desc );

        // Non-whitelisted attribute (onclick) is dropped
        $this->assertStringNotContainsString( 'onclick', $desc );

        // A javascript: href is neutralized to an empty URL
        $this->assertStringContainsString( '<a href="">js link</a>', $desc );
    }

}
