<?php

/**
 * HTTP functions related to api.yourls.org
 *
 * @group http
 * @group AYO
 * @since 0.1
 */
class HTTP_AYO_Tests extends PHPUnit\Framework\TestCase {

    protected $actions, $core_version_checks;

    protected function setUp(): void {
        global $yourls_actions;
        $this->actions = $yourls_actions;
    }

    protected function tearDown(): void {
        yourls_remove_all_filters( 'is_admin' );
        yourls_remove_all_filters( 'shunt_yourls_http_request' );
        global $yourls_actions;
        $yourls_actions = $this->actions;
        yourls_delete_option('core_version_checks');
    }

    /**
     * Emulate successful HTTP request to api.yourls.org
     */
    public function fake_http_request_success() {
        $return = (object) array();
        $return->body = '{
            "latest": "1.0.1",
            "zipurl": "https:\/\/api.github.com\/repos\/YOURLS\/YOURLS\/zipball\/1.0.1"
            }';
        $return->success = true;

        return $return;
    }

    /**
     * Emulate failed HTTP request to api.yourls.org
     */
    public function fake_http_request_failure() {
        return 'cURL error 28: Connection timed out after 3000 milliseconds (GET on http://api.yourls.org/)';
    }

    /**
     * Emulate HTTP request to api.yourls.org with a server error
     */
    public function fake_http_request_server_error() {
        $return = new stdClass;
        $return->body = 'Error 500';
        $return->success = false;
        return $return;
    }

    /**
     * Check that version checking returns false if host is unreachable, and that failed attempts counter increments
     */
    public function test_api_failed_request() {
        yourls_add_filter('shunt_yourls_http_request', array($this,'fake_http_request_failure') );
        $this->check_and_assert();
    }

    /**
     * Check that version checking returns false if host errors, and that failed attempts counter increments
     */
    public function test_api_failed_request_server_error() {
        yourls_add_filter('shunt_yourls_http_request', array($this,'fake_http_request_server_error') );
        $this->check_and_assert();
    }

    /**
     * Helper function for test_api_failed_request() and test_api_failed_request_server_error()
     */
    public function check_and_assert() {
        $checks = yourls_get_option( 'core_version_checks' );
        if( !is_object( $checks ) ) {
            $checks = new stdClass;
            $checks->failed_attempts = 0;
        }
        $before_check = $checks->failed_attempts;

        $this->assertFalse( yourls_check_core_version() );

        $checks = yourls_get_option( 'core_version_checks' );
        $after_check = $checks->failed_attempts;

        $this->assertEquals( $after_check, $before_check + 1 );
    }

    /**
     * Check that version checking returns expected stuff and updates the relevant option
     *
     * @since 0.1
     */
    public function test_check_core_version() {
        yourls_add_filter('shunt_yourls_http_request', array($this,'fake_http_request_success') );

        $before = yourls_get_option( 'core_version_checks' );
        $check = yourls_check_core_version();
        $after = yourls_get_option( 'core_version_checks' );

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
        yourls_add_filter('shunt_yourls_http_request', array($this,'fake_http_request_success') );

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
     * Provider of various test cases for test_api_check_in_various_scenario()
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
     * @since 0.1
     */
    public function test_api_check_in_various_scenario( $name, $checks, $expected ) {
        yourls_add_filter('shunt_yourls_http_request', array($this,'fake_http_request_success') );

        yourls_add_filter( 'is_admin', 'yourls_return_true' );
        yourls_update_option( 'core_version_checks', $checks );

        $this->assertSame( $expected, yourls_maybe_check_core_version() );
    }

    /**
     *  Provide fake JSON responses from api.yourls.org and a boolean stating if they should be accepted or not
     */
    public function json_responses() {
        $return = array();

        $return['expected'] = array(
            (object)array(
                'latest' => '1.2.3',
                'zipurl' => 'https://api.github.com/repos/YOURLS/YOURLS/zipball/1.2.3',
            ),
            true);

        $return['unexpected version number format'] = array(
            (object)array(
                'latest' => '1.2.3-something',
                'zipurl' => 'https://api.github.com/repos/YOURLS/YOURLS/zipball/1.2.3',
            ),
            false);

        $return['version mismatch'] = array(
            (object)array(
                'latest' => '1.2.3',
                'zipurl' => 'https://api.github.com/repos/YOURLS/YOURLS/zipball/1.2.4',
            ),
            false);

        $return['not github.com'] = array(
            (object)array(
                'latest' => '1.2.3',
                'zipurl' => 'https://notgithub.com/repos/YOURLS/YOURLS/zipball/1.2.3',
            ),
            false);

        $return['not YOURLS/YOURLS'] = array(
            (object)array(
                'latest' => '1.2.3',
                'zipurl' => 'https://api.github.com/repos/Y0URL5/YOURLS/zipball/1.2.3',
            ),
            false);

        $return['no version'] = array(
            (object)array(
                'zipurl' => 'https://api.github.com/repos/YOURLS/YOURLS/zipball/1.2.3',
            ),
            false);

        $return['no URL'] = array(
            (object)array(
                'latest' => '1.2.3',
            ),
            false);

        $return['nothing 1'] = array(
            (object)[],
            false);

        $return['nothing 2'] = array([],
            false);

        $return['nothing 3'] = array(false,
            false);

        return $return;
    }

    /**
     * Validate various json responses from api.yourls.org and make sure they're legit
     *
     * @dataProvider json_responses
     * @since 0.1
     */
    public function test_validate_api_json_response($json, $expected) {
        $this->assertSame( $expected, yourls_validate_core_version_response($json) );
    }

    /**
     * Provide fake and true github repo URLs
     */
    public function fake_and_true_github_repo_urls() {
        $return = array();
        $return['true']       = ['https://api.github.com/repos/YOURLS/YOURLS/zipball/1.2.3', true];
        $return['not github'] = ['https://api.g1thub.com/repos/YOURLS/YOURLS/zipball/1.2.3', false];
        $return['not YOURLS'] = ['https://api.github.com/repos/Y0URL5/YOURLS/zipball/1.2.3', false];
        $return['not URL']    = ['nope', false];

        return $return;
    }

    /**
     * Test yourls_is_valid_github_repo_url()
     *
     * @dataProvider fake_and_true_github_repo_urls
     */
    public function test_is_valid_github_repo_url($url, $expected) {
        $this->assertSame( yourls_is_valid_github_repo_url($url), $expected );
    }

    /**
     * Provide various scenarios for version reported by api.yourls.org / current version to check if notice is shown
     */
    public function new_version_scenarios() {
        $return = array();

        //            AYO       current      notice
        $return[] = ['1.2.3',  '1.2.2',      1];  // new version - display notice
        $return[] = ['1.3',    '1.2.2',      1];  // new version - display notice
        $return[] = ['1.8.22', '1.8.3',      1];  // new version - display notice
        $return[] = ['1.2.3',  '1.2.3-beta', 1];  // new version - display notice
        $return[] = ['1.3',    '1.22',       0];  // older version - don't display version
        $return[] = ['1.2.2',  '1.2.2',      0];  // same version - don't display notice
        $return[] = ['1.2.2',  '1.2.3',      0];  // older version - don't display version
        $return[] = ['99.9.9',  false,       1];  // newer version compared to actual current YOURLS version - display notice
        $return[] = ['0.1.1',   false,       0];  // older version compared to actual current YOURLS version - don't display notice

        return $return;
    }

    /**
     * Test various YOURLS version strings from api.yourls.org, compare them to the actual version
     * and make sure we display the correct update notice
     *
     * @dataProvider new_version_scenarios
     */
    public function test_new_version_notice( $api_version, $current_version, $expected ) {
        // fake the api response
        $check = (object)array(
            'last_result' => (object)array(
                'latest' => $api_version,
            ),
        );
        yourls_add_option('core_version_checks', $check);

        // trigger yourls_core_version_notice() and check we had expected action
        yourls_new_core_version_notice($current_version);
        $this->assertSame($expected, yourls_did_action('new_core_version_notice'));
    }

    /**
     * Test various zipball URLs and get version number from it
     */
    function various_zipball_url_version() {
        $return = [];

        $return[] = ['https://api.github.com/repos/YOURLS/YOURLS/zipball/1.2.3', '1.2.3'];
        $return[] = ['https://api.github.com/repos/YOURLS/YOURLS/zipball/1.2.3-beta', '1.2.3-beta'];
        $return[] = ['https://api.github.com/repos/YOURLS/YOURLS/zipball/1.2.3/lol', 'lol'];
        $return[] = ['http://hey', ''];
        $return[] = ['lol', ''];
        $return[] = ['', ''];

        return $return;
    }

    /**
     * Test various zipball URLs and get version number from it
     *
     * @dataProvider various_zipball_url_version
     */
    public function test_get_version_from_zipball_url($url, $expected) {
        $this->assertSame($expected, yourls_get_version_from_zipball_url($url));
    }


    /**
     * test various core version JSON responses from api.yourls.org
     */
    function get_various_json_response_keys() {
        $return = [];

        $return['latest & zipurl'] = [['latest' => 'ok', 'zipurl' => 'ok'], true];
        $return['no latest'] = [['zipurl' => 'ok'], false];
        $return['no zipurl'] = [['latest' => 'ok'], false];
        $return['latest & other key'] = [['latest' => 'ok', 'other' => 'oops'], false];
        $return['zipurl & other key'] = [['zipurl' => 'ok', 'other' => 'oops'], false];
        $return['nothing'] = [[], false];
        $return['extra key'] = [['latest' => 'ok', 'zipurl' => 'ok', 'extra' => 'oops'], false];
        $return['not strings'] = [['latest' => [], 'zipurl' => 'ok'], false];

        return $return;
    }

    /**
     * Check yourls_validate_core_version_response_keys() works as expected
     * @dataProvider get_various_json_response_keys
     */
    function test_yourls_validate_core_version_response_keys($json, $expected) {
        $this->assertSame(yourls_validate_core_version_response_keys((object)$json), $expected);
    }

    /**
     * Return all possible api.yourls.org/core/version URL
     */
    function get_api_yourls_core() {
        return [
            ['https://api.yourls.org/core/version/1.1/'],
            ['http://api.yourls.org/core/version/1.0/'],
        ];
    }

    /**
     * Make sure https://api.yourls.org/core/version/1.[0/1]/ returns a valid JSON response
     *
     * This test may fail is the server is unreachable or the API is down.
     * TODO: make this test evolve as the API evolves
     *
     * @dataProvider get_api_yourls_core
     */
    function test_yourls_get_core_version_json($url) {
        $req = yourls_http_get($url);

        if ($req->status_code != 200) {
            $this->markTestSkipped("Unable to reach $url - test skipped");
        }

        $json = json_decode(trim($req->body));
        $this->assertTrue(is_object($json));
        $this->assertTrue(yourls_validate_core_version_response($json));
    }

}
