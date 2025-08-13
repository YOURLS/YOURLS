<?php
/**
 * Tests with signatures
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
#[\PHPUnit\Framework\Attributes\Group('signatures')]
class SigTest extends PHPUnit\Framework\TestCase {

    protected $backup_request;

    protected function setUp(): void {
        $this->backup_request = $_REQUEST;
    }

    protected function tearDown(): void {
        $_REQUEST = $this->backup_request;
    }

    /**
     * Check that empty signature isn't valid
     *
     * @since 0.1
     */
    public function test_signature_empty() {
        unset( $_REQUEST['signature'] );
        $this->assertFalse( yourls_check_signature() );
    }

    /**
     * Check that random signature isn't valid
     *
     * @since 0.1
     */
    public function test_signature_random() {
        $_REQUEST['signature'] = rand_str();
        $this->assertFalse( yourls_check_signature() );
    }

    /**
     * Check that empty signature and timestamp isn't valid
     *
     * @since 0.1
     */
    public function test_signature_timestamp_empty() {
        unset( $_REQUEST['signature'] );
        unset( $_REQUEST['timestamp'] );
        $this->assertFalse( yourls_check_signature_timestamp() );
    }

    /**
     * Check that random signature and timestamp isn't valid
     *
     * @since 0.1
     */
    public function test_signature_timestamp_random() {
        $_REQUEST['signature'] = rand_str();
        $_REQUEST['timestamp'] = rand_str();
        $this->assertFalse( yourls_check_signature_timestamp() );
    }

    /**
     * Check that valid md5 timestamped sig is valid
     *
     * @since 0.1
     */
    public function test_signature_timestamp_md5() {
        $timestamp = time();
        $_REQUEST['timestamp'] = $timestamp;

        global $yourls_user_passwords;
        $random_user = array_rand($yourls_user_passwords);
        $signature = yourls_auth_signature($random_user);

        $md5 = md5( $timestamp . $signature );
        $_REQUEST['signature'] = $md5;
        $this->assertTrue( yourls_check_signature_timestamp() );

        $md5 = md5( $signature . $timestamp );
        $_REQUEST['signature'] = $md5;
        $this->assertTrue( yourls_check_signature_timestamp() );
    }

    /**
     * Check that valid hashed timestamped sig is valid
     *
     * @since 0.1
     */
    public function test_signature_timestamp_hash() {
        $timestamp = time();
        $_REQUEST['timestamp'] = $timestamp;

        global $yourls_user_passwords;
        $random_user = array_rand($yourls_user_passwords);
        $signature = yourls_auth_signature($random_user);

        $algos = hash_algos();
        $random_algo = $algos[array_rand($algos)];
        $_REQUEST['hash'] = $random_algo;

        $hash = hash($random_algo, $timestamp . $signature );
        $_REQUEST['signature'] = $hash;
        $this->assertTrue( yourls_check_signature_timestamp() );

        $hash = hash($random_algo, $signature . $timestamp );
        $_REQUEST['signature'] = $hash;
        $this->assertTrue( yourls_check_signature_timestamp() );

        $_REQUEST['hash'] = rand_str();
        $this->assertFalse( yourls_check_signature_timestamp() );
    }

    /**
     * Provide valid and invalid timestamps as compared to current time and nonce life
     */
    public static function timestamps(): \Iterator {
        $now = time();
        $little_in_the_future = $now + ( YOURLS_NONCE_LIFE / 2 );
        $little_in_the_past   = $now - ( YOURLS_NONCE_LIFE / 2 );
        $far_in_the_future    = $now + ( YOURLS_NONCE_LIFE * 2 );
        $far_in_the_past      = $now - ( YOURLS_NONCE_LIFE * 2 );
        yield array( 0, false );
        yield array( $now, true );
        yield array( $little_in_the_future, true );
        yield array( $little_in_the_past, true );
        yield array( $far_in_the_future, false );
        yield array( $far_in_the_past, false );
    }

    /**
     * Check that timestamps are correctly handled (too old = bad, too future = bad, ...)
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('timestamps')]
    public function test_check_timestamp( $timestamp, $is_valid ) {
        $this->assertSame(yourls_check_timestamp( $timestamp ), $is_valid );
    }

}
