<?php

/**
 * HTTP misc utilities and helpers
 *
 * @group http
 * @since 0.1
 */
class HTTP_Misc_Tests extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_filter( 'http_get_proxy', 'yourls_return_true' );
        yourls_remove_filter( 'http_get_proxy', 'yourls_return_false' );
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
     * Check request default options
     *
     * @since 0.1
     */
    public function test_request_default_options() {
        yourls_add_filter( 'http_get_proxy', 'yourls_return_false' );
        $options = yourls_http_default_options();
        $this->assertArrayHasKey( 'timeout', $options );
        $this->assertArrayHasKey( 'useragent', $options );
        $this->assertArrayHasKey( 'follow_redirects', $options );
        $this->assertArrayHasKey( 'redirects', $options );
        $this->assertArrayNotHasKey( 'proxy', $options );
    }

    /**
     * Check request default options with a proxy
     *
     * @since 0.1
     */
    public function test_request_default_options_proxy() {
        yourls_add_filter( 'http_get_proxy', 'yourls_return_true' );
        $options = yourls_http_default_options();
        $this->assertArrayHasKey( 'timeout', $options );
        $this->assertArrayHasKey( 'useragent', $options );
        $this->assertArrayHasKey( 'follow_redirects', $options );
        $this->assertArrayHasKey( 'redirects', $options );
        $this->assertArrayHasKey( 'proxy', $options );
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
