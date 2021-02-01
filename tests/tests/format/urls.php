<?php

/**
 * Formatting functions for URLs
 *
 * @group formatting
 * @group url
 * @group idn
 * @since 0.1
 */
class Format_URL extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_filter( 'is_ssl', 'yourls_return_true' );
        yourls_remove_filter( 'is_ssl', 'yourls_return_false' );
    }

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
            array( 'relative' ),
            array( 'Relative/path/' ),
            array( 'relative/Path/#yes' ),
            array( '/absolute' ),
            array( '/Absolute/Path/' ),
            array( '/absolute/path/?omg#also' ),
            array( 'http://académie-française.fr' ),
            array( 'http://www.طارق.net/طارق?hello=%2B' ),
            array( 'http://%d8%b7%d8%a7%d8%b1%d9%82.net/' ), // this is طارق.net, encoded. I _think_ it qualifies as valid
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
		$this->assertEquals( 'example.php', yourls_sanitize_url( 'example.php' ) );
		$this->assertEquals( '', yourls_sanitize_url( 'htttp://example.com' ) );
		$this->assertEquals( 'mailto:ozh@ozh.org', yourls_sanitize_url( 'mailto:ozh@ozh.org' ) );
        // play with allowed protocols
		$this->assertEquals( '', yourls_sanitize_url( 'nasty://example.com/' ) );
		$this->assertEquals( 'nasty://example.com/', yourls_sanitize_url( 'nasty://example.com/', array('nasty://') ) );
        global $yourls_allowedprotocols;
        $yourls_allowedprotocols[] = 'evil://';
        $this->assertEquals( 'evil://example.com', yourls_sanitize_url( 'evil://example.com' ) );
        $yourls_allowedprotocols = yourls_kses_allowed_protocols();
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
            array( 'http://www.طارق.net/'                             , 'http://www.طارق.Net/' ),
            array( 'http://académie-française.fr'                     , 'http://Académie-française.FR' ),
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

    /**
     * List of URLs with IDN domain, and how YOURLS should sanitize them
     */
    function list_of_IDN() {
        return array(
            array( 'http://www.طارق.Net/Omgطارق'                  , 'http://www.طارق.net/Omgطارق' ),
            array( 'http://xn--mgbuq0c.Net/Omgطارق'               , 'http://طارق.net/Omgطارق' ),
            array( 'http://%d8%b7%d8%a7%d8%b1%d9%82.Net/Omgطارق'  , 'http://%d8%b7%d8%a7%d8%b1%d9%82.net/Omgطارق' ), // طارق.net, urlencoded
            array( 'http://xn--p1ai.РФ'                           , 'http://рф.рф' ), // lowercasing where applicable: РФ -> рф
            array( 'http://РФ.xn--p1ai/'                          , 'http://рф.рф/' ),
            array( 'http://xn--p1ai.xn--p1ai'                     , 'http://рф.рф' ),
        );
    }

	/**
	 * Protocol and domain with mixed case
	 *
     * @dataProvider list_of_IDN
	 */
	function test_url_with_IDN( $unsanitized, $sanitized ) {
		$this->assertEquals( $sanitized, yourls_sanitize_url( $unsanitized ) );
	}

    /**
     * List of URLS and expected matches whether we're on SSL or not.
     * Structure: array(original URL, expected URL if we're on HTTP, expected URL if we're on HTTPS)
     */
    function list_of_urls_with_and_without_https() {
        return array(
            array( 'http://omg',         'http://omg',        'https://omg' ),
            array( 'https://omg',        'https://omg',       'https://omg' ),
            array( 'http://omg?http',    'http://omg?http',   'https://omg?http' ),
            array( 'https://omg?http',   'https://omg?http',  'https://omg?http' ),
            array( 'omg?http://bleh',    'omg?http://bleh',   'omg?http://bleh' ),
            array( 'omg?https://bleh',   'omg?https://bleh',  'omg?https://bleh' ),
            array( 'http',               'http',              'http' ),
            array( 'https',              'https',             'https' ),
            array( 'http://https',       'http://https',      'https://https' ),
            array( 'https://https',      'https://https',     'https://https' ),
        );
    }
    /**
     * Test matching protocol with no SSL
     *
     * Feed URL and return a result that matches "http"
     *
     * @dataProvider list_of_urls_with_and_without_https
     */
    function test_matching_protocols_with_no_ssl( $url, $without_ssl, $with_ssl ) {
        yourls_add_filter('is_ssl', 'yourls_return_false');
        $this->assertEquals( $without_ssl, yourls_match_current_protocol($url) );
    }

    /**
     * Test matching protocol with SSL
     *
     * Feed URL and return a result that matches "https"
     *
     * @dataProvider list_of_urls_with_and_without_https
     */
    function test_matching_protocols_with_ssl( $url, $without_ssl, $with_ssl ) {
        yourls_add_filter('is_ssl', 'yourls_return_true');
        $this->assertEquals( $with_ssl, yourls_match_current_protocol($url) );
    }

    /**
     * List of various valid URL with mixed scenarios of IDN
     * Structure: array(URL, expected URL after yourls_sanitize_url (and especially yourls_normalize_uri(), which deals with IDN)
     */
    function list_of_idn_punycode_utf8_rtl() {
        return array(
            [ 'http://ua-test.link'                   , 'http://ua-test.link' ],                    // Ascii.new
            [ 'http://ua-test.technology'             , 'http://ua-test.technology' ],              // Ascii.long
            [ 'http://普试.top/'                      , 'http://普试.top/' ],                       // Idn.ascii
            [ 'http://ua-test.世界'                   , 'http://ua-test.世界' ],                    // Ascii.idn
            [ 'http://普试.世界/'                     , 'http://普试.世界/' ],                      // Idn.idn
            [ 'http://ua-test.xn--rhqv96g'            , 'http://ua-test.世界' ],                   // Ascii.punycode
            [ 'http://xn--tkvo64f.top'                , 'http://普试.top' ],                       // Punycode.ascii
            [ 'http://xn--tkvo64f.xn--rhqv96g'        , 'http://普试.世界'  ],                     // Punycode.punycode
            [ 'http://اختبار-القبولالعالمي.top'        , 'http://اختبار-القبولالعالمي.top' ],       // RTL.ascii
            [ 'http://اختبار-القبولالعالمي.شبكة'       , 'http://اختبار-القبولالعالمي.شبكة' ],      // RTL.RTL
            [ 'http://ua-test.link/我的'              , 'http://ua-test.link/我的' ],             // Ascii.new/Unicode
            [ 'http://ua-test.technology/我的'        , 'http://ua-test.technology/我的' ],       // Ascii.long/Unicode
            [ 'http://普试.top/我的'                  , 'http://普试.top/我的' ],                  // Idn.ascii/Unicode
            [ 'http://ua-test.世界/我的'              , 'http://ua-test.世界/我的' ],              // Ascii.idn/Unicode
            [ 'http://普试.世界/我的'                 , 'http://普试.世界/我的' ],                 // Idn.idn/Unicode
            [ 'http://ختبار-القبولالعالمي.top/我的'    , 'http://ختبار-القبولالعالمي.top/我的' ],   // RTL.ascii/Unicode
            [ 'http://اختبار-القبولالعالمي.شبكة/我的'  , 'http://اختبار-القبولالعالمي.شبكة/我的' ], // RTL.RTL/Unicode

                                                      // Damn, due to these UTF8 chars not being fixed width, we cannot neatly
                                                      // justify the code and comments. How disappointing.
        );
    }

    /**
     * Test various cases : domain name / TLD / path with ascii, punycode, utf8 and RTL
     *
     * @dataProvider list_of_idn_punycode_utf8_rtl
     */
    function test_various_idn_cases($url, $expected) {
        $this->assertEquals( yourls_sanitize_url($url), $expected );
    }

}
