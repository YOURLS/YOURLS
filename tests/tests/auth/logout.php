<?php

/**
 * Logout function
 *
 * @group auth
 */
class Logout_Func_Tests extends PHPUnit\Framework\TestCase {

    protected $backup_get;
    protected $backup_request;

    protected function setUp(): void {
        $this->backup_get     = $_GET;
        $this->backup_request = $_REQUEST;
    }

    protected function tearDown(): void {
        $_GET = $this->backup_get;
        $_REQUEST = $this->backup_request;
    }

    /**
     * Check logout procedure - phase 1
     */
    public function test_logout_user_is_logged_in() {
        $_REQUEST['nonce'] = yourls_create_nonce('admin_login');
        $valid = yourls_is_valid_user();
        $this->assertTrue($valid);
    }

    /**
     * Check logout procedure - phase 2
     * @depends test_logout_user_is_logged_in
     */
    public function test_logout_user_logs_out() {
        $_GET['action'] = 'logout';
        $invalid = yourls_is_valid_user();
        $this->assertNotTrue( $invalid );
    }

    /**
     * Check logout procedure - phase 3
     * @depends test_logout_user_logs_out
     */
    public function test_logout_user_is_logged_in_back() {
        $_REQUEST['nonce'] = yourls_create_nonce('admin_login');
        $valid = yourls_is_valid_user();
        $this->assertTrue( $valid );
    }

}
