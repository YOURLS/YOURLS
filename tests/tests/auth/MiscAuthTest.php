<?php

/**
 * Misc test
 */
#[\PHPUnit\Framework\Attributes\Group('auth')]
class MiscAuthTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_all_filters( 'hmac_algo' );
    }

    public function test_yourls_skip_password_hashing_is_bool() {
        $this->assertIsBool(yourls_skip_password_hashing());
    }

    public function test_yourls_salt_return_string() {
        $this->assertIsString(yourls_salt(rand_str()));
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
