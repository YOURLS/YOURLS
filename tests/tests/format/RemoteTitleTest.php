<?php

use WpOrg\Requests\Response;

/**
 * Remote Title Sanitizing functions
 *
 * @since 1.10.3
 */
#[\PHPUnit\Framework\Attributes\Group('formatting')]
class RemoteTitleTest extends PHPUnit\Framework\TestCase {

    public function setUp(): void {
        parent::setUp();
        // Initialize any necessary setup here
        // Mockup HTTP requests to avoid real network calls to example.com during tests
        yourls_add_filter( 'shunt_yourls_http_request', array( $this, 'override_http_request' ), 10, 6 );
        // Also prevent a real DNS lookup of example.com by disabling the remote title fetch restriction
        yourls_add_filter( 'restrict_remote_title_fetch', 'yourls_return_false' );
    }

    public function tearDown(): void {
        parent::tearDown();
        // Clean up any resources or reset any state after each test
        yourls_remove_filter( 'shunt_yourls_http_request', array( $this, 'override_http_request' ), 10, 6 );
        yourls_remove_filter( 'restrict_remote_title_fetch', 'yourls_return_false' );
    }

    public function override_http_request($return, $type, $url, $headers, $data, $options) {
        $file_name = parse_url( $url, PHP_URL_PATH );
        $query_string = parse_url( $url, PHP_URL_QUERY );
        $url_params = [];
        if ( ! empty($query_string)) {
            parse_str( $query_string, $url_params );
        }
        if ( ! file_exists( YOURLS_TESTDATA_DIR . '/remote-pages/' . $file_name ) ) {
            return $return;
        }
        $response = new Response();
        $response->raw = 'HTTP/1.1 200 OK';
        $response->url = $url;
        $response->body = file_get_contents( YOURLS_TESTDATA_DIR . '/remote-pages/' . $file_name );
        $charset = 'utf-8';
                if ( isset( $url_params['charset'] ) ) {
                    $charset = $url_params['charset'];
                }
                $response->headers = new \WpOrg\Requests\Response\Headers([
                    'Content-Type' => 'text/html; charset=' . $charset,
                    'Content-Length' => strlen($response->body),
                ]);
        return $response;
    }

    /**
     * Sanitize titles
     *
     * @since 1.10.3
     */
    function test_sanitize_title() {
        $expected = "How Will I Laugh Tomorrow When I Can't Even Smile Today";
        $this->assertSame( $expected, yourls_get_remote_title( 'https://example.com/title1.html' ) );

        $expected = 'Twilight of the Thunder God';
        $this->assertSame( $expected, yourls_get_remote_title( 'https://example.com/title2.html' ) );
    }

    /**
     * MB convert encoding tests.
     *
     * @since 1.10.3
     */
    function test_mb_convert_encoding() {
        // Test issue from https://github.com/YOURLS/YOURLS/issues/3708
        // Contains <meta charSet="utf=8"/>
        $expected = "Hello World";
        $this->assertSame( $expected, yourls_get_remote_title( 'https://example.com/mbconvert1.html' ) );
        $this->assertSame( $expected, yourls_get_remote_title( 'https://example.com/mbconvert1.html?charset=invalid' ) );
    }

    /**
     * The <title> tag can have attributes
     *
     * <title class="foo" id="bar">Attributes In The Title Tag</title>
     */
    function test_title_tag_with_attributes() {
        $expected = 'Attributes In The Title Tag';
        $this->assertSame( $expected, yourls_get_remote_title( 'https://example.com/title-with-attributes.html' ) );
    }

    /**
     * Charset in the Content-Type response header can be quoted
     *
     * Both charset=ISO-8859-1 and 'charset="ISO-8859-1"' are valid.
     * The page has no <meta charset> : the query string passed to the mockup HTTP request handler simulates the header.
     */
    function test_quoted_charset_in_content_type_header() {
        $expected = 'Café Central';
        // Same charset, quoted and unquoted
        $this->assertSame( $expected, yourls_get_remote_title( 'https://example.com/charset-header-only.html?charset=ISO-8859-1' ) );
        $this->assertSame( $expected, yourls_get_remote_title( 'https://example.com/charset-header-only.html?charset=%22ISO-8859-1%22' ) );
    }

    /**
     * A 'charset=' string in another meta tag is not a charset declaration
     *
     * The page declares utf-8, but an earlier <meta name="description"> mentions 'charset=iso-8859-1'
     * in its content attribute.
     */
    function test_meta_charset_decoy() {
        $expected = 'Café Central';
        $this->assertSame( $expected, yourls_get_remote_title( 'https://example.com/meta-charset-decoy.html' ) );
    }

    /**
     * Fetched titles must be valid UTF-8, even when the page lies about its charset. H�h� !
     */
    function test_title_is_valid_utf8_when_page_lies_about_its_charset() {
        $title = yourls_get_remote_title( 'https://example.com/lying-charset.html' );
        $this->assertTrue( mb_check_encoding( $title, 'UTF-8' ), 'Title is not valid UTF-8: ' . bin2hex( $title ) );
    }

}
