<?php

/**
 * Login redirection
 *
 * Check that, when submitting correct credentials, we're redirected as expected
 *
 * @group auth
 */
class Login_Redirection_Tests extends PHPUnit\Framework\TestCase {

    protected $backup_request;
    protected $backup_server;

    protected function setUp(): void {
        $this->backup_request = $_REQUEST;
        $this->backup_server  = $_SERVER;
    }

    protected function tearDown(): void {
        $_REQUEST = $this->backup_request;
        $_SERVER  = $this->backup_server;
    }

	/**
	 * Check that authentication on a webpage triggers a redirection
	 */
	public function test_login() {
        $_REQUEST['nonce'] = yourls_create_nonce('admin_login');
        $_SERVER['REQUEST_URI'] = '/';
		$this->assertSame( 3, yourls_is_valid_user() );
	}

}
