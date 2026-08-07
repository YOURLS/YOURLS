<?php

/**
 * KSES functions. Most are not used in YOURLS, so there's few tests here.
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('formatting')]
class KSESTest extends PHPUnit\Framework\TestCase {

    protected $entitynames, $protocols;

    protected function setUp(): void {
        global $yourls_allowedentitynames, $yourls_allowedprotocols;
        $this->entitynames = $yourls_allowedentitynames;
        $this->protocols   = $yourls_allowedprotocols;

        $yourls_allowedentitynames = $yourls_allowedprotocols = false;
    }

    protected function tearDown(): void {
        global $yourls_allowedentitynames, $yourls_allowedprotocols;
        $yourls_allowedentitynames = $this->entitynames;
        $yourls_allowedprotocols = $this->protocols;
    }

    /**
     * Meh
     *
     * @since 0.1
     */
    function test_sanitize_title() {
        global $yourls_allowedentitynames, $yourls_allowedprotocols;

        yourls_kses_init();

        // we should now have to populated arrays
        $this->assertTrue( is_array( $yourls_allowedentitynames ) && $yourls_allowedentitynames );
        $this->assertTrue( is_array( $yourls_allowedprotocols )   && $yourls_allowedprotocols );

        // currently unused in YOURLS, maybe in the future?
        $this->assertTrue( is_array( yourls_kses_allowed_tags() ) );
        $this->assertTrue( is_array( yourls_kses_allowed_tags_all() ) );
    }

    /**
     * KSES globals are populated on 'plugins_loaded'. Make sure entity normalization
     * (yourls_esc_html) does not blow up if it runs earlier, eg yourls_die() on a DB
     * connection error before plugins are loaded
     */
    function test_esc_html_works_before_kses_init() {
        global $yourls_allowedentitynames;
        // Simulate the not-yet-initialized state
        $yourls_allowedentitynames = null;

        $escaped = yourls_esc_html( "Unknown database &eacute; <b>x</b> 'q'" );

        // No TypeError, output is escaped, and the global got lazily populated
        $this->assertIsString( $escaped );
        $this->assertStringContainsString( '&lt;b&gt;', $escaped );
        $this->assertIsArray( $yourls_allowedentitynames );
    }

    /**
     * Same early-call safety for protocol checking, which reads $yourls_allowedprotocols.
     */
    function test_is_allowed_protocol_works_before_kses_init() {
        global $yourls_allowedprotocols;
        // Simulate the not-yet-initialized state
        $yourls_allowedprotocols = null;

        // No TypeError on in_array() against a null protocols list
        $this->assertTrue( yourls_is_allowed_protocol( 'http://example.com' ) );
        $this->assertFalse( yourls_is_allowed_protocol( 'javascript:alert(1)' ) );
        $this->assertIsArray( $yourls_allowedprotocols );
    }

}
