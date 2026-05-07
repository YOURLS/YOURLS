<?php

use YOURLS\Click\ClickCollector;
use YOURLS\Click\ClickPayload;
use YOURLS\Click\UserAgentParser;
use YOURLS\Click\VisitorHasher;
use YOURLS\Click\GeoLookup;

#[\PHPUnit\Framework\Attributes\Group('click')]
class ClickCollectorTest extends PHPUnit\Framework\TestCase {

    public function test_server_payload_contains_parsed_ua_and_geo_and_referrer_host_and_utm() {
        $col = new ClickCollector(
            new UserAgentParser(),
            $this->stubGeo( [ 'country' => 'IT', 'city' => 'Milan', 'region' => 'Lombardy' ] ),
            new VisitorHasher( 'pepper', '2026-05-07' ),
            anonymizeIp: false
        );

        $p = $col->collectFromServer(
            keyword: 'abc',
            ip: '203.0.113.7',
            ua: 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            referrer: 'https://t.co/path?utm_source=newsletter&utm_medium=email&utm_campaign=spring',
            queryString: 'utm_source=newsletter&utm_medium=email&utm_campaign=spring',
            isBot: false,
            botName: null,
            clickUid: 'fedcba9876543210'
        );

        $this->assertInstanceOf( ClickPayload::class, $p );
        $this->assertSame( 'desktop', $p->deviceType );
        $this->assertSame( 'chrome',  $p->browser );
        $this->assertSame( 'windows', $p->os );
        $this->assertSame( 'IT',      $p->countryCode );
        $this->assertSame( 'Milan',   $p->city );
        $this->assertSame( 'Lombardy',$p->region );
        $this->assertSame( 't.co',    $p->referrerHost );
        $this->assertSame( 'newsletter', $p->utmSource );
        $this->assertSame( 'email',      $p->utmMedium );
        $this->assertSame( 'spring',     $p->utmCampaign );
        $this->assertMatchesRegularExpression( '/^[a-f0-9]{16}$/', $p->visitorHash );
        $this->assertSame( 'fedcba9876543210', $p->clickUid );
        $this->assertSame( 'IT', $p->meta['country'] ?? null );
    }

    public function test_bot_marker_in_meta() {
        $col = $this->makeCollector();
        $p = $col->collectFromServer(
            keyword: 'abc', ip: '1.2.3.4', ua: 'Googlebot/2.1', referrer: '', queryString: '',
            isBot: true, botName: 'googlebot', clickUid: '0000000000000000'
        );
        $this->assertTrue( $p->meta['is_bot'] );
        $this->assertSame( 'googlebot', $p->meta['bot_name'] );
    }

    public function test_ip_anonymization_zeroes_last_octet() {
        $col = new ClickCollector(
            new UserAgentParser(),
            $this->stubGeo( [] ),
            new VisitorHasher( 'pepper', '2026-05-07' ),
            anonymizeIp: true
        );
        $p = $col->collectFromServer(
            keyword: 'abc', ip: '203.0.113.7', ua: 'curl/8', referrer: '', queryString: '',
            isBot: true, botName: 'curl', clickUid: '0000000000000000'
        );
        $this->assertSame( '203.0.113.0', $p->ipAddress );
    }

    public function test_beacon_merge_overwrites_only_client_fields() {
        $col = $this->makeCollector();
        $base = $col->collectFromServer(
            keyword: 'abc', ip: '203.0.113.7',
            ua: 'Mozilla/5.0 (Windows NT 10.0) Chrome/120 Safari/537.36',
            referrer: '', queryString: '',
            isBot: false, botName: null, clickUid: 'fedcba9876543210'
        );
        $merged = $col->mergeBeacon( $base, [
            'screen'   => [ 'w' => 1920, 'h' => 1080, 'dpr' => 2 ],
            'viewport' => [ 'w' => 1280, 'h' => 720 ],
            'tz'       => 'Europe/Rome',
            'lang'     => 'it-IT',
            'connection' => '4g',
        ] );
        $this->assertSame( 1920, $merged->meta['screen_w'] );
        $this->assertSame( 'Europe/Rome', $merged->meta['tz'] );
        $this->assertSame( 'it-IT', $merged->meta['lang'] );
        $this->assertSame( '4g', $merged->meta['connection_type'] );
        $this->assertSame( 'chrome', $merged->browser );
    }

    private function makeCollector(): ClickCollector {
        return new ClickCollector(
            new UserAgentParser(),
            $this->stubGeo( [] ),
            new VisitorHasher( 'pepper', '2026-05-07' ),
            anonymizeIp: false
        );
    }

    private function stubGeo( array $row ): GeoLookup {
        return new class( $row ) extends GeoLookup {
            public function __construct( private array $row ) { parent::__construct( null ); }
            public function lookup( string $ip ): array {
                return array_merge(
                    [ 'country' => null, 'city' => null, 'region' => null, 'lat' => null, 'lon' => null, 'asn' => null, 'isp' => null ],
                    $this->row
                );
            }
        };
    }
}
