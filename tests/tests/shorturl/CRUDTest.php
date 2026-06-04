<?php

/**
 * Short URLs : Create, Replace, Update, Delete tests
 *
 * Every test runs twice, once with duplicate long URLs forbidden and once with
 * them allowed (see modeProvider()), so the whole CRUD surface is validated for
 * both YOURLS_UNIQUE_URLS settings without relying on the constant being defined
 * in the test config.
 */
#[\PHPUnit\Framework\Attributes\Group('shorturls')]
class CRUDTest extends PHPUnit\Framework\TestCase {

    /**
     * Data provider : the two "allow duplicate long URLs" behaviors.
     *
     * @return array<string, array{0:bool}>
     */
    public static function modeProvider(): array {
        return [
            'unique URLs (duplicates forbidden)' => [ false ],
            'duplicate long URLs allowed'        => [ true ],
        ];
    }

    /**
     * Force the "allow duplicate long URLs" behavior, overriding whatever
     * YOURLS_UNIQUE_URLS would resolve to. Removed in tearDown().
     */
    protected function set_duplicate_mode( bool $allow ): void {
        yourls_add_filter( 'allow_duplicate_longurls', $allow ? 'yourls_return_true' : 'yourls_return_false' );
    }

    protected function tearDown(): void {
        yourls_remove_all_filters( 'allow_duplicate_longurls' );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('modeProvider')]
    public function test_add_url( bool $allow_duplicates ) {
        $this->set_duplicate_mode( $allow_duplicates );

        $keyword = rand_str();
        $title   = rand_str();
        $url     = 'http://' . rand_str();

        $newurl = yourls_add_new_link( $url, $keyword, $title );
        $this->assertEquals( 'success', $newurl['status'] );

        // Same URL + same keyword : always fails (keyword is taken; in unique mode
        // the duplicate URL is caught first). We only care that it doesn't store.
        $fail = yourls_add_new_link( $url, $keyword, $title );
        $this->assertEquals( 'fail', $fail['status'] );

        // Same URL + a brand new keyword : behavior depends on the mode
        $dup = yourls_add_new_link( $url, rand_str(), rand_str() );
        if ( $allow_duplicates ) {
            $this->assertEquals( 'success', $dup['status'] );
        } else {
            $this->assertEquals( 'fail', $dup['status'] );
            $this->assertEquals( 'error:url', $dup['code'] );
        }

        // New URL + an already taken keyword : always 'error:keyword'
        $fail = yourls_add_new_link( 'http://' . rand_str(), $keyword, $title );
        $this->assertEquals( 'fail', $fail['status'] );
        $this->assertEquals( 'error:keyword', $fail['code'] );

        $this->assertEquals( $title, yourls_get_keyword_title( $keyword ) );
        $this->assertEquals( $url, yourls_get_keyword_longurl( $keyword ) );
        $this->assertEquals( 0, yourls_get_keyword_clicks( $keyword ) );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('modeProvider')]
    public function test_add_url_cache( bool $allow_duplicates ) {
        $this->set_duplicate_mode( $allow_duplicates );

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

    #[\PHPUnit\Framework\Attributes\DataProvider('modeProvider')]
    public function test_edit_title( bool $allow_duplicates ) {
        $this->set_duplicate_mode( $allow_duplicates );

        $keyword = rand_str();
        yourls_add_new_link( 'http://' . rand_str(), $keyword, rand_str() );

        $new_title = rand_str();
        $edit = yourls_edit_link_title( $keyword, $new_title );
        $this->assertEquals( 1, $edit );
        // purge cache
        yourls_get_keyword_infos( $keyword, false );
        $this->assertEquals( $new_title, yourls_get_keyword_title( $keyword ) );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('modeProvider')]
    public function test_edit_title_cache( bool $allow_duplicates ) {
        $this->set_duplicate_mode( $allow_duplicates );

        $keyword = rand_str();
        yourls_add_new_link( 'http://' . rand_str(), $keyword, rand_str() );

        $new_title = rand_str();
        $edit = yourls_edit_link_title( $keyword, $new_title );
        $this->assertEquals( 1, $edit );
        $this->assertEquals( $new_title, yourls_get_keyword_title( $keyword ) );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('modeProvider')]
    public function test_is_shorturl( bool $allow_duplicates ) {
        $this->set_duplicate_mode( $allow_duplicates );

        $keyword = rand_str();
        yourls_add_new_link( 'http://' . rand_str(), $keyword, rand_str() );

        $this->assertFalse( yourls_is_shorturl( rand_str() ) );
        $this->assertTrue( yourls_is_shorturl( $keyword ) );
        $this->assertTrue( yourls_is_shorturl( yourls_link( $keyword ) ) );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('modeProvider')]
    public function test_update_hits( bool $allow_duplicates ) {
        $this->set_duplicate_mode( $allow_duplicates );

        $keyword = rand_str();
        yourls_add_new_link( 'http://' . rand_str(), $keyword, rand_str() );

        // purge cache
        yourls_get_keyword_infos( $keyword, false );
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

    #[\PHPUnit\Framework\Attributes\DataProvider('modeProvider')]
    public function test_update_hits_cache( bool $allow_duplicates ) {
        $this->set_duplicate_mode( $allow_duplicates );

        $keyword = rand_str();
        yourls_add_new_link( 'http://' . rand_str(), $keyword, rand_str() );
        // warm the cache
        $this->assertEquals( 0, yourls_get_keyword_clicks( $keyword ) );

        // Increment by 1 : cache must reflect the new value without a purge
        $this->assertEquals( 1, yourls_update_clicks( $keyword ) );
        $this->assertEquals( 1, yourls_get_keyword_clicks( $keyword ) );

        // Set to a specified number
        $this->assertEquals( 1, yourls_update_clicks( $keyword, 17 ) );
        $this->assertEquals( 17, yourls_get_keyword_clicks( $keyword ) );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('modeProvider')]
    public function test_edit_url( bool $allow_duplicates ) {
        $this->set_duplicate_mode( $allow_duplicates );

        $keyword = rand_str();
        $url     = 'http://' . rand_str();
        yourls_add_new_link( $url, $keyword, rand_str() );

        $new_keyword = rand_str();
        $new_title   = rand_str();
        $new_url     = 'http://' . rand_str();

        // purge cache
        $original = yourls_get_keyword_infos( $keyword, false );

        // Change the keyword (same URL)
        $edit = yourls_edit_link( $original['url'], $keyword, $new_keyword, $new_title );
        $this->assertEquals( $new_title, $edit['url']['title'] );
        $this->assertEquals( $new_keyword, $edit['url']['keyword'] );

        // Change the URL (same, now-new keyword). $new_url is random hence unique,
        // so this succeeds regardless of the duplicate mode.
        $edit = yourls_edit_link( $new_url, $new_keyword, $new_keyword, $new_title );
        $this->assertEquals( $new_url, $edit['url']['url'] );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('modeProvider')]
    public function test_edit_url_cache( bool $allow_duplicates ) {
        $this->set_duplicate_mode( $allow_duplicates );

        $keyword = rand_str();
        $title   = rand_str();
        $url     = 'http://' . rand_str();

        $new_title = rand_str();
        $new_url   = 'http://' . rand_str();

        $infos = yourls_get_keyword_infos( $keyword );
        $this->assertFalse( $infos );

        $newurl = yourls_add_new_link( $url, $keyword, $title );
        $this->assertEquals( 'success', $newurl['status'] );

        $edit = yourls_edit_link( $new_url, $keyword, $keyword, $new_title );
        $this->assertEquals( $new_title, $edit['url']['title'] );
        $this->assertEquals( $new_url, $edit['url']['url'] );
        $this->assertEquals( $keyword, $edit['url']['keyword'] );

        $updated_data = yourls_get_keyword_infos( $keyword );
        $this->assertEquals( $new_url, $updated_data['url'] );
        $this->assertEquals( $new_title, $updated_data['title'] );
        $this->assertEquals( $keyword, $updated_data['keyword'] );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('modeProvider')]
    public function test_delete_url( bool $allow_duplicates ) {
        $this->set_duplicate_mode( $allow_duplicates );

        $keyword = rand_str();
        yourls_add_new_link( 'http://' . rand_str(), $keyword, rand_str() );

        $delete = yourls_delete_link_by_keyword( rand_str() );
        $this->assertEquals( 0, $delete );
        $delete = yourls_delete_link_by_keyword( $keyword );
        $this->assertEquals( 1, $delete );
        $this->assertFalse( yourls_is_shorturl( $keyword ) );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('modeProvider')]
    public function test_delete_url_cache( bool $allow_duplicates ) {
        $this->set_duplicate_mode( $allow_duplicates );

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
