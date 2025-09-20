<?php

/**
 * Formatting functions for URLs
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('formatting')]
#[\PHPUnit\Framework\Attributes\Group('url')]
#[\PHPUnit\Framework\Attributes\Group('idn')]
class URLTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_filter( 'is_ssl', 'yourls_return_true' );
        yourls_remove_filter( 'is_ssl', 'yourls_return_false' );
    }

    /**
     * List of schemes to test. Structure: array( string to test, expected scheme )
     */
    static function list_of_schemes(): \Iterator
    {
        yield array( 'example:80/blah'             , 'example:' );
        yield array( 'example.com/blah'            , '' );
        yield array( 'example.com:80/blah'         , 'example.com:' );
        yield array( 'scheme://example.com:80/blah', 'scheme://' );
        yield array( 'scheme:example.com'          , 'scheme:' );
        yield array( 'scheme:/example.com:80/hey'  , 'scheme:' );
        yield array( 'scheme:/example:80/hey'      , 'scheme:' );
        yield array( 'scheme://example'            , 'scheme://' );
        yield array( 'scheme:///example'           , 'scheme://' );
        yield array( 'scheme+bleh:example'         , 'scheme+bleh:' );
        yield array( 'scheme :example'             , '' );
        yield array( 'scheme+bleh : example'       , '' );
        yield array( 'scheme45:example'            , 'scheme45:' );
        yield array( '45scheme:example'            , '' );
        yield array( 'scheme+-.1337:example'       , 'scheme+-.1337:' );
        yield array( '+scheme:example'             , '' );
        yield array( 'scheme'                      , '' );
    }

    /**
     * Correctly get protocols
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('list_of_schemes')]
    function test_correcttly_get_protocols( $test_this, $expected ) {
        $this->assertSame( yourls_get_protocol( $test_this ), $expected );
    }


    /**
     * List of valid URLs that should not be changed when sanitized
     */
    static function list_of_valid_URLs(): \Iterator
    {
        yield array( 'http://example.com' );
        yield array( 'http://example.com/' );
        yield array( 'http://ozh@example.com/' );
        yield array( 'http://example.com/?@OMG' );
        // #1890
        yield array( 'http://ozh@example.com#BLAH' );
        yield array( 'http://Ozh:Password@example.com/' );
        yield array( 'http://Ozh:Password@example.com#OMG' );
        yield array( 'http://Ozh:Password@example.com:1337/' );
        yield array( 'http://Ozh:Password@example.com:1337#OMG' );
        yield array( 'http://Ozh:Password@example.com/hey@ho' );
        yield array( 'http://username:password@example.com:8042/over/there/index.dtb?type=animal&name=narwhal#nose:@:@' );
        yield array( 'mailto:ozh@ozh.org' );
        yield array( 'http://example.com/?watchtheallowedcharacters-~+_.#=&;,/:%!*stay' );
        yield array( 'http://example.com/search.php?search=(amistillhere)' );
        yield array( 'http://example.com/?test=%2812345%29abcdef[gh]' );
        yield array( 'http://example.com/?test=(12345)abcdef[gh]' );
        yield array( 'http://[0:0:0:0:0:0:0:1]/' );
        yield array( 'http://[2001:db8:1f70::999:de8:7648:6e8]:100/' );
        yield array( 'http://example.com/?req=http;//blah' );
        //
        yield array( 'relative' );
        yield array( 'Relative/path/' );
        yield array( 'relative/Path/#yes' );
        yield array( '/absolute' );
        yield array( '/Absolute/Path/' );
        yield array( '/absolute/path/?omg#also' );
        yield array( 'http://académie-française.fr' );
        yield array( 'http://www.طارق.net/طارق?hello=%2B' );
        yield array( 'http://%d8%b7%d8%a7%d8%b1%d9%82.net/' );
    }

    /**
     * Test that valid URLs are not modified
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('list_of_valid_URLs')]
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
    static function list_of_mixed_case(): \Iterator
    {
        yield array( 'http://example.com'                               , 'http://example.com' );
        # normal, no trailing slash
        yield array( 'http://example.com/'                              , 'http://example.com/' );
        # normal, trailing slash
        yield array( 'http://example.com'                               , 'HTTP://example.com' );
        yield array( 'http://example.com'                               , 'Http://example.com' );
        yield array( 'http://example.com'                               , 'Http://ExAmPlE.com' );
        yield array( 'http://example.com/BLAH'                          , 'Http://ExAmPlE.com/BLAH' );
        yield array( 'http://http/HTTP?HTTP#HTTP'                       , 'HTTP://HTTP/HTTP?HTTP#HTTP' );
        yield array( 'http://example.com/?@BLaH'                        , 'Http://ExAmPlE.com/?@BLaH' );
        #1890
        yield array( 'http://example.com#BLAH'                          , 'Http://ExAmPlE.com#BLAH' );
        yield array( 'http://example.com#BLAH'                          , 'Http://@ExAmPlE.com#BLAH' );
        yield array( 'http://example.com#BLAH'                          , 'Http://:@ExAmPlE.com#BLAH' );
        yield array( 'http://example.com?BLAH'                          , 'Http://ExAmPlE.com?BLAH' );
        yield array( 'http://Ozh:Password@example.com:1337#OMG'         , 'http://Ozh:Password@Example.COM:1337#OMG' );
        yield array( 'http://User:PWd@example.com?User:PWd@Example.com' , 'http://User:PWd@Example.com?User:PWd@Example.com' );
        yield array( 'mailto:Ozh@Ozh.org?omg'                           , 'MAILTO:Ozh@Ozh.org?omg' );
        yield array( 'http://www.طارق.net/'                             , 'http://www.طارق.Net/' );
        yield array( 'http://académie-française.fr'                     , 'http://Académie-française.FR' );
    }

    /**
     * Protocol and domain with mixed case
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('list_of_mixed_case')]
    function test_url_with_protocol_case( $sanitized, $unsanitized ) {
        $this->assertEquals( $sanitized, yourls_sanitize_url( $unsanitized ) );
    }

    /**
     * List of URLs with IDN domain, and how YOURLS should sanitize them
     */
    static function list_of_IDN(): \Iterator
    {
        yield array( 'http://www.طارق.Net/Omgطارق'                  , 'http://www.طارق.net/Omgطارق' );
        yield array( 'http://xn--mgbuq0c.Net/Omgطارق'               , 'http://طارق.net/Omgطارق' );
        yield array( 'http://%d8%b7%d8%a7%d8%b1%d9%82.Net/Omgطارق'  , 'http://%d8%b7%d8%a7%d8%b1%d9%82.net/Omgطارق' );
        // طارق.net, urlencoded
        yield array( 'http://xn--p1ai.РФ'                           , 'http://рф.рф' );
        // lowercasing where applicable: РФ -> рф
        yield array( 'http://РФ.xn--p1ai/'                          , 'http://рф.рф/' );
        yield array( 'http://xn--p1ai.xn--p1ai'                     , 'http://рф.рф' );
    }

    /**
     * Protocol and domain with mixed case
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('list_of_IDN')]
    function test_url_with_IDN( $unsanitized, $sanitized ) {
        $this->assertEquals( $sanitized, yourls_sanitize_url( $unsanitized ) );
    }

    /**
     * List of URLS and expected matches whether we're on SSL or not.
     * Structure: array(original URL, expected URL if we're on HTTP, expected URL if we're on HTTPS)
     */
    static function list_of_urls_with_and_without_https(): \Iterator
    {
        yield array( 'http://omg',         'http://omg',        'https://omg' );
        yield array( 'https://omg',        'https://omg',       'https://omg' );
        yield array( 'http://omg?http',    'http://omg?http',   'https://omg?http' );
        yield array( 'https://omg?http',   'https://omg?http',  'https://omg?http' );
        yield array( 'omg?http://bleh',    'omg?http://bleh',   'omg?http://bleh' );
        yield array( 'omg?https://bleh',   'omg?https://bleh',  'omg?https://bleh' );
        yield array( 'http',               'http',              'http' );
        yield array( 'https',              'https',             'https' );
        yield array( 'http://https',       'http://https',      'https://https' );
        yield array( 'https://https',      'https://https',     'https://https' );
    }
    /**
     * Test matching protocol with no SSL
     *
     * Feed URL and return a result that matches "http"
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('list_of_urls_with_and_without_https')]
    function test_matching_protocols_with_no_ssl( $url, $without_ssl, $with_ssl ) {
        yourls_add_filter('is_ssl', 'yourls_return_false');
        $this->assertEquals( $without_ssl, yourls_match_current_protocol($url) );
    }

    /**
     * Test matching protocol with SSL
     *
     * Feed URL and return a result that matches "https"
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('list_of_urls_with_and_without_https')]
    function test_matching_protocols_with_ssl( $url, $without_ssl, $with_ssl ) {
        yourls_add_filter('is_ssl', 'yourls_return_true');
        $this->assertEquals( $with_ssl, yourls_match_current_protocol($url) );
    }

    /**
     * List of various valid URL with mixed scenarios of IDN
     * Structure: array(URL, expected URL after yourls_sanitize_url (and especially yourls_normalize_uri(), which deals with IDN)
     */
    static function list_of_idn_punycode_utf8_rtl(): \Iterator
    {
        yield [ 'http://ua-test.link'                   , 'http://ua-test.link' ];
        // Ascii.new
        yield [ 'http://ua-test.technology'             , 'http://ua-test.technology' ];
        // Ascii.long
        yield [ 'http://普试.top/'                      , 'http://普试.top/' ];
        // Idn.ascii
        yield [ 'http://ua-test.世界'                   , 'http://ua-test.世界' ];
        // Ascii.idn
        yield [ 'http://普试.世界/'                     , 'http://普试.世界/' ];
        // Idn.idn
        yield [ 'http://ua-test.xn--rhqv96g'            , 'http://ua-test.世界' ];
        // Ascii.punycode
        yield [ 'http://xn--tkvo64f.top'                , 'http://普试.top' ];
        // Punycode.ascii
        yield [ 'http://xn--tkvo64f.xn--rhqv96g'        , 'http://普试.世界'  ];
        // Punycode.punycode
        yield [ 'http://اختبار-القبولالعالمي.top'        , 'http://اختبار-القبولالعالمي.top' ];
        // RTL.ascii
        yield [ 'http://اختبار-القبولالعالمي.شبكة'       , 'http://اختبار-القبولالعالمي.شبكة' ];
        // RTL.RTL
        yield [ 'http://ua-test.link/我的'              , 'http://ua-test.link/我的' ];
        // Ascii.new/Unicode
        yield [ 'http://ua-test.technology/我的'        , 'http://ua-test.technology/我的' ];
        // Ascii.long/Unicode
        yield [ 'http://普试.top/我的'                  , 'http://普试.top/我的' ];
        // Idn.ascii/Unicode
        yield [ 'http://ua-test.世界/我的'              , 'http://ua-test.世界/我的' ];
        // Ascii.idn/Unicode
        yield [ 'http://普试.世界/我的'                 , 'http://普试.世界/我的' ];
        // Idn.idn/Unicode
        yield [ 'http://ختبار-القبولالعالمي.top/我的'    , 'http://ختبار-القبولالعالمي.top/我的' ];
        // RTL.ascii/Unicode
        yield [ 'http://اختبار-القبولالعالمي.شبكة/我的'  , 'http://اختبار-القبولالعالمي.شبكة/我的' ];
    }

    /**
     * Test various cases : domain name / TLD / path with ascii, punycode, utf8 and RTL
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('list_of_idn_punycode_utf8_rtl')]
    function test_various_idn_cases($url, $expected) {
        $this->assertEquals( yourls_sanitize_url($url), $expected );
    }

}
