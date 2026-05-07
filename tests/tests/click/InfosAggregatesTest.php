<?php

#[\PHPUnit\Framework\Attributes\Group('click')]
class InfosAggregatesTest extends PHPUnit\Framework\TestCase {

    protected function setUp(): void {
        parent::setUp();
        $ydb = yourls_get_db('write-test_click');
        $ydb->perform( 'DELETE FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "aggkw"' );
        if ( ! yourls_keyword_is_taken( 'aggkw' ) ) {
            yourls_add_new_link( 'https://example.com', 'aggkw', 'agg test' );
        }
        $rows = [
            [ 'desktop','chrome','macos','t.co','newsletter','203.0.113.1','IT','Milan' ],
            [ 'desktop','chrome','macos','t.co','newsletter','203.0.113.2','IT','Rome'  ],
            [ 'mobile', 'safari','ios',  null,  null,        '203.0.113.3','FR','Paris' ],
            [ 'bot',    'unknown','unknown', null, null,     '203.0.113.4','US',null    ],
        ];
        foreach ( $rows as $r ) {
            $ydb->fetchAffected(
                'INSERT INTO `' . YOURLS_DB_TABLE_LOG . '`(click_time,shorturl,referrer,user_agent,ip_address,country_code,device_type,browser,os,referrer_host,utm_source,city) VALUES (NOW(),:k,"","UA",:ip,:cc,:d,:b,:o,:rh,:us,:city)',
                [ 'k'=>'aggkw','ip'=>$r[5],'cc'=>$r[6],'d'=>$r[0],'b'=>$r[1],'o'=>$r[2],'rh'=>$r[3],'us'=>$r[4],'city'=>$r[7] ]
            );
        }
    }

    public function test_clicks_by_dimension_groups_and_orders() {
        $rows = yourls_get_clicks_by_dimension( 'aggkw', 'device_type', 'all', 10 );
        $this->assertSame( 2, $rows['desktop'] ?? 0 );
        $this->assertSame( 1, $rows['mobile'] ?? 0 );
        $this->assertSame( 1, $rows['bot'] ?? 0 );
    }

    public function test_unique_visitors_counts_distinct_hash_or_ip_fallback() {
        $n = yourls_get_unique_visitors( 'aggkw', 'all' );
        $this->assertSame( 4, $n );
    }

    public function test_recent_clicks_paginates() {
        $page1 = yourls_get_recent_clicks( 'aggkw', 1, 2 );
        $this->assertCount( 2, $page1 );
    }
}
