<?php

#[\PHPUnit\Framework\Attributes\Group('click')]
class InfosTabsRenderTest extends PHPUnit\Framework\TestCase {

    protected function setUp(): void {
        parent::setUp();
        if ( ! yourls_keyword_is_taken( 'rendkw' ) ) {
            yourls_add_new_link( 'https://example.com', 'rendkw', 'render test' );
        }
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('tabsProvider')]
    public function test_tab_renders_with_empty_dataset( string $tab ) {
        yourls_get_db()->perform( 'DELETE FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "rendkw"' );

        $html = $this->renderTab( $tab, 'rendkw' );
        $this->assertIsString( $html );
        $this->assertStringNotContainsString( 'Exception', $html );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('tabsProvider')]
    public function test_tab_renders_with_populated_dataset( string $tab ) {
        $ydb = yourls_get_db();
        $ydb->perform( 'DELETE FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "rendkw"' );
        $ydb->fetchAffected(
            'INSERT INTO `' . YOURLS_DB_TABLE_LOG . '`(click_time,shorturl,referrer,user_agent,ip_address,country_code,device_type,browser,os,referrer_host,utm_source,city,meta) VALUES (NOW(),"rendkw","","UA","1.2.3.4","IT","desktop","chrome","macos","t.co","newsletter","Milan",:m)',
            [ 'm' => json_encode( [ 'tz' => 'Europe/Rome', 'lang' => 'it-IT', 'connection_type' => '4g' ] ) ]
        );

        $html = $this->renderTab( $tab, 'rendkw' );
        $this->assertIsString( $html );
        $this->assertStringNotContainsString( 'Exception', $html );
    }

    public static function tabsProvider(): array {
        return [
            [ 'overview' ], [ 'audience' ], [ 'geography' ], [ 'sources' ], [ 'technology' ], [ 'activity' ],
        ];
    }

    private function renderTab( string $tab, string $keyword ): string {
        return yourls_ui_view( "public.infos.tab-$tab", compact( 'keyword' ) );
    }
}
