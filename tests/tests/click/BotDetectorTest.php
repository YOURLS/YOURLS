<?php

use YOURLS\Click\BotDetector;

#[\PHPUnit\Framework\Attributes\Group('click')]
class BotDetectorTest extends PHPUnit\Framework\TestCase {

    #[\PHPUnit\Framework\Attributes\DataProvider('uaProvider')]
    public function test_detection( string $ua, string $accept, bool $expectedBot, ?string $expectedName ) {
        $d = new BotDetector( $ua, $accept );
        $this->assertSame( $expectedBot, $d->isBot() );
        $this->assertSame( $expectedName, $d->botName() );
    }

    public static function uaProvider(): array {
        return [
            'empty UA'   => [ '', '', true, 'unknown' ],
            'curl'       => [ 'curl/7.85.0', '*/*', true, 'curl' ],
            'wget'       => [ 'Wget/1.21', '*/*', true, 'wget' ],
            'googlebot'  => [ 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'text/html', true, 'googlebot' ],
            'bingbot'    => [ 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'text/html', true, 'bingbot' ],
            'twitterbot' => [ 'Twitterbot/1.0', '*/*', true, 'twitterbot' ],
            'facebook'   => [ 'facebookexternalhit/1.1', '*/*', true, 'facebookexternalhit' ],
            'chrome'     => [ 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'text/html,application/xhtml+xml', false, null ],
            'safari ios' => [ 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1', 'text/html', false, null ],
            'firefox'    => [ 'Mozilla/5.0 (X11; Linux x86_64; rv:121.0) Gecko/20100101 Firefox/121.0', 'text/html', false, null ],
            'no accept'  => [ 'Mozilla/5.0', '', true, 'unknown' ],
        ];
    }
}
