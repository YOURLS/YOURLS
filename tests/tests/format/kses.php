<?php

/**
 * KSES functions. Most are not used in YOURLS, so there's few tests here.
 *
 * @group formatting
 * @since 0.1
 */
class Format_KSES extends PHPUnit_Framework_TestCase {

    protected $entitynames, $protocols;
    
    protected function setUp() {
        global $yourls_allowedentitynames, $yourls_allowedprotocols;
        $this->entitynames = $yourls_allowedentitynames;
        $this->protocols   = $yourls_allowedprotocols;
        
        $yourls_allowedentitynames = $yourls_allowedprotocols = false;
    }

    protected function tearDown() {
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
    
}
