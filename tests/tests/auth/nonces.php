<?php
/**
 * Nonce tests
 *
 * @group auth
 * @group nonces
 * @since 0.1
 */
class Auth_Nonce_Tests extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_all_actions('pre_yourls_die');
    }

	/**
	 * Check for valid nonce life
	 */
	public function test_nonce_life() {
        $this->assertTrue( is_int(yourls_get_cookie_life()) );
    }

	/**
	 * Check for valid tick
	 */
	public function test_tick() {
        $this->assertTrue( is_float(yourls_tick()) );
    }

	/**
	 * Check nonce creation
	 */
	public function test_create_nonce() {
        $this->assertTrue( is_string(yourls_create_nonce(rand_str(), rand_str())) );
    }

	/**
	 * Check nonce field creation
	 */
	public function test_create_nonce_field() {
        $field = yourls_nonce_field( rand_str(), rand_str(), rand_str(), false );
        $this->assertTrue( is_string($field) );
    }

	/**
	 * Check nonce URL creation
	 */
	public function test_create_nonce_url() {
        $url = yourls_nonce_url( rand_str(), rand_str(), rand_str(), rand_str() );
        $this->assertTrue( is_string($url) );
        // $this->assertIsString($url);
    }

	/**
	 * Test valid nonce
	 */
	public function test_valid_nonce() {
        $action = rand_str();
        $user   = rand_str();

        // what nonce should be
        $valid = yourls_create_nonce( $action, $user );

        $this->assertTrue(yourls_verify_nonce($action, $valid, $user));
    }

	/**
	 * Test invalid nonce
	 */
	public function test_invalid_nonce() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('I have died');

        // intercept yourls_die() before it actually dies
        yourls_add_action( 'pre_yourls_die', function() { throw new Exception( 'I have died' ); } );

        // This should trigger yourls_die()
        $this->assertTrue(yourls_verify_nonce(rand_str(), rand_str(), rand_str()));
    }

}
