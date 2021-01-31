<?php

/**
 * HTTP proxy support functions
 *
 * @group http
 * @since 0.1
 */
class HTTP_Proxy_Tests extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_all_filters( 'http_get_proxy_bypass_host' );
    }

    /**
     * List of hosts and wether they should go through proxy or not
     */
    public function proxy() {
        return array(
            array( 'invalid', false ),
            array( 'http://localhost', false ),
            array( 'http://127.0.0.1', false ),
            array( 'http://127.1', false ),
            array( 'http://[::1]', false ),
            array( YOURLS_SITE, false ),
            array( 'http://' . rand_str() , true ),

            array( 'http://bypass.me' , true ),    // these two will be added to the by-pass list
            array( 'http://skipthem.all' , true ),   // in the next test
        );
    }

    /**
     * Check what URLs we should send through a proxy, if defined
     *
     * @dataProvider proxy
     * @since 0.1
     */
    public function test_proxy( $url, $goes_through_proxy ) {
        $this->assertSame( $goes_through_proxy, yourls_send_through_proxy( $url ) );
    }

    /**
     * List of hosts and wether they should go through proxy or not, with 'bypass.me, *.skipthem.all' defined as by-passing hosts
     */
    public function proxy_bypass_wildcard() {
        return array(
            array( 'invalid', false ),
            array( 'http://localhost', false ),
            array( 'http://127.0.0.1', false ),
            array( 'http://127.1', false ),
            array( 'http://[::1]', false ),
            array( YOURLS_SITE, false ),
            array( 'http://' . rand_str() , true ),

            array( 'http://bypass.me' , false ),
            array( 'http://bypass.me/some/thing' , false ),
            array( 'http://notbypass.me' , true ),
            array( 'http://bypass.menot' , true ),
            array( 'http://dont.bypass.me' , true ),

            array( 'http://skipthem.all' , false ),
            array( 'http://notskipthem.all' , true ),
            array( 'http://skipthem.allnot' , true ),
            array( 'http://really.skipthem.all' , false ),
            array( 'http://yeah.really.skipthem.all/some/thing' , false ),
        );
    }

    public function bypass_hosts_wildcard() {
        return 'bypass.me, *.skipthem.all';
    }

    /**
     * Check what URLs we should send through a proxy with 'bypass.me, *.skipthem.all' defined as by-passing hosts
     *
     * @dataProvider proxy_bypass_wildcard
     * @since 0.1
     */
    public function test_proxy_bypass_wildcard( $url, $goes_through_proxy ) {
        yourls_add_filter( 'http_get_proxy_bypass_host', array( $this, 'bypass_hosts_wildcard' ) );
        $this->assertSame( $goes_through_proxy, yourls_send_through_proxy( $url ) );
    }

    /**
     * Check that we can get some proxy information
     *
     * This test is pretty limited since we're not toying with define(). We just want to check that the function
     * call returns something
     *
     * @since 0.1
     */
    public function test_proxy_get_info() {
        $before = $after = rand_str();
        $after = yourls_http_get_proxy();
        $this->assertNotSame( $before, $after );
    }

    /**
     * Check that we can get something regarding hosts bypassing the proxy
     *
     * This test is pretty limited since we're not toying with define(). We just want to check that the function
     * call returns something
     *
     * @since 0.1
     */
    public function test_proxy_get_bypass_hosts() {
        $before = $after = rand_str();
        $after = yourls_http_get_proxy_bypass_host();
        $this->assertNotSame( $before, $after );
    }

}
