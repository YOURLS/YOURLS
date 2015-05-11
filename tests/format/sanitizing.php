<?php

/**
 * Sanitizing functions
 *
 * @group formatting
 * @group url
 * @since 0.1
 */
class Format_Sanitize extends PHPUnit_Framework_TestCase {

    /**
     * Sanitize titles
     *
     * @since 0.1
     */
    function test_sanitize_title() {
        $expected = "How Will I Laugh Tomorrow When I Can't Even Smile Today";
        $unsane   = "How <strong>Will</strong> I Laugh Tomorrow <em>When I Can't Even Smile Today</em>";
        $this->assertSame( $expected, yourls_sanitize_title( $unsane ) );
        
        $expected = 'Twilight of the Thunder God';
        $unsane   = 'Twilight <bleh omg="wtf" >of</bleh> the <blah something>Thunder God';
        $this->assertSame( $expected, yourls_sanitize_title( $unsane ) );
    }
    
    /**
     * Sanitize titles with fallback
     *
     * @since 0.1
     */
    function test_sanitize_title_with_fallback() {
        $fallback = rand_str();
        $expected = '';
        $unsane   = '<tag></tag><omg>';
        $this->assertSame( $expected, yourls_sanitize_title( $unsane ) );
        $this->assertSame( $fallback, yourls_sanitize_title( $unsane, $fallback ) );
    }
 
    /**
     * Sanitize integers
     *
     * @since 0.1
     */
    function test_sanitize_int() {
        $fallback = rand_str();
        $expected = '';
        $unsane   = '<tag></tag><omg>';
        $this->assertSame( $expected, yourls_sanitize_title( $unsane ) );
        $this->assertSame( $fallback, yourls_sanitize_title( $unsane, $fallback ) );
    }
 
    


}
