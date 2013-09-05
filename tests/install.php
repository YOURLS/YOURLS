<?php

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
	 * Check that the DB version is correctly formatted (only digits & periods)
	 *
	 * @since 0.1
	 */
	public function test_db_version() {
		$version = yourls_get_database_version();
		$check   = preg_match( '/^(\d+\.?)+$/', $version );
		$this->assertEquals( 1, $check );
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
	 * Check .htaccess creation
	 *
	 * @since 0.1
	 */
	public function test_htaccess() {
		// On Travis, there should be no .htaccess, but there might be when run locally
		if( !yut_is_local() )
			$this->assertFileNotExists( YOURLS_ABSPATH . '/.htaccess' );
		$this->assertTrue( yourls_create_htaccess() );
		$this->assertFileExists( YOURLS_ABSPATH . '/.htaccess' );
	}

}
