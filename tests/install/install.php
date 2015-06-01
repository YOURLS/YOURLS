<?php

/**
 * Checks install misc functions
 *
 * @group install
 */
class Install_Tests extends PHPUnit_Framework_TestCase {

    /**
	 * Check if YOURLS is declared installed
	 *
	 * @since 0.1
	 */
	public function test_install() {
		$this->assertFalse( yourls_is_installed() );
		yourls_get_all_options();
		$this->assertTrue( yourls_is_installed() );
	}

	/**
	 * Check that tables were correctly populated during install
	 *
	 * @since 0.1
	 */
	public function test_init_tables() {
		// This should fail because these inserts have been taken care of during install
		$this->assertFalse( yourls_initialize_options() );
		$this->assertFalse( yourls_insert_sample_links() );
	}

	/**
	 * Test (sort of) table creation
	 *
	 * @since 0.1
	 */
	public function test_create_tables() {
        
        /* The expected result has:
         *   - success messages: the table are created with a "CREATE IF NOT EXISTS",
         *     hence, will not be recreated once more, they're already created
         *     upon install procedure
         *   - error messages: the function cannot initalize options and links, since
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

}
