<?php

class Translation_Tests extends PHPUnit_Framework_TestCase {

	/**
	 * Check if YOURLS text domain correctly loads
	 *
	 * @since 0.1
	 */
	public function test_load_default_textdomain() {
		if( yourls_get_locale() == '' ) {
			$this->markTestSkipped( 'Locale not defined -- cannot run translation tests' );
			return false;
		}
		
		$this->assertTrue( yourls_load_default_textdomain() );
		return yourls_get_locale();
	}
    

	/**
	 * Check a sample French translation if fr_FR available.
	 *
	 * @depends test_load_default_textdomain
	 * @since 0.1
	 */
	public function test_translation( $locale ) {
		if( 'fr_FR' == $locale ) {
			$this->assertEquals( 'Raccourci' , yourls__( 'Shorten' ) );
		}
	}	
    
	
	/**
	 * Check a random string
	 *
	 * @since 0.1
	 */
    public function test_random_string() {
        $rand_string = rand_str();
        $this->assertEquals( $rand_string, yourls__( $rand_string ) );
    }

    
	/**
	 * Unload domains
	 *
	 * @since 0.1
	 */
    public function test_unload_domain() {
        $fake_domain = rand_str();
        $this->assertFalse( yourls_is_textdomain_loaded( $fake_domain ) );
        $this->assertFalse( yourls_unload_textdomain( $fake_domain ) );
        $this->assertTrue( yourls_is_textdomain_loaded( 'default' ) );
        $this->assertTrue( yourls_unload_textdomain( 'default' ) );
        $this->assertFalse( yourls_unload_textdomain( 'default' ) );
    }

	/**
	 * Custom domain loading with French translations
	 *
	 * @since 0.1
	 */
    public function test_custom_domain_load() {
		if( yourls_get_locale() != 'fr_FR' ) {
			$this->markTestSkipped( 'Custom domain tests skipped -- locale is not "fr_FR"' );
			return false;
		}
        $this->assertFalse( yourls_is_textdomain_loaded( 'test' ) );
        $this->assertTrue( yourls_load_custom_textdomain( 'test', YOURLS_TESTDATA_DIR . '/pomo/' ) );
        $this->assertTrue( yourls_is_textdomain_loaded( 'test' ) );
    }

	/**
	 * Custom domain translations
	 *
	 * @depends test_custom_domain_load
	 * @since 0.1
	 */
    public function test_custom_domain_translations() {
        $this->assertEquals( 'Chaine simple', yourls__( 'Simple string', 'test' ) );
        $this->assertEquals( 'Chaine avec omg', yourls_s( 'String with %s', 'omg', 'test' ) );
        $this->assertEquals( '1 truc', yourls_n( '1 item', '%s items', 1, 'test' ) );
        $this->assertEquals( '%s trucs', yourls_n( '1 item', '%s items', 2, 'test' ) );
        $this->assertEquals( 'Untranslated string', yourls__( 'Untranslated string', 'test' ) );
    }

	/**
	 * Custom domain unloading
	 *
	 * @depends test_custom_domain_translations
	 * @since 0.1
	 */
    public function test_custom_domain_unload() {
        $this->assertTrue( yourls_unload_textdomain( 'test' ) );
        $this->assertFalse( yourls_unload_textdomain( 'test' ) );
    }

}
