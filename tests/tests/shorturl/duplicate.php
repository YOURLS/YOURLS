<?php

/**
 * Short URLs : test with "allow duplicate long URL"
 *
 * @group shorturls
 * @since 0.1
 */

class ShortURL_Duplicate_Long_URL_Tests extends PHPUnit\Framework\TestCase {

    public function test_yourls_allow_duplicate_longurls_is_bool() {
        $this->assertIsBool(yourls_allow_duplicate_longurls());
    }

    public function test_add_url_twice() {
        $url     = 'http://' . rand_str(5);

        $newurl = yourls_add_new_link( $url, rand_str(), rand_str() );
        $this->assertEquals( 'success', $newurl['status'] );

        $fail = yourls_add_new_link( $url, rand_str(), rand_str() );
        $this->assertEquals( 'fail', $fail['status'] );

        yourls_add_filter('allow_duplicate_longurls', 'yourls_return_true');
        $newurl = yourls_add_new_link( $url, rand_str(), rand_str() );
        $this->assertEquals( 'success', $newurl['status'] );

        yourls_remove_all_filters('allow_duplicate_longurls');
    }

}
