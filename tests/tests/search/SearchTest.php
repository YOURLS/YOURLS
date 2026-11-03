<?php

/**
 * Admin search: FULLTEXT helper, indexes and cached stats
 */
#[\PHPUnit\Framework\Attributes\Group('search')]
class SearchTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_all_filters( 'db_stats_cache_ttl' );
        yourls_remove_all_filters( 'fulltext_min_token_size' );
        yourls_delete_db_stats_cache();
    }

    /**
     * yourls_get_fulltext_search() turns a user search into a BOOLEAN MODE query,
     * or returns '' to signal the caller should fall back to LIKE
     */
    public static function fulltext_queries(): \Iterator {
        yield 'single word'       => [ 'media', '+media*' ];
        yield 'two words'         => [ 'seibert media', '+seibert* +media*' ];
        yield 'hyphen'            => [ 'seibert-media', '+seibert* +media*' ];
        yield 'url'               => [ 'https://example.com/path', '+https* +example* +com* +path*' ];
        yield 'boolean operators' => [ '+foo -bar (baz)', '+foo* +bar* +baz*' ];
        yield 'underscore kept'   => [ 'foo_bar', '+foo_bar*' ];
        yield 'too short'         => [ 'ab', '' ];
        yield 'one short token'   => [ 'seibert ab', '' ];
        yield 'no token'          => [ '  !!!  ', '' ];
        yield 'empty'             => [ '', '' ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('fulltext_queries')]
    public function test_get_fulltext_search( $search, $expected ) {
        $this->assertSame( $expected, yourls_get_fulltext_search( $search ) );
    }

    /**
     * The minimum token size is filterable
     */
    public function test_fulltext_min_token_size_is_filterable() {
        yourls_add_filter( 'fulltext_min_token_size', fn() => 2 );
        $this->assertSame( '+ab*', yourls_get_fulltext_search( 'ab' ) );
    }

    /**
     * The url and title FULLTEXT indexes are created at install
     */
    public function test_fulltext_indexes_exist() {
        $table = YOURLS_DB_TABLE_URL;
        $rows  = yourls_get_db('read-test_fulltext_indexes')->fetchObjects( "SHOW INDEX FROM `$table`" );
        $names = array_map( fn( $row ) => $row->Key_name, $rows );

        $this->assertContains( 'url_ft', $names );
        $this->assertContains( 'title_ft', $names );
    }

    /**
     * The mechanism used by yourls_upgrade_to_508() to detect an existing index works
     */
    public function test_fetch_affected_counts_existing_index() {
        $table = YOURLS_DB_TABLE_URL;
        $count = yourls_get_db('read-test_fetch_affected')->fetchAffected(
            "SHOW INDEX FROM `$table` WHERE Key_name = 'url_ft'"
        );
        $this->assertGreaterThan( 0, $count );
    }

    /**
     * MATCH ... AGAINST actually finds links by url and by title
     */
    public function test_fulltext_match_finds_links() {
        $keyword = 'ft' . substr( md5( uniqid() ), 0, 10 );
        $table   = YOURLS_DB_TABLE_URL;
        $ydb     = yourls_get_db('read-test_fulltext_match');

        yourls_insert_link_in_db( 'https://fulltext-example.example.com/media/report', $keyword, 'Fulltext Report Title' );

        $by_url = $ydb->fetchValue(
            "SELECT `keyword` FROM `$table` WHERE `keyword` = :k AND MATCH(`url`) AGAINST('+media*' IN BOOLEAN MODE)",
            [ 'k' => $keyword ]
        );
        $this->assertSame( $keyword, $by_url );

        $by_title = $ydb->fetchValue(
            "SELECT `keyword` FROM `$table` WHERE `keyword` = :k AND MATCH(`title`) AGAINST('+fulltext*' IN BOOLEAN MODE)",
            [ 'k' => $keyword ]
        );
        $this->assertSame( $keyword, $by_title );

        yourls_delete_link_by_keyword( $keyword );
    }

    /**
     * A TTL of 0 disables the stats cache entirely
     */
    public function test_stats_cache_disabled_with_zero_ttl() {
        yourls_delete_db_stats_cache();
        yourls_add_filter( 'db_stats_cache_ttl', fn() => 0 );

        $stats = yourls_get_db_stats_cached();

        $this->assertIsInt( $stats['total_links'] );
        $this->assertIsInt( $stats['total_clicks'] );
        $this->assertFalse( yourls_get_option( 'db_stats_cache' ) );
    }

    /**
     * Cached global stats are read back instead of hitting the DB
     */
    public function test_stats_cache_reads_cached_value() {
        yourls_delete_db_stats_cache();
        yourls_add_filter( 'db_stats_cache_ttl', fn() => 3600 );

        yourls_get_db_stats_cached();
        $cache = yourls_get_option( 'db_stats_cache' );
        $this->assertIsArray( $cache );

        // Tamper with the cache to prove the cached value is returned
        $cache['total_links'] = 424242;
        yourls_update_option( 'db_stats_cache', $cache );

        $this->assertSame( 424242, yourls_get_db_stats_cached()['total_links'] );
    }

    /**
     * Adding or deleting a link invalidates the cached stats
     */
    public function test_stats_cache_is_invalidated_on_link_change() {
        yourls_delete_db_stats_cache();
        yourls_add_filter( 'db_stats_cache_ttl', fn() => 3600 );

        yourls_get_db_stats_cached();
        $this->assertNotFalse( yourls_get_option( 'db_stats_cache' ) );

        $keyword = 'cache' . substr( md5( uniqid() ), 0, 8 );
        yourls_insert_link_in_db( 'https://example.com/cache-test', $keyword, 'Cache test' );
        $this->assertFalse( yourls_get_option( 'db_stats_cache' ) );

        yourls_delete_link_by_keyword( $keyword );
        $this->assertFalse( yourls_get_option( 'db_stats_cache' ) );
    }

}
