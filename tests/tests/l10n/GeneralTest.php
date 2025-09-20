<?php

/**
 * Localization helper functions
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('l10n')]
class GeneralTest extends PHPUnit\Framework\TestCase {

    protected $locale_backup;

    protected function setUp(): void {
        global $yourls_locale;
        $this->locale_backup = $yourls_locale;
    }

    protected function tearDown(): void {
        global $yourls_locale;
        $yourls_locale = $this->locale_backup;
    }

    /**
     * Check yourls_is_rtl() returns bool
     *
     * @since 0.1
     */
    public function test_is_rtl() {
        $this->assertTrue( is_bool( yourls_is_rtl() ) );
    }

    /**
     * Check yourls_get_locale() gets config setting
     *
     * @since 0.1
     */
    public function test_get_locale_from_config() {
        $this->assertSame( 'fr_FR' , yourls_get_locale() );
    }

    /**
     * Test yourls_get_locale() with custom value
     *
     * @since 0.1
     */
    public function test_get_locale() {
        global $yourls_locale;

        $yourls_locale = rand_str();
        $this->assertSame( $yourls_locale , yourls_get_locale() );

        $yourls_locale = false;
        $this->assertSame( '' , yourls_get_locale() );
    }

    /**
     * Get available languages
     *
     * @since 0.1
     */
    public function test_get_languages() {
        $this->assertEquals( array( 'fr_FR', 'test-fr_FR' ), yourls_get_available_languages() );
        $this->assertEquals( array( 'fr_FR', 'test-fr_FR' ), yourls_get_available_languages( YOURLS_TESTDATA_DIR . '/pomo/' ) );
    }

}
