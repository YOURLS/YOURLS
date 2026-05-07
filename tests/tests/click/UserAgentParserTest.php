<?php

use YOURLS\Click\UserAgentParser;

#[\PHPUnit\Framework\Attributes\Group('click')]
class UserAgentParserTest extends PHPUnit\Framework\TestCase {

    #[\PHPUnit\Framework\Attributes\DataProvider('uaProvider')]
    public function test_parse( string $ua, string $device, string $browser, string $os ) {
        $r = ( new UserAgentParser() )->parse( $ua );
        $this->assertSame( $device,  $r['device_type'], 'device' );
        $this->assertSame( $browser, $r['browser'],     'browser' );
        $this->assertSame( $os,      $r['os'],          'os' );
    }

    public static function uaProvider(): array {
        return [
            [ 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'desktop', 'chrome', 'windows' ],
            [ 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Safari/605.1.15', 'desktop', 'safari', 'macos' ],
            [ 'Mozilla/5.0 (X11; Linux x86_64; rv:121.0) Gecko/20100101 Firefox/121.0', 'desktop', 'firefox', 'linux' ],
            [ 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1', 'mobile', 'safari', 'ios' ],
            [ 'Mozilla/5.0 (Linux; Android 14; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36', 'mobile', 'chrome', 'android' ],
            [ 'Mozilla/5.0 (iPad; CPU OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Safari/604.1', 'tablet', 'safari', 'ios' ],
            [ 'Mozilla/5.0 (Linux; Android 14; SM-X910) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'tablet', 'chrome', 'android' ],
            [ 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', 'desktop', 'edge', 'windows' ],
            [ 'curl/7.85.0', 'bot', 'unknown', 'unknown' ],
            [ '', 'bot', 'unknown', 'unknown' ],
        ];
    }
}
