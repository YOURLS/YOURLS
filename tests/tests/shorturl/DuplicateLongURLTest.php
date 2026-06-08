<?php

/**
 * Short URLs : test with "allow duplicate long URL"
 */
#[\PHPUnit\Framework\Attributes\Group('shorturls')]
class DuplicateLongURLTest extends PHPUnit\Framework\TestCase {

    /**
     * Force "unique URLs" behavior (no duplicate long URLs) as a baseline,
     * regardless of the YOURLS_UNIQUE_URLS constant set in the test config.
     *
     * This test deliberately exercises both behaviors: the baseline below makes
     * the "duplicate rejected" assertions deterministic, then test_add_url_twice()
     * flips the filter to yourls_return_true to check the "duplicate allowed" path.
     */
    protected function setUp(): void {
        yourls_add_filter( 'allow_duplicate_longurls', 'yourls_return_false' );
        // Bypass flood checks
        yourls_add_filter('shunt_check_IP_flood', 'yourls_return_true');
    }

    protected function tearDown(): void {
        // Removes both the baseline filter and any added during the test
        yourls_remove_all_filters( 'allow_duplicate_longurls' );
        yourls_remove_filter('shunt_check_IP_flood', 'yourls_return_true');
    }

    public function test_yourls_allow_duplicate_longurls_is_bool() {
        $this->assertIsBool(yourls_allow_duplicate_longurls());
    }

    public function test_add_url_twice() {
        $url     = 'http://' . rand_str(5);

        // Baseline (set in setUp): duplicates are rejected
        $newurl = yourls_add_new_link( $url, rand_str(), rand_str() );
        $this->assertEquals( 'success', $newurl['status'] );

        $fail = yourls_add_new_link( $url, rand_str(), rand_str() );
        $this->assertEquals( 'fail', $fail['status'] );

        // Now duplicate long URLs are allowed
        yourls_add_filter('allow_duplicate_longurls', 'yourls_return_true');
        $newurl = yourls_add_new_link( $url, rand_str(), rand_str() );
        $this->assertEquals( 'success', $newurl['status'] );
    }

}
