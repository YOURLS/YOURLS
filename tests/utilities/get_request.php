<?php

/**
 * Utilities
 *
 * @group utils
 */
 
class GetRequest_Tests extends PHPUnit_Framework_TestCase {

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
            // array('expected', 'YOURLS_SITE', 'hostname/uri'),
            
            // 1. short URL without www
            array('blah', 'http://sho.rt', 'sho.rt/blah'),
            array('bleh', 'https://sho.rt', 'sho.rt/bleh'),
            array('bloh', 'http://www.sho.rt', 'sho.rt/bloh'),
            array('bluh', 'https://www.sho.rt', 'sho.rt/bluh'),

            // 2. short URL with www
            array('meeh', 'http://sho.rt', 'www.sho.rt/meeh'),
            array('maah', 'https://sho.rt', 'www.sho.rt/maah'),
            array('muuh', 'http://www.sho.rt', 'www.sho.rt/muuh'),
            array('mooh', 'https://www.sho.rt', 'www.sho.rt/mooh'),

            // 3. Same as 1, with YOURLS in subdir
            array('hehe', 'http://sho.rt/yourls', 'sho.rt/yourls/hehe'),
            array('haha', 'https://sho.rt/yourls', 'sho.rt/yourls/haha'),
            array('hoho', 'http://www.sho.rt/yourls', 'sho.rt/yourls/hoho'),
            array('huhu', 'https://www.sho.rt/yourls', 'sho.rt/yourls/huhu'),

            // 4. Same as 2, with YOURLS in subdir
            array('ozhy', 'http://sho.rt/yourls', 'www.sho.rt/yourls/ozhy'),
            array('yhzo', 'https://sho.rt/yourls', 'www.sho.rt/yourls/yhzo'),
            array('zohy', 'http://www.sho.rt/yourls', 'www.sho.rt/yourls/zohy'),
            array('zoyh', 'https://www.sho.rt/yourls', 'www.sho.rt/yourls/zoyh'),


            // All the same tests, with a trailing slash on YOURLS_SITE
            
            array('blah', 'http://sho.rt/', 'sho.rt/blah'),
            array('bleh', 'https://sho.rt/', 'sho.rt/bleh'),
            array('bloh', 'http://www.sho.rt/', 'sho.rt/bloh'),
            array('bluh', 'https://www.sho.rt/', 'sho.rt/bluh'),

            array('meeh', 'http://sho.rt/', 'www.sho.rt/meeh'),
            array('maah', 'https://sho.rt/', 'www.sho.rt/maah'),
            array('muuh', 'http://www.sho.rt/', 'www.sho.rt/muuh'),
            array('mooh', 'https://www.sho.rt/', 'www.sho.rt/mooh'),

            array('hehe', 'http://sho.rt/yourls/', 'sho.rt/yourls/hehe'),
            array('haha', 'https://sho.rt/yourls/', 'sho.rt/yourls/haha'),
            array('hoho', 'http://www.sho.rt/yourls/', 'sho.rt/yourls/hoho'),
            array('huhu', 'https://www.sho.rt/yourls/', 'sho.rt/yourls/huhu'),

            array('ozhy', 'http://sho.rt/yourls/', 'www.sho.rt/yourls/ozhy'),
            array('yhzo', 'https://sho.rt/yourls/', 'www.sho.rt/yourls/yhzo'),
            array('zohy', 'http://www.sho.rt/yourls/', 'www.sho.rt/yourls/zohy'),
            array('zoyh', 'https://www.sho.rt/yourls/', 'www.sho.rt/yourls/zoyh'),
            
            
            // Internal pages, sort of
            array('admin/index.php', 'https://www.sho.rt', 'www.sho.rt/admin/index.php'),
            array('admin/tools.php', 'http://www.sho.rt/yourls', 'www.sho.rt/yourls/admin/tools.php'),
            array('admin/plugins.php', 'https://sho.rt/yourls/', 'sho.rt/yourls/admin/plugins.php'),


            // Unexpected URI (out of YOURLS base) should return itself
            
            array('something.else/blah', 'http://sho.rt', 'something.else/blah'),
            array('something.else/blah', 'https://www.sho.rt', 'something.else/blah'),
            array('sho.rt/oops', 'https://www.sho.rt/yourls', 'sho.rt/oops'),
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
