<?php

/**
 * Utilities
 */
#[\PHPUnit\Framework\Attributes\Group('utils')]
class GetRequestTest extends PHPUnit\Framework\TestCase {

    /**
     * Various scenario:
     *  - YOURLS hosted on http or https
     *  - YOURLS configured with or without www
     *  - short URL requested with or without www
     *  - YOURLS installed in root or subdir
     */
    public static function requests(): \Iterator
    {
        // Format:
        // array('expected', 'YOURLS_SITE', '/request_uri'),
        // 1. short URL without www
        yield array('blah', 'http://sho.rt', '/blah');
        yield array('bleh', 'https://sho.rt', '/bleh');
        yield array('bloh', 'http://www.sho.rt', '/bloh');
        yield array('bluh', 'https://www.sho.rt', '/bluh');
        // 2. short URL with www
        yield array('meeh', 'http://sho.rt', '/meeh');
        yield array('maah', 'https://sho.rt', '/maah');
        yield array('muuh', 'http://www.sho.rt', '/muuh');
        yield array('mooh', 'https://www.sho.rt', '/mooh');
        // 3. Same as 1, with YOURLS in subdir
        yield array('hehe', 'http://sho.rt/yourls', '/yourls/hehe');
        yield array('haha', 'https://sho.rt/yourls', '/yourls/haha');
        yield array('hoho', 'http://www.sho.rt/yourls', '/yourls/hoho');
        yield array('huhu', 'https://www.sho.rt/yourls', '/yourls/huhu');
        // 4. Same as 2, with YOURLS in subdir
        yield array('ozhy', 'http://sho.rt/yourls', '/yourls/ozhy');
        yield array('yhzo', 'https://sho.rt/yourls', '/yourls/yhzo');
        yield array('zohy', 'http://www.sho.rt/yourls', '/yourls/zohy');
        yield array('zoyh', 'https://www.sho.rt/yourls', '/yourls/zoyh');
        // All the same tests, with a trailing slash on YOURLS_SITE
        yield array('blah', 'http://sho.rt/', '/blah');
        yield array('bleh', 'https://sho.rt/', '/bleh');
        yield array('bloh', 'http://www.sho.rt/', '/bloh');
        yield array('bluh', 'https://www.sho.rt/', '/bluh');
        yield array('meeh', 'http://sho.rt/', '/meeh');
        yield array('maah', 'https://sho.rt/', '/maah');
        yield array('muuh', 'http://www.sho.rt/', '/muuh');
        yield array('mooh', 'https://www.sho.rt/', '/mooh');
        yield array('hehe', 'http://sho.rt/yourls/', '/yourls/hehe');
        yield array('haha', 'https://sho.rt/yourls/', '/yourls/haha');
        yield array('hoho', 'http://www.sho.rt/yourls/', '/yourls/hoho');
        yield array('huhu', 'https://www.sho.rt/yourls/', '/yourls/huhu');
        yield array('ozhy', 'http://sho.rt/yourls/', '/yourls/ozhy');
        yield array('yhzo', 'https://sho.rt/yourls/', '/yourls/yhzo');
        yield array('zohy', 'http://www.sho.rt/yourls/', '/yourls/zohy');
        yield array('zoyh', 'https://www.sho.rt/yourls/', '/yourls/zoyh');
        // For people having fun with MixEd case UrLs
        yield array('MiXeD', 'http://SHO.rt/', '/MiXeD');
        yield array('CaSe', 'http://SHO.rt/Yourls/', '/Yourls/CaSe');
        // Internal pages, sort of
        // Note that in a real case use, this won't happen since the client request won't trigger the .htaccess rewrite rules
        yield array('admin/index.php', 'https://www.sho.rt', '/admin/index.php');
        yield array('admin/tools.php', 'http://www.sho.rt/yourls', '/yourls/admin/tools.php');
        yield array('admin/plugins.php', 'https://sho.rt/yourls/', '/yourls/admin/plugins.php');
        // Unexpected URI (out of YOURLS base) should return itself
        // Note that in a real case use, this won't happen since the client request won't trigger the .htaccess rewrite rules
        yield array('something.else/blah', 'http://sho.rt', '/something.else/blah');
        yield array('something.else/blah', 'https://www.sho.rt', '/something.else/blah');
        yield array('/oops', 'https://www.sho.rt/yourls', '/oops');
        // Query strings which should be ignored
        yield array('behemoth', 'http://sho.rt', '/behemoth?sho.rt');
        yield array('behemoth', 'http://sho.rt/behemoth', '/behemoth/behemoth?behemoth');
        // "Prefix and shorten" scenarios (query strings which should be preserved)
        yield array('http://longurl', 'http://sho.rt', '/http://longurl');
        yield array('http://longurl', 'https://sho.rt/yourls', '/yourls/http://longurl');
        yield array('http://longurl?https://sho.rt/yourls', 'https://sho.rt/yourls', '/yourls/http://longurl?https://sho.rt/yourls');
        yield array('http://sho.rt/somepage', 'http://sho.rt', '/http://sho.rt/somepage');
        yield array('http://www.sho.rt/sub/dir/', 'http://www.sho.rt/sub/dir/', '/sub/dir///http://www.sho.rt/sub/dir/');
    }

    /**
     * Check we always guess the "request" right (eg 'abcd' when someones requests 'http://sho.rt/abcd')
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('requests')]
    public function test_get_request($expected, $yourls_site, $uri) {
        $this->assertSame( $expected, yourls_get_request($yourls_site, $uri) );
    }
}
