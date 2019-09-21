<?php

/**
 * Formatting functions for URLs
 *
 * @group formatting
 * @group url
 * @since 0.1
 */
class Format_URL extends PHPUnit_Framework_TestCase {

    /**
     * List of schemes to test. Structure: array( string to test, expected scheme )
     */
    function list_of_schemes() {
        return array(
           array( 'example:80/blah'             , 'example:' ),
           array( 'example.com/blah'            , '' ),
           array( 'example.com:80/blah'         , 'example.com:' ),
           array( 'scheme://example.com:80/blah', 'scheme://' ),
           array( 'scheme:example.com'          , 'scheme:' ),
           array( 'scheme:/example.com:80/hey'  , 'scheme:' ),
           array( 'scheme:/example:80/hey'      , 'scheme:' ),
           array( 'scheme://example'            , 'scheme://' ),
           array( 'scheme:///example'           , 'scheme://' ),
           array( 'scheme+bleh:example'         , 'scheme+bleh:' ),
           array( 'scheme :example'             , '' ),
           array( 'scheme+bleh : example'       , '' ),
           array( 'scheme45:example'            , 'scheme45:' ),
           array( '45scheme:example'            , '' ),
           array( 'scheme+-.1337:example'       , 'scheme+-.1337:' ),
           array( '+scheme:example'             , '' ),
           array( 'scheme'                      , '' ),
        );
    }
    
    /**
     * Correctly get protocols
     *
     * @since 0.1
     * @dataProvider list_of_schemes
     */
    function test_correcttly_get_protocols( $test_this, $expected ) {
        $this->assertSame( yourls_get_protocol( $test_this ), $expected );
    }
    
    
    /**
     * List of valid URLs that should not be changed when sanitized
     */
    function list_of_valid_URLs() {
        return array(
            array( 'http://example.com' ),
            array( 'http://example.com/' ),
            array( 'http://ozh@example.com/' ),
            array( 'http://example.com/?@OMG' ), // #1890
            array( 'http://ozh@example.com#BLAH' ),
            array( 'http://Ozh:Password@example.com/' ),
            array( 'http://Ozh:Password@example.com#OMG' ),
            array( 'http://Ozh:Password@example.com:1337/' ),
            array( 'http://Ozh:Password@example.com:1337#OMG' ),
            array( 'http://Ozh:Password@example.com/hey@ho' ),
            array( 'http://username:password@example.com:8042/over/there/index.dtb?type=animal&name=narwhal#nose:@:@' ),
            array( 'mailto:ozh@ozh.org' ),
            array( 'http://example.com/?watchtheallowedcharacters-~+_.#=&;,/:%!*stay' ),
            array( 'http://example.com/search.php?search=(amistillhere)' ),
            array( 'http://example.com/?test=%2812345%29abcdef[gh]' ),
            array( 'http://example.com/?test=(12345)abcdef[gh]' ),
            array( 'http://[0:0:0:0:0:0:0:1]/' ),
            array( 'http://[2001:db8:1f70::999:de8:7648:6e8]:100/' ),
            array( 'http://example.com/?req=http;//blah' ), // 
        );
    }
    
    /**
     * Test that valid URLs are not modified
     *
     * @since 0.1
     * @dataProvider list_of_valid_URLs
     */
    function test_valid_urls( $url ) {
        $this->assertEquals( $url, yourls_sanitize_url( $url ) );
    }

	/**
	 * URL with spaces
	 *
	 * @since 0.1
	 */		
	function test_url_with_spaces() {
		$this->assertEquals( 'http://example.com/HelloWorld', yourls_sanitize_url( 'http://example.com/Hello World' ) );
		$this->assertEquals( 'http://example.com/Hello%20World', yourls_sanitize_url( 'http://example.com/Hello%20World' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url( 'http://example.com/ ' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url( ' http://example.com/' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url( ' http://example.com/ ' ) );
	}

	/**
	 * URL with bad chars
	 *
	 * @since 0.1
	 */	
	function test_url_with_bad_characters() {
        // regular sanitize leaves %0A & %0D alone
        $this->assertEquals( 'http://example.com/keep%0Dlinefeed%0A', yourls_sanitize_url( 'http://example.com/keep%0Dlinefeed%0A' ) );
        $this->assertEquals( 'http://example.com/%0%0%0DAD', yourls_sanitize_url( 'http://example.com/%0%0%0DAD' ) );
        
        // sanitize with anti CRLF 
		$this->assertEquals( 'http://example.com/watchthelinefeedgo', yourls_sanitize_url_safe( 'http://example.com/watchthelinefeed%0Ago' ) );
		$this->assertEquals( 'http://example.com/watchthelinefeedgo', yourls_sanitize_url_safe( 'http://example.com/watchthelinefeed%0ago' ) );
		$this->assertEquals( 'http://example.com/watchthecarriagereturngo', yourls_sanitize_url_safe( 'http://example.com/watchthecarriagereturn%0Dgo' ) );
		$this->assertEquals( 'http://example.com/watchthecarriagereturngo', yourls_sanitize_url_safe( 'http://example.com/watchthecarriagereturn%0dgo' ) );

		//Nesting Checks
		$this->assertEquals( 'http://example.com/watchthecarriagereturngo', yourls_sanitize_url_safe( 'http://example.com/watchthecarriagereturn%0%0ddgo' ) );
		$this->assertEquals( 'http://example.com/watchthecarriagereturngo', yourls_sanitize_url_safe( 'http://example.com/watchthecarriagereturn%0%0DDgo' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url_safe( 'http://example.com/%0%0%0DAD' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url_safe( 'http://example.com/%0%0%0ADA' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url_safe( 'http://example.com/%0%0%0DAd' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url_safe( 'http://example.com/%0%0%0ADa' ) );
	}

	/**
	 * Test valid, missing and fake protocols
	 *
	 * @since 0.1
	 */	
	function test_url_with_protocols() {
		$this->assertEquals( 'http://example.com', yourls_sanitize_url( 'http://example.com' ) );
		$this->assertEquals( 'http://example.php', yourls_sanitize_url( 'example.php' ) );
		$this->assertEquals( '', yourls_sanitize_url( 'htttp://example.com' ) );
		$this->assertEquals( 'mailto:ozh@ozh.org', yourls_sanitize_url( 'mailto:ozh@ozh.org' ) );
        // play with allowed protocols
		$this->assertEquals( '', yourls_sanitize_url( 'nasty://example.com/' ) );
		$this->assertEquals( 'nasty://example.com/', yourls_sanitize_url( 'nasty://example.com/', array('nasty://') ) );
        global $yourls_allowedprotocols;
        $yourls_allowedprotocols[] = 'evil://';
        $this->assertEquals( 'evil://example.com', yourls_sanitize_url( 'evil://example.com' ) );
	}
    
    /**
     * List of URLs with MiXeD CaSe to test. Structure: array( sanitized url, unsanitized url with mixed case )
     */
    function list_of_mixed_case() {
        return array(
            array( 'http://example.com'                               , 'http://example.com' ),    # normal, no trailing slash
            array( 'http://example.com/'                              , 'http://example.com/' ),   # normal, trailing slash
            array( 'http://example.com'                               , 'HTTP://example.com' ),
            array( 'http://example.com'                               , 'Http://example.com' ),
            array( 'http://example.com'                               , 'Http://ExAmPlE.com' ),
            array( 'http://example.com/BLAH'                          , 'Http://ExAmPlE.com/BLAH' ),
            array( 'http://http/HTTP?HTTP#HTTP'                       , 'HTTP://HTTP/HTTP?HTTP#HTTP' ),
            array( 'http://example.com/?@BLaH'                        , 'Http://ExAmPlE.com/?@BLaH' ), #1890
            array( 'http://example.com#BLAH'                          , 'Http://ExAmPlE.com#BLAH' ),
            array( 'http://example.com#BLAH'                          , 'Http://@ExAmPlE.com#BLAH' ),
            array( 'http://example.com#BLAH'                          , 'Http://:@ExAmPlE.com#BLAH' ),
            array( 'http://example.com?BLAH'                          , 'Http://ExAmPlE.com?BLAH' ),
            array( 'http://Ozh:Password@example.com:1337#OMG'         , 'http://Ozh:Password@Example.COM:1337#OMG' ),
            array( 'http://User:PWd@example.com?User:PWd@Example.com' , 'http://User:PWd@Example.com?User:PWd@Example.com' ),
            array( 'mailto:Ozh@Ozh.org?omg'                           , 'MAILTO:Ozh@Ozh.org?omg' ),
            array( 'http://omg'                                       , 'OMG' ),
        );
    }

	/**
	 * Protocol and domain with mixed case
	 *
	 * @since 0.1
     * @dataProvider list_of_mixed_case
	 */	
	function test_url_with_protocol_case( $sanitized, $unsanitized ) {
		$this->assertEquals( $sanitized, yourls_sanitize_url( $unsanitized ) );
	}
	
	/*
	More stuff to test:
	At some point, the following URLs should be equal, as this is correctly handled by YOURLS
	- http://example.org/%D0%B1%D0%B0%D0%B1%D0%B0 and http://example.org/баба
	- http://example.com/?foo%5Bbar%5D=baz and http://example.com/?foo[bar]=baz
	- http://example.com/?baz=bar&#038;foo%5Bbar%5D=baz and http://example.com/?baz=bar&foo[bar]=baz
	- ...
	*/

}
