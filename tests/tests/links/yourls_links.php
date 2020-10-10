<?php

/**
 * Links
 *
 * @group links
 * @group idn
 */

class YOURLS_Link_Tests extends PHPUnit_Framework_TestCase {

    protected function tearDown() {
        yourls_remove_all_filters( 'get_yourls_site' );
    }

    /**
     * Check yourls_get_yourls_site() returns a string
     */
    public function test_yourls_site() {
        $this->assertInternalType("string", yourls_get_yourls_site());

        $scheme = yourls_get_protocol( yourls_get_yourls_site() );
        $this->assertContains( $scheme, array( 'http://', 'https://' ), "yourls_get_yourls_site() isn't http(s)://" );
    }

    /**
     * Check yourls_link() gives a link
     */
    public function test_yourls_link() {
        $this->assertEquals( yourls_link('bonjour'), YOURLS_SITE . '/bonjour' );
    }

    /**
     * Check yourls_statlink() gives a link
     */
    public function test_yourls_statlink() {
        $this->assertEquals( yourls_statlink('hello'), YOURLS_SITE . '/hello+' );
    }

    /**
     * Check yourls_link() gives an IDN utf8 link
     */
    public function test_yourls_link_IDN() {
        yourls_add_filter( 'get_yourls_site', function() {return 'http://xn--hh-bjab.com';} );
        $this->assertEquals( yourls_link('suicidal'), 'http://héhé.com/suicidal' );
        $this->assertEquals( yourls_statlink('angels'), 'http://héhé.com/angels+' );
    }

}
