<?php

/**
 * Admin SSL redirect URL
 */
#[\PHPUnit\Framework\Attributes\Group('http')]
class SSLRedirectTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_all_filters('get_yourls_site');
        yourls_remove_all_filters('get_ssl_redirect_url');
    }

    /**
     * Set the YOURLS site URL for the duration of a test
     *
     * @param string $site
     */
    protected function set_site(string $site): void {
        yourls_add_filter('get_yourls_site', fn() => $site);
    }

    /**
     * Requested URIs and the expected redirect, with YOURLS_SITE = http://sho.rt
     */
    public static function request_uris(): \Iterator {
        // Regular requests: path and query kept
        yield ['/admin/index.php', 'https://sho.rt/admin/index.php'];
        yield ['/admin/tools.php?a=b&c=d', 'https://sho.rt/admin/tools.php?a=b&c=d'];
        yield ['/admin/', 'https://sho.rt/admin/'];

        // Absolute-form URIs: foreign host dropped
        yield ['http://evil.example/admin/index.php', 'https://sho.rt/admin/index.php'];
        yield ['https://evil.example/admin/?x=1', 'https://sho.rt/admin/?x=1'];
        yield ['http://sho.rt/admin/index.php', 'https://sho.rt/admin/index.php'];
        yield ['http://evil.example', 'https://sho.rt/'];

        // Protocol-relative URIs: foreign host dropped
        yield ['//evil.example/admin/', 'https://sho.rt/admin/'];
        yield ['//evil.example', 'https://sho.rt/'];

        // Odd or empty values
        yield ['', 'https://sho.rt/'];
        yield ['?a=b', 'https://sho.rt/?a=b'];
        yield ['admin/index.php', 'https://sho.rt/admin/index.php'];
        yield ['/admin/index.php#frag', 'https://sho.rt/admin/index.php'];
        yield ['http:///evil', 'https://sho.rt/'];
    }

    /**
     * HTTPS isn't affected
     */
    public function test_already_ssl_redirect(): void {
        $this->set_site('https://sho.rt');
        $this->assertSame('https://sho.rt/admin/something', yourls_get_ssl_redirect_url('/admin/something'));
    }

    /**
     * Redirect always targets the configured host
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('request_uris')]
    public function test_ssl_redirect_url(string $request_uri, string $expected): void {
        $this->set_site('http://sho.rt');
        $this->assertSame($expected, yourls_get_ssl_redirect_url($request_uri));
    }

    /**
     * Returned URL goes through the 'get_ssl_redirect_url' filter
     */
    public function test_ssl_redirect_url_is_filtered(): void {
        $this->set_site('http://sho.rt');
        $received = null;
        yourls_add_filter('get_ssl_redirect_url', function($url) use (&$received) {
            $received = $url;
            return 'https://other.example/';
        });

        $this->assertSame('https://other.example/', yourls_get_ssl_redirect_url('/admin/index.php'));
        $this->assertSame('https://sho.rt/admin/index.php', $received);
    }

    /**
     * Install in a subdirectory: path not duplicated
     */
    public function test_ssl_redirect_url_subdirectory(): void {
        $this->set_site('http://example.com/yourls');
        $this->assertSame('https://example.com/yourls/admin/index.php',
            yourls_get_ssl_redirect_url('/yourls/admin/index.php'));
        $this->assertSame('https://example.com/yourls/admin/index.php',
            yourls_get_ssl_redirect_url('http://evil.example/yourls/admin/index.php'));
    }

    /**
     * Port from the configured site is kept
     */
    public function test_ssl_redirect_url_port(): void {
        $this->set_site('http://sho.rt:8443');
        $this->assertSame('https://sho.rt:8443/admin/', yourls_get_ssl_redirect_url('/admin/'));
    }

    /**
     * Host header is ignored
     */
    public function test_ssl_redirect_url_ignores_host_header(): void {
        $this->set_site('http://sho.rt');
        $backup = $_SERVER['HTTP_HOST'] ?? null;
        $_SERVER['HTTP_HOST'] = 'evil.example';

        $this->assertSame('https://sho.rt/admin/index.php', yourls_get_ssl_redirect_url('/admin/index.php'));

        if ($backup === null) {
            unset($_SERVER['HTTP_HOST']);
        } else {
            $_SERVER['HTTP_HOST'] = $backup;
        }
    }

}
