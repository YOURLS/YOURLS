<?php
/**
 * Tests with signatures
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
     */
    public function test_signature_empty() {
        unset( $_REQUEST['signature'] );
        $this->assertFalse( yourls_check_signature() );
    }

    /**
     * Check that random signature isn't valid
     */
    public function test_signature_random() {
        $_REQUEST['signature'] = rand_str();
        $this->assertFalse( yourls_check_signature() );
    }

    /**
     * Check that empty signature and timestamp isn't valid
     */
    public function test_signature_timestamp_empty() {
        unset( $_REQUEST['signature'] );
        unset( $_REQUEST['timestamp'] );
        $this->assertFalse( yourls_check_signature_timestamp() );
    }

    /**
     * Check that random signature and timestamp isn't valid
     */
    public function test_signature_timestamp_random() {
        $_REQUEST['signature'] = rand_str();
        $_REQUEST['timestamp'] = rand_str();
        $this->assertFalse( yourls_check_signature_timestamp() );
    }

    /**
     * Check that valid sha256 (default algo) timestamped sig is valid
     */
    public function test_signature_timestamp_sha256() {
        $timestamp = time();
        $_REQUEST['timestamp'] = $timestamp;

        global $yourls_user_passwords;
        $random_user = array_rand($yourls_user_passwords);
        $signature = yourls_auth_signature($random_user);

        $hash = hash( 'sha256', $timestamp . $signature );
        $_REQUEST['signature'] = $hash;
        $this->assertTrue( yourls_check_signature_timestamp() );

        $hash = hash( 'sha256', $signature . $timestamp );
        $_REQUEST['signature'] = $hash;
        $this->assertTrue( yourls_check_signature_timestamp() );
    }

    /**
     * Check that valid hashed timestamped sig with a specified algo is valid
     */
    public function test_signature_timestamp_hash() {
        $timestamp = time();
        $_REQUEST['timestamp'] = $timestamp;

        global $yourls_user_passwords;
        $random_user = array_rand($yourls_user_passwords);
        $signature = yourls_auth_signature($random_user);

        $algos = [ 'sha256', 'sha384', 'sha512' ];

        foreach( $algos as $algo ) {
            $hash = hash( $algo, $timestamp . $signature );
            $_REQUEST['hash'] = $algo;
            $_REQUEST['signature'] = $hash;
            $this->assertTrue( yourls_check_signature_timestamp() );

            $hash = hash( $algo, $signature . $timestamp );
            $_REQUEST['signature'] = $hash;
            $this->assertTrue( yourls_check_signature_timestamp() );

            $_REQUEST['hash'] = rand_str();
            $this->assertFalse( yourls_check_signature_timestamp() );
        }
    }

    /**
     * Make sure we always define a default hash algo and an allowed hash algos list, so that future update of function
     * will maintain the same behavior (allow algo other than sha256, sha384 and sha512 via filter)
     */
    public function test_signature_timestamp_default_algo() {
        $this->assertIsString( yourls_default_hash_algo() );
        $this->assertIsArray( yourls_allowed_hash_algos() );
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
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('timestamps')]
    public function test_check_timestamp( $timestamp, $is_valid ) {
        $this->assertSame(yourls_check_timestamp( $timestamp ), $is_valid );
    }

}
