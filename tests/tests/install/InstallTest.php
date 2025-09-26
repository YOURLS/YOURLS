<?php

/**
 * Checks install misc functions
 */
#[\PHPUnit\Framework\Attributes\Group('install')]
class InstallTest extends PHPUnit\Framework\TestCase {

    /**
     * Check if YOURLS is declared installed
     */
    public function test_install() {
        $this->assertTrue( yourls_is_installed() );
    }

    /**
     * Check that tables were correctly populated during install
     */
    public function test_init_tables() {
        // This should fail because these inserts have been taken care of during install
        $this->assertFalse( yourls_initialize_options() );
        $this->assertFalse( yourls_insert_sample_links() );
    }

    /**
     * Test (sort of) table creation
     */
    public function test_create_tables() {

        /* The expected result has:
         *   - success messages: the table are created with a "CREATE IF NOT EXISTS",
         *     hence, will not be recreated once more, they're already created
         *     upon install procedure
         *   - error messages: the function cannot initialize options and links, since
         *     they have been populated during install procedure as well
         *
         * A more thorough test would be to mockup the DB connection and create another
         * set of tables (with another prefix for instance).
         * Well. Consider this for next DB engine maybe? :)
         */

        $expected = array(
            'success' => array (
                "Table 'yourls_url' created.",
                "Table 'yourls_options' created.",
                "Table 'yourls_log' created.",
                "YOURLS tables successfully created.",
            ),
            'error' => array (
                'Could not initialize options',
                'Could not insert sample short URLs',
            ),
        );

        $this->assertSame( $expected, yourls_create_sql_tables() );
    }

    /**
     * Test (sort of) defining constants
     */
    public function test_correct_config() {
        $test = new \YOURLS\Config\Config(YOURLS_CONFIGFILE);

        // This should return a readable file
        $readable = is_readable($test->find_config(YOURLS_CONFIGFILE));
        $this->assertTrue($readable);
        // For the record, $this->assertFileIsReadable() was introduced around PHPUnit 5.6

        // redefining YOURLS_ constants should not throw any error ("constant already defined...")
        // or define any new constants
        $consts = get_defined_constants(true);
        $before = $consts['user'];
        $test->define_core_constants();
        $consts = get_defined_constants(true);
        $after = $consts['user'];
        $this->assertSame($before,$after);
    }

    /**
     * Test incorrect config provided
     */
    public function test_incorrect_config() {
        $this->expectException(YOURLS\Exceptions\ConfigException::class);
        $this->expectExceptionMessageMatches('/User defined config not found at \'[0-9a-z]+\'/');

        $test = new \YOURLS\Config\Config(rand_str());
        $test->find_config();
    }

    /**
     * Test config not found
     */
    public function test_not_found_config() {
        $this->expectException(YOURLS\Exceptions\ConfigException::class);
        $this->expectExceptionMessage('Cannot find config.php. Please read the readme.html to learn how to install YOURLS');

        $test = new \YOURLS\Config\Config();
        $test->set_root(rand_str());
        $test->find_config();
    }

    /**
     * Test Init actions. Not sure this is a good idea, might become cumbersome to maintain?
     */
    public function test_init_defaults() {
        $test = new \YOURLS\Config\InitDefaults();

        $expected = array (
            'include_core_funcs' => true,
            'default_timezone' => true,
            'load_default_textdomain' => true,
            'check_maintenance_mode' => true,
            'fix_request_uri' => true,
            'redirect_ssl' => true,
            'include_db' => true,
            'include_cache' => true,
            'return_if_fast_init' => true,
            'get_all_options' => true,
            'register_shutdown' => true,
            'core_loaded' => true,
            'redirect_to_install' => true,
            'check_if_upgrade_needed' => true,
            'load_plugins' => true,
            'plugins_loaded_action' => true,
            'check_new_version' => true,
            'init_admin' => true,
        );

        $actual = get_class_vars(get_class($test));

        $this->assertSame($expected, $actual);
    }

}
