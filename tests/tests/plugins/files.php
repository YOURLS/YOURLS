<?php

/**
 * File related plugin functions : find plugins, activate, deactivate, uninstall.
 *
 * @group plugins
 */
class Plugin_Files_Tests extends PHPUnit\Framework\TestCase {

    /**
	 * Reset active plugin list
	 */
    public static function tearDownAfterClass(): void {
        yourls_get_db()->set_plugins( array() );
    }

    /**
     * Return array of files from tests/data/plugins/invalid-code
     */
    public function get_invalid_code_plugins() {
        $plugins = array();
        foreach ( glob(YOURLS_PLUGINDIR . '/invalid-code/*.php') as $file ) {
            $plugins[] = array($file);
        }
        return $plugins;
    }

    /**
	 * Return one of the "valid" test plugins from tests/data/plugins
	 */
	public function pick_a_plugin() {
		$plugins = array_keys( yourls_get_plugins() );
        $plugin = $plugins[ array_rand( $plugins ) ];
        return $plugin;
    }

    /**
	 * Check that only 2 "valid" plugins are found in tests/data/plugins
	 */
	public function test_get_plugins() {
		$plugins = array_keys( yourls_get_plugins() );
		$expected = [
            '0' => 'test-plugin/plugin.php',
            '1' => 'test-plugin2/plugin.php',
        ];
		$this->assertSame($expected, $plugins);
	}

	/**
	 * Check that a random "valid" plugin file validates as a plugin file
	 */
	public function test_plugin_validate() {
        $plugin = $this->pick_a_plugin();
		$this->assertTrue( yourls_is_a_plugin_file(YOURLS_PLUGINDIR . '/' . $plugin ) );
	}

	/**
	 * Check that a nonexistent plugin file does not validate as a plugin file
	 */
	public function test_missing_plugin_validate() {
        $plugin = rand_str();
		$this->assertFalse( yourls_is_a_plugin_file(YOURLS_PLUGINDIR . '/' . $plugin ) );
	}

	/**
	 * Check that an invalid plugin file does not validate as a plugin file
     *
     * @dataProvider get_invalid_code_plugins
	 */
	public function test_invalid_plugin_validate($plugin) {
		$this->assertFalse( yourls_is_a_plugin_file($plugin) );
	}

	/**
	 * Check that a random valid plugin activates correctly
	 */
	public function test_plugin_activate() {
        $plugin = $this->pick_a_plugin();

        // Make sure the plugin.php is NOT present in get_included_files()
        // We sanitize the array to deal with different platforms (D:\hello\Windows vs /home/user/hello/Linux)
        $this->assertFalse(in_array(yourls_sanitize_filename(YOURLS_PLUGINDIR.'/'.$plugin),
            array_map('yourls_sanitize_filename', get_included_files())));

        // Activate the plugin
		$this->assertTrue( yourls_activate_plugin( $plugin ) );
		$this->assertGreaterThan( 0, yourls_has_active_plugins() );
		$this->assertTrue( yourls_is_active_plugin( $plugin ) );

		// Make sure the plugin.php is now present in get_included_files()
        $included_files = array_map('yourls_sanitize_filename', get_included_files()) ;
        $this->assertTrue(in_array(yourls_sanitize_filename(YOURLS_PLUGINDIR.'/'.$plugin), $included_files));

		// Make sure the plugin's uninstall.php is NOT present in get_included_files()
        $this->assertFalse(in_array(yourls_sanitize_filename(YOURLS_PLUGINDIR.'/'.dirname($plugin).'/uninstall.php'),$included_files));

        // We should NOT have YOURLS_UNINSTALL_PLUGIN defined
        $this->assertFalse(defined('YOURLS_UNINSTALL_PLUGIN'));

		return $plugin;
	}

	/**
	 * Check that an active plugin does not activate
	 *
	 * @depends test_plugin_activate
	 */
	public function test_plugin_activate_twice( $plugin ) {
		$this->assertNotSame( true, yourls_activate_plugin( $plugin ) );
		// Note: we assertNotSame() with true because the function either returns true or a string
    	return $plugin;
	}

    /**
    * Simulate initial plugin loading
    *
    * @depends test_plugin_activate
    */
    public function test_load_plugins( $plugin ) {
        $ydb = yourls_get_db();

        // at this point, we have exactly 1 plugin activated
        $this->assertSame( $ydb->get_plugins(), array( $plugin ) );

        // Register a nonexistent plugin to simulate one that was once activated but deleted since
        $fake_plugin = rand_str() . '/plugin.php';
        $ydb->add_plugin($fake_plugin);

        // Register a broken code plugin to simulate one that was once activated but now is broken
        $broken_plugin = $this->get_invalid_code_plugins()[ array_rand( $this->get_invalid_code_plugins() ) ][0];
        $ydb->add_plugin($broken_plugin);

        yourls_update_option( 'active_plugins', $ydb->get_plugins() );

        // Check we have 1 activated and 2 removed
        $load = yourls_load_plugins();
        $this->assertTrue( $load['loaded'] );
        $this->assertSame( $load['info'], '1 activated, 2 removed' );

        // Check only our valid plugin is left registered
        $this->assertSame( $ydb->get_plugins(), array( $plugin ) );
        $this->assertSame( 1, yourls_has_active_plugins() );
    }

	/**
	 * Check that valid plugin deactivates correctly
	 *
	 * @depends test_plugin_activate
	 */
	public function test_plugin_deactivate( $plugin ) {
		$this->assertTrue( yourls_deactivate_plugin($plugin) );
		$this->assertSame( 0, yourls_has_active_plugins() );
		$this->assertFalse( yourls_is_active_plugin($plugin) );
		return $plugin;
	}

    /**
     * Check that deactivating a plugin correctly ran the uninstall script
     *
     * @depends test_plugin_deactivate
     */
    public function test_plugin_uninstall( $plugin ) {
        // Make sure uninstall.php is NOW present in get_included_files()
        $this->assertTrue( in_array( yourls_sanitize_filename(YOURLS_PLUGINDIR . '/' . dirname($plugin) . '/uninstall.php'),
        array_map('yourls_sanitize_filename', get_included_files())) );

        // we should now have YOURLS_UNINSTALL_PLUGIN set to true
        $this->assertTrue( defined('YOURLS_UNINSTALL_PLUGIN') && YOURLS_UNINSTALL_PLUGIN );
    }

	/**
	 * Check that an missing plugin does not activate
	 */
	public function test_invalid_plugin_activate() {
        $plugin = rand_str();

		$this->assertNotSame( true, yourls_activate_plugin( $plugin ) );
		$this->assertFalse( yourls_is_active_plugin( $plugin ) );
	}

	/**
	 * Check that a missing plugin does not deactivate
	 */
	public function test_invalid_plugin_deactivate() {
        $plugin = rand_str();

		$this->assertFalse( yourls_is_active_plugin( $plugin ) );
		$this->assertNotSame( true, yourls_deactivate_plugin( $plugin ) );
	}

	/**
     * Check that a plugin with invalid code does not activate
     * @dataProvider get_invalid_code_plugins
     */
    public function test_invalid_plugin_does_not_activate($plugin) {
        $this->assertNotTrue( yourls_activate_plugin_sandbox( $plugin ) );
        $this->assertNotTrue( yourls_activate_plugin( $plugin ) );
        $this->assertNotTrue( yourls_is_active_plugin( $plugin ) );
    }
}
