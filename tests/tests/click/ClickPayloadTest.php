<?php

use YOURLS\Click\ClickPayload;

#[\PHPUnit\Framework\Attributes\Group('click')]
class ClickPayloadTest extends PHPUnit\Framework\TestCase {

    public function test_to_row_contains_all_hot_columns() {
        $p = new ClickPayload();
        $p->keyword       = 'abc';
        $p->clickTime     = '2026-05-07 10:00:00';
        $p->referrer      = 'https://t.co/x';
        $p->userAgent     = 'Mozilla/5.0';
        $p->ipAddress     = '203.0.113.7';
        $p->countryCode   = 'IT';
        $p->deviceType    = 'desktop';
        $p->browser       = 'chrome';
        $p->os            = 'macos';
        $p->referrerHost  = 't.co';
        $p->utmSource     = 'newsletter';
        $p->utmMedium     = 'email';
        $p->utmCampaign   = 'spring';
        $p->city          = 'Milan';
        $p->region        = 'Lombardy';
        $p->visitorHash   = '0123456789abcdef';
        $p->clickUid      = 'fedcba9876543210';
        $p->meta          = [ 'tz' => 'Europe/Rome', 'lang' => 'it-IT' ];

        $row = $p->toRow();
        $this->assertSame( 'abc', $row['shorturl'] );
        $this->assertSame( 'IT',  $row['country_code'] );
        $this->assertSame( 'chrome', $row['browser'] );
        $this->assertSame( '0123456789abcdef', $row['visitor_hash'] );
        $this->assertJson( $row['meta'] );
        $this->assertSame( 'Europe/Rome', json_decode( $row['meta'], true )['tz'] );
    }

    public function test_truncation_of_oversized_fields() {
        $p = new ClickPayload();
        $p->keyword      = 'abc';
        $p->referrer     = str_repeat( 'a', 500 );
        $p->userAgent    = str_repeat( 'b', 500 );
        $p->referrerHost = str_repeat( 'c', 200 );
        $p->utmSource    = str_repeat( 'd', 200 );
        $p->city         = str_repeat( 'e', 200 );
        $row = $p->toRow();
        $this->assertSame( 200, strlen( $row['referrer'] ) );
        $this->assertSame( 255, strlen( $row['user_agent'] ) );
        $this->assertSame( 100, strlen( $row['referrer_host'] ) );
        $this->assertSame( 100, strlen( $row['utm_source'] ) );
        $this->assertSame( 100, strlen( $row['city'] ) );
    }

    public function test_null_meta_serializes_to_null() {
        $p = new ClickPayload();
        $p->keyword = 'abc';
        $row = $p->toRow();
        $this->assertNull( $row['meta'] );
    }
}
