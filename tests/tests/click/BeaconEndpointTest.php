<?php

#[\PHPUnit\Framework\Attributes\Group('click')]
#[\PHPUnit\Framework\Attributes\Group('click-beacon')]
class BeaconEndpointTest extends PHPUnit\Framework\TestCase {

    protected function setUp(): void {
        parent::setUp();
        if ( ! yourls_keyword_is_taken( 'beacontest' ) ) {
            yourls_add_new_link( 'https://example.com', 'beacontest', 'beacon test' );
        }
        yourls_get_db('write-test_click')->perform( 'DELETE FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "beacontest"' );
    }

    public function test_valid_beacon_persists_a_row() {
        $payload = json_encode( [
            'v' => 1,
            'click_uid' => 'aaaaaaaaaaaaaaaa',
            'keyword' => 'beacontest',
            'screen' => [ 'w' => 1920, 'h' => 1080, 'dpr' => 2 ],
            'viewport' => [ 'w' => 1280, 'h' => 720 ],
            'tz' => 'Europe/Rome',
            'lang' => 'it-IT',
            'connection' => '4g',
        ] );

        $status = $this->invokeBeacon( $payload, '203.0.113.10', 'Mozilla/5.0 Chrome/120 Safari/537.36' );
        $this->assertSame( 204, $status );

        $row = yourls_get_db('read-test_click')->fetchObject(
            'SELECT * FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE click_uid = :uid',
            [ 'uid' => 'aaaaaaaaaaaaaaaa' ]
        );
        $this->assertNotNull( $row );
        $this->assertSame( 'beacontest', $row->shorturl );
        $meta = json_decode( $row->meta, true );
        $this->assertSame( 1920, $meta['screen_w'] );
        $this->assertSame( 'Europe/Rome', $meta['tz'] );
    }

    public function test_invalid_click_uid_is_rejected_silently() {
        $status = $this->invokeBeacon( '{"v":1,"click_uid":"BAD","keyword":"beacontest"}', '203.0.113.11', 'Chrome' );
        $this->assertSame( 204, $status );
        $count = yourls_get_db('read-test_click')->fetchValue(
            'SELECT COUNT(*) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE click_uid = :uid',
            [ 'uid' => 'BAD' ]
        );
        $this->assertSame( 0, (int) $count );
    }

    public function test_unknown_keyword_is_rejected_silently() {
        $status = $this->invokeBeacon(
            '{"v":1,"click_uid":"bbbbbbbbbbbbbbbb","keyword":"nope_no_keyword_zzz"}',
            '203.0.113.12', 'Chrome'
        );
        $this->assertSame( 204, $status );
        $count = yourls_get_db('read-test_click')->fetchValue(
            'SELECT COUNT(*) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE click_uid = :uid',
            [ 'uid' => 'bbbbbbbbbbbbbbbb' ]
        );
        $this->assertSame( 0, (int) $count );
    }

    private function invokeBeacon( string $body, string $ip, string $ua ): int {
        $_SERVER['REMOTE_ADDR']     = $ip;
        $_SERVER['HTTP_USER_AGENT'] = $ua;
        $_SERVER['REQUEST_METHOD']  = 'POST';
        if ( ! defined( 'YOURLS_CLICK_BEACON_TEST' ) ) {
            define( 'YOURLS_CLICK_BEACON_TEST', true );
        }
        require_once dirname( __DIR__, 3 ) . '/yourls-collect.php';
        return \YOURLS\Click\Beacon::handle( $body );
    }
}
