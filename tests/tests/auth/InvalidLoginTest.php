<?php

/**
 * 'invalid_login' hooks: fired only when credentials were sent and failed
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
#[\PHPUnit\Framework\Attributes\Group('login')]
class InvalidLoginTest extends PHPUnit\Framework\TestCase {

    protected $backup_request;
    protected $backup_cookie;
    protected $added_filters = [];
    protected $invalid_login_arg;

    protected function setUp(): void {
        $this->backup_request = $_REQUEST;
        $this->backup_cookie  = $_COOKIE;
        $_REQUEST = [];
        $_COOKIE  = [];
        $this->invalid_login_arg = null;
        $this->add_filter( 'invalid_login', [ $this, 'catch_invalid_login_arg' ] );
    }

    protected function tearDown(): void {
        $_REQUEST = $this->backup_request;
        $_COOKIE  = $this->backup_cookie;
        foreach ( $this->added_filters as $filter ) {
            yourls_remove_filter( $filter[0], $filter[1] );
        }
        $this->added_filters = [];
    }

    /**
     * Actions receive their arguments as an array
     */
    public function catch_invalid_login_arg( array $args ): void {
        $this->invalid_login_arg = $args[0];
    }

    /**
     * Add a filter or action and register it for automatic removal in tearDown()
     * (actions are stored alongside filters, so yourls_remove_filter() works)
     */
    protected function add_filter( string $hook, $callback ): void {
        yourls_add_filter( $hook, $callback );
        $this->added_filters[] = [ $hook, $callback ];
    }

    /**
     * Run yourls_is_valid_user() and check which hooks were fired
     */
    protected function assert_hooks_after_failed_login( ?string $expected_method ): void {
        $methods = [ 'signature_timestamp', 'signature', 'username_password', 'cookie' ];

        $login_failed  = yourls_did_action( 'login_failed' );
        $invalid_login = yourls_did_action( 'invalid_login' );
        $specific = [];
        foreach ( $methods as $method ) {
            $specific[ $method ] = yourls_did_action( 'invalid_login_' . $method );
        }

        $this->assertNotTrue( yourls_is_valid_user() );

        // 'login_failed' is always fired
        $this->assertSame( $login_failed + 1, yourls_did_action( 'login_failed' ) );

        if ( $expected_method === null ) {
            $this->assertSame( $invalid_login, yourls_did_action( 'invalid_login' ) );
            $this->assertNull( $this->invalid_login_arg );
        } else {
            $this->assertSame( $invalid_login + 1, yourls_did_action( 'invalid_login' ) );
            $this->assertSame( $expected_method, $this->invalid_login_arg );
        }

        foreach ( $methods as $method ) {
            $expected = $specific[ $method ] + ( $method === $expected_method ? 1 : 0 );
            $this->assertSame( $expected, yourls_did_action( 'invalid_login_' . $method ), "Hook invalid_login_$method" );
        }
    }

    public function test_no_credentials_admin() {
        $this->add_filter( 'is_API', 'yourls_return_false' );
        $this->assert_hooks_after_failed_login( null );
    }

    public function test_no_credentials_api() {
        $this->add_filter( 'is_API', 'yourls_return_true' );
        $this->assert_hooks_after_failed_login( null );
    }

    public function test_empty_credentials() {
        $this->add_filter( 'is_API', 'yourls_return_true' );
        $_REQUEST = [ 'username' => '', 'password' => '' ];
        $this->assert_hooks_after_failed_login( null );
    }

    public function test_invalid_username_password() {
        // API, so no nonce check
        $this->add_filter( 'is_API', 'yourls_return_true' );
        $_REQUEST = [ 'username' => rand_str(), 'password' => rand_str() ];
        $this->assert_hooks_after_failed_login( 'username_password' );
    }

    public function test_invalid_signature() {
        $this->add_filter( 'is_API', 'yourls_return_true' );
        $_REQUEST = [ 'signature' => rand_str() ];
        $this->assert_hooks_after_failed_login( 'signature' );
    }

    public function test_invalid_signature_timestamp() {
        $this->add_filter( 'is_API', 'yourls_return_true' );
        $_REQUEST = [ 'signature' => rand_str(), 'timestamp' => time() ];
        $this->assert_hooks_after_failed_login( 'signature_timestamp' );
    }

    public function test_invalid_cookie() {
        $this->add_filter( 'is_API', 'yourls_return_false' );
        $_COOKIE[ yourls_cookie_name() ] = yourls_cookie_value( rand_str() );
        $this->assert_hooks_after_failed_login( 'cookie' );
    }

    /**
     * Valid credentials rejected by the 'is_valid_user' filter count as an invalid login
     */
    public function test_valid_credentials_filtered_to_false() {
        $this->add_filter( 'is_API', 'yourls_return_true' );
        $this->add_filter( 'is_valid_user', 'yourls_return_false' );
        $_REQUEST = [ 'signature' => yourls_auth_signature( 'yourls' ) ];
        $this->assert_hooks_after_failed_login( 'signature' );
    }

    public function test_valid_login_fires_no_invalid_login() {
        $this->add_filter( 'is_API', 'yourls_return_true' );
        $_REQUEST = [ 'signature' => yourls_auth_signature( 'yourls' ) ];
        $invalid_login = yourls_did_action( 'invalid_login' );

        $this->assertTrue( yourls_is_valid_user() );
        $this->assertSame( $invalid_login, yourls_did_action( 'invalid_login' ) );
    }

}
