<?php

/**
 * HTTP misc utilities and helpers
 *
 * @group http
 * @since 0.1
 */
class HTTP_Misc_Tests extends PHPUnit_Framework_TestCase {
    
    public function proxy() {
        return array(
            array( 'invalid', false ),
            array( 'http://localhost', false ),
            array( 'http://127.0.0.1', false ),
            array( 'http://127.1', false ),
            array( 'http://[::1]', false ),
            array( YOURLS_SITE, false ),
            array( 'http://' . rand_str() , true ),
        );
    }
    /**
     * Check what URLs we send through a proxy, if defined
     *
     * @dataProvider proxy
     * @since 0.1
     */
    public function test_proxy( $url, $goes_through_proxy ) {
        $this->assertSame( yourls_send_through_proxy( $url ), $goes_through_proxy );
    }

    /**
     * Check that SSL capability check returns a boolean
     *
     * @since 0.1
     */
    public function test_can_SSL() {
        $this->assertTrue( is_bool( yourls_can_http_over_ssl() ) );
    }

    /**
     * Check that proxy definition test returns a boolean
     *
     * @since 0.1
     */
    public function test_proxy_is_defined() {
        $this->assertTrue( is_bool( yourls_http_proxy_is_defined() ) );
    }

    /**
     * Check request default options
     *
     * @since 0.1
     */
    public function test_request_default_options() {
        $options = yourls_http_default_options();
        $this->assertArrayHasKey( 'timeout', $options );
        $this->assertArrayHasKey( 'useragent', $options );
        $this->assertArrayHasKey( 'follow_redirects', $options );
        $this->assertArrayHasKey( 'redirects', $options );
    }

    /**
     * Check we have a user agent string
     *
     * @since 0.1
     */
    public function test_user_agent() {
        $this->assertTrue( is_string( yourls_http_user_agent() ) );
    }

}
