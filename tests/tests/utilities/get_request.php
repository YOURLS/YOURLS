<?php

/**
 * Utilities
 *
 * @group utils
 */

class GetRequest_Tests extends PHPUnit\Framework\TestCase {

    /**
     * Various scenario:
     *  - YOURLS hosted on http or https
     *  - YOURLS configured with or without www
     *  - short URL requested with or without www
     *  - YOURLS installed in root or subdir
     */
    public function requests() {
        return array(
            // Format:
            // array('expected', 'YOURLS_SITE', '/request_uri'),

            // 1. short URL without www
            array('blah', 'http://sho.rt', '/blah'),
            array('bleh', 'https://sho.rt', '/bleh'),
            array('bloh', 'http://www.sho.rt', '/bloh'),
            array('bluh', 'https://www.sho.rt', '/bluh'),

            // 2. short URL with www
            array('meeh', 'http://sho.rt', '/meeh'),
            array('maah', 'https://sho.rt', '/maah'),
            array('muuh', 'http://www.sho.rt', '/muuh'),
            array('mooh', 'https://www.sho.rt', '/mooh'),

            // 3. Same as 1, with YOURLS in subdir
            array('hehe', 'http://sho.rt/yourls', '/yourls/hehe'),
            array('haha', 'https://sho.rt/yourls', '/yourls/haha'),
            array('hoho', 'http://www.sho.rt/yourls', '/yourls/hoho'),
            array('huhu', 'https://www.sho.rt/yourls', '/yourls/huhu'),

            // 4. Same as 2, with YOURLS in subdir
            array('ozhy', 'http://sho.rt/yourls', '/yourls/ozhy'),
            array('yhzo', 'https://sho.rt/yourls', '/yourls/yhzo'),
            array('zohy', 'http://www.sho.rt/yourls', '/yourls/zohy'),
            array('zoyh', 'https://www.sho.rt/yourls', '/yourls/zoyh'),


            // All the same tests, with a trailing slash on YOURLS_SITE

            array('blah', 'http://sho.rt/', '/blah'),
            array('bleh', 'https://sho.rt/', '/bleh'),
            array('bloh', 'http://www.sho.rt/', '/bloh'),
            array('bluh', 'https://www.sho.rt/', '/bluh'),

            array('meeh', 'http://sho.rt/', '/meeh'),
            array('maah', 'https://sho.rt/', '/maah'),
            array('muuh', 'http://www.sho.rt/', '/muuh'),
            array('mooh', 'https://www.sho.rt/', '/mooh'),

            array('hehe', 'http://sho.rt/yourls/', '/yourls/hehe'),
            array('haha', 'https://sho.rt/yourls/', '/yourls/haha'),
            array('hoho', 'http://www.sho.rt/yourls/', '/yourls/hoho'),
            array('huhu', 'https://www.sho.rt/yourls/', '/yourls/huhu'),

            array('ozhy', 'http://sho.rt/yourls/', '/yourls/ozhy'),
            array('yhzo', 'https://sho.rt/yourls/', '/yourls/yhzo'),
            array('zohy', 'http://www.sho.rt/yourls/', '/yourls/zohy'),
            array('zoyh', 'https://www.sho.rt/yourls/', '/yourls/zoyh'),


            // For people having fun with MixEd case UrLs
            array('MiXeD', 'http://SHO.rt/', '/MiXeD'),
            array('CaSe', 'http://SHO.rt/Yourls/', '/Yourls/CaSe'),


            // Internal pages, sort of
            // Note that in a real case use, this won't happen since the client request won't trigger the .htaccess rewrite rules
            array('admin/index.php', 'https://www.sho.rt', '/admin/index.php'),
            array('admin/tools.php', 'http://www.sho.rt/yourls', '/yourls/admin/tools.php'),
            array('admin/plugins.php', 'https://sho.rt/yourls/', '/yourls/admin/plugins.php'),


            // Unexpected URI (out of YOURLS base) should return itself
            // Note that in a real case use, this won't happen since the client request won't trigger the .htaccess rewrite rules
            array('something.else/blah', 'http://sho.rt', '/something.else/blah'),
            array('something.else/blah', 'https://www.sho.rt', '/something.else/blah'),
            array('/oops', 'https://www.sho.rt/yourls', '/oops'),


            // Query strings which should be ignored
            array('behemoth', 'http://sho.rt', '/behemoth?sho.rt'),
            array('behemoth', 'http://sho.rt/behemoth', '/behemoth/behemoth?behemoth'),


            // "Prefix and shorten" scenarios (query strings which should be preserved)
            array('http://longurl', 'http://sho.rt', '/http://longurl'),
            array('http://longurl', 'https://sho.rt/yourls', '/yourls/http://longurl'),
            array('http://longurl?https://sho.rt/yourls', 'https://sho.rt/yourls', '/yourls/http://longurl?https://sho.rt/yourls'),
            array('http://sho.rt/somepage', 'http://sho.rt', '/http://sho.rt/somepage'),
            array('http://www.sho.rt/sub/dir/', 'http://www.sho.rt/sub/dir/', '/sub/dir///http://www.sho.rt/sub/dir/'),
        );
    }

    /**
     * Check we always guess the "request" right (eg 'abcd' when someones requests 'http://sho.rt/abcd')
     *
     * @dataProvider requests
     * @since 0.1
     */
    public function test_get_request($expected, $yourls_site, $uri) {
        $this->assertSame( $expected, yourls_get_request($yourls_site, $uri) );
    }
}
