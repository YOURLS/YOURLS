<?php

use YOURLS\Click\VisitorHasher;

#[\PHPUnit\Framework\Attributes\Group('click')]
class VisitorHasherTest extends PHPUnit\Framework\TestCase {

    public function test_deterministic_within_same_day() {
        $h = new VisitorHasher( 'pepper-secret', '2026-05-07' );
        $a = $h->hash( '203.0.113.7', 'Mozilla/5.0 ...' );
        $b = $h->hash( '203.0.113.7', 'Mozilla/5.0 ...' );
        $this->assertSame( $a, $b );
        $this->assertMatchesRegularExpression( '/^[a-f0-9]{16}$/', $a );
    }

    public function test_rotates_across_days() {
        $a = ( new VisitorHasher( 'pepper-secret', '2026-05-07' ) )->hash( '203.0.113.7', 'UA' );
        $b = ( new VisitorHasher( 'pepper-secret', '2026-05-08' ) )->hash( '203.0.113.7', 'UA' );
        $this->assertNotSame( $a, $b );
    }

    public function test_different_ips_produce_different_hashes() {
        $h = new VisitorHasher( 'pepper-secret', '2026-05-07' );
        $this->assertNotSame(
            $h->hash( '203.0.113.7', 'UA' ),
            $h->hash( '203.0.113.8', 'UA' )
        );
    }
}
