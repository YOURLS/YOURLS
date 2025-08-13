<?php

/**
 * HTTP proxy support functions
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('http')]
class ProxyTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_all_filters( 'http_get_proxy_bypass_host' );
    }

    /**
     * List of hosts and wether they should go through proxy or not
     */
    public static function proxy(): \Iterator
    {
        yield array( 'invalid', false );
        yield array( 'http://localhost', false );
        yield array( 'http://127.0.0.1', false );
        yield array( 'http://127.1', false );
        yield array( 'http://[::1]', false );
        yield array( YOURLS_SITE, false );
        yield array( 'http://' . rand_str() , true );
        yield array( 'http://bypass.me' , true );
        // these two will be added to the by-pass list
        yield array( 'http://skipthem.all' , true );
    }

    /**
     * Check what URLs we should send through a proxy, if defined
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('proxy')]
    public function test_proxy( $url, $goes_through_proxy ) {
        $this->assertSame( $goes_through_proxy, yourls_send_through_proxy( $url ) );
    }

    /**
     * List of hosts and wether they should go through proxy or not, with 'bypass.me, *.skipthem.all' defined as by-passing hosts
     */
    public static function proxy_bypass_wildcard(): \Iterator
    {
        yield array( 'invalid', false );
        yield array( 'http://localhost', false );
        yield array( 'http://127.0.0.1', false );
        yield array( 'http://127.1', false );
        yield array( 'http://[::1]', false );
        yield array( YOURLS_SITE, false );
        yield array( 'http://' . rand_str() , true );
        yield array( 'http://bypass.me' , false );
        yield array( 'http://bypass.me/some/thing' , false );
        yield array( 'http://notbypass.me' , true );
        yield array( 'http://bypass.menot' , true );
        yield array( 'http://dont.bypass.me' , true );
        yield array( 'http://skipthem.all' , false );
        yield array( 'http://notskipthem.all' , true );
        yield array( 'http://skipthem.allnot' , true );
        yield array( 'http://really.skipthem.all' , false );
        yield array( 'http://yeah.really.skipthem.all/some/thing' , false );
    }

    public function bypass_hosts_wildcard() {
        return 'bypass.me, *.skipthem.all';
    }

    /**
     * Check what URLs we should send through a proxy with 'bypass.me, *.skipthem.all' defined as by-passing hosts
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('proxy_bypass_wildcard')]
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
