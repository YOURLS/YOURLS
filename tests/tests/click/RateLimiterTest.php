<?php

use YOURLS\Click\RateLimiter;

#[\PHPUnit\Framework\Attributes\Group('click')]
class RateLimiterTest extends PHPUnit\Framework\TestCase {

    public function test_under_budget_returns_true() {
        $rl = new RateLimiter( 3, 60, $this->arrayBackend() );
        $this->assertTrue( $rl->allow( '1.2.3.4' ) );
        $this->assertTrue( $rl->allow( '1.2.3.4' ) );
        $this->assertTrue( $rl->allow( '1.2.3.4' ) );
    }

    public function test_over_budget_returns_false() {
        $rl = new RateLimiter( 2, 60, $this->arrayBackend() );
        $this->assertTrue(  $rl->allow( '1.2.3.4' ) );
        $this->assertTrue(  $rl->allow( '1.2.3.4' ) );
        $this->assertFalse( $rl->allow( '1.2.3.4' ) );
    }

    public function test_separate_ips_have_separate_budgets() {
        $rl = new RateLimiter( 1, 60, $this->arrayBackend() );
        $this->assertTrue(  $rl->allow( '1.2.3.4' ) );
        $this->assertTrue(  $rl->allow( '5.6.7.8' ) );
        $this->assertFalse( $rl->allow( '1.2.3.4' ) );
    }

    private function arrayBackend(): object {
        return new class {
            public array $store = [];
            public function get( string $k ): ?int { return $this->store[ $k ] ?? null; }
            public function inc( string $k, int $ttl ): int {
                $this->store[ $k ] = ( $this->store[ $k ] ?? 0 ) + 1;
                return $this->store[ $k ];
            }
        };
    }
}
