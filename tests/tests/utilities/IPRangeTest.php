<?php

/**
 * Tests for yourls_ip_matches_range() and yourls_ip_is_in_ip_list()
 */

#[\PHPUnit\Framework\Attributes\Group('utils')]
#[\PHPUnit\Framework\Attributes\Group('ip')]
class IPRangeTest extends PHPUnit\Framework\TestCase {

    /**
     * Cases where the IP is expected to match the range
     */
    public static function matching_ranges(): \Iterator {
        // Format: array($ip, $range)

        // Single IPv4, exact match
        yield 'IPv4 exact'                  => ['192.168.1.1', '192.168.1.1'];
        // Single IPv6, exact match (compressed vs compressed)
        yield 'IPv6 exact'                  => ['2001:db8::1', '2001:db8::1'];
        // Single IPv6, exact match with different (but equivalent) notations
        yield 'IPv6 exact, mixed notation'  => ['2001:db8::1', '2001:0db8:0000:0000:0000:0000:0000:0001'];

        // IPv4 CIDR, address inside the range
        yield 'IPv4 /24 inside'             => ['10.0.0.5', '10.0.0.0/24'];
        yield 'IPv4 /24 first host'         => ['10.0.0.0', '10.0.0.0/24'];
        yield 'IPv4 /24 last host'          => ['10.0.0.255', '10.0.0.0/24'];
        // IPv4 CIDR on a non byte-aligned boundary (/28 covers .0 - .15)
        yield 'IPv4 /28 inside'             => ['192.168.1.5', '192.168.1.0/28'];
        yield 'IPv4 /28 boundary'           => ['192.168.1.15', '192.168.1.0/28'];
        // /32 is a single host
        yield 'IPv4 /32 exact'              => ['8.8.8.8', '8.8.8.8/32'];
        // /0 matches every IPv4 address
        yield 'IPv4 /0 matches anything'    => ['203.0.113.42', '0.0.0.0/0'];

        // IPv6 CIDR, address inside the range
        yield 'IPv6 /32 inside'             => ['2400:cb00::1', '2400:cb00::/32'];
        yield 'IPv6 /64 inside'             => ['2001:db8:abcd:0012::1', '2001:db8:abcd:0012::/64'];
        yield 'IPv6 /128 exact'             => ['2001:db8::1', '2001:db8::1/128'];
    }

    /**
     * Cases where the IP is expected NOT to match the range
     */
    public static function non_matching_ranges(): \Iterator {
        // Format: array($ip, $range)

        // Single IP, different addresses
        yield 'IPv4 different'              => ['192.168.1.1', '192.168.1.2'];
        yield 'IPv6 different'              => ['2001:db8::1', '2001:db8::2'];

        // IPv4 CIDR, address outside the range
        yield 'IPv4 /24 outside'            => ['10.0.1.5', '10.0.0.0/24'];
        yield 'IPv4 /28 just outside'       => ['192.168.1.16', '192.168.1.0/28'];
        yield 'IPv4 /32 different host'     => ['8.8.8.9', '8.8.8.8/32'];

        // IPv6 CIDR, address outside the range
        yield 'IPv6 /32 outside'            => ['2400:cb01::1', '2400:cb00::/32'];
        yield 'IPv6 /64 outside'            => ['2001:db8:abcd:0013::1', '2001:db8:abcd:0012::/64'];

        // Protocol mismatch: comparing IPv4 against IPv6 (and vice versa)
        yield 'IPv4 ip vs IPv6 CIDR'        => ['10.0.0.5', '2400:cb00::/32'];
        yield 'IPv6 ip vs IPv4 CIDR'        => ['2400:cb00::1', '10.0.0.0/24'];

        // Invalid input
        yield 'invalid ip, valid CIDR'      => ['not-an-ip', '10.0.0.0/24'];
        yield 'valid ip, invalid subnet'    => ['10.0.0.5', 'not-an-ip/24'];
        yield 'valid ip, invalid single'    => ['10.0.0.5', 'not-an-ip'];
    }

    /**
     * Valid checks
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('matching_ranges')]
    public function test_ip_matches_range_true(string $ip, string $range) {
        $this->assertTrue( yourls_ip_matches_range($ip, $range) );
    }

    /**
     * Invalid checks
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('non_matching_ranges')]
    public function test_ip_matches_range_false(string $ip, string $range) {
        $this->assertFalse( yourls_ip_matches_range($ip, $range) );
    }

    /**
     * An empty proxy list never matches
     */
    public function test_ip_is_in_ip_list_empty_list() {
        $this->assertFalse( yourls_ip_is_in_ip_list('10.0.0.5', []) );
    }

    /**
     * The IP matches a single (exact) entry of the list
     */
    public function test_ip_is_in_ip_list_exact_match() {
        $list = ['192.168.0.1', '10.0.0.1', '172.16.0.1'];
        $this->assertTrue( yourls_ip_is_in_ip_list('10.0.0.1', $list) );
    }

    /**
     * The IP matches a CIDR entry of the list
     */
    public function test_ip_is_in_ip_list_cidr_match() {
        $list = ['192.168.0.1', '10.0.0.0/8', '172.16.0.0/12'];
        $this->assertTrue( yourls_ip_is_in_ip_list('10.20.30.40', $list) );
    }

    /**
     * The IP matches an IPv6 CIDR entry mixed in with IPv4 entries
     */
    public function test_ip_is_in_ip_list_mixed_ipv4_ipv6() {
        $list = ['10.0.0.0/8', '2400:cb00::/32'];
        $this->assertTrue( yourls_ip_is_in_ip_list('2400:cb00::1', $list) );
    }

    /**
     * The IP matches none of the list entries
     */
    public function test_ip_is_in_ip_list_no_match() {
        $list = ['192.168.0.1', '10.0.0.0/8', '2400:cb00::/32'];
        $this->assertFalse( yourls_ip_is_in_ip_list('203.0.113.42', $list) );
    }
}
