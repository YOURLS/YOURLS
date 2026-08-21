<?php

use WpOrg\Requests\Hooks;
use WpOrg\Requests\Response;

/**
 * SSRF mitigation on the remote title fetch
 *
 * Tests must not depend on a working internet connection: whenever a host has to resolve to a
 * public address, the 'resolve_host_ips' or 'host_is_local' filter provides the answer instead of
 * the resolver. Hosts expected to be *local* are fine to check for real: they either resolve
 * locally (/etc/hosts, numeric forms parsed by the C library) or don't resolve at all, which the
 * code treats as local anyway.
 *
 * They must not depend on the state of constant YOURLS_USER either: whether it is defined by the
 * time we run depends on what earlier tests did (AuthTest logs in, and a constant is forever).
 * Tests that need the restriction on or off force it with the 'restrict_remote_title_fetch'
 * filter, and the gate itself is tested in a fresh process.
 *
 * @since 1.10.5
 */
#[\PHPUnit\Framework\Attributes\Group('http')]
class SSRFTest extends PHPUnit\Framework\TestCase {

    use NewProcessTrait;

    /**
     * Options received by yourls_http_request(), or null if it was never reached
     * @var ?array
     */
    protected $captured_options = null;

    protected function tearDown(): void {
        foreach( [ 'shunt_host_is_local', 'host_is_local', 'resolve_host_ips',
                   'restrict_remote_title_fetch', 'shunt_yourls_http_request' ] as $filter ) {
            yourls_remove_all_filters( $filter );
        }
        $this->captured_options = null;
        parent::tearDown();
    }

    /**
     * Hosts that must be considered local, ie not reachable on our behalf
     */
    public static function local_hosts(): \Iterator {
        // Loopback
        yield array( '127.0.0.1' );
        yield array( '127.255.255.254' );
        yield array( '::1' );
        yield array( '[::1]' );          // parse_url() keeps IPv6 hosts bracketed
        // Private ranges
        yield array( '10.0.0.1' );
        yield array( '172.16.0.1' );
        yield array( '192.168.1.1' );
        yield array( 'fc00::1' );
        yield array( '[fd12::1]' );
        // Link local, including the cloud metadata endpoint
        yield array( '169.254.169.254' );
        yield array( 'fe80::1' );
        yield array( '[fe80::1]' );
        // Reserved
        yield array( '0.0.0.0' );
        yield array( '::' );
        yield array( '240.0.0.1' );
        yield array( '255.255.255.255' );
        // IPv4 mapped IPv6, a classic way around a naive loopback check. PHP < 8.3 does not
        // reject these on its own, see yourls_ip_is_local()
        yield array( '::ffff:127.0.0.1' );
        yield array( '[0:0:0:0:0:ffff:7f00:1]' );
        yield array( '[::ffff:169.254.169.254]' );
        yield array( '::ffff:10.0.0.1' );
        yield array( '::127.0.0.1' );            // deprecated IPv4 compatible form
        // IPv6 transition addresses embedding a non public IPv4, see yourls_ip_is_local()
        yield array( '64:ff9b::7f00:1' );        // NAT64 well known prefix, 127.0.0.1
        yield array( '[64:ff9b::a9fe:a9fe]' );   // NAT64, cloud metadata endpoint
        yield array( '64:ff9b::c0a8:101' );      // NAT64, 192.168.1.1
        yield array( '64:ff9b:1::8.8.8.8' );     // RFC 8215 local use NAT64, public IPv4 or not
        yield array( '64:ff9b:1::' );
        yield array( '2002:7f00:1::' );          // 6to4, whole range is rejected
        yield array( '[2002:c0a8:101::1]' );
        yield array( '2002:808:808::' );         // 6to4 wrapping a public IPv4, still rejected
        yield array( '2001:0:4136:e378:8000:63bf:3fff:fdd2' );   // Teredo, whole range is rejected
        yield array( '[2001::1]' );
        // No host at all
        yield array( '' );
        yield array( '   ' );
    }

    /**
     * Hosts that must be considered public, ie fine to request
     */
    public static function public_hosts(): \Iterator {
        yield array( '8.8.8.8' );
        yield array( '1.1.1.1' );
        yield array( '172.32.0.1' );     // just outside 172.16/12
        yield array( '128.0.0.1' );
        yield array( '2606:4700::1' );
        yield array( '::ffff:8.8.8.8' ); // a public IPv4 stays public once unwrapped
        yield array( '64:ff9b::808:808' );      // NAT64 wrapping a public IPv4: this is what the prefix is for
        yield array( '[64:ff9b::1.1.1.1]' );
        /* Neighbors of the ranges we reject, to check we don't reject more than we mean to:.
         * Note that 2001:db8::/32, documentation range right next to Teredo, is deliberately not tested :
         * PHP had it in its reserved list up to 8.2 and dropped it in 8.3, so we're simply not testing it
         * rather than checking the PHP version.
         */
        yield array( '[2001:4860:4860::8888]' );
        yield array( '2003::1' );
    }

    /**
     * Ways of writing 'localhost' that filter_var() does not recognize as an IP
     *
     * These reach the resolver as host names. They are either resolved as localhost, or not recognized
     * and treated as local anyway.
     */
    public static function obfuscated_local_hosts(): \Iterator {
        yield array( 'localhost' );
        yield array( '127.1' );              // resolves to 127.0.0.1
        yield array( '2130706433' );         // decimal, resolves to 127.0.0.1
        yield array( '017700000001' );       // octal, resolves to 127.0.0.1
        yield array( '0x7f000001' );         // hexadecimal, unresolvable here
        yield array( '127.0.0.1.' );         // trailing dot, unresolvable here
        yield array( '0' );                  // resolves to 0.0.0.0
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('local_hosts')]
    public function test_host_is_local( $host ) {
        $this->assertTrue( yourls_host_is_local( $host ) );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('public_hosts')]
    public function test_host_is_not_local( $host ) {
        $this->assertFalse( yourls_host_is_local( $host ) );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('obfuscated_local_hosts')]
    public function test_obfuscated_local_host_is_local( $host ) {
        $this->assertTrue( yourls_host_is_local( $host ) );
    }

    /**
     * Anything that is not an IP is not public: yourls_ip_is_local() fails closed
     */
    public function test_ip_is_local_on_garbage() {
        $this->assertTrue( yourls_ip_is_local( '' ) );
        $this->assertTrue( yourls_ip_is_local( 'example.com' ) );
        $this->assertTrue( yourls_ip_is_local( '999.999.999.999' ) );
    }

    /**
     * A host name resolving to an IPv4 mapped IPv6 address is local too: the check applies to
     * resolved addresses, not only to literals
     */
    public function test_resolved_ipv4_mapped_address_is_local() {
        yourls_add_filter( 'resolve_host_ips', function() { return array( '::ffff:127.0.0.1' ); } );
        $this->assertTrue( yourls_host_is_local( 'example.com' ) );
    }

    /**
     * The attack this guards against: a host name whose AAAA record is a NAT64 address encoding
     * an internal IPv4. Nothing in the name or the record looks local to PHP.
     */
    public function test_resolved_nat64_address_is_local() {
        yourls_add_filter( 'resolve_host_ips', function() { return array( '64:ff9b::a9fe:a9fe' ); } );
        $this->assertTrue( yourls_host_is_local( 'example.com' ) );
    }

    /**
     * The local_hosts provider must exercise the code we think it does: every entry there is a
     * valid IP, not a string that is local merely because it fails to parse
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('transition_addresses')]
    public function test_transition_addresses_are_valid_ips( $ip ) {
        $this->assertNotFalse( filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 ) );
    }

    public static function transition_addresses(): \Iterator {
        yield array( '64:ff9b::7f00:1' );
        yield array( '64:ff9b::a9fe:a9fe' );
        yield array( '64:ff9b::808:808' );
        yield array( '64:ff9b:1::8.8.8.8' );
        yield array( '64:ff9b:1::' );
        yield array( '2002:7f00:1::' );
        yield array( '2002:c0a8:101::1' );
        yield array( '2002:808:808::' );
        yield array( '2001:0:4136:e378:8000:63bf:3fff:fdd2' );
        yield array( '2001::1' );
    }

    /**
     * A host that cannot be resolved is considered local
     */
    public function test_unresolvable_host_is_local() {
        $host = rand_str() . '.invalid';    // RFC 6761: '.invalid' is guaranteed never to resolve

        $this->assertSame( array(), yourls_resolve_host( $host ) );
        $this->assertTrue( yourls_host_is_local( $host ) );
    }

    /**
     * A host name is local as soon as one of its addresses is not public
     */
    public function test_host_is_local_if_any_resolved_ip_is_local() {
        yourls_add_filter( 'resolve_host_ips', function() { return array( '8.8.8.8', '1.1.1.1' ); } );
        $this->assertFalse( yourls_host_is_local( 'example.com' ) );

        yourls_remove_all_filters( 'resolve_host_ips' );

        yourls_add_filter( 'resolve_host_ips', function() { return array( '8.8.8.8', '10.0.0.1' ); } );
        $this->assertTrue( yourls_host_is_local( 'example.com' ) );
    }

    /**
     * Resolution failures must not leak a PHP warning, and must leave the error handler as it was
     */
    public function test_resolve_host_does_not_leak_warnings() {
        $seen = array();
        set_error_handler( function( $errno, $errstr ) use ( &$seen ) {
            $seen[] = $errstr;
            return true;
        } );

        // Longer than 255 chars: both dns_get_record() and gethostbynamel() raise an E_WARNING
        yourls_resolve_host( str_repeat( 'a', 300 ) . '.invalid' );

        // If yourls_resolve_host() restored the error handler, this one is ours again
        trigger_error( 'handler is back', E_USER_WARNING );
        restore_error_handler();

        $this->assertSame( array( 'handler is back' ), $seen );
    }

    /**
     * Plugins can bypass the whole check with the shunt filter
     */
    public function test_shunt_host_is_local() {
        yourls_add_filter( 'shunt_host_is_local', 'yourls_return_false' );
        $this->assertFalse( yourls_host_is_local( '127.0.0.1' ) );
    }

    /**
     * Plugins can have the final word on the result
     */
    public function test_host_is_local_filter() {
        yourls_add_filter( 'host_is_local', 'yourls_return_true' );
        $this->assertTrue( yourls_host_is_local( '8.8.8.8' ) );
    }

    /**
     * The filter gets the host unbracketed, so that a plugin doesn't have to deal with both forms
     */
    public function test_host_is_local_filter_gets_unbracketed_host() {
        $seen = null;
        yourls_add_filter( 'host_is_local', function( $is_local, $host ) use ( &$seen ) {
            $seen = $host;
            return $is_local;
        }, 10, 2 );

        yourls_host_is_local( '[::1]' );
        $this->assertSame( '::1', $seen );
    }

    /**
     * The documented escape hatch: a one liner plugin disables the restriction
     */
    public function test_restrict_remote_title_fetch_filter() {
        yourls_add_filter( 'restrict_remote_title_fetch', 'yourls_return_false' );
        $this->assertFalse( yourls_restrict_remote_title_fetch() );
    }

    /**
     * On a public install nobody is authenticated: restrict.
     *
     * Runs in a fresh process: the gate depends on constant YOURLS_USER, which cannot be
     * undefined once the test suite has defined it. See tests/includes/new-process.php
     */
    public function test_restrict_remote_title_fetch_on_public_install() {
        $report = $this->run_in_new_process( 'restrict-remote-title-fetch', array( 'YOURLS_PRIVATE' => false ) );

        $this->assertArrayNotHasKey( 'YOURLS_USER', $report['constants'] );
        $this->assertTrue( $report['constants']['YOURLS_TEST_RESTRICT_FETCH'] );
    }

    /**
     * On a private install the user is authenticated: don't restrict, intranet hosts must keep working
     */
    public function test_no_restrict_remote_title_fetch_on_private_install() {
        $report = $this->run_in_new_process( 'restrict-remote-title-fetch', array( 'YOURLS_PRIVATE' => true ) );

        $this->assertSame( 'yourls', $report['constants']['YOURLS_USER'] );
        $this->assertFalse( $report['constants']['YOURLS_TEST_RESTRICT_FETCH'] );
    }

    /**
     * Redirects are still followed, but with a guard registered on them
     */
    public function test_options_no_local_redirect() {
        $options = yourls_http_options_no_local_redirect();

        $this->assertInstanceOf( Hooks::class, $options['hooks'] );
        $this->assertSame( 3, $options['redirects'] );
    }

    /**
     * A redirect to a local host aborts the request.
     *
     * The exception must be a \WpOrg\Requests\Exception: this is what yourls_http_request()
     * catches, anything else would escape and fatal.
     */
    public function test_redirect_to_local_host_throws_requests_exception() {
        $this->expectException( \WpOrg\Requests\Exception::class );
        yourls_http_abort_local_redirect( 'http://169.254.169.254/latest/meta-data/' );
    }

    /**
     * Same, through the hook the option array actually registers
     */
    public function test_redirect_guard_is_registered_on_the_hook() {
        $options = yourls_http_options_no_local_redirect();

        $this->expectException( \WpOrg\Requests\Exception::class );
        $options['hooks']->dispatch( 'requests.before_redirect', array( 'http://127.0.0.1/' ) );
    }

    /**
     * A redirect to something with no host at all is blocked too
     */
    public function test_redirect_to_hostless_location_throws() {
        $this->expectException( \WpOrg\Requests\Exception::class );
        yourls_http_abort_local_redirect( 'not a URL' );
    }

    /**
     * A redirect to a public host is let through: 'http -> https' and the like must keep working
     */
    public function test_redirect_to_public_host_does_not_throw() {
        yourls_add_filter( 'host_is_local', 'yourls_return_false' );

        $this->expectNotToPerformAssertions();
        yourls_http_abort_local_redirect( 'https://example.com/somewhere' );
    }

    /**
     * Stand in for yourls_http_request(): record the options it was called with, return a page
     */
    public function capture_http_request( $return, $type, $url, $headers, $data, $options ) {
        $this->captured_options = $options;

        $response          = new Response();
        $response->raw     = 'HTTP/1.1 200 OK';
        $response->url     = $url;
        $response->body    = '<html><head><title>Some remote title</title></head><body>hi</body></html>';
        $response->headers = new \WpOrg\Requests\Response\Headers( array(
            'Content-Type'   => 'text/html; charset=utf-8',
            'Content-Length' => strlen( $response->body ),
        ) );

        return $response;
    }

    protected function shunt_http_request() {
        yourls_add_filter( 'shunt_yourls_http_request', array( $this, 'capture_http_request' ), 10, 6 );
    }

    /**
     * Force the restriction on, since we cannot rely on YOURLS_USER being undefined by now
     */
    protected function force_restriction() {
        yourls_add_filter( 'restrict_remote_title_fetch', 'yourls_return_true' );
    }

    /**
     * A local host is never requested at all, and the URL is returned as the title
     */
    public function test_remote_title_of_local_host_is_not_fetched() {
        $this->force_restriction();
        $this->shunt_http_request();

        $url = 'http://127.0.0.1/some-internal-page.html';

        $this->assertSame( $url, yourls_get_remote_title( $url ) );
        $this->assertNull( $this->captured_options, 'The request should not have been performed' );
    }

    /**
     * Same for a host that cannot be resolved
     */
    public function test_remote_title_of_unresolvable_host_is_not_fetched() {
        $this->force_restriction();
        $this->shunt_http_request();

        $url = 'http://' . rand_str() . '.invalid/page.html';

        $this->assertSame( $url, yourls_get_remote_title( $url ) );
        $this->assertNull( $this->captured_options );
    }

    /**
     * A public host is fetched as before, with the redirect guard added to the request options
     */
    public function test_remote_title_of_public_host_is_fetched_with_redirect_guard() {
        $this->force_restriction();
        yourls_add_filter( 'host_is_local', 'yourls_return_false' );
        $this->shunt_http_request();

        $this->assertSame( 'Some remote title', yourls_get_remote_title( 'http://example.com/page.html' ) );
        $this->assertInstanceOf( Hooks::class, $this->captured_options['hooks'] );
    }

    /**
     * With the restriction turned off, nothing is checked and no guard is added: this is the
     * behavior an authenticated user gets
     */
    public function test_remote_title_is_unrestricted_when_filtered_off() {
        yourls_add_filter( 'restrict_remote_title_fetch', 'yourls_return_false' );
        $this->shunt_http_request();

        $this->assertSame( 'Some remote title', yourls_get_remote_title( 'http://wiki.internal/page.html' ) );
        $this->assertArrayNotHasKey( 'hooks', $this->captured_options );
    }

}
