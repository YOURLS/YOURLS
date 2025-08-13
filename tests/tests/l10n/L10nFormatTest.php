<?php

/**
 * Localization date & calendar & formatting functions
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('l10n')]
class L10nFormatTest extends PHPUnit\Framework\TestCase {

    public function setUp(): void {
        yourls_load_textdomain( 'default', YOURLS_TESTDATA_DIR . '/pomo/fr_FR.mo' );
        global $yourls_locale_formats;
        $yourls_locale_formats = new YOURLS_Locale_Formats();
        /* Honestly, I don't know why we have to manually set $yourls_locale_formats.
         *
         * If we don't, tests don't pass because right after PHPUnit is instanciated,
         * the global variable $yourls_locale_formats is populated with default (hence
         * untranslated) values. Why? I don't know, I guess it has to do with how PHPUnit
         * parses files before running actual tests. As a result, functions with tests like
         * if(!isset($yourls_locale_formats)) {$yourls_locale_formats = new ... }
         * are never picked up and the variable is never set to its localized content.
         *
         * In YOURLS itself, no need to manually set things like this.
         *
         * Also, this needs to be in setUp(), setUpBeforeClass(): void doesn't fix things. Again,
         * no idea why and don't want to bother understanding.
         */
    }

    public function tearDown(): void {
        yourls_unload_textdomain( 'default' );
    }

    /**
     * Number formatting with locale
     *
     * @since 0.1
     */
    public function test_number_format() {
        $this->assertSame( '1 337', yourls_number_format_i18n( 1337 ) );
        $this->assertSame( '7', yourls_number_format_i18n( 6.66 ) );
        $this->assertSame( '6,66', yourls_number_format_i18n( 6.66, 2 ) );
    }

    /**
     * Date formatting with locale (the format isn't specified in the .po/mo files, default locale will be used)
     *
     * @since 0.1
     */
    public function test_date_format() {
        $date = strtotime( '15 February 2000' ); // nothing special with this date, we just want a date in February :)
        $this->assertSame( 'Fév', yourls_date_i18n( "M", $date ) );
    }

    /**
     * yourls_l10n_months
     *
     * @since 0.1
     */
    public function test_yourls_l10n_months() {
        $this->assertTrue( is_array( yourls_l10n_months() ) );
    }

    /**
     * yourls_l10n_month_abbrev
     *
     * @since 0.1
     */
    public function test_yourls_l10n_month_abbrev() {
        $this->assertTrue( is_array( yourls_l10n_month_abbrev() ) );
        $this->assertSame( 'Fév', yourls_l10n_month_abbrev( 2 ) );
        $this->assertSame( 'Fév', yourls_l10n_month_abbrev( '02' ) );
        $this->assertSame( 'Fév', yourls_l10n_month_abbrev( 'February' ) );
    }

    /**
     * yourls_l10n_weekday_abbrev
     *
     * @since 0.1
     */
    public function test_yourls_l10n_weekday_abbrev() {
        $this->assertTrue( is_array( yourls_l10n_weekday_abbrev() ) );
        $this->assertSame( 'Lun', yourls_l10n_weekday_abbrev( 1 ) );
        $this->assertSame( 'Lun', yourls_l10n_weekday_abbrev( 'Monday' ) );
    }

    /**
     * yourls_l10n_weekday_initial
     *
     * @since 0.1
     */
    public function test_yourls_l10n_weekday_initial() {
        $this->assertTrue( is_array( yourls_l10n_weekday_initial() ) );
        $this->assertSame( 'L', yourls_l10n_weekday_initial( 1 ) );
        $this->assertSame( 'L', yourls_l10n_weekday_initial( 'Monday' ) );
    }

    /**
     * Just checking the esc_*__ functions return a string, the escaping part is tested in /format/*
     *
     * @since 0.1
     */
    public function test_esc_funcs() {
        $this->assertSame( 'omg', yourls_esc_attr__( 'omg' ) );
        $this->assertSame( 'lol', yourls_esc_html__( 'lol' ) );
        $this->assertSame( 'wtf', yourls_esc_attr_x( 'wtf', 'some context' ) );
        $this->assertSame( 'bye', yourls_esc_html_x( 'bye', 'some context' ) );

        $this->expectOutputString( 'yeahwoot' );
        yourls_esc_attr_e( 'yeah' );
        yourls_esc_html_e( 'woot' );
    }

}
