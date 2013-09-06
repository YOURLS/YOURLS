<?php

class Translation_Tests extends PHPUnit_Framework_TestCase {

	/**
	 * Check if YOURLS text domain correctly loads
	 *
	 * @since 0.1
	 */
	public function test_load_default_textdomain() {
		if( yourls_get_locale() == 'en_US' ) {
			$this->markTestSkipped( 'Locale not defined -- cannot run translation tests' );
			return false;
		}
		
		$this->assertTrue( yourls_load_default_textdomain() );
		return yourls_get_locale();
	}

	/**
	 * Check a sample French translation if fr_FR available
	 *
	 * @depends test_load_default_textdomain
	 * @since 0.1
	 */
	public function test_translation( $locale ) {
		if( 'fr_FR' == $locale ) {
			$this->assertEquals( 'Raccourci' , yourls__( 'Shorten' ) );
		}
	}	
	

}
