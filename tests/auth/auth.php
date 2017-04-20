<?php

/**
 * Auth functions other than login
 *
 * @group auth
 * @since 0.1
 */
class Auth_Func_Tests extends PHPUnit_Framework_TestCase {

    /**
     * Check logout procedure
     *
     * @since 0.1
     */
    public function test_logout() {
        $this->assertTrue( yourls_is_valid_user() );
        $_GET['action'] = 'logout';
        $this->assertNotTrue( yourls_is_valid_user() );
        unset( $_GET['action'] );
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
     * Check we can have a hash class instance
     *
     * @since 0.1
     */
    public function test_hash_instance() {
        $this->assertInstanceOf( 'Hautelook\Phpass\PasswordHash', yourls_phpass_instance() );
    }

    /**
     * Provide strings to hash
     */
    public function strings_to_hash() {
       
        return array(
            array( rand_str() ),
            array( 'lol .\+*?[^]$(){}=!<>|:-/' . "'" . '"' ),
            array( 'أنا أحب النقانق' ),
            array( '"double quotes"' ),
            array( "'single quotes'" ),
            array( '@$*' ),
            array( 'أنا أحب النقانق' ),
        );
    }

    /**
     * Check that a hash can be verified
     *
     * @dataProvider strings_to_hash
     * @since 0.1
     */
    public function test_hash_and_check( $string ) {
        $hash = yourls_phpass_hash( $string );
        $this->assertTrue( yourls_phpass_check( $string, $hash ) );
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
        global $random_password;
        
        $rnd_user = rand_str();
        
        // Check if users have md5'd passwords
        $this->assertTrue(  yourls_has_md5_password( 'md5' ) );
        $this->assertFalse( yourls_has_md5_password( $rnd_user ) );
        
        // Check that md5 hashed passwords match the password
        $this->assertTrue( yourls_check_password_hash( 'md5', $random_password ) );
        
        // Unknow user, existing password
        $this->assertFalse( yourls_check_password_hash( $rnd_user, $random_password ) );
        
        // Known user, invalid password
        $this->assertFalse( yourls_check_password_hash( 'md5', rand_str() ) );
    }
    
    /**
     * Check that valid login / phpass password is deemed valid
     *
     * @since 0.1
     */
    public function test_valid_phpass() {
        global $random_password;
        
        $rnd_user = rand_str();
        
        // Check if users have phpass'd passwords    
        $this->assertTrue(  yourls_has_phpass_password( 'phpass' ) );
        $this->assertTrue(  yourls_has_phpass_password( 'phpass2' ) );
        $this->assertFalse( yourls_has_phpass_password( $rnd_user ) ); // random username
        
        // Check that phppass hashed passwords match the password
        $this->assertTrue(  yourls_check_password_hash( 'phpass', $random_password ) );
        $this->assertTrue(  yourls_check_password_hash( 'phpass2', $random_password ) );
        
        // unknow user, existing valid password
        $this->assertFalse( yourls_check_password_hash( $rnd_user, $random_password ) );
        
        // known users, invalid passwords
        $this->assertFalse( yourls_check_password_hash( 'phpass', rand_str() ) );
        $this->assertFalse( yourls_check_password_hash( 'phpass2', rand_str() ) );
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

    /**
     * Check that in-file password encryption works as expected with different kinds of passwords
     *
     * This test checks that encrypting the config file, with different kinds of pwd, results in a valid
     * PHP file as expected. It doesn't test that the different kinds of password get correctly hashed
     * and can be correctly decyphered. This task is covered in test_hash_and_check()
     *
     * @since 0.1
     */
    public function test_hash_passwords_special_chars_now() {

        if( !copy( YOURLS_TESTDATA_DIR . '/auth/config-test-auth.php', YOURLS_TESTDATA_DIR . '/auth/config-test-auth-hashed.php' ) ) {
            $this->markTestSkipped( 'Could not copy file (write permissions?) -- cannot run test' );
        } else {
            $config_file = YOURLS_TESTDATA_DIR . '/auth/config-test-auth-hashed.php';
        }
        
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
