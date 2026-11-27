<?php

/**
 * Redirection URL after a successful login form submission
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
class LoginRedirectTest extends PHPUnit\Framework\TestCase {

    public static function request_uris(): array {
        return [
            'admin page with query'      => ['/admin/upgrade.php?step=1', './upgrade.php?step=1'],
            'admin page in subdir'       => ['/yourls/admin/upgrade.php?step=2', './upgrade.php?step=2'],
            'admin directory'            => ['/admin/', './'],
            'admin directory with query' => ['/admin/?foo=1&bar=2', './?foo=1&bar=2'],
            'site root'                  => ['/', './'],
            'subdir root, no slash'      => ['/yourls', './yourls'],
            'stats page'                 => ['/abc+', './abc+'],
            'colon in path'              => ['/abc:123', './abc:123'],
            'URL in query string'        => ['/admin/index.php?u=http://example.com/?a=b', './index.php?u=http://example.com/?a=b'],
            'empty query string'         => ['/admin/index.php?', './index.php?'],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('request_uris')]
    public function test_login_redirect(string $request_uri, string $expected): void {
        $this->assertSame($expected, yourls_get_login_redirect_url($request_uri));
    }

    /**
     * The redirection must stay on the same host, whatever the request URI looks like
     */
    public static function evil_request_uris(): array {
        return [
            'protocol relative' => ['//evil.com/admin/'],
            'full URL'          => ['http://evil.com/'],
            'javascript scheme' => ['javascript:alert(1)'],
            'CRLF injection'    => ["/admin/index.php?a=%0d%0aSet-Cookie:x"],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('evil_request_uris')]
    public function test_login_redirect_stays_relative(string $request_uri): void {
        $redirect = yourls_get_login_redirect_url($request_uri);
        $this->assertStringStartsWith('./', $redirect);
        $this->assertStringNotContainsStringIgnoringCase('%0d', $redirect);
        $this->assertStringNotContainsStringIgnoringCase('%0a', $redirect);
    }

}
