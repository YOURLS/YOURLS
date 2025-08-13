<?php

/**
 * Main API Output tests (content and headers sent)
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('API')]
class OutputTest extends PHPUnit\Framework\TestCase {

    protected $header_content;

    protected $header_status;

    protected function tearDown(): void {
        yourls_remove_all_actions( 'content_type_header' );
        yourls_remove_all_actions( 'status_header' );
    }

    /**
     * Check that yourls_api_output selectively echoes or returns content
     *
     * @since 0.1
     */
    public function test_output_return_or_echo() {
        $content = array( 'simple' => 'test' );

        // return
        $this->assertSame( 'test', yourls_api_output( 'simple', $content, false, false ) );
        // echo
        $this->expectOutputString( 'test' );
        yourls_api_output( 'simple', $content, false );
    }

    public function get_content_header( $args ) {
        $this->header_content = $args[0];
    }

    public function get_status_header( $args ) {
        $this->header_status = $args[0];
    }

    /**
     * Provide API output mode and the associated expected content-type header
     */
    public static function API_type(): \Iterator
    {
        yield array( 'xml',      'application/xml' );
        yield array( 'json',     'application/json' );
        yield array( 'jsonp',    'application/javascript' );
        yield array( 'simple',   'text/plain' );
        yield array( rand_str(), 'text/plain' );
    }

    /**
     * Check that yourls_api_output selectively sends expected content-type headers
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('API_type')]
    public function test_output_content_headers( $type, $expected_header ) {
        yourls_add_action( 'content_type_header', array( $this, 'get_content_header' ) );
        yourls_add_action( 'status_header', array( $this, 'get_status_header' ) );

        $content = array( 'hello' => 'test' );
        $result  = yourls_api_output( $type, $content, true, false );

        $this->assertSame( $expected_header, $this->header_content );
    }

    /**
     * Provide mocked API output and the expected status codes
     */
    public static function status_code(): \Iterator {
        $success_code = mt_rand( 1, 10 );
        $error_code   = mt_rand( 1, 10 );

        $content_success = array( 'statusCode'    => $success_code );
        $content_error   = array( 'errorCode'     => $error_code );
        $content_random  = array( 'thereIsNoCode' => rand_str() );
        yield array( $content_success, $success_code );
        yield array( $content_error,   $error_code );
        yield array( $content_random,  200 );
    }

    /**
     * Check that yourls_api_output status header
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('status_code')]
    public function test_output_status_headers( $content, $expected_status ) {
        yourls_add_action( 'status_header', array( $this, 'get_status_header' ) );

        $result  = yourls_api_output( 'simple', $content, true, false );

        $this->assertSame( $expected_status, $this->header_status );
    }

}
