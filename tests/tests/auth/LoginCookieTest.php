<?php
/**
 * Login tests - via Cookies - and cookie functions tests
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
#[\PHPUnit\Framework\Attributes\Group('login')]
#[\PHPUnit\Framework\Attributes\Group('cookies')]
class LoginCookieTest extends PHPUnit\Framework\TestCase {

    protected $cookie;
    protected $request;
    protected $backup_yourls_actions;

    protected $added_filters = [];

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

        foreach ( $this->added_filters as $filter ) {
            yourls_remove_filter( $filter[0], $filter[1] );
        }
        $this->added_filters = [];
    }

    /**
     * Add a filter and register it for automatic removal in tearDown()
     */
    protected function add_filter( string $hook, $callback ): void {
        yourls_add_filter( $hook, $callback );
        $this->added_filters[] = [ $hook, $callback ];
    }

    /**
     * Add an action and register it for automatic removal in tearDown()
     * (actions are stored alongside filters, so yourls_remove_filter() works)
     */
    protected function add_action( string $hook, $callback ): void {
        yourls_add_action( $hook, $callback );
        $this->added_filters[] = [ $hook, $callback ];
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
     * Check that the cookie value is filterable
     */
    public function test_cookie_value_is_filtered() {
        $this->add_filter( 'set_cookie_value', function() { return 'filtered_cookie_value'; } );
        $this->assertSame( 'filtered_cookie_value', yourls_cookie_value( rand_str() ) );
    }

    /**
     * Check for valid cookie life
     */
    public function test_cookie_life() {
        $this->assertTrue( is_int(yourls_get_cookie_life()) );
    }

    /**
     * Check that the cookie name is filterable
     */
    public function test_cookie_name_is_filtered() {
        $this->add_filter( 'cookie_name', function() { return 'my_custom_cookie_name'; } );
        $this->assertSame( 'my_custom_cookie_name', yourls_cookie_name() );
    }

    /**
     * Cookie attributes : returns the expected structure
     */
    public function test_cookie_attributes_structure() {
        $attr = yourls_cookie_attributes();

        $this->assertIsArray( $attr );
        $this->assertArrayHasKey( 'path',     $attr );
        $this->assertArrayHasKey( 'domain',   $attr );
        $this->assertArrayHasKey( 'secure',   $attr );
        $this->assertArrayHasKey( 'httponly', $attr );

        $this->assertIsString( $attr['path'] );
        $this->assertIsString( $attr['domain'] );
        $this->assertIsBool( $attr['secure'] );
        $this->assertIsBool( $attr['httponly'] );
    }

    /**
     * Cookie attributes : default values
     */
    public function test_cookie_attributes_defaults() {
        $attr = yourls_cookie_attributes();

        $this->assertSame( '/', $attr['path'] );
        $this->assertTrue( $attr['httponly'] );
    }

    /**
     * Cookie attributes : 'secure' follows yourls_is_ssl()
     */
    public function test_cookie_attributes_secure_follows_ssl() {
        $this->add_filter( 'is_ssl', 'yourls_return_true' );
        $this->assertTrue( yourls_cookie_attributes()['secure'] );
    }

    public function test_cookie_attributes_not_secure_without_ssl() {
        $this->add_filter( 'is_ssl', 'yourls_return_false' );
        $this->assertFalse( yourls_cookie_attributes()['secure'] );
    }

    /**
     * Cookie attributes : 'secure' can be forced regardless of SSL.
     * On top of being tested to make sure that feature will not get removed from the code, this is also used
     * here in unit tests.
     */
    public function test_cookie_attributes_secure_is_filtered() {
        // SSL off, but secure forced on
        $this->add_filter( 'is_ssl', 'yourls_return_false' );
        $this->add_filter( 'setcookie_secure', 'yourls_return_true' );
        $this->assertTrue( yourls_cookie_attributes()['secure'] );
    }

    /**
     * Cookie attributes : path, domain and httponly are filterable
     * On top of being tested to make sure that feature will not get removed from the code, this is also used
     * here in unit tests.
     */
    public function test_cookie_attributes_are_filtered() {
        $this->add_filter( 'setcookie_path',     function() { return '/sub/'; } );
        $this->add_filter( 'setcookie_domain',   function() { return 'sho.rt'; } );
        $this->add_filter( 'setcookie_httponly', 'yourls_return_false' );

        $attr = yourls_cookie_attributes();

        $this->assertSame( '/sub/', $attr['path'] );
        $this->assertSame( 'sho.rt', $attr['domain'] );
        $this->assertFalse( $attr['httponly'] );
    }

    /**
     * Cookie attributes : a 'localhost' domain is normalized to an empty string
     */
    public function test_cookie_attributes_localhost_domain_is_emptied() {
        $this->add_filter( 'setcookie_domain', function() { return 'localhost'; } );
        $this->assertSame( '', yourls_cookie_attributes()['domain'] );
    }

    /**
     * Cookie attributes : a null/false domain is normalized to an empty string
     */
    public function test_cookie_attributes_null_domain_is_emptied() {
        $this->add_filter( 'setcookie_domain', 'yourls_return_false' );
        $this->assertSame( '', yourls_cookie_attributes()['domain'] );
    }

    /**
     * Cookie name prefix : no prefix on a non-secure (HTTP) install
     */
    public function test_cookie_name_prefix_empty_when_not_secure() {
        $this->add_filter( 'is_ssl', 'yourls_return_false' );
        $this->assertSame( '', yourls_cookie_name_prefix() );
    }

    /**
     * Cookie name prefix : __Host- when Secure + host-only (no Domain) + Path=/
     */
    public function test_cookie_name_prefix_host_when_secure_hostonly_rootpath() {
        $this->add_filter( 'is_ssl', 'yourls_return_true' );
        $this->add_filter( 'setcookie_domain', function() { return ''; } );
        // path defaults to '/'
        $this->assertSame( '__Host-', yourls_cookie_name_prefix() );
    }

    /**
     * Cookie name prefix : __Secure- when Secure but a Domain attribute is set
     */
    public function test_cookie_name_prefix_secure_when_domain_is_set() {
        $this->add_filter( 'is_ssl', 'yourls_return_true' );
        $this->add_filter( 'setcookie_domain', function() { return 'sho.rt'; } );
        $this->assertSame( '__Secure-', yourls_cookie_name_prefix() );
    }

    /**
     * Cookie name prefix : __Secure- when Secure + host-only but path is not '/'
     */
    public function test_cookie_name_prefix_secure_when_path_not_root() {
        $this->add_filter( 'is_ssl', 'yourls_return_true' );
        $this->add_filter( 'setcookie_domain', function() { return ''; } );
        $this->add_filter( 'setcookie_path',   function() { return '/sub/'; } );
        $this->assertSame( '__Secure-', yourls_cookie_name_prefix() );
    }

    /**
     * Cookie name : carries the prefix matching the current attributes.
     * On HTTP, no prefix. On HTTPS, the name is prefixed.
     */
    public function test_cookie_name_has_no_prefix_on_http() {
        $this->add_filter( 'is_ssl', 'yourls_return_false' );
        $name = yourls_cookie_name();
        $this->assertStringStartsNotWith( '__Host-',   $name );
        $this->assertStringStartsNotWith( '__Secure-', $name );
    }

    public function test_cookie_name_has_host_prefix_on_https_hostonly() {
        $this->add_filter( 'is_ssl', 'yourls_return_true' );
        $this->add_filter( 'setcookie_domain', function() { return ''; } );
        $this->assertStringStartsWith( '__Host-', yourls_cookie_name() );
    }

    public function test_cookie_name_has_secure_prefix_on_https_with_domain() {
        $this->add_filter( 'is_ssl', 'yourls_return_true' );
        $this->add_filter( 'setcookie_domain', function() { return 'sho.rt'; } );
        $this->assertStringStartsWith( '__Secure-', yourls_cookie_name() );
    }

    /**
     * Cookie name : the prefix is the single source of truth shared with the
     * attributes, so the name actually reflects yourls_cookie_name_prefix().
     */
    public function test_cookie_name_matches_prefix() {
        $this->add_filter( 'is_ssl', 'yourls_return_true' );
        $this->add_filter( 'setcookie_domain', function() { return ''; } );
        $this->assertStringStartsWith( yourls_cookie_name_prefix(), yourls_cookie_name() );
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

    /**
     * Logout request deletes the cookie : yourls_store_cookie('') fires
     * 'pre_setcookie' with a past expiry time.
     */
    public function test_logout_deletes_cookie() {
        $this->add_action( 'pre_setcookie', function( $args ) {
            // $args = array($user, $time, $path, $domain, $secure, $httponly)
            $GLOBALS['__test_logout_cookie_time'] = $args[1];
        } );

        $before = yourls_did_action( 'pre_setcookie' );
        yourls_store_cookie( '' );
        $after = yourls_did_action( 'pre_setcookie' );

        $this->assertSame( $before + 1, $after );
        // Deleting a cookie uses an expiry time in the past
        $this->assertLessThan( time(), $GLOBALS['__test_logout_cookie_time'] );

        unset( $GLOBALS['__test_logout_cookie_time'] );
    }

    /**
     * Storing a cookie for a real user uses a future expiry time
     */
    public function test_store_cookie_uses_future_expiry() {
        $this->add_action( 'pre_setcookie', function( $args ) {
            $GLOBALS['__test_store_cookie_time'] = $args[1];
        } );

        yourls_store_cookie( 'someuser' );

        $this->assertGreaterThan( time(), $GLOBALS['__test_store_cookie_time'] );

        unset( $GLOBALS['__test_store_cookie_time'] );
    }
}
