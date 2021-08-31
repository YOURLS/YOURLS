<?php

/**
 * Short URL tests
 *
 * @group shorturls
 * @since 0.1
 */

class ShortURL_Tests extends PHPUnit\Framework\TestCase {

    public function test_reserved_keywords() {
        global $yourls_reserved_URL;
        $reserved = $yourls_reserved_URL[ array_rand( $yourls_reserved_URL, 1 )  ];
        $this->assertTrue( yourls_keyword_is_reserved( $reserved ) );
        $this->assertFalse( yourls_keyword_is_reserved( rand_str() ) );
    }

    public function test_free_keywords() {
        global $yourls_reserved_URL;
        $reserved = $yourls_reserved_URL[ array_rand( $yourls_reserved_URL, 1 )  ];
        $this->assertFalse( yourls_keyword_is_free( $reserved ) );
        $this->assertFalse( yourls_keyword_is_free( 'ozh' ) );
        $this->assertTrue( yourls_keyword_is_free( rand_str() ) );
    }

    public function test_url_exists() {
        $exists = yourls_long_url_exists( 'http://ozh.org/' );
        $this->assertEquals( 'ozh', $exists->keyword );
        $this->assertNull( yourls_long_url_exists( rand_str() ) );
    }

    public function test_add_url() {
        $keyword = rand_str();
        $title   = rand_str();
        $url     = 'http://' . rand_str();

        $newurl = yourls_add_new_link( $url, $keyword, $title );
        $this->assertEquals( 'success', $newurl['status'] );

        $fail = yourls_add_new_link( $url, $keyword, $title );
        $this->assertEquals( 'fail', $fail['status'] );

        $fail = yourls_add_new_link( $url, rand_str(), rand_str() );
        $this->assertEquals( 'fail', $fail['status'] );
        $this->assertEquals( 'error:url', $fail['code'] );

        $fail = yourls_add_new_link( 'http://' . rand_str(), $keyword, $title );
        $this->assertEquals( 'fail', $fail['status'] );
        $this->assertEquals( 'error:keyword', $fail['code'] );

        $this->assertEquals( $title, yourls_get_keyword_title( $keyword ) );
        $this->assertEquals( $url, yourls_get_keyword_longurl( $keyword ) );
        $this->assertEquals( 0, yourls_get_keyword_clicks( $keyword ) );

        return $keyword;
    }

    /**
     * @depends test_add_url
     */
    public function test_edit_title( $original_keyword ) {
        $new_keyword = rand_str();
        $new_title   = rand_str();
        $new_url     = 'http://' . rand_str();

        $edit = yourls_edit_link_title( $original_keyword, $new_title );
        $this->assertEquals( 1, $edit );
        // purge cache
        $original = yourls_get_keyword_infos( $original_keyword, false );
        $this->assertEquals( $new_title, yourls_get_keyword_title( $original_keyword ) );

        return $original_keyword;
    }
    /**
     * @depends test_add_url
     */
    public function test_is_shorturl( $keyword ) {
        $this->assertFalse( yourls_is_shorturl( rand_str() ) );
        $this->assertTrue( yourls_is_shorturl( $keyword ) );
        $this->assertTrue( yourls_is_shorturl( yourls_link( $keyword ) ) );
    }

    /**
     * @depends test_add_url
     */
    public function test_update_hits( $keyword ) {
        // purge cache
        $cache = yourls_get_keyword_infos( $keyword, false );
        $this->assertEquals( 0, yourls_get_keyword_clicks( $keyword ) );

        $this->assertEquals( 1, yourls_update_clicks( $keyword ) );
        // purge cache
        yourls_get_keyword_infos( $keyword, false );
        $this->assertEquals( 1, yourls_get_keyword_clicks( $keyword ) );
    }

    public function test_log_hits_unknown() {
        $rand = rand_str();
        $this->assertEquals( 0, yourls_update_clicks( $rand ) );
        $this->assertEquals( 0, yourls_get_keyword_clicks( $rand ) );
    }

    /**
     * @depends test_edit_title
     */
    public function test_edit_url( $original_keyword ) {
        $new_keyword = rand_str();
        $new_title   = rand_str();
        $new_url     = 'http://' . rand_str();

        // purge cache
        $original = yourls_get_keyword_infos( $original_keyword, false );

        $edit = yourls_edit_link( $original['url'], $original_keyword, $new_keyword, $new_title );
        $this->assertEquals( $edit['url']['title'], $new_title );
        $this->assertEquals( $edit['url']['keyword'], $new_keyword );

        $edit = yourls_edit_link( $new_url, $new_keyword, $new_keyword, $new_title );
        $this->assertEquals( $edit['url']['url'], $new_url );

        return $new_keyword;
    }

    /**
     * @depends test_edit_url
     */
    public function test_delete_url( $keyword ) {
        $delete = yourls_delete_link_by_keyword( rand_str() );
        $this->assertEquals( 0, $delete );
        $delete = yourls_delete_link_by_keyword( $keyword );
        $this->assertEquals( 1, $delete );
        $this->assertFalse( yourls_is_shorturl( $keyword ) );
    }

}
