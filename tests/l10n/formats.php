<?php

/**
 * Localization date & calendar & formatting functions
 *
 * @group l10n
 * @since 0.1
 */
class Translation_Format_Tests extends PHPUnit_Framework_TestCase {

    /**
     * Number formatting with locale (the format isn't specified in the .po/mo files, default locale will be used)
     *
     * @since 0.1
     */
    public function test_number_format() {
        $this->assertSame( '1,337', yourls_number_format_i18n( 1337 ) );
        $this->assertSame( '7', yourls_number_format_i18n( 6.66 ) );
        $this->assertSame( '6.66', yourls_number_format_i18n( 6.66, 2 ) );
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
