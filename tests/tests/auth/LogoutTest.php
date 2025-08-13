<?php

/**
 * Logout function
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
class LogoutTest extends PHPUnit\Framework\TestCase {

    protected $backup_get;
    protected $backup_request;
    private static $user;

    protected function setUp(): void {
        $this->backup_get     = $_GET;
        $this->backup_request = $_REQUEST;
        self::$user = false;
    }

    protected function tearDown(): void {
        $_GET = $this->backup_get;
        $_REQUEST = $this->backup_request;
    }

    public static function setUpBeforeClass(): void {
        yourls_add_action( 'pre_setcookie', function ($in) {
            self::$user = $in[0]; // $in[0] is the user ID passed to yourls_setcookie()
        } );
    }

    public static function tearDownAfterClass(): void {
        yourls_remove_all_actions('pre_setcookie');
    }

    /**
     * Check logout procedure - phase 1 - we're logging in
     */
    public function test_logout_user_is_logged_in() {
        $_REQUEST['nonce'] = yourls_create_nonce('admin_login');
        $valid = yourls_is_valid_user();
        $this->assertTrue($valid);
        $this->assertSame('yourls', self::$user);
    }

    /**
     * Check logout procedure - phase 2 - we're logging out and checking that cookie was reset
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_logout_user_is_logged_in')]
    public function test_logout_user_logs_out() {
        $_GET['action'] = 'logout';
        $_REQUEST['nonce'] = yourls_create_nonce('admin_logout', 'logout');
        $invalid = yourls_is_valid_user();
        $this->assertNotTrue( $invalid );
        $this->assertSame('', self::$user);
    }

    /**
     * Check logout procedure - phase 3 - check we can log in again
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_logout_user_logs_out')]
    public function test_logout_user_is_logged_in_back() {
        $_REQUEST['nonce'] = yourls_create_nonce('admin_login');
        $valid = yourls_is_valid_user();
        $this->assertTrue( $valid );
        $this->assertSame('yourls', self::$user);
    }

}
