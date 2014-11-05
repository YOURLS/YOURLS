<?php

/**
 * Formatting functions for URLs
 *
 * @since 0.1
 */
class Option_Forma_URL extends PHPUnit_Framework_TestCase {

    /**
     * Test that valid URLs are not modified
     *
     * @since 0.1
     */
    function test_valid_urls() {
        $urls = array(
            'http://example.com',
            'http://example.com/',
            'http://@example.com/',
            'http://@example.com#BLAH',
            'http://Ozh:Password@example.com/',
            'http://Ozh:Password@example.com#OMG',
            'http://Ozh:Password@example.com:1337/',
            'http://Ozh:Password@example.com:1337#OMG',
            'http://Ozh:Password@example.com/hey@ho',
            'http://username:password@example.com:8042/over/there/index.dtb?type=animal&name=narwhal#nose:@:@',
            'mailto:ozh@ozh.org',
        );

        foreach( $urls as $url ) {
            $this->assertEquals( $url, yourls_sanitize_url( $url ) );
        }
    }

	/**
	 * URL with spaces
	 *
	 * @since 0.1
	 */		
	function test_url_with_spaces() {
		$this->assertEquals( 'http://example.com/HelloWorld', yourls_sanitize_url( 'http://example.com/Hello World' ) );
		$this->assertEquals( 'http://example.com/Hello%20World', yourls_sanitize_url( 'http://example.com/Hello%20World' ) );
	}

	/**
	 * URL with bad chars
	 *
	 * @since 0.1
	 */	
	function test_url_with_bad_characters() {
		$this->assertEquals( 'http://example.com/watchthelinefeedgo', yourls_sanitize_url( 'http://example.com/watchthelinefeed%0Ago' ) );
		$this->assertEquals( 'http://example.com/watchthelinefeedgo', yourls_sanitize_url( 'http://example.com/watchthelinefeed%0ago' ) );
		$this->assertEquals( 'http://example.com/watchthecarriagereturngo', yourls_sanitize_url( 'http://example.com/watchthecarriagereturn%0Dgo' ) );
		$this->assertEquals( 'http://example.com/watchthecarriagereturngo', yourls_sanitize_url( 'http://example.com/watchthecarriagereturn%0dgo' ) );
		//Nesting Checks
		$this->assertEquals( 'http://example.com/watchthecarriagereturngo', yourls_sanitize_url( 'http://example.com/watchthecarriagereturn%0%0ddgo' ) );
		$this->assertEquals( 'http://example.com/watchthecarriagereturngo', yourls_sanitize_url( 'http://example.com/watchthecarriagereturn%0%0DDgo' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url( 'http://example.com/%0%0%0DAD' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url( 'http://example.com/%0%0%0ADA' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url( 'http://example.com/%0%0%0DAd' ) );
		$this->assertEquals( 'http://example.com/', yourls_sanitize_url( 'http://example.com/%0%0%0ADa' ) );
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
	 * Protocol and domain with mixed case
	 *
	 * @since 0.1
	 */	
	function test_url_with_protocol_case() {
		$this->assertEquals( 'http://example.com', yourls_sanitize_url( 'HTTP://example.com' ) );
		$this->assertEquals( 'http://example.com', yourls_sanitize_url( 'Http://example.com' ) );
		$this->assertEquals( 'http://example.com', yourls_sanitize_url( 'Http://ExAmPlE.com' ) );
		$this->assertEquals( 'http://example.com/BLAH', yourls_sanitize_url( 'Http://ExAmPlE.com/BLAH' ) );
		$this->assertEquals( 'http://@example.com#BLAH', yourls_sanitize_url( 'Http://@ExAmPlE.com#BLAH' ) );
		$this->assertEquals( 'http://example.com?BLAH', yourls_sanitize_url( 'Http://ExAmPlE.com?BLAH' ) );
        $this->assertEquals( 'http://Ozh:Password@example.com:1337#OMG', yourls_sanitize_url( 'http://Ozh:Password@Example.COM:1337#OMG' ) );
        $this->assertEquals( 'http://Ozh:Password@example.com?Ozh:Password@Example.com', yourls_sanitize_url( 'http://Ozh:Password@Example.com?Ozh:Password@Example.com' ) );
        $this->assertEquals( 'mailto:Ozh@Ozh.org?omg', yourls_sanitize_url( 'MAILTO:Ozh@Ozh.org?omg' ) );
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