<?php

/**
 * Misc test
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
class MiscAuthTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_all_filters( 'hmac_algo' );
        yourls_remove_all_filters( 'get_cookie_key' );
    }

    public function test_yourls_skip_password_hashing_is_bool() {
        $this->assertIsBool(yourls_skip_password_hashing());
    }

    public function test_yourls_salt_return_string() {
        $this->assertIsString(yourls_salt(rand_str()));
    }

    public function test_yourls_get_cookie_key_matches_constant_and_returns_string() {
        if ( defined( 'YOURLS_COOKIEKEY' ) ) {
            $this->assertSame( YOURLS_COOKIEKEY, yourls_get_cookie_key() );
        } else {
            // Fallback: just a non-empty string
            $this->assertIsString( yourls_get_cookie_key() );
            $this->assertNotEmpty( yourls_get_cookie_key() );
        }
    }

    /**
     * yourls_get_cookie_key() is filterable
     */
    public function test_yourls_get_cookie_key_filter_can_override() {
        $key = 'https://www.youtube.com/watch?v=evpVNXsDfmQ';
        yourls_add_filter( 'get_cookie_key', fn() => $key );

        $this->assertSame( $key, yourls_get_cookie_key() );
    }

    /**
     * yourls_salt() changes the output with different cookie keys
     */
    public function test_yourls_salt_uses_cookie_key() {
        $key1 = "It's a Secret";
        yourls_add_filter( 'get_cookie_key', fn() => $key1 );
        $result1 = yourls_salt( 'test' );

        $key2 = "Another Secret";
        yourls_add_filter( 'get_cookie_key', fn() => $key2 );
        $result2 = yourls_salt( 'test' );

        $this->assertNotSame( $result1, $result2 );
    }

    public function test_yourls_hmac_algo_default() {
        $this->assertContains(yourls_hmac_algo(), hash_hmac_algos());
    }

    public function test_yourls_hmac_algo_custom() {
        // get random hash_hmac_algo
        $rnd_algo = hash_hmac_algos()[mt_rand(0, count(hash_hmac_algos()) - 1)];
        yourls_add_filter('hmac_algo', function() use ($rnd_algo) {
            return $rnd_algo;
        } );

        // make sure it's the one we set
        $algo = yourls_hmac_algo();
        $this->assertSame($algo, $rnd_algo);
    }

    public function test_yourls_hmac_algo_non_existent() {
        $this->assertSame( 'sha256', yourls_hmac_algo('omgozh') );
    }

}
