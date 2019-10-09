<?php

/**
 * HTTP functions related to api.yourls.org
 *
 * @group http
 * @since 0.1
 */
class HTTP_AYO_Tests extends PHPUnit_Framework_TestCase {

    protected function tearDown() {
        yourls_remove_all_filters( 'is_admin' );
    }

    /**
     * Check that version checking returns expected stuff and updates the relevant option
     *
     * @since 0.1
     */
    public function test_check_core_version() {
        $before = yourls_get_option( 'core_version_checks' );
        $check = yourls_check_core_version();
        $after = yourls_get_option( 'core_version_checks' );

        if( $check === false ) {
            $this->markTestSkipped( 'api.yourls.org unreachable or broken' );
        }

        $this->assertNotSame( $before, $after );
        $this->assertTrue( isset( $check->latest ) );
        $this->assertTrue( isset( $check->zipurl ) );
    }

    /**
     * Check that version checking happens only when visiting the admin area
     *
     * @since 0.1
     */
    public function test_check_only_in_admin() {
        yourls_add_filter( 'is_admin', 'yourls_return_false' );
        $this->assertFalse( yourls_maybe_check_core_version() );
    }

    /**
     * Generate an object to mock last attempt of checking against api.yourls.org
     */
    public function return_case_object( $failed_attempts, $last_attempt, $version_checked ) {
        $checks = new stdClass();
        $checks->last_result     = rand_str();
        $checks->failed_attempts = $failed_attempts;
        $checks->last_attempt    = $last_attempt;
        $checks->version_checked = $version_checked;

        return $checks;
    }

    /**
     * Provider of various test cases
     */
    public function case_scenario() {

        $return = array();

        /**
         * Case 0 :
         * - a previous check was NEVER done
         * Then : we DO want to check
         */
        $name = 'Case 0';
        $checks = '';
        $expected = true;
        $return[] = array( $name, $checks, $expected );

        // Now all possible cases : see https://gist.github.com/ozh/17ea830b2f688613927f

        /**
         * Case 1 : previous check
         * - was SUCCESSFUL,
         * - was performed MORE than 24 hours ago,
         * - and version checked DID match current version
         * Then : we DO want to check
         */
        $name = 'Case 1';
        $checks = $this->return_case_object(
            0,                  // 0 previously failed attempt
            time() - 26 * 3600, // 26 hours ago
            YOURLS_VERSION      // version match
        );
        $expected = true;
        $return[] = array( $name, $checks, $expected );

        /**
         * Case 2 : previous check
         * - was SUCCESSFUL,
         * - was performed MORE than 24 hours ago,
         * - and version checked DID NOT match current version
         * Then : we DO want to check
         */
        $name = 'Case 2';
        $checks = $this->return_case_object(
            0,                  // 0 previously failed attempt
            time() - 26 * 3600, // 26 hours ago
            rand_str()          // version mismatch
        );
        $expected = true;
        $return[] = array( $name, $checks, $expected );

        /**
         * Case 3 : previous check
         * - was SUCCESSFUL,
         * - was performed LESS than 24 hours ago,
         * - and version checked DID match current version
         * Then : we DON'T want to check
         */
        $name = 'Case 3';
        $checks = $this->return_case_object(
            0,                  // 0 previously failed attempt
            time() - 10 * 3600, // 10 hours ago
            YOURLS_VERSION      // version match
        );
        $expected = false;
        $return[] = array( $name, $checks, $expected );

        /**
         * Case 4 : previous check
         * - was SUCCESSFUL,
         * - was performed LESS than 24 hours ago,
         * - and version checked DID NOT match current version
         * Then : we DO want to check
         */
        $name = 'Case 4';
        $checks = $this->return_case_object(
            0,                  // 0 previously failed attempt
            time() - 10 * 3600, // 10 hours ago
            rand_str()          // version mismatch
        );
        $expected = true;
        $return[] = array( $name, $checks, $expected );

        /**
         * Case 5 : previous check
         * - was NOT SUCCESSFUL,
         * - was performed MORE than 2 hours ago,
         * - and version checked DID match current version
         * Then : we DO want to check
         */
        $name = 'Case 5';
        $checks = $this->return_case_object(
            1337,               // some previously failed attempts
            time() - 3 * 3600,  // 3 hours ago
            YOURLS_VERSION      // version match
        );
        $expected = true;
        $return[] = array( $name, $checks, $expected );

        /**
         * Case 6 : previous check
         * - was NOT SUCCESSFUL,
         * - was performed MORE than 2 hours ago,
         * - and version checked DID NOT match current version
         * Then : we DO want to check
         */
        $name = 'Case 6';
        $checks = $this->return_case_object(
            1337,               // some previously failed attempts
            time() - 3 * 3600,  // 3 hours ago
            rand_str()          // version mismatch
        );
        $expected = true;
        $return[] = array( $name, $checks, $expected );

        /**
         * Case 7 : previous check
         * - was NOT SUCCESSFUL,
         * - was performed LESS than 2 hours ago,
         * - and version checked DID match current version
         * Then : we DON'T want to check
         */
        $name = 'Case 7';
        $checks = $this->return_case_object(
            1337,               // some previously failed attempts
            time() - 1 * 3600,  // 1 hour ago
            YOURLS_VERSION      // version match
        );
        $expected = false;
        $return[] = array( $name, $checks, $expected );

        /**
         * Case 8 : previous check
         * - was NOT SUCCESSFUL,
         * - was performed LESS than 2 hours ago,
         * - and version checked DID NOT match current version
         * Then : we DO want to check
         */
        $name = 'Case 8';
        $checks = $this->return_case_object(
            1337,               // some previously failed attempts
            time() - 1 * 3600,  // 1 hour ago
            rand_str()          // version mismatch
        );
        $expected = true;
        $return[] = array( $name, $checks, $expected );

        return $return;
    }

    /**
     * Check if we should poll api.yourls.org under various circumstances
     *
     * @dataProvider case_scenario
     * @depends test_check_core_version
     * @since 0.1
     */
    public function test_api_check_in_various_scenario( $name, $checks, $expected ) {
        yourls_add_filter( 'is_admin', 'yourls_return_true' );
        yourls_update_option( 'core_version_checks', $checks );

        $this->assertSame( $expected, yourls_maybe_check_core_version() );
    }

}
