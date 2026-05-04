<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Verify that the page-level views (dashboard, plugins, tools, install,
 * upgrade, infos) render with the right legacy DOM IDs / classes and
 * fire the same hooks the legacy admin/*.php files used to fire.
 */
final class PagesTest extends TestCase
{
    protected function setUp(): void
    {
        if (!function_exists('yourls_do_action')) {
            require_once __DIR__ . '/../tracer-yourls-shim.php';
        }
        Tracer::reset();
    }

    public function testDashboardRendersAndFiresHooksInOrder(): void
    {
        $html = $this->render('admin.dashboard', $this->dashboardData());

        $this->assertStringContainsString('id="overall_tracking"', $html);
        $this->assertStringContainsString('id="new_url"', $html);
        $this->assertStringContainsString('id="main_table"', $html);
        $this->assertStringContainsString('id="delete-confirm-dialog"', $html);
        $this->assertStringContainsString('id="nourl_found"', $html);

        $hooks = array_column(Tracer::log(), 'hook');
        $this->assertContains('admin_page_before_form',  $hooks);
        $this->assertContains('admin_page_before_table', $hooks);
        $this->assertContains('admin_page_after_table',  $hooks);
        $this->assertContains('html_addnew',             $hooks);

        $beforeForm  = array_search('admin_page_before_form',  $hooks, true);
        $beforeTable = array_search('admin_page_before_table', $hooks, true);
        $afterTable  = array_search('admin_page_after_table',  $hooks, true);
        $this->assertLessThan($beforeTable, $beforeForm);
        $this->assertLessThan($afterTable,  $beforeTable);
    }

    public function testDashboardEmptyStateMessage(): void
    {
        $html = $this->render('admin.dashboard', $this->dashboardData(['totalItems' => 0]));
        $this->assertStringContainsString('No URLs', $html);
    }

    public function testDashboardBookmarkContextSwitchesBodyClass(): void
    {
        $data = $this->dashboardData([
            'isBookmark'       => true,
            'bookmarkLongUrl'  => 'https://example.com',
            'bookmarkShortUrl' => 'https://x/abc',
            'bookmarkTitle'    => 'Hi',
            'bookmarkText'     => 'note',
            'bookmarkShareText'=> 'note https://x/abc',
            'bookmarkCharCount'=> 248,
            'bookmarkMessage'  => 'Saved',
            'bookmarkStatus'   => 'success',
        ]);
        $html = $this->render('admin.dashboard', $data);
        $this->assertStringContainsString('class="bookmark ', $html);
    }

    public function testPluginsViewExposesLegacyTableMarkup(): void
    {
        $html = $this->render('admin.plugins', [
            'pluginsCount' => '2 plugins',
            'countActive' => 1,
            'pluginRows' => [
                ['class' => 'active', 'name' => 'Foo', 'uri' => '#', 'version' => '1.0', 'desc' => 'Foo desc', 'author' => 'me', 'author_uri' => '#', 'action_url' => '#a', 'action_anchor' => 'Deactivate'],
                ['class' => 'inactive', 'name' => 'Bar', 'uri' => '#', 'version' => '0.9', 'desc' => 'Bar desc', 'author' => 'you', 'author_uri' => '#', 'action_url' => '#b', 'action_anchor' => 'Activate'],
            ],
        ]);
        $this->assertStringContainsString('id="main_table"', $html);
        $this->assertStringContainsString('id="plugin_summary"', $html);
        $this->assertStringContainsString('class="plugin active"', $html);
        $this->assertStringContainsString('class="plugin inactive"', $html);
        $this->assertStringContainsString('class="plugin_name', $html);
    }

    public function testToolsViewRendersBookmarkletSlots(): void
    {
        $html = $this->render('admin.tools', [
            'bookmarkletStandardSimple' => '<a id="bm1">x</a>',
            'bookmarkletPopupSimple'    => '<a id="bm2">x</a>',
            'bookmarkletCustomStandard' => '<a id="bm3">x</a>',
            'bookmarkletCustomPopup'    => '<a id="bm4">x</a>',
            'bookmarkletFacebook'       => '<a id="bmFb">x</a>',
            'bookmarkletTwitter'        => '<a id="bmTw">x</a>',
            'bookmarkletTumblr'         => '<a id="bmTm">x</a>',
            'prefixHost'  => 'sho.rt/',
            'isWindows'   => false,
            'isPrivate'   => true,
            'authSignature' => 'sig',
            'yourlsSite'  => 'https://x',
            'sampleTime'  => 1000,
            'sampleSignature' => 'aaa',
            'nonceLife'   => 43200,
        ]);
        foreach (['bm1', 'bm2', 'bm3', 'bm4', 'bmFb', 'bmTw', 'bmTm'] as $id) {
            $this->assertStringContainsString('id="' . $id . '"', $html);
        }
        $this->assertStringContainsString('Secure passwordless API call', $html);
        $hooks = array_column(Tracer::log(), 'hook');
        $this->assertContains('social_bookmarklet_buttons_after', $hooks);
    }

    public function testInstallViewSwitchesOnInstalledFlag(): void
    {
        $a = $this->render('auth.install', ['errors' => ['Bad config'], 'warnings' => [], 'success' => [], 'installed' => false, 'adminUrl' => '/admin/']);
        $this->assertStringContainsString('Bad config', $a);
        $this->assertStringContainsString('Install YOURLS', $a);

        Tracer::reset();
        $b = $this->render('auth.install', ['errors' => [], 'warnings' => [], 'success' => ['Done'], 'installed' => true, 'adminUrl' => '/admin/']);
        $this->assertStringContainsString('Go to the admin interface', $b);
    }

    public function testUpgradeViewSwitchesOnStep(): void
    {
        $a = $this->render('auth.upgrade', ['logs' => [], 'step' => 0, 'complete' => false, 'adminUrl' => '/admin/']);
        $this->assertStringContainsString('Upgrade YOURLS', $a);

        Tracer::reset();
        $b = $this->render('auth.upgrade', ['logs' => ['Migrating...', 'Done'], 'step' => 3, 'complete' => true, 'adminUrl' => '/admin/']);
        $this->assertStringContainsString('Upgrade complete', $b);
        $this->assertStringContainsString('Migrating...', $b);
    }

    public function testInfosViewExposesTabsAndShareBox(): void
    {
        $html = $this->render('public.infos', [
            'pageTitle' => 'My link',
            'shortUrl' => 'https://x/abc',
            'longUrl' => 'https://example.com',
            'longUrlDisplay' => 'https://example.com',
            'tabs' => ['stats' => 'Stats', 'locations' => 'Loc', 'sources' => 'Src', 'share' => 'Share'],
            'activeTab' => 'stats',
            'statsPanel' => 'STATS',
            'locationsPanel' => 'LOC',
            'sourcesPanel' => 'SRC',
            'shareText' => 'My link https://x/abc',
            'shareCharCount' => 240,
        ]);
        $this->assertStringContainsString('infos-panel-stats', $html);
        $this->assertStringContainsString('infos-panel-share', $html);
        $this->assertStringContainsString('id="shareboxes"', $html);
    }

    public function testPluginPageFiresLoadHook(): void
    {
        $this->render('admin.plugin-page', ['slug' => 'mine', 'title' => 'Mine', 'body' => '<p>x</p>']);
        $this->assertContains('load-mine', array_column(Tracer::log(), 'hook'));
    }

    private function dashboardData(array $overrides = []): array
    {
        return array_merge([
            'isBookmark'       => false,
            'searchSentence'   => '',
            'totalItems'       => 5,
            'totalUrls'        => 100,
            'totalClicks'      => 1234,
            'totalItemsClicks' => false,
            'displayOnPage'    => 1,
            'maxOnPage'        => 5,
            'search'           => '',
            'tableHeadCells'   => ['shorturl' => 'Short', 'longurl' => 'URL', 'date' => 'Date', 'ip' => 'IP', 'clicks' => 'Clicks', 'actions' => 'Actions'],
            'footerParams'     => ['search_text' => '', 'search_in' => 'all', 'sort_by' => 'timestamp', 'sort_order' => 'desc', 'page' => 1, 'perpage' => 20, 'click_filter' => 'more', 'click_limit' => '', 'total_pages' => 1, 'date_filter' => '', 'date_first' => '', 'date_second' => ''],
            'rowsHtml'         => '<tr id="id-yid1"><td>row</td></tr>',
            'foundRows'        => true,
            'url'              => '',
            'keyword'          => '',
        ], $overrides);
    }

    private function render(string $view, array $data): string
    {
        return \YOURLS\UI\BladeFactory::instance()->render($view, $data);
    }
}
