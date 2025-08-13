<?php

/**
 * Auth functions other than login and logout
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
class AuthTest extends PHPUnit\Framework\TestCase {

    protected static $random_password;

    protected static $yourls_user_passwords_copy;

    public static function setUpBeforeClass(): void {
        global $yourls_user_passwords;
        self::$yourls_user_passwords_copy = $yourls_user_passwords;

        self::$random_password = rand_str();

        $salt = rand( 10000, 99999 );
        $md5  = 'md5:' . $salt . ':' . md5( $salt . self::$random_password );
        $phpassword_1 = 'phpass:' . str_replace( '$', '!', yourls_phpass_hash( self::$random_password ) );
        $phpassword_2 = 'phpass:' . yourls_phpass_hash( self::$random_password );

        $yourls_user_passwords['random_md5'] = $md5;
        $yourls_user_passwords['random_phpass1'] = $phpassword_1;
        $yourls_user_passwords['random_phpass2'] = $phpassword_2;
    }

    public static function tearDownAfterClass(): void {
        global $yourls_user_passwords;
        $yourls_user_passwords = self::$yourls_user_passwords_copy;
    }

    /**
     * Check that we have some password in clear text
     */
    public function test_has_cleartext() {
        $this->assertTrue( yourls_has_cleartext_passwords() );
    }

    /**
     * Check that we have no password in clear text
     */
    public function test_has_no_cleartext() {
        global $yourls_user_passwords;

        $copy = $yourls_user_passwords;

        $yourls_user_passwords = array();
        $yourls_user_passwords['md5'] = $copy['md5'];
        $yourls_user_passwords['phpass'] = $copy['phpass'];
        $yourls_user_passwords['phpass2'] = $copy['phpass2'];

        $this->assertFalse( yourls_has_cleartext_passwords() );

        $yourls_user_passwords = $copy;
    }

    /**
     * Check that user md5 has a MD5 hashed password
     */
    public function test_has_md5() {
        $this->assertTrue( yourls_has_md5_password('md5') );
        $this->assertTrue( yourls_has_md5_password('random_md5') );
        $this->assertFalse( yourls_has_md5_password(rand_str()) );
    }

    /**
     * Check that users phpass and phpass2 have PHPass'd passwords
     */
    public function test_has_phpass() {
        $this->assertTrue( yourls_has_phpass_password('phpass') );
        $this->assertTrue( yourls_has_phpass_password('phpass2') );
        $this->assertTrue( yourls_has_phpass_password('random_phpass1') );
        $this->assertTrue( yourls_has_phpass_password('random_phpass2') );
        $this->assertFalse( yourls_has_phpass_password(rand_str()) );
    }

    /**
     * Provide strings to hash
     */
    public static function strings_to_hash(): \Iterator
    {
        yield array( rand_str() );
        yield array( 'lol .\+*?[^]$(){}=!<>|:-/' . "'" . '"' );
        yield array( 'أنا أحب النقانق' );
        yield array( '"double quotes"' );
        yield array( "'single quotes'" );
        yield array( '@$*' );
        yield array( 'أنا أحب النقانق' );
    }

    /**
     * Check that a hash can be verified
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('strings_to_hash')]
    public function test_hash_and_check( $string ) {
        $hash = yourls_phpass_hash( $string );
        $this->assertTrue( yourls_phpass_check( $string, $hash ) );
    }

    /**
     * Check that valid login / clear text password is deemed valid
     */
    public function test_valid_cleartext() {
        $this->assertTrue(  yourls_check_password_hash( 'clear', 'somepassword' ) );
        $this->assertFalse( yourls_check_password_hash( 'unknown', 'somepassword' ) );
        $this->assertFalse( yourls_check_password_hash( 'clear', 'wrongpassword' ) );
    }

    /**
     * Check that valid login / md5 password is deemed valid
     */
    public function test_valid_md5() {
        // Check if users have md5'd passwords
        $this->assertTrue(  yourls_has_md5_password( 'random_md5' ) );

        // Check that md5 hashed passwords match the password
        $this->assertTrue( yourls_check_password_hash( 'random_md5', self::$random_password ) );

        // Unknown user, existing password
        $this->assertFalse( yourls_check_password_hash( rand_str(), self::$random_password ) );

        // Known user, invalid password
        $this->assertFalse( yourls_check_password_hash( 'md5', rand_str() ) );
    }

    /**
     * Check that valid login / phpass password is deemed valid
     */
    public function test_valid_phpass() {
        // Check that phpass hashed passwords match the password
        $this->assertTrue(  yourls_check_password_hash( 'random_phpass1', self::$random_password ) );
        $this->assertTrue(  yourls_check_password_hash( 'random_phpass2', self::$random_password ) );

        // unknown user, existing valid password
        $this->assertFalse( yourls_check_password_hash( rand_str(), self::$random_password ) );

        // known users, invalid passwords
        $this->assertFalse( yourls_check_password_hash( 'phpass', rand_str() ) );
        $this->assertFalse( yourls_check_password_hash( 'phpass2', rand_str() ) );
    }

    /**
     * Check that in-file password encryption works as expected
     */
    public function test_hash_passwords_now() {
        // If local: make a copy of user/config-sample.php to user/config-test.php in case tests not run on a clean install
        // on Github: just proceed with user/config-sample.php since there's always a `git clone` first
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
        $this->assertSame( 0, $return );
    }

    /**
     * Check that encrypting un-writable file returns expected error
     */
    public function test_hash_passwords_now_unwritable() {
        // generate un-writable file
        $file = YOURLS_TESTDATA_DIR . '/auth/unwritable.php';
        touch( $file );

        if(yourls_is_windows()) {
            exec( 'attrib +r ' . escapeshellarg( $file ) );
        } else {
            chmod( $file, 0444 );
        }

        $this->assertSame('cannot write file', yourls_hash_passwords_now( $file ) );

        // cleanup
        if(yourls_is_windows()) {
            exec( 'attrib -r ' . escapeshellarg( $file ) );
        } else {
            chmod( $file, 0644 );
        }
        unlink( $file );
    }

    /**
     * Check that encrypting non-existent or unreadable file returns expected error
     */
    public function test_hash_passwords_now_non_existent() {
        $this->assertSame('cannot read file', yourls_hash_passwords_now( rand_str() ) );
    }

    /**
     * Check that encrypting empty file returns expected error
     */
    public function test_hash_passwords_now_empty() {
        $this->assertSame('could not read file', yourls_hash_passwords_now( YOURLS_TESTDATA_DIR . '/auth/empty.php' ) );
    }

    /**
     * Check that encrypting file with no passwords returns expected error
     */
    public function test_hash_passwords_now_no_pwd() {
        $this->assertSame('no password found', yourls_hash_passwords_now( YOURLS_TESTDATA_DIR . '/auth/nopassword.php' ) );
    }

    /**
     * Check that encrypting file with incorrect content returns expected error
     */
    public function test_hash_passwords_now_bad_content() {
        $this->assertSame('preg_replace problem', yourls_hash_passwords_now( YOURLS_TESTDATA_DIR . '/auth/preg_replace_problem.php' ) );
    }

    /**
     * Check that in-file password encryption works as expected with different kinds of passwords
     *
     * This test checks that encrypting the config file, with different kinds of pwd, results in a valid
     * PHP file as expected. It doesn't test that the different kinds of password get correctly hashed
     * and can be correctly deciphered. This task is covered in test_hash_and_check()
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
        $this->assertSame( 0, $return );
    }

    /**
     * Check that we hash passwords by default
     */
    public function test_maybe_hash_passwords_clear_passwords() {
        global $yourls_user_passwords;
        $copy = $yourls_user_passwords;

        $yourls_user_passwords = [];
        $yourls_user_passwords['ozh'] = 'ozh';

        $this->assertTrue( yourls_maybe_hash_passwords() );

        $yourls_user_passwords = $copy;
    }

    /**
     * Check that we don't hash passwords in config file if there's nothing to hash
     */
    public function test_maybe_hash_passwords_no_clear_password() {
        global $yourls_user_passwords;
        $copy = $yourls_user_passwords;

        $yourls_user_passwords = array();
        $yourls_user_passwords['md5'] = $copy['md5'];

        $this->assertFalse( yourls_maybe_hash_passwords() );

        $yourls_user_passwords = $copy;
    }

    /**
     * Check that we don't hash passwords in config file if user explicitly doesn't want it
     *
     * (Note that we're checking with the filter, it can also be enforced with a constant)
     */
    public function test_maybe_hash_passwords_YOURLS_NO_HASH_PASSWORD() {
        yourls_add_filter('skip_password_hashing', 'yourls_return_true');
        $this->assertFalse( yourls_maybe_hash_passwords() );
        yourls_remove_filter('skip_password_hashing', 'yourls_return_true');
    }

    /**
     * Check that we don't hash passwords in config file if USER/PWD provided by env
     */
    public function test_maybe_hash_passwords_via_env() {
        putenv('YOURLS_USER=ozh');
        putenv('YOURLS_PASSWORD=ozh');

        $this->assertFalse( yourls_maybe_hash_passwords() );

        putenv('YOURLS_USER');
        putenv('YOURLS_PASSWORD');
    }

}
