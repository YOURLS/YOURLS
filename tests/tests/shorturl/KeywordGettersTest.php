<?php

/**
 * Short URLs : keyword info getters (IP, timestamp, stats) and reverse lookup
 */
#[\PHPUnit\Framework\Attributes\Group('shorturls')]
class KeywordGettersTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_all_filters( 'get_IP' );
    }

    /**
     * yourls_get_keyword_IP() and yourls_get_keyword_timestamp() return the stored values
     */
    public function test_get_keyword_ip_and_timestamp() {
        $ip = '203.0.113.7';
        yourls_add_filter( 'get_IP', fn() => $ip );

        $keyword = rand_str();
        yourls_insert_link_in_db( 'http://' . rand_str(), $keyword, rand_str() );

        $this->assertSame( $ip, yourls_get_keyword_IP( $keyword ) );

        $timestamp = yourls_get_keyword_timestamp( $keyword );
        $this->assertNotFalse( DateTime::createFromFormat( 'Y-m-d H:i:s', $timestamp ) );
    }

    /**
     * Both getters return the $notfound value for an unknown keyword
     */
    public function test_get_keyword_ip_and_timestamp_not_found() {
        $this->assertSame( 'no-ip',   yourls_get_keyword_IP( rand_str(), 'no-ip' ) );
        $this->assertSame( 'no-time', yourls_get_keyword_timestamp( rand_str(), 'no-time' ) );
    }

    /**
     * yourls_get_keyword_stats() returns a success structure for an existing keyword
     */
    public function test_get_keyword_stats_existing() {
        $keyword = rand_str();
        $url     = 'http://' . rand_str();
        $title   = rand_str();
        yourls_insert_link_in_db( $url, $keyword, $title );

        $stats = yourls_get_keyword_stats( $keyword );

        $this->assertSame( '200', $stats['statusCode'] );
        $this->assertSame( 'success', $stats['message'] );
        $this->assertSame( $url, $stats['link']['url'] );
        $this->assertSame( $title, $stats['link']['title'] );
        $this->assertEquals( 0, $stats['link']['clicks'] );
    }

    /**
     * yourls_get_keyword_stats() returns a 404 structure for an unknown keyword
     */
    public function test_get_keyword_stats_not_found() {
        $stats = yourls_get_keyword_stats( rand_str() );

        $this->assertSame( '404', $stats['statusCode'] );
    }

    /**
     * yourls_get_longurl_keywords() returns every keyword pointing to a long URL
     */
    public function test_get_longurl_keywords() {
        $url = 'http://' . rand_str();
        $k1  = rand_str();
        $k2  = rand_str();
        yourls_insert_link_in_db( $url, $k1, rand_str() );
        yourls_insert_link_in_db( $url, $k2, rand_str() );

        $keywords = yourls_get_longurl_keywords( $url );

        $this->assertContains( $k1, $keywords );
        $this->assertContains( $k2, $keywords );
    }

}
