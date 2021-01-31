<?php

/**
 * Header plugin functions
 *
 * @group plugins
 * @since 0.1
 */
class Plugin_Header_Tests extends PHPUnit\Framework\TestCase {

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

}
