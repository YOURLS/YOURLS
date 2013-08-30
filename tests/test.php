<?php

class Tests_test extends PHPUnit_Framework_TestCase {

	public function test() {
		$this->assertFalse( yourls_is_installed() );
		$this->tester_install();
		$this->assertTrue( yourls_is_installed() );
		$this->tester_theming( 'full-bootstrap' );
		$this->tester_plugining( 'hyphens-in-urls' );
		$this->tester_add_urls();
		$this->tester_generate_hit();
	}

	public function tester_install() {
			$this->assertTrue( yourls_check_database_version() );
			$this->assertTrue( yourls_check_php_version() );

			$this->assertTrue( yourls_create_htaccess() );
			$this->assertFileExists( YOURLS_ABSPATH . '.htaccess' );

			$this->assertArrayNotHasKey( 'error', yourls_create_sql_tables() );
	}

	public function tester_upgrade() {
	}

	public function tester_theming( $theme ) {
		$this->assertTrue( yourls_activate_theme( $theme ) );
		$this->assertTrue( yourls_activate_theme( 'default' ) );
	}

	public function tester_plugining( $plugin ) {
		$this->assertTrue( yourls_activate_plugin( $plugin . '/plugin.php' ) );
		$this->assertTrue( yourls_deactivate_plugin( $plugin . '/plugin.php' ) );
	}

	public function tester_add_urls() {
		$urls = array(
			array( 'http://google.com/',     'google', 'Google Here' ),
			array( 'https://github.com',     'gitgit', '' ),
			array( 'https://travis-ci.org/', '',       '' ),
			array( 'http://twitter.com',     '',       'Tweeeeet' ),
		);
	
		foreach( $urls as $url ) {
			$result = yourls_add_new_link( $url[1], $url[2], $url[3] );
			$this->assertEquals( 200, $result['statusCode'] );
		}
	}
	
	public function tester_generate_hit() {
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

	public function tester_fetch_stats() {
	}
	
	public function tester_test_api() {
	}
}