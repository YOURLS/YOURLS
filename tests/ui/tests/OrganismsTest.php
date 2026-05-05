<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Verifies that the new organism components keep emitting the legacy
 * DOM hooks (IDs and class names) plugins target, and that they fire
 * the same yourls_do_action / yourls_apply_filter hooks the old
 * functions-html.php functions used to fire.
 */
final class OrganismsTest extends TestCase
{
    protected function setUp(): void
    {
        if (!function_exists('yourls_do_action')) {
            require_once __DIR__ . '/../tracer-yourls-shim.php';
        }
        Tracer::reset();
    }

    public function testAddUrlPreservesLegacyDomHooks(): void
    {
        $html = $this->render('<x-forms::add-url url="" keyword="" />');
        foreach (['id="new_url"', 'id="new_url_form"', 'id="add-url"', 'id="add-keyword"', 'id="add-button"', 'id="feedback"'] as $marker) {
            $this->assertStringContainsString($marker, $html, "Missing $marker in add-url");
        }
        $hooks = array_column(Tracer::log(), 'hook');
        $this->assertContains('html_addnew', $hooks);
    }

    public function testShareBoxPreservesLegacyDomHooks(): void
    {
        $html = $this->render('<x-forms::share-box longurl="https://example.com" shorturl="https://x/abc" title="Hi" share="x" :count="248" />');
        foreach (['id="shareboxes"', 'id="copybox"', 'id="copylink"', 'id="origlink"', 'id="sharebox"', 'id="tweet"', 'id="charcount"', 'id="tweet_body"', 'id="share_links"', 'id="share_tw"', 'id="share_fb"'] as $marker) {
            $this->assertStringContainsString($marker, $html, "Missing $marker in share-box");
        }
        $hooks = array_column(Tracer::log(), 'hook');
        $this->assertSame(
            ['shareboxes_before', 'shareboxes_middle', 'share_links', 'shareboxes_after'],
            array_values(array_filter($hooks, fn ($h) => str_starts_with($h, 'sharebox') || $h === 'share_links'))
        );
    }

    public function testTableHeadPreservesPerColumnIds(): void
    {
        $html = $this->render('<x-organisms::table.head :cells="$cells" />', [
            'cells' => ['shorturl' => 'Short', 'longurl' => 'URL', 'date' => 'Date', 'ip' => 'IP', 'clicks' => 'Clicks', 'actions' => 'Actions'],
        ]);
        foreach (['main_table_head_shorturl', 'main_table_head_longurl', 'main_table_head_date', 'main_table_head_ip', 'main_table_head_clicks', 'main_table_head_actions'] as $marker) {
            $this->assertStringContainsString('id="' . $marker . '"', $html);
        }
    }

    public function testTableRowExpandsPlaceholderTemplate(): void
    {
        $html = $this->render('<x-organisms::table.row rowId="yid42" keyword="abc" :cells="$cells" />', [
            'cells' => [
                'keyword' => [
                    'template' => '<a href="%shorturl%">%keyword_html%</a>',
                    'shorturl' => 'https://x/abc',
                    'keyword_html' => 'abc',
                ],
            ],
        ]);
        $this->assertStringContainsString('id="id-yid42"', $html);
        $this->assertStringContainsString('id="keyword-yid42"', $html);
        $this->assertStringContainsString('<a href="https://x/abc">abc</a>', $html);
    }

    public function testTableEditRowPreservesIdContract(): void
    {
        $html = $this->render('<x-organisms::table.edit-row id="42" keyword="abc" url="https://example.com" title="Hello" sitePrefix="https://x/" />');
        foreach (['id="edit-42"', 'id="edit-url-42"', 'id="edit-keyword-42"', 'id="edit-title-42"', 'id="edit-submit-42"', 'id="edit-close-42"', 'id="old_keyword_42"', 'id="nonce_42"'] as $marker) {
            $this->assertStringContainsString($marker, $html, "Missing $marker");
        }
        $this->assertStringContainsString("edit_link_save('42')", $html);
        $this->assertStringContainsString("edit_link_hide('42')", $html);
        preg_match_all('/id="edit-(?:url|keyword|title)-42"[^>]*class="[^"]*\btext\b[^"]*"/m', $html, $matches);
        $this->assertCount(3, $matches[0]);
    }

    public function testTableFooterFiresHtmlTfooterAction(): void
    {
        $this->render('<x-organisms::table.footer :params="$p" />', [
            'p' => [
                'search_text' => '', 'search_in' => 'all', 'sort_by' => 'timestamp',
                'sort_order' => 'desc', 'page' => 1, 'perpage' => 20,
                'click_filter' => 'more', 'click_limit' => '', 'total_pages' => 3,
                'date_filter' => '', 'date_first' => '', 'date_second' => '',
            ],
        ]);
        $this->assertContains('html_tfooter', array_column(Tracer::log(), 'hook'));
    }

    public function testDeleteModalUsesLegacyDialogId(): void
    {
        $html = $this->render('<x-organisms::modal id="delete-confirm-dialog" title="Delete?" confirmLabel="Delete">Confirm</x-organisms::modal>');
        $this->assertStringContainsString('id="delete-confirm-dialog"', $html);
        $this->assertStringContainsString('<dialog', $html);
    }

    public function testTableIndexPreservesLegacyClassesAndId(): void
    {
        $html = $this->render('<x-organisms::table.index id="main_table">x</x-organisms::table.index>');
        $this->assertStringContainsString('id="main_table"', $html);
        $this->assertStringContainsString('tblSorter', $html);
    }

    public function testNavSidebarFiresAdminMenuAction(): void
    {
        $this->render('<x-organisms::nav-sidebar :links="$l" :sublinks="[]" />', [
            'l' => ['admin' => ['url' => '#', 'anchor' => 'Admin']],
        ]);
        $this->assertContains('admin_menu', array_column(Tracer::log(), 'hook'));
    }

    public function testLoginFormFiresAllThreeHooks(): void
    {
        $this->render('<x-forms::login-form action="/login" username="" />');
        $hooks = array_column(Tracer::log(), 'hook');
        $this->assertContains('login_form_top', $hooks);
        $this->assertContains('login_form_bottom', $hooks);
        $this->assertContains('login_form_end', $hooks);
    }

    private function render(string $template, array $data = []): string
    {
        $tmp = sys_get_temp_dir() . '/yourls-org-' . bin2hex(random_bytes(4));
        @mkdir($tmp, 0775, true);
        file_put_contents($tmp . '/page.blade.php', $template);

        $ns = 'org_' . md5($tmp);
        \YOURLS\UI\BladeFactory::instance()->addNamespace($ns, $tmp);
        $html = \YOURLS\UI\BladeFactory::instance()->render($ns . '::page', $data);

        @unlink($tmp . '/page.blade.php');
        @rmdir($tmp);
        return $html;
    }
}
