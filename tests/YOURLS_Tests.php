<?php

class YOURLS_Tests extends PHPUnit_Framework_TestCase {

	/**
	 * Runs once before all tests start
	 */
	public static function setUpBeforeClass() {
		if( !defined( 'TRAVIS_TESTSUITE' ) or TRAVIS_TESTSUITE != false )
			return;
	
		// If not running in Travis environment, drop any tables from the selected database prior to starting tests
		global $ydb;
		$sql = sprintf( "SELECT group_concat(table_name) FROM information_schema.tables WHERE table_schema = '%s';", YOURLS_DB_NAME );
		try {
			$tables = $ydb->get_var( $sql );
		} catch( Exception $e ) {
			return;
		}
		if( $tables ) {
			try {
				// Log_in_File::log( $tables );
				$drop = $ydb->get_var( sprintf( 'DROP TABLE %s', $tables ) );
			} catch( Exception $e ) {
				return;
			}
		}
	}
	
	/**
	 * Runs once after all tests have ended
	 */
	public static function tearDownAfterClass() {
		// In case we have logged something, mark end of tests
		Log_in_File::close_log();
	}

	public function tester_install() {
		$this->assertTrue( yourls_check_database_version() );
		$this->assertTrue( yourls_check_php_version() );

		$this->assertTrue( yourls_create_htaccess() );
		$this->assertFileExists( YOURLS_ABSPATH . '/.htaccess' );
		
		$create = yourls_create_sql_tables();
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

/**
 * Helper class : log in a local text file, in case you need to var_dump() stuff within a test
 *
 * Usage : anywhere you would have used a regular var_dump() you can simply add:
 * Log_in_File::log( $something );
 *
 */
class Log_in_File {

	public static $has_logged = false;
	
	public static function log( $what ) {
		if( ! self::$has_logged ) {
			self::$has_logged = true;
			self::first_log();
		}
		
		ob_start();
		var_dump( $what );
		$what = ob_get_clean();
	
		error_log( $what."\n", 3, dirname( dirname( __FILE__ ) ) . '/log.txt' );
	}
	
	public static function first_log() {
		self::log( "---------------- START TESTS ----------------" );
	}
	
	public static function close_log() {
		if( self::$has_logged ) {
			self::log( "------------------ END TESTS ----------------" );
		}
	}
}