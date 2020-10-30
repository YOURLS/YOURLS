<?php

/**
 * Localization domain functions
 *
 * @group l10n
 * @since 0.1
 */
class Translation_Domain_Tests extends PHPUnit_Framework_TestCase {

    public static function tearDownAfterClass() {
        yourls_unload_textdomain( 'test' );
        yourls_unload_textdomain( 'default' );
    }

    /**
     * Check if YOURLS text domain correctly loads
     *
     * @since 0.1
     */
    public function test_load_default_textdomain() {
        $this->assertTrue( yourls_load_default_textdomain() );
        $this->assertTrue( yourls_is_textdomain_loaded( 'default' ) );
    }

    /**
     * Load custom fake domains - should raise an error
     *
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessageRegExp /Cannot read file [0-9a-z]+\/[0-9a-z]+-fr_FR\.mo\. Make sure there is a language file installed. More info: http:\/\/yourls\.org\/translations/
     * @since 0.1
     */
    public function test_custom_fake_domain() {
        yourls_load_custom_textdomain( rand_str(), rand_str() );
    }

    /**
     * Unload fake domains
     *
     * @since 0.1
     */
    public function test_unload_fake_domain() {
        $fake_domain = rand_str();
        $this->assertFalse( yourls_is_textdomain_loaded( $fake_domain ) );
        $this->assertFalse( yourls_unload_textdomain( $fake_domain ) );
    }

    /**
     * Check if valid custom text domain correctly loads
     *
     * @since 0.1
     */
    public function test_load_custom_domain() {
        $this->assertTrue( yourls_load_textdomain( 'test', YOURLS_TESTDATA_DIR . '/pomo/test-fr_FR.mo' ) );
        $this->assertTrue( yourls_is_textdomain_loaded( 'test' ) );
    }

    /**
     * Custom domain unloading
     *
     * @depends test_load_custom_domain
     * @since 0.1
     */
    public function test_custom_domain_unload() {
        $this->assertTrue( yourls_unload_textdomain( 'test' ) );
        $this->assertFalse( yourls_unload_textdomain( 'test' ) );
    }

}
