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
		
		$this->assertTrue(  yourls_check_password_hash( 'phpass', 'phpass' ) );
		$this->assertTrue(  yourls_check_password_hash( 'phpass2', 'phpass' ) );
		
		$this->assertFalse( yourls_check_password_hash( 'unknown', 'phpass' ) );
		$this->assertFalse( yourls_check_password_hash( 'phpass', 'notphpass' ) );
		$this->assertFalse( yourls_check_password_hash( 'phpass2', 'notphpass' ) );
	}
	
	/**
	 * Check that in-file password encryption works as expected
	 *
	 * @since 0.1
	 */
	public function test_hash_passwords_now() {
		// If local: make a copy of user/config-sample.php to user/config-test.php in case tests not run on a clean install
		// on Travis: just proceed with user/config-sample.php since there's always a `git clone` first
		if( yut_is_local() ) {
			if( !copy( YOURLS_USERDIR . '/config-sample.php', YOURLS_USERDIR . '/config-test.php' ) ) {
				// Copy failed, we cannot run this test.
				$this->markTestSkipped( 'Could not copy file (write permissions?) -- cannot run test' );
				return;
			} else {
				$config_file = YOURLS_USERDIR . '/config-test.php';
			}
		} else {
			$config_file = YOURLS_USERDIR . '/config-sample.php';
		}
		
		// Include file, make a copy of $yourls_user_passwords
		// Temporary suppress error reporting to avoid notices about redeclared constants
		$errlevel = error_reporting();
		error_reporting( 0 );
		require $config_file;
		error_reporting( $errlevel );
		$original = $yourls_user_passwords;
		
		// Encrypt file
		$this->assertTrue( yourls_hash_passwords_now( $config_file ) );
		
		// Make sure encrypted file is still valid PHP with no syntax error
		if( !defined( 'YOURLS_PHP_BIN' ) ) {
			$this->markTestSkipped( 'No PHP binary defined -- cannot check file hashing' );
			return;
		}
		
		exec( YOURLS_PHP_BIN . ' -l ' .  escapeshellarg( $config_file ), $output, $return );
		$this->assertEquals( 0, $return );
		
	}
}