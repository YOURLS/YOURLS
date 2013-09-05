<?php

class YOURLS_Tests extends PHPUnit_Framework_TestCase {

	public function tester_install() {
		$this->assertTrue( yourls_check_database_version() );
		$this->assertTrue( yourls_check_php_version() );

		$this->assertTrue( yourls_create_htaccess() );
		$this->assertFileExists( YOURLS_ABSPATH . '/.htaccess' );
		
		$create = yourls_create_sql_tables();
		// Log_in_File::log( $create );
		$this->assertEquals( array() , $create['error'] );
	}

	/**
	 * @depends tester_install
	 */
	public function tester_load() {
		yourls_get_all_options();
		
		register_shutdown_function( 'yourls_shutdown' );
		
		yourls_do_action( 'init' );
		
		yourls_load_plugins();
		yourls_do_action( 'plugins_loaded' );

		$this->assertTrue( yourls_is_installed() );
	}

	/**
	 * @depends tester_load
	 */
	public function tester_login() {
		$this->assertTrue( yourls_is_valid_user() );
	}
	
	public function tester_upgrade() {
		$this->markTestIncomplete( 'This test has not been implemented yet.' );
	}

	/**
	 * @depends tester_load
	 * @requires function yourls_activate_theme
	 */
	public function tester_theming() {
		$this->assertTrue( yourls_activate_theme( 'full-bootstrap' ) );
		$this->assertTrue( yourls_activate_theme( 'default' ) );
	}

	/**
	 * @depends tester_load
	 */
	public function tester_plugining() {
		$this->assertTrue( yourls_activate_plugin( 'hyphens-in-urls/plugin.php' ) );
		$this->assertTrue( yourls_deactivate_plugin( 'hyphens-in-urls/plugin.php' ) );
	}

	/**
	 * @depends tester_login
	 */
	public function tester_add_urls() {
		$urls = array(
			array( 'http://google.com/',     'google', 'Google Here' ),
			array( 'https://github.com',     'gitgit', '' ),
			array( 'https://travis-ci.org/', '',       '' ),
			array( 'http://twitter.com',     '',       'Tweeeeet' ),
		);
	
		foreach( $urls as $url ) {
			$result = yourls_add_new_link( $url[0], $url[1], $url[2] );
			$this->assertEquals( 200, $result['statusCode'] );
		}
	}
	
	/**
	 * @depends tester_add_urls
	 */
	public function tester_generate_hits() {
		$keywords = array(
			'google',
			'google',
			'1',
			'inexistant',
		);

		
		foreach( $keywords as $keyword ) {
			$url = yourls_get_keyword_longurl( $keyword );

			if( !empty( $url ) ) {
				yourls_do_action( 'redirect_shorturl', $url, $keyword );
	
				$this->assertEquals( 1, yourls_update_clicks( $keyword ) );
				$this->assertEquals( 1, yourls_log_redirect( $keyword ) ) ;
			}
		}
		$this->markTestIncomplete( 'This test has not been fully implemented yet.' );
	}

	/**
	 * @depends tester_generate_hits
	 */
	public function tester_fetch_stats() {
		$this->markTestIncomplete( 'This test has not been implemented yet.' );
	}
	
	/**
	 * @depends tester_load
	 */
	public function tester_api() {
		$this->markTestIncomplete( 'This test has not been implemented yet.' );
	}

	/**
	 * @depends tester_load
	 */
	public function tester_translation() {
		$this->assertTrue( yourls_load_default_textdomain() );

		$string_translated = yourls__( 'Shorten' );
		$this->assertEquals( 'Raccourci' , $string_translated );
		
		$this->assertTrue( yourls_unload_textdomain( yourls_get_locale() ) );
	}
}
