<?php
namespace YOURLS\Click;

class RateLimiter {
    public function __construct(
        private readonly int $maxPerWindow,
        private readonly int $windowSeconds,
        private readonly object $backend
    ) {}

    public function allow( string $ip ): bool {
        $key = 'yourls_click_rl:' . md5( $ip ) . ':' . floor( time() / $this->windowSeconds );
        $count = $this->backend->inc( $key, $this->windowSeconds );
        return $count <= $this->maxPerWindow;
    }

    public static function defaultBackend(): object {
        return new class {
            public function get( string $k ): ?int {
                if ( function_exists( 'apcu_fetch' ) ) {
                    $ok = false; $v = apcu_fetch( $k, $ok );
                    return $ok ? (int) $v : null;
                }
                return null;
            }
            public function inc( string $k, int $ttl ): int {
                if ( function_exists( 'apcu_inc' ) ) {
                    $ok = false; $v = apcu_inc( $k, 1, $ok, $ttl );
                    if ( ! $ok ) { apcu_store( $k, 1, $ttl ); return 1; }
                    return (int) $v;
                }
                return 1;
            }
        };
    }
}
