<?php

/**
 * Short URLs : Create, Replace, Update, Delete tests
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('shorturls')]
class CRUDTest extends PHPUnit\Framework\TestCase {

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

    public function test_add_url_cache() {
        $keyword = rand_str();
        $title   = rand_str();
        $url     = 'http://' . rand_str();

        $infos = yourls_get_keyword_infos( $keyword );
        $this->assertFalse( $infos );

        $newurl = yourls_add_new_link( $url, $keyword, $title );
        $this->assertEquals( 'success', $newurl['status'] );

        $updated_infos = yourls_get_keyword_infos( $keyword );
        $this->assertEquals( $keyword, $updated_infos['keyword'] );
        $this->assertEquals( $title, $updated_infos['title'] );
        $this->assertEquals( $url, $updated_infos['url'] );
        $this->assertEquals( 0, $updated_infos['clicks'] );
    }

    #[\PHPUnit\Framework\Attributes\Depends('test_add_url')]
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
    #[\PHPUnit\Framework\Attributes\Depends('test_add_url')]
    public function test_edit_title_cache( $original_keyword ) {
        $new_keyword = rand_str();
        $new_title   = rand_str();
        $new_url     = 'http://' . rand_str();

        $edit = yourls_edit_link_title( $original_keyword, $new_title );
        $this->assertEquals( 1, $edit );
        $this->assertEquals( $new_title, yourls_get_keyword_title( $original_keyword ) );

        return $original_keyword;
    }
    #[\PHPUnit\Framework\Attributes\Depends('test_add_url')]
    public function test_is_shorturl( $keyword ) {
        $this->assertFalse( yourls_is_shorturl( rand_str() ) );
        $this->assertTrue( yourls_is_shorturl( $keyword ) );
        $this->assertTrue( yourls_is_shorturl( yourls_link( $keyword ) ) );
    }

    #[\PHPUnit\Framework\Attributes\Depends('test_add_url')]
    public function test_update_hits( $keyword ) {
        // purge cache
        $cache = yourls_get_keyword_infos( $keyword, false );
        $this->assertEquals( 0, yourls_get_keyword_clicks( $keyword ) );

        // Increment by 1
        $this->assertEquals( 1, yourls_update_clicks( $keyword ) );
        // purge cache
        yourls_get_keyword_infos( $keyword, false );
        $this->assertEquals( 1, yourls_get_keyword_clicks( $keyword ) );

        // Set to a specified number
        $this->assertEquals( 1, yourls_update_clicks( $keyword, 10 ) );
        // purge cache
        yourls_get_keyword_infos( $keyword, false );
        $this->assertEquals( 10, yourls_get_keyword_clicks( $keyword ) );
    }

    #[\PHPUnit\Framework\Attributes\Depends('test_add_url')]
    public function test_update_hits_cache( $keyword ) {
        // Starting at 10 from test_update_hits
        $this->assertEquals( 10, yourls_get_keyword_clicks( $keyword ) );

        // Increment by 1
        $this->assertEquals( 1, yourls_update_clicks( $keyword ) );
        $this->assertEquals( 11, yourls_get_keyword_clicks( $keyword ) );

        // Set to a specified number
        $this->assertEquals( 1, yourls_update_clicks( $keyword, 17 ) );
        $this->assertEquals( 17, yourls_get_keyword_clicks( $keyword ) );
    }

    #[\PHPUnit\Framework\Attributes\Depends('test_edit_title')]
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
    public function test_edit_url_cache() {
        $keyword = rand_str();
        $title   = rand_str();
        $url     = 'http://' . rand_str();

        $new_title   = rand_str();
        $new_url     = 'http://' . rand_str();

        $infos = yourls_get_keyword_infos( $keyword );
        $this->assertFalse( $infos );

        $newurl = yourls_add_new_link( $url, $keyword, $title );
        $this->assertEquals( 'success', $newurl['status'] );

        $edit = yourls_edit_link( $new_url, $keyword, $keyword, $new_title );
        $this->assertEquals( $edit['url']['title'], $new_title );
        $this->assertEquals( $edit['url']['url'], $new_url );
        $this->assertEquals( $edit['url']['keyword'], $keyword );

        $updated_data = yourls_get_keyword_infos( $keyword );
        $this->assertEquals( $updated_data['url'], $new_url );
        $this->assertEquals( $updated_data['title'], $new_title );
        $this->assertEquals( $updated_data['keyword'], $keyword );
    }

    #[\PHPUnit\Framework\Attributes\Depends('test_edit_url')]
    public function test_delete_url( $keyword ) {
        $delete = yourls_delete_link_by_keyword( rand_str() );
        $this->assertEquals( 0, $delete );
        $delete = yourls_delete_link_by_keyword( $keyword );
        $this->assertEquals( 1, $delete );
        $this->assertFalse( yourls_is_shorturl( $keyword ) );
    }

    public function test_delete_url_cache() {
        $keyword = rand_str();
        $title   = rand_str();
        $url     = 'http://' . rand_str();

        $this->assertFalse( yourls_get_keyword_infos( $keyword ) );

        $newurl = yourls_add_new_link( $url, $keyword, $title );
        $this->assertEquals( 'success', $newurl['status'] );
        $this->assertTrue( yourls_is_shorturl( $keyword ) );

        $infos = yourls_get_keyword_infos( $keyword );
        $this->assertEquals( $keyword, $infos['keyword'] );
        $this->assertEquals( $title, $infos['title'] );
        $this->assertEquals( $url, $infos['url'] );

        $delete = yourls_delete_link_by_keyword( $keyword );
        $this->assertEquals( 1, $delete );
        $this->assertFalse( yourls_is_shorturl( $keyword ) );
        $this->assertFalse( yourls_get_keyword_infos( $keyword ) );
    }

}
