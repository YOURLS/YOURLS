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
        yourls_add_filter( 'shunt_yourls_http_request', array( $this, 'override_http_request' ), 10, 6 );
    }

    public function tearDown(): void {
        parent::tearDown();
        // Clean up any resources or reset any state after each test
        yourls_remove_filter( 'shunt_yourls_http_request', array( $this, 'override_http_request' ), 10, 6 );
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

}
