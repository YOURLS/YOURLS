<?php

/**
 * Tests for yourls-loader.php
 *
 * The loader is a script that redirects and exits, so each request runs in a new process, with
 * hooks recording which branch the loader took (stats, redirection, pages, favicon....). See tests/data/scripts/scenarios/loader.php
 * and tests/includes/new-process.php
 */
#[\PHPUnit\Framework\Attributes\Group('shorturls')]
class LoaderTest extends PHPUnit\Framework\TestCase {

    use NewProcessTrait;

    /**
     * Short URLs created for these tests, as $keyword => $url
     */
    const LINKS = [
        'loadertest' => 'https://example.com/loadertest',
        '0'          => 'https://example.com/zero',
    ];

    public static function setUpBeforeClass(): void {
        foreach (self::LINKS as $keyword => $url) {
            yourls_delete_link_by_keyword($keyword);
            yourls_insert_link_in_db($url, $keyword);
        }
    }

    public static function tearDownAfterClass(): void {
        foreach (array_keys(self::LINKS) as $keyword) {
            yourls_delete_link_by_keyword($keyword);
        }
    }

    /**
     * Run the loader on a request, return what it did
     *
     * @param string $request  Request relative to YOURLS root, eg 'abc+'
     * @return array           'output' => what the loader printed, and every YOURLS_TEST_* constant
     *                         the scenario defined, without the prefix (eg 'GO', 'REDIRECT')
     */
    protected function run_loader(string $request): array {
        $report = $this->run_in_new_process('loader', ['YOURLS_TEST_REQUEST' => $request]);

        $result = ['output' => $report['output']];
        foreach ($report['constants'] as $name => $value) {
            if (str_starts_with($name, 'YOURLS_TEST_') && !in_array($name, ['YOURLS_TEST_REQUEST', 'YOURLS_TESTDATA_DIR'])) {
                $result[substr($name, strlen('YOURLS_TEST_'))] = $value;
            }
        }

        return $result;
    }

    /**
     * Loader serving /favicon.ico as a GIF
     */
    public function test_favicon(): void {
        $result = $this->run_loader('favicon.ico');

        $this->assertStringStartsWith('GIF89a', $result['output']);
        $this->assertArrayNotHasKey('FAILED', $result);
        $this->assertArrayNotHasKey('REDIRECT', $result);
    }

    /**
     * Loader serving /robots.txt
     */
    public function test_robots_txt(): void {
        $result = $this->run_loader('robots.txt');

        $this->assertSame("User-agent: *\nDisallow:\n", $result['output']);
        $this->assertArrayNotHasKey('FAILED', $result);
        $this->assertArrayNotHasKey('REDIRECT', $result);
    }

    /**
     * Existing short URLs redirect to their long URL
     *
     * We make 0 a special case because it's falsy in PHP - see https://github.com/YOURLS/YOURLS/issues/4200#issuecomment-6615551607
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('short_url_requests')]
    public function test_short_url(string $request, string $keyword): void {
        $result = $this->run_loader($request);

        $this->assertSame('', $result['output']);
        $this->assertSame($keyword, $result['GO']);
        $this->assertSame([self::LINKS[$keyword], $keyword], $result['SHORTURL']);
        $this->assertSame([self::LINKS[$keyword], 301], $result['REDIRECT']);
        $this->assertArrayNotHasKey('FAILED', $result);
    }

    public static function short_url_requests(): array {
        return [
            'keyword'                  => ['loadertest', 'loadertest'],
            'keyword with trailing /'  => ['loadertest/', 'loadertest'],
            'keyword "0"'              => ['0', '0'],
        ];
    }

    /**
     * Stat pages of existing short URLs load the stat template
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('stat_page_requests')]
    public function test_stat_page(string $request, string $keyword, bool $all): void {
        $result = $this->run_loader($request);

        $this->assertSame('', $result['output']);
        $this->assertSame($keyword, $result['INFOS']);
        // '+all' only aggregates stats when duplicate long URLs are allowed
        $this->assertSame($all && yourls_allow_duplicate_longurls(), $result['AGGREGATE']);
        $this->assertArrayNotHasKey('GO', $result);
        $this->assertArrayNotHasKey('FAILED', $result);
    }

    public static function stat_page_requests(): array {
        return [
            'keyword+'    => ['loadertest+', 'loadertest', false],
            'keyword+all' => ['loadertest+all', 'loadertest', true],
            'keyword+/'   => ['loadertest+/', 'loadertest', false],
            '0+'          => ['0+', '0', false],
        ];
    }

    /**
     * Pages (in YOURLS_PAGEDIR) are displayed
     */
    public function test_page(): void {
        $result = $this->run_loader('examplepage');

        $this->assertSame('', $result['output']);
        $this->assertSame('examplepage', $result['GO']);
        $this->assertSame('examplepage', $result['PAGE']);
        $this->assertArrayNotHasKey('REDIRECT', $result);
        $this->assertArrayNotHasKey('FAILED', $result);
    }

    /**
     * A request with a scheme is sent to the admin, as a URL to shorten ("Prefix-n-Shorten")
     */
    public function test_bookmarklet(): void {
        $result = $this->run_loader('https://example.com/page?q=1');

        $this->assertSame('', $result['output']);
        $this->assertSame('https://example.com/page?q=1', $result['BOOKMARKLET']);
        $expected = yourls_admin_url('index.php') . '?up=https%3A&us=%2F%2F&ur=example.com%2Fpage%3Fq%3D1';
        $this->assertSame([$expected, 302], $result['REDIRECT']);
        $this->assertArrayNotHasKey('FAILED', $result);
    }

    /**
     * Requests the loader cannot make sense of redirect to the YOURLS root
     *
     * The empty request (root URL served by the loader) used to fatal, see issue #4200
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('failed_requests')]
    public function test_failed_request(string $request, ?string $keyword): void {
        $result = $this->run_loader($request);

        $this->assertSame('', $result['output']);
        // Plugins hooked here get null when there's no keyword at all, as they always did
        $this->assertSame($keyword, $result['NOT_FOUND']);
        $this->assertSame($request, $result['FAILED']);
        $this->assertSame([YOURLS_SITE, 302], $result['REDIRECT']);
        $this->assertArrayNotHasKey('GO', $result);
        $this->assertArrayNotHasKey('INFOS', $result);
        $this->assertArrayNotHasKey('BOOKMARKLET', $result);
    }

    public static function failed_requests(): array {
        return [
            'empty request'            => ['', null],
            'unknown keyword'          => ['loadertest-nope', 'loadertest-nope'],
            'stat page of unknown'     => ['loadertest-nope+', 'loadertest-nope'],
            'path traversal to a page' => ['../examplepage', '../examplepage'],
            'path traversal, Windows'  => ['..\\examplepage', '..\\examplepage'],
            'disallowed scheme'        => ['javascript:alert(1)', 'javascript:alert(1)'],
        ];
    }

}
