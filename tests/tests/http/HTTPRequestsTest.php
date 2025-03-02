<?php

/**
 * HTTP request functions
 *
 * We're not testing the Request library itself, it is fully tested on its own, see https://github.com/rmccue/Requests
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('http')]
class HTTPRequestsTest extends PHPUnit\Framework\TestCase {

    private function url( $what = '' ) {
        return 'https://httpbin.org/' . $what;
    }

    /**
     * GET request
     *
     * @since 0.1
     */
    public function test_get() {
        $request = yourls_http_get( $this->url( 'get' ) );
        $this->assertTrue( is_object( $request ) );
    }

    /**
     * GET body
     *
     * @since 0.1
     */
    public function test_get_body() {
        $request = yourls_http_get_body( $this->url( 'get' ) );
        $this->assertTrue( is_string( $request ) );
    }

    /**
     * POST request
     *
     * @since 0.1
     */
    public function test_post() {
        $request = yourls_http_post( $this->url( 'post' ) );
        $this->assertTrue( is_object( $request ) );
    }

    /**
     * POST body
     *
     * @since 0.1
     */
    public function test_post_body() {
        $request = yourls_http_post_body( $this->url( 'post' ) );
        $this->assertTrue( is_string( $request ) );
    }

    /**
     * Requesting an invalid URL returns an error message
     *
     * @since 0.1
     */
    public function test_requests() {
        $this->assertTrue( is_string( yourls_http_get( 'http://10.0.0.666/' ) ) );
    }

}
