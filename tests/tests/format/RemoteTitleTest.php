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

        $expected = 'Princess of the Dawn';
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

    /**
     * Mockup HTTP response: thousands of '<title>' tags and no '</title>'
     */
    public function override_http_request_unclosed_titles($return, $type, $url, $headers, $data, $options) {
        if ( $url !== 'https://example.com/unclosed-titles.html' ) {
            return $return;
        }
        $response = new Response();
        $response->raw = 'HTTP/1.1 200 OK';
        $response->url = $url;
        $response->body = str_repeat( '<title>', 20000 );
        $response->headers = new \WpOrg\Requests\Response\Headers([
            'Content-Type' => 'text/html; charset=utf-8',
        ]);
        return $response;
    }

    /**
     * A page with many unclosed <title> tags must not cause the regex backtracking to take exponential time
     */
    function test_unclosed_title_tags_are_parsed_in_linear_time() {
        yourls_add_filter( 'shunt_yourls_http_request', array( $this, 'override_http_request_unclosed_titles' ), 20, 6 );

        $url = 'https://example.com/unclosed-titles.html';

        $start = microtime( true );
        $title = yourls_get_remote_title( $url );
        $duration = microtime( true ) - $start;

        yourls_remove_filter( 'shunt_yourls_http_request', array( $this, 'override_http_request_unclosed_titles' ), 20, 6 );

        $this->assertSame( $url, $title );
        // Assert that the parsing took less than 200 milliseconds - we're being conservative here in case the CI runs on a slow machine
        $this->assertLessThan( 0.2, $duration, 'Title parsing took ' . round( $duration * 1000 ) . ' ms' );
    }

    /**
     * Test pages, with the charset declared in the HTTP header and the expected title once sanitized
     */
    public static function html_pages(): array {
        return [
            'tags in title'          => [ 'title1.html', null, "How Will I Laugh Tomorrow When I Can't Even Smile Today" ],
            'broken tags in title'   => [ 'title2.html', null, 'Princess of the Dawn' ],
            'invalid meta charset'   => [ 'mbconvert1.html', null, 'Hello World' ],
            'title with attributes'  => [ 'title-with-attributes.html', null, 'Attributes In The Title Tag' ],
            'header charset only'    => [ 'charset-header-only.html', 'ISO-8859-1', 'Café Central' ],
            'meta charset decoy'     => [ 'meta-charset-decoy.html', null, 'Café Central' ],
        ];
    }

    /**
     * Test HTML contents with no usable title
     */
    public static function html_without_title(): array {
        return [
            'empty'          => [ '' ],
            'no title'       => [ '<html><head></head><body>Hello</body></html>' ],
            'empty title'    => [ '<html><head><title></title></head></html>' ],
        ];
    }

    /**
     * Read a test page
     */
    private function get_test_page( string $file ): string {
        return file_get_contents( YOURLS_TESTDATA_DIR . '/remote-pages/' . $file );
    }

    /**
     * Extract title with regular expressions
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('html_pages')]
    function test_get_html_title_regex( string $file, ?string $header_charset, string $expected ) {
        $title = yourls_get_html_title_regex( $this->get_test_page( $file ), $header_charset );
        $this->assertSame( $expected, yourls_sanitize_title( $title ) );
    }

    /**
     * Extract title with the HTML5 parser
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('html_pages')]
    #[\PHPUnit\Framework\Attributes\RequiresPhp('>= 8.4.0')]
    function test_get_html_title_DOM( string $file, ?string $header_charset, string $expected ) {
        $title = yourls_get_html_title_DOM( $this->get_test_page( $file ), $header_charset );
        $this->assertSame( $expected, yourls_sanitize_title( $title ) );
    }

    /**
     * No title found with regular expressions
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('html_without_title')]
    function test_get_html_title_regex_no_title( string $html ) {
        $this->assertNull( yourls_get_html_title_regex( $html ) );
    }

    /**
     * An unclosed <title> is no title for regular expressions
     */
    function test_get_html_title_regex_unclosed_title() {
        $this->assertNull( yourls_get_html_title_regex( '<html><head><title>Hello</head><body>World</body></html>' ) );
    }

    /**
     * No title found with the HTML5 parser
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('html_without_title')]
    #[\PHPUnit\Framework\Attributes\RequiresPhp('>= 8.4.0')]
    function test_get_html_title_DOM_no_title( string $html ) {
        $this->assertNull( yourls_get_html_title_DOM( $html ) );
    }

    /**
     * For the HTML5 parser, an unclosed <title> holds all the text up to the end of the document, like in a browser
     */
    #[\PHPUnit\Framework\Attributes\RequiresPhp('>= 8.4.0')]
    function test_get_html_title_DOM_unclosed_title() {
        $html = '<html><head><title>Hello</head><body>World</body></html>';
        $this->assertSame( 'Hello</head><body>World</body></html>', yourls_get_html_title_DOM( $html ) );
    }

    /**
     * Titles extracted with regular expressions must be valid UTF-8, even when the page lies about its charset
     */
    function test_get_html_title_regex_is_valid_utf8_when_page_lies_about_its_charset() {
        $title = yourls_get_html_title_regex( $this->get_test_page( 'lying-charset.html' ) );
        $this->assertTrue( mb_check_encoding( $title, 'UTF-8' ), 'Title is not valid UTF-8: ' . bin2hex( $title ) );
    }

    /**
     * Titles extracted with the HTML5 parser must be valid UTF-8, even when the page lies about its charset
     */
    #[\PHPUnit\Framework\Attributes\RequiresPhp('>= 8.4.0')]
    function test_get_html_title_DOM_is_valid_utf8_when_page_lies_about_its_charset() {
        $title = yourls_get_html_title_DOM( $this->get_test_page( 'lying-charset.html' ) );
        $this->assertTrue( mb_check_encoding( $title, 'UTF-8' ), 'Title is not valid UTF-8: ' . bin2hex( $title ) );
    }

    /**
     * Many unclosed <title> tags must not cause quadratic regex backtracking
     */
    function test_get_html_title_regex_unclosed_title_tags_in_linear_time() {
        $start = microtime( true );
        yourls_get_html_title_regex( str_repeat( '<title>', 20000 ) );
        $duration = microtime( true ) - $start;
        $this->assertLessThan( 0.2, $duration, 'Title parsing took ' . round( $duration * 1000 ) . ' ms' );
    }

    /**
     * The HTML5 parser ignores a <title> in an inline SVG and takes the document title
     */
    #[\PHPUnit\Framework\Attributes\RequiresPhp('>= 8.4.0')]
    function test_get_html_title_DOM_ignores_svg_title() {
        $html = '<html><head><title>Document Title</title></head><body><svg><title>SVG Title</title></svg></body></html>';
        $this->assertSame( 'Document Title', yourls_get_html_title_DOM( $html ) );
        $html = '<html><body><svg><title>SVG Title</title></svg></body></html>';
        $this->assertNull( yourls_get_html_title_DOM( $html ) );
    }

    /**
     * Mockup HTTP response for https://example.com/mock: body and Content-Type header set by the test
     */
    private ?string $mock_body = null;
    private ?string $mock_content_type = null;

    public function override_http_request_mock($return, $type, $url, $headers, $data, $options) {
        if ( $url !== 'https://example.com/mock' ) {
            return $return;
        }
        $response = new Response();
        $response->raw = 'HTTP/1.1 200 OK';
        $response->url = $url;
        $response->body = $this->mock_body;
        $response->headers = new \WpOrg\Requests\Response\Headers(
            $this->mock_content_type === null ? [] : [ 'Content-Type' => $this->mock_content_type ]
        );
        return $response;
    }

    /**
     * Get the title of https://example.com/mock serving the given body and Content-Type header
     */
    private function get_mock_title( string $body, ?string $content_type = 'text/html' ): string {
        $this->mock_body = $body;
        $this->mock_content_type = $content_type;
        yourls_add_filter( 'shunt_yourls_http_request', array( $this, 'override_http_request_mock' ), 20, 6 );
        $title = yourls_get_remote_title( 'https://example.com/mock' );
        yourls_remove_filter( 'shunt_yourls_http_request', array( $this, 'override_http_request_mock' ), 20, 6 );
        return $title;
    }

    /**
     * Plugins can short-circuit the whole function
     */
    function test_remote_title_shunt() {
        $shunt = fn() => 'Shunted Title';
        yourls_add_filter( 'shunt_get_remote_title', $shunt );
        $title = yourls_get_remote_title( 'https://example.com/title1.html' );
        yourls_remove_filter( 'shunt_get_remote_title', $shunt );
        $this->assertSame( 'Shunted Title', $title );
    }

    /**
     * Plugins can filter the title found
     */
    function test_remote_title_filter() {
        $filter = fn( $title ) => strtoupper( $title );
        yourls_add_filter( 'get_remote_title', $filter );
        $title = yourls_get_remote_title( 'https://example.com/title2.html' );
        yourls_remove_filter( 'get_remote_title', $filter );
        $this->assertSame( 'PRINCESS OF THE DAWN', $title );
    }

    /**
     * Only http(s) URLs are fetched
     */
    function test_remote_title_non_http_url() {
        $this->assertSame( 'ftp://example.com/title1.html', yourls_get_remote_title( 'ftp://example.com/title1.html' ) );
    }

    /**
     * An HTTP error returns the URL
     */
    function test_remote_title_http_error() {
        $error = fn() => 'Some HTTP error';
        yourls_add_filter( 'shunt_yourls_http_request', $error, 20 );
        $title = yourls_get_remote_title( 'https://example.com/title1.html' );
        yourls_remove_filter( 'shunt_yourls_http_request', $error, 20 );
        $this->assertSame( 'https://example.com/title1.html', $title );
    }

    /**
     * An empty page or a page without a title returns the URL
     */
    function test_remote_title_no_title() {
        $this->assertSame( 'https://example.com/mock', $this->get_mock_title( '' ) );
        $this->assertSame( 'https://example.com/mock', $this->get_mock_title( '<html><body>Hello</body></html>' ) );
        $this->assertSame( 'https://example.com/mock', $this->get_mock_title( '<title> <b></b> </title>' ) );
    }

    /**
     * A response without any Content-Type header
     */
    function test_remote_title_no_content_type_header() {
        $this->assertSame( 'Hello World', $this->get_mock_title( '<title>Hello World</title>', null ) );
    }

    /**
     * HTML entities are decoded
     */
    function test_remote_title_html_entities() {
        $this->assertSame( "Tom & Jerry's café", $this->get_mock_title( '<title>Tom &amp; Jerry&#39;s caf&eacute;</title>' ) );
    }

    /**
     * Charset declared in a <meta http-equiv="Content-Type"> tag
     */
    function test_remote_title_meta_http_equiv_charset() {
        $html = '<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"><title>Caf' . "\xe9" . ' Central</title>';
        $this->assertSame( 'Café Central', $this->get_mock_title( $html ) );
    }

    /**
     * Charsets used to decode entities and convert text, for both helpers
     *
     * Body is in ISO-8859-1 unless stated otherwise.
     */
    public static function charset_pages(): array {
        return [
            'meta charset'           => [ '<meta charset="ISO-8859-1"><title>Caf' . "\xe9" . '</title>', null ],
            'meta http-equiv'        => [ '<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"><title>Caf' . "\xe9" . '</title>', null ],
            'header charset'         => [ '<title>Caf' . "\xe9" . '</title>', 'ISO-8859-1' ],
            'entities'               => [ '<title>Caf&eacute;</title>', null ],
            'numeric entities'       => [ '<title>Caf&#233;</title>', null ],
            'utf-8 meta and header'  => [ '<meta charset="utf-8"><title>Caf' . "\xc3\xa9" . '</title>', 'UTF-8' ],
        ];
    }

    /**
     * Charset conversion and entities with regular expressions
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('charset_pages')]
    function test_get_html_title_regex_charsets( string $html, ?string $header_charset ) {
        $this->assertSame( 'Café', yourls_get_html_title_regex( $html, $header_charset ) );
    }

    /**
     * Charset conversion and entities with the HTML5 parser
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('charset_pages')]
    #[\PHPUnit\Framework\Attributes\RequiresPhp('>= 8.4.0')]
    function test_get_html_title_DOM_charsets( string $html, ?string $header_charset ) {
        $this->assertSame( 'Café', yourls_get_html_title_DOM( $html, $header_charset ) );
    }

    /**
     * With regular expressions, the charset in the <meta> tag wins over the one in the HTTP header
     */
    function test_get_html_title_regex_meta_charset_wins_over_header() {
        $html = '<meta charset="ISO-8859-1"><title>Caf' . "\xe9" . '</title>';
        $this->assertSame( 'Café', yourls_get_html_title_regex( $html, 'UTF-8' ) );
    }

    /**
     * With the HTML5 parser, the charset in the HTTP header wins over the one in the <meta> tag, as in a browser
     */
    #[\PHPUnit\Framework\Attributes\RequiresPhp('>= 8.4.0')]
    function test_get_html_title_DOM_header_charset_wins_over_meta() {
        $html = '<meta charset="UTF-8"><title>Caf' . "\xe9" . '</title>';
        $this->assertSame( 'Café', yourls_get_html_title_DOM( $html, 'ISO-8859-1' ) );
    }

    /**
     * A charset valid for mbstring but unknown to the HTML5 parser falls back on content sniffing
     */
    #[\PHPUnit\Framework\Attributes\RequiresPhp('>= 8.4.0')]
    function test_get_html_title_DOM_charset_unknown_to_parser() {
        $this->assertTrue( yourls_is_valid_charset( 'UTF-7' ) );
        $html = '<meta charset="ISO-8859-1"><title>Caf' . "\xe9" . '</title>';
        $this->assertSame( 'Café', yourls_get_html_title_DOM( $html, 'UTF-7' ) );
    }

    /**
     * The HTML5 parser strips and collapses whitespace
     */
    #[\PHPUnit\Framework\Attributes\RequiresPhp('>= 8.4.0')]
    function test_get_html_title_DOM_whitespace() {
        $this->assertSame( 'Hello World', yourls_get_html_title_DOM( "<title>\n  Hello \t\n World  </title>" ) );
    }

}

