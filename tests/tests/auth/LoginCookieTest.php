<?php
/**
 * Login tests - via Cookies
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
#[\PHPUnit\Framework\Attributes\Group('login')]
#[\PHPUnit\Framework\Attributes\Group('cookies')]
class LoginCookieTest extends PHPUnit\Framework\TestCase {

    protected $cookie;
    protected $request;
    protected $backup_yourls_actions;

    protected function setUp(): void {
        $this->cookie = $_COOKIE;
        $this->request = $_REQUEST;
        global $yourls_actions;
        $this->backup_yourls_actions = $yourls_actions;
    }

    protected function tearDown(): void {
        $_COOKIE = $this->cookie;
        $_REQUEST = $this->request;
        global $yourls_actions;
        $yourls_actions = $this->backup_yourls_actions;
    }

    public static function setUpBeforeClass(): void {
        yourls_add_filter( 'is_API', 'yourls_return_false' );
    }

    public static function tearDownAfterClass(): void {
        yourls_remove_filter( 'is_API', 'yourls_return_false' );
    }

    /**
     * Check for valid cookie name
     */
    public function test_cookie_name() {
        $this->assertTrue( is_string(yourls_cookie_name()) );
    }

    /**
     * Check for valid cookie value
     */
    public function test_cookie_value() {
        $this->assertTrue( is_string(yourls_cookie_value(rand_str())) );
    }

    /**
     * Check for valid cookie life
     */
    public function test_cookie_life() {
        $this->assertTrue( is_int(yourls_get_cookie_life()) );
    }

    /**
     * Test login with valid cookie - also check that cookie is set
     */
    public function test_login_valid_cookie() {
        global $yourls_user_passwords;
        $random_user = array_rand($yourls_user_passwords);
        $_COOKIE[yourls_cookie_name()] = yourls_cookie_value( $random_user );
        unset($_REQUEST);

        $this->assertSame( 0, yourls_did_action('pre_setcookie') );
        $this->assertTrue(yourls_check_auth_cookie());
        $this->assertTrue(yourls_is_valid_user());
        $this->assertSame( 1, yourls_did_action('pre_setcookie') );
    }

    /**
     * Test login with invalid cookie - also check that no cookie is set
     */
    public function test_login_invalid_cookie() {
        $_COOKIE[yourls_cookie_name()] = yourls_cookie_value( rand_str() );
        unset($_REQUEST);

        $this->assertSame( 0, yourls_did_action('pre_setcookie') );
        $this->assertFalse(yourls_check_auth_cookie());
        $this->assertNotTrue(yourls_is_valid_user());
        $this->assertSame( 0, yourls_did_action('pre_setcookie') );
    }

}
