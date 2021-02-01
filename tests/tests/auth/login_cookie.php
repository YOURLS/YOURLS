<?php
/**
 * Login tests - via Cookies
 *
 * @group auth
 * @group login
 * @group cookies
 * @since 0.1
 */
class Auth_Login_Cookie_Tests extends PHPUnit\Framework\TestCase {

    protected $cookie;
    protected $request;

    protected function setUp(): void {
        $this->cookie = $_COOKIE;
        $this->request = $_REQUEST;
    }

    protected function tearDown(): void {
        $_COOKIE = $this->cookie;
        $_REQUEST = $this->request;
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
	 * Test login with valid cookie
	 */
	public function test_login_valid_cookie() {
        global $yourls_user_passwords;
        $random_user = array_rand($yourls_user_passwords);
        $_COOKIE[yourls_cookie_name()] = yourls_cookie_value( $random_user );
        unset($_REQUEST);

        $this->assertTrue(yourls_check_auth_cookie());
        $this->assertTrue(yourls_is_valid_user());
    }

	/**
	 * Test login with invalid cookie
	 */
	public function test_login_invalid_cookie() {
        $_COOKIE[yourls_cookie_name()] = yourls_cookie_value( rand_str() );
        unset($_REQUEST);

        $this->assertFalse(yourls_check_auth_cookie());
        $this->assertNotTrue(yourls_is_valid_user());
    }

}
