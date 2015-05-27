<?php

/**
 * Localization functions : helper functions
 *
 * @group l10n
 * @since 0.1
 */
class Translation_Translation_Tests extends PHPUnit_Framework_TestCase {
    
    public static function setUpBeforeClass() {
        yourls_load_textdomain( 'test', YOURLS_TESTDATA_DIR . '/pomo/test-fr_FR.mo' );
    }

    public static function tearDownAfterClass() {
        yourls_unload_textdomain( 'test' );
    }

    /**
     * Check a sample French translation
     *
     * @since 0.1
     */
    public function test_translation() {
        $this->assertEquals( 'Raccourci' , yourls__( 'Shorten' ) );
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
     * Custom domain translations
     *
     * @since 0.1
     */
    public function test_custom_domain_translations() {
        // this one now has context
        // $this->assertEquals( 'Chaine simple', yourls__( 'Simple string', 'test' ) );
        $this->assertEquals( 'String with omg', yourls_s( 'String with %s', 'omg' ) ); // default domain
        $this->assertEquals( 'Chaine avec omg', yourls_s( 'String with %s', 'omg', 'test' ) ); // custom domain
        $this->assertEquals( '1 truc', yourls_n( '1 item', '%s items', 1, 'test' ) );
        $this->assertEquals( '%s trucs', yourls_n( '1 item', '%s items', 2, 'test' ) );
        $this->assertEquals( 'Untranslated string', yourls__( 'Untranslated string', 'test' ) );
    }

}
