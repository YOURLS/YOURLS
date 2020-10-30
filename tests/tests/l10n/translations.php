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
        yourls_load_textdomain( 'default', YOURLS_TESTDATA_DIR . '/pomo/fr_FR.mo' );
    }

    public static function tearDownAfterClass() {
        yourls_unload_textdomain( 'test' );
        yourls_unload_textdomain( 'default' );
    }

    /**
     * Check a sample translation - returned
     *
     * @since 0.1
     */
    public function test_translation() {
        $this->assertSame( 'Court (default)' , yourls__( 'Short' ) );
        $this->assertSame( 'Court (test)' ,    yourls__( 'Short', 'test' ) );
    }

    /**
     * Check a sample translation - echoed
     *
     * @since 0.1
     */
    public function test_translation_echo() {
        $this->expectOutputString( 'Court (default)' );
        yourls_e( 'Short' );
    }

    /**
     * Check an unstranslated string
     *
     * @since 0.1
     */
    public function test_untranslated_string() {
        $this->assertSame( 'Untranslated string', yourls__( 'Untranslated string' ) );
        $this->assertSame( 'Untranslated string', yourls__( 'Untranslated string', 'test' ) );
    }

    /**
     * Check a random string
     *
     * @since 0.1
     */
    public function test_random_string() {
        $rand_string = rand_str();
        $this->assertSame( $rand_string, yourls__( $rand_string ) );
        $this->assertSame( $rand_string, yourls__( $rand_string, 'test' ) );
    }

    /**
     * Sprintf'ed translation
     *
     * @since 0.1
     */
    public function test_yourls_s() {
        $this->assertSame( 'Chaine avec omg (default)', yourls_s( 'String with %s', 'omg' ) );
        $this->assertSame( 'Chaine avec omg (test)',    yourls_s( 'String with %s', 'omg', 'test' ) );
    }

    /**
     * Sprintf'ed translation, echoed
     *
     * @since 0.1
     */
    public function test_yourls_se() {
        $this->expectOutputString( 'Chaine avec omg (test)' );
        yourls_se( 'String with %s', 'omg', 'test' );
    }

    /**
     * Sprintf'ed with too few arguments - trigger sprintf "too few arguments" error
     *
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage sprintf(): Too few arguments
     * @since 0.1
     */
    public function test_yourls_s_too_few() {
        yourls_s( 'Hello %s you are %s', 'Ozh' );
    }

    /**
     * Sprintf'ed with arbitrary number of arguments
     *
     * @since 0.1
     */
    public function test_yourls_s_too_many() {
        // Expected number of arguments, + the domain
        $this->assertSame( 'Bonjour Ozh tu es nice (default)', yourls_s( 'Hello %s you are %s', 'Ozh', 'nice' ) );
        $this->assertSame( 'Bonjour Ozh tu es nice (test)',    yourls_s( 'Hello %s you are %s', 'Ozh', 'nice', 'test' ) );

        // Extra arguments with the last one not being a valid domain: string should be translated
        $this->assertSame( 'Hello Ozh you are nice', yourls_s( 'Hello %s you are %s', 'Ozh', 'nice', 'omg' ) );

        // Extra arguments with the last one being a valid domain: string should be translated
        $this->assertSame( 'Bonjour Ozh tu es nice (test)', yourls_s( 'Hello %s you are %s', 'Ozh', 'nice', 'omg', 'test' ) );
    }

    /**
     * Translation with context
     *
     * @since 0.1
     */
    public function test_yourls_x() {
        $this->assertSame( 'Chaine simple (default)', yourls_x( 'Simple string', 'data' ) );
        $this->assertSame( 'Chaine simple (test)', yourls_x( 'Simple string', 'data', 'test' ) );
    }

    /**
     * Translation with context, echoed
     *
     * @since 0.1
     */
    public function test_yourls_xe() {
        $this->expectOutputString( 'Chaine simple (test)' );
        yourls_xe( 'Simple string', 'data', 'test' );
    }

    /**
     * Translation with invalid context - string returned untranslated
     *
     * @since 0.1
     */
    public function test_yourls_x_invalid() {
        $this->assertSame( 'Simple string', yourls_x( 'Simple string', rand_str() ) );
        $this->assertSame( 'Simple string', yourls_x( 'Simple string', rand_str(), 'test' ) );
    }

    /**
     * Translation with numbers
     *
     * @since 0.1
     */
    public function test_yourls_n() {
        $this->assertSame( '1 truc (default)',   yourls_n( '1 item', '%s items', 1 ) );
        $this->assertSame( '%s trucs (default)', yourls_n( '1 item', '%s items', 2 ) );

        $this->assertSame( '1 truc (test)',   yourls_n( '1 item', '%s items', 1, 'test' ) );
        $this->assertSame( '%s trucs (test)', yourls_n( '1 item', '%s items', 2, 'test' ) );
    }

    /**
     * Translation with numbers and context
     *
     * @since 0.1
     */
    public function test_yourls_nx() {
        $this->assertSame( '1 ressort (default)',   yourls_nx( '1 spring', '%s springs', 1, 'boing' ) );
        $this->assertSame( '%s ressorts (default)', yourls_nx( '1 spring', '%s springs', 2, 'boing' ) );
        $this->assertSame( '1 source (default)',   yourls_nx( '1 spring', '%s springs', 1, 'water' ) );
        $this->assertSame( '%s sources (default)', yourls_nx( '1 spring', '%s springs', 2, 'water' ) );

        $this->assertSame( '1 ressort (test)',   yourls_nx( '1 spring', '%s springs', 1, 'boing', 'test' ) );
        $this->assertSame( '%s ressorts (test)', yourls_nx( '1 spring', '%s springs', 2, 'boing', 'test' ) );
        $this->assertSame( '1 source (test)',   yourls_nx( '1 spring', '%s springs', 1, 'water', 'test' ) );
        $this->assertSame( '%s sources (test)', yourls_nx( '1 spring', '%s springs', 2, 'water', 'test' ) );
    }

}
