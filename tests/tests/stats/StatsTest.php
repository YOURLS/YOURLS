<?php

/**
 * Stats functions
 */
#[\PHPUnit\Framework\Attributes\Group('stats')]
class StatsTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_all_filters( 'get_stats' );
    }

    public function test_do_log_redirect() {
        $this->assertIsBool(yourls_do_log_redirect());
    }

    /**
     * yourls_get_stats() returns the expected structure
     */
    public function test_get_stats_returns_structure() {
        $stats = yourls_get_stats( 'top', 10 ); // We have links since the installation fixture creates some

        $this->assertSame( '200', $stats['statusCode'] );
        $this->assertArrayHasKey( 'links', $stats );
        $this->assertArrayHasKey( 'stats', $stats );
        $this->assertIsInt( $stats['stats']['total_links'] );
        $this->assertIsInt( $stats['stats']['total_clicks'] );
    }

    /**
     * The different sort filters are all accepted (exercises the switch branches)
     */
    public static function stats_filters(): \Iterator {
        yield 'top'     => [ 'top' ];
        yield 'bottom'  => [ 'bottom' ];
        yield 'last'    => [ 'last' ];
        yield 'rand'    => [ 'rand' ];
        yield 'random'  => [ 'random' ];
        yield 'unknown' => [ 'same-as-top' ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('stats_filters')]
    public function test_get_stats_filters( $filter ) {
        $stats = yourls_get_stats( $filter, 5 );

        $this->assertSame( '200', $stats['statusCode'] );
        $this->assertArrayHasKey( 'stats', $stats );
    }

    /**
     * A limit of 0 skips the links lookup entirely but still returns the totals
     */
    public function test_get_stats_limit_zero_has_no_links() {
        $stats = yourls_get_stats( 'top', 0 );

        $this->assertSame( '200', $stats['statusCode'] );
        $this->assertArrayNotHasKey( 'links', $stats );
        $this->assertArrayHasKey( 'stats', $stats );
    }

    /**
     * yourls_get_stats() is filterable
     */
    public function test_get_stats_is_filterable() {
        yourls_add_filter( 'get_stats', fn() => 'forced' );
        $this->assertSame( 'forced', yourls_get_stats() );
    }

}
