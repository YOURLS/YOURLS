<?php

class Auth_Tests extends PHPUnit_Framework_TestCase {

	/**
	 * Check that user, as submitted by REQUEST, is valid
	 *
	 * @since 0.1
	 */
	public function test_login() {
		$this->assertTrue( yourls_is_valid_user() );
	}
	
	/**
	 * Check that we have some password in clear text
	 *
	 * @since 0.1
	 */
	public function test_has_cleartext() {
		$this->assertTrue( yourls_has_cleartext_passwords() );
	}
	
	/**
	 * Check that valid login / clear text password is deemed valid
	 *
	 * @since 0.1
	 */
	public function test_valid_cleartext() {
		$this->assertTrue(  yourls_check_password_hash( 'clear', 'somepassword' ) );
		$this->assertFalse( yourls_check_password_hash( 'unknown', 'somepassword' ) );
		$this->assertFalse( yourls_check_password_hash( 'clear', 'wrongpassword' ) );
	}
	
	/**
	 * Check that valid login / md5 password is deemed valid
	 *
	 * @since 0.1
	 */
	public function test_valid_md5() {
		$this->assertTrue(  yourls_has_md5_password( 'md5' ) );
		$this->assertFalse( yourls_has_md5_password( 'unknown' ) );
		
		$this->assertTrue( yourls_check_password_hash( 'md5', 'md5' ) );
		$this->assertFalse( yourls_check_password_hash( 'unknown', 'md5' ) );
		$this->assertFalse( yourls_check_password_hash( 'md5', 'notmd5' ) );
	}
	
	/**
	 * Check that valid login / phpass password is deemed valid
	 *
	 * @since 0.1
	 */
	public function test_valid_phpass() {
		$this->assertTrue( yourls_has_phpass_password( 'phpass' ) );
		$this->assertTrue( yourls_has_phpass_password( 'phpass2' ) );
		
		/*
		$this->assertTrue(  yourls_check_password_hash( 'phpass', 'phpass' ) );
		$this->assertTrue(  yourls_check_password_hash( 'phpass2', 'phpass' ) );
		
		$this->assertFalse( yourls_check_password_hash( 'unknown', 'phpass' ) );
		$this->assertFalse( yourls_check_password_hash( 'phpass', 'notphpass' ) );
		$this->assertFalse( yourls_check_password_hash( 'phpass2', 'notphpass' ) );
		
		/*
		global $yourls_user_passwords;
		$login    = 'phpass';
		$password = $yourls_user_passwords[ $login ];
		
		$this->assertTrue( yourls_check_password_hash( $login, $password ) );
		*/
	}
	
}