<?php
class Tests_test extends PHPUnit_Framework_TestCase {

	public function tester_install() {
		$this->assertTrue( yourls_check_database_version() );
		$this->assertTrue( yourls_check_php_version() );

		$this->assertTrue( yourls_create_htaccess() );
		$this->assertFileExists( YOURLS_ABSPATH . '/.htaccess' );

		$this->assertArrayNotHasKey( 'error', yourls_create_sql_tables() );
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

	public function tester_upgrade() {
	}


	/**
	 * @depends tester_load
	 */
	public function tester_theming( $theme = 'full-bootstrap' ) {
		$this->assertTrue( yourls_activate_theme( $theme ) );
		$this->assertTrue( yourls_activate_theme( 'default' ) );
	}

	/**
	 * @depends tester_load
	 */
	public function tester_plugining( $plugin = 'hyphens-in-urls' ) {
		$this->assertTrue( yourls_activate_plugin( $plugin . '/plugin.php' ) );
		$this->assertTrue( yourls_deactivate_plugin( $plugin . '/plugin.php' ) );
	}

	/**
	 * @depends tester_load
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
	
				$this->assertTrue( yourls_update_clicks( $keyword ) );
				$this->assertTrue( yourls_log_redirect( $keyword ) ) ;
			}
		}
	}

	/**
	 * @depends tester_generate_hits
	 */
	public function tester_fetch_stats() {
	}
	
	/**
	 * @depends tester_load
	 */
	public function tester_api() {
	}

	/**
	 * @depends tester_load
	 */
	public function tester_translation() {
	}
}