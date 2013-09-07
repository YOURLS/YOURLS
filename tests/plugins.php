<?php

class Plugins_Tests extends PHPUnit_Framework_TestCase {

	/**
	 * Check that valid plugins are found
	 *
	 * @since 0.1
	 */
	public function test_get_plugins() {
		$plugins = array_keys( yourls_get_plugins() );
		$this->assertNotEmpty( $plugins );
		
		// Pick one random plugin
		$plugin = $plugins[ array_rand( $plugins ) ];
		return $plugin;
	}

	/**
	 * Check that a random valid plugin activates correctly
	 *
	 * @depends test_get_plugins
	 * @since 0.1
	 */
	public function test_plugin_activate( $plugin ) {
		$this->assertTrue( yourls_activate_plugin( $plugin ) );
		$this->assertGreaterThan( 0, yourls_has_active_plugins() );
		$this->assertTrue( yourls_is_active_plugin( $plugin ) );
		return $plugin;
	}

	/**
	 * Check that valid plugin deactivates correctly
	 *
	 * @depends test_plugin_activate
	 * @since 0.1
	 */
	public function test_plugin_deactivate( $plugin ) {
		$this->assertTrue(  yourls_deactivate_plugin( $plugin ) );
		$this->assertFalse( yourls_is_active_plugin( $plugin ) );
	}
}
