<?php

/**
 * Tests for yourls_get_IP()
 */

#[\PHPUnit\Framework\Attributes\Group('utils')]
#[\PHPUnit\Framework\Attributes\Group('ip')]
class GetIPTest extends PHPUnit\Framework\TestCase {

    private const SERVER_KEYS = [
        'REMOTE_ADDR',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_CLIENT_IP',
        'HTTP_VIA',
    ];

    private array $server_backup = [];

    public function setUp(): void {
        // Back up then clear every relevant $_SERVER key so each test starts clean
        foreach (self::SERVER_KEYS as $key) {
            $this->server_backup[$key] = $_SERVER[$key] ?? null;
            unset($_SERVER[$key]);
        }
    }

    public function tearDown(): void {
        // Restore $_SERVER to its original state
        foreach (self::SERVER_KEYS as $key) {
            if ($this->server_backup[$key] === null) {
                unset($_SERVER[$key]);
            } else {
                $_SERVER[$key] = $this->server_backup[$key];
            }
        }
        // Drop any filters added during a test.
        yourls_remove_all_filters('get_ip_trusted_proxies');
        yourls_remove_all_filters('get_IP');
    }

    /**
     * Register a trusted proxy list through the 'get_ip_trusted_proxies' filter
     */
    private function set_trusted_proxies(array $proxies): void {
        yourls_add_filter('get_ip_trusted_proxies', function () use ($proxies) {
            return $proxies;
        });
    }

    /**
     * By default, the IP is simply REMOTE_ADDR
     */
    public function test_default_returns_remote_addr() {
        // IPv4
        $_SERVER['REMOTE_ADDR'] = '1.2.3.4';
        $this->assertSame('1.2.3.4', yourls_get_IP());
        // IPv6
        $_SERVER['REMOTE_ADDR'] = '2001:db8::ff00:42:8329';
        $this->assertSame('2001:db8::ff00:42:8329', yourls_get_IP());
    }

    /**
     * When no trusted proxies are configured, proxy headers must be ignored
     * even if they are present
     */
    public function test_default_ignores_proxy_headers() {
        $_SERVER['REMOTE_ADDR']          = '1.2.3.4';
        $_SERVER['HTTP_X_FORWARDED_FOR'] = '9.9.9.9';
        $_SERVER['HTTP_CLIENT_IP']       = '8.8.8.8';
        $_SERVER['HTTP_VIA']             = '7.7.7.7';
        $this->assertSame('1.2.3.4', yourls_get_IP());
    }

    /**
     * No REMOTE_ADDR returns ''
     */
    public function test_missing_remote_addr_returns_empty_string() {
        // setUp() already unset REMOTE_ADDR
        $this->assertSame('', yourls_get_IP());
    }

    /**
     * A request coming from a trusted proxy uses HTTP_X_FORWARDED_FOR
     */
    public function test_trusted_proxy_uses_x_forwarded_for() {
        $_SERVER['REMOTE_ADDR']          = '10.0.0.1';
        $_SERVER['HTTP_X_FORWARDED_FOR'] = '1.2.3.4';
        $this->set_trusted_proxies(['10.0.0.1']);
        $this->assertSame('1.2.3.4', yourls_get_IP());
    }

    /**
     * Header precedence: HTTP_X_FORWARDED_FOR wins over the others when set
     */
    public function test_trusted_proxy_x_forwarded_for_has_precedence() {
        $_SERVER['REMOTE_ADDR']          = '10.0.0.1';
        $_SERVER['HTTP_X_FORWARDED_FOR'] = '1.1.1.1';
        $_SERVER['HTTP_CLIENT_IP']       = '2.2.2.2';
        $_SERVER['HTTP_VIA']             = '3.3.3.3';
        $this->set_trusted_proxies(['10.0.0.1']);
        $this->assertSame('1.1.1.1', yourls_get_IP());
    }

    /**
     * Header precedence: HTTP_CLIENT_IP is used when HTTP_X_FORWARDED_FOR is
     * absent or empty. An empty X-Forwarded-For must not delete REMOTE_ADDR
     */
    public function test_trusted_proxy_falls_back_to_client_ip() {
        $_SERVER['REMOTE_ADDR']          = '10.0.0.1';
        $_SERVER['HTTP_X_FORWARDED_FOR'] = ''; // empty -> skipped
        $_SERVER['HTTP_CLIENT_IP']       = '2.2.2.2';
        $_SERVER['HTTP_VIA']             = '3.3.3.3';
        $this->set_trusted_proxies(['10.0.0.1']);
        $this->assertSame('2.2.2.2', yourls_get_IP());
    }

    /**
     * Header precedence: HTTP_VIA is the last resort header
     */
    public function test_trusted_proxy_falls_back_to_via() {
        $_SERVER['REMOTE_ADDR'] = '10.0.0.1';
        $_SERVER['HTTP_VIA']    = '3.3.3.3';
        $this->set_trusted_proxies(['10.0.0.1']);
        $this->assertSame('3.3.3.3', yourls_get_IP());
    }

    /**
     * A trusted proxy that sends no forwarding header falls back to its own
     * address (REMOTE_ADDR)
     */
    public function test_trusted_proxy_without_headers_returns_remote_addr() {
        $_SERVER['REMOTE_ADDR'] = '10.0.0.1';
        $this->set_trusted_proxies(['10.0.0.1']);
        $this->assertSame('10.0.0.1', yourls_get_IP());
    }

    /**
     * If REMOTE_ADDR is not in the trusted proxy list, headers are ignored
     * regardless of the configured list
     */
    public function test_untrusted_source_ignores_headers() {
        $_SERVER['REMOTE_ADDR']          = '5.5.5.5';
        $_SERVER['HTTP_X_FORWARDED_FOR'] = '1.2.3.4';
        $this->set_trusted_proxies(['10.0.0.1']);
        $this->assertSame('5.5.5.5', yourls_get_IP());
    }

    /**
     * When the chosen header carries a chain of IPs ("client, proxy1, proxy2"),
     * only the first is kept
     */
    public function test_multiple_ips_in_header_takes_first() {
        $_SERVER['REMOTE_ADDR']          = '10.0.0.1';
        $_SERVER['HTTP_X_FORWARDED_FOR'] = '1.2.3.4, 5.6.7.8, 9.10.11.12';
        $this->set_trusted_proxies(['10.0.0.1']);
        $this->assertSame('1.2.3.4', yourls_get_IP());
    }

    /**
     * The "take the first IP" logic also applies to REMOTE_ADDR itself
     */
    public function test_multiple_ips_in_remote_addr_takes_first() {
        $_SERVER['REMOTE_ADDR'] = '1.2.3.4,5.6.7.8';
        $this->assertSame('1.2.3.4', yourls_get_IP());
    }

    /**
     * Characters outside the allowed IP char set are stripped by sanitization,
     * protecting against header injection. Results are DB safe, even if not valid IPs.
     */
    public function test_invalid_characters_are_sanitized() {
        $_SERVER['REMOTE_ADDR'] = '192.168.0.1xyz';
        $this->assertSame('192.168.0.1', yourls_get_IP());

        $_SERVER['REMOTE_ADDR'] = '192.168.0.1.1.2.2.2';
        $this->assertSame('192.168.0.1.1.2.2.2', yourls_get_IP());

        $_SERVER['REMOTE_ADDR'] = "2001:db8::ff00:42:8329\r\nInjected: header";
        $this->assertSame('2001:db8::ff00:42:8329eced: eade', yourls_get_IP());
    }

    /**
     * A spoofed X-Forwarded-For from a trusted proxy is still sanitized
     */
    public function test_header_value_is_sanitized() {
        $_SERVER['REMOTE_ADDR']          = '10.0.0.1';
        $_SERVER['HTTP_X_FORWARDED_FOR'] = "1.2.3.4\r\nInjected: header";
        $this->set_trusted_proxies(['10.0.0.1']);
        $this->assertSame('1.2.3.4eced: eade', yourls_get_IP());
    }

    /**
     * The 'get_IP' filter can override the final returned value.
     */
    public function test_get_ip_filter_overrides_result() {
        $_SERVER['REMOTE_ADDR'] = '1.2.3.4';
        yourls_add_filter('get_IP', function () {
            return '255.255.255.255';
        });
        $this->assertSame('255.255.255.255', yourls_get_IP());
    }

}
