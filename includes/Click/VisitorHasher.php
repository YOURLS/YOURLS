<?php
namespace YOURLS\Click;

class VisitorHasher {
    public function __construct(
        private readonly string $pepper,
        private readonly string $dayKey
    ) {}

    public static function today( string $pepper ): self {
        return new self( $pepper, gmdate( 'Y-m-d' ) );
    }

    public function hash( string $ip, string $ua ): string {
        return substr( hash( 'sha256', $ip . '|' . $ua . '|' . $this->dayKey . '|' . $this->pepper ), 0, 16 );
    }
}
