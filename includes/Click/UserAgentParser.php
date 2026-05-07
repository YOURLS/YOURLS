<?php
namespace YOURLS\Click;

class UserAgentParser {
    public function parse( string $ua ): array {
        if ( $ua === '' ) {
            return [ 'device_type' => 'bot', 'browser' => 'unknown', 'os' => 'unknown' ];
        }

        $os      = $this->matchOs( $ua );
        $browser = $this->matchBrowser( $ua );
        $device  = $this->matchDevice( $ua, $browser );

        return [ 'device_type' => $device, 'browser' => $browser, 'os' => $os ];
    }

    private function matchOs( string $ua ): string {
        return match ( true ) {
            (bool) preg_match( '/Windows NT/i', $ua )                               => 'windows',
            (bool) preg_match( '/Android/i', $ua )                                  => 'android',
            (bool) preg_match( '/(iPhone|iPad|iPod)/i', $ua )                       => 'ios',
            (bool) preg_match( '/Mac OS X/i', $ua )                                 => 'macos',
            (bool) preg_match( '/(Linux|X11|Ubuntu|Debian|Fedora|CentOS)/i', $ua )  => 'linux',
            default                                                                 => 'unknown',
        };
    }

    private function matchBrowser( string $ua ): string {
        return match ( true ) {
            (bool) preg_match( '/Edg\//i', $ua )                                                  => 'edge',
            (bool) preg_match( '/OPR\//i', $ua )                                                  => 'opera',
            (bool) preg_match( '/Firefox\//i', $ua )                                              => 'firefox',
            (bool) preg_match( '/Chrome\//i', $ua ) && ! preg_match( '/Edg\//i', $ua )            => 'chrome',
            (bool) preg_match( '/Safari\//i', $ua ) && ! preg_match( '/Chrome\//i', $ua )         => 'safari',
            (bool) preg_match( '/MSIE|Trident/i', $ua )                                           => 'ie',
            default                                                                                => 'unknown',
        };
    }

    private function matchDevice( string $ua, string $browser ): string {
        if ( $browser === 'unknown' ) {
            return 'bot';
        }
        if ( preg_match( '/(iPad|tablet)/i', $ua ) ) {
            return 'tablet';
        }
        if ( preg_match( '/Android/i', $ua ) && ! preg_match( '/Mobile/i', $ua ) ) {
            return 'tablet';
        }
        if ( preg_match( '/(Mobi|iPhone|iPod|Android.*Mobile)/i', $ua ) ) {
            return 'mobile';
        }
        return 'desktop';
    }
}
