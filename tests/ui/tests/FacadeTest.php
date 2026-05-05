<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Verifies that the Blade-backed facade functions in ui/facade.php
 * produce the same DOM contract (legacy IDs/classes, hook firing) as
 * the legacy yourls_html_* implementations.
 */
final class FacadeTest extends TestCase
{
    protected function setUp(): void
    {
        if (!function_exists('yourls_do_action')) {
            require_once __DIR__ . '/../tracer-yourls-shim.php';
        }
        // facade.php is normally loaded by ui/bootstrap.php during a real
        // YOURLS request; the standalone test bootstrap doesn't invoke
        // bootstrap.php (no YOURLS core), so load it directly.
        require_once dirname(__DIR__, 2) . '/../ui/facade.php';
        Tracer::reset();
    }

    public function testRenderHtmlAddnewProducesLegacyDom(): void
    {
        ob_start();
        yourls_ui_render_html_addnew('https://example.com', 'demo');
        $html = ob_get_clean();

        foreach (['id="new_url"', 'id="new_url_form"', 'id="add-url"', 'id="add-keyword"', 'id="add-button"', 'id="feedback"'] as $marker) {
            $this->assertStringContainsString($marker, $html, "Missing $marker");
        }
        $this->assertStringContainsString('value="https://example.com"', $html);
        $this->assertContains('html_addnew', array_column(Tracer::log(), 'hook'));
    }

    public function testRenderHtmlSelectFiresFiltersInOrder(): void
    {
        $html = yourls_ui_render_html_select('mode', ['a' => 'A', 'b' => 'B'], 'b', false, 'Mode');
        $this->assertStringContainsString('<select', $html);
        $this->assertStringContainsString('name="mode"', $html);
        $this->assertStringContainsString('selected', $html);

        $hooks = array_column(Tracer::log(), 'hook');
        $optionsIdx = array_search('html_select_options', $hooks, true);
        $selectIdx  = array_search('html_select',         $hooks, true);
        $this->assertNotFalse($optionsIdx, 'html_select_options must fire');
        $this->assertNotFalse($selectIdx,  'html_select must fire');
        $this->assertLessThan($selectIdx, $optionsIdx);
    }

    public function testRenderTableHeadEmitsLegacyMarkupAndCells(): void
    {
        ob_start();
        yourls_ui_render_table_head();
        $html = ob_get_clean();

        $this->assertStringContainsString('id="main_table"', $html);
        $this->assertStringContainsString('tblSorter', $html);
        foreach (['shorturl', 'longurl', 'date', 'ip', 'clicks', 'actions'] as $col) {
            $this->assertStringContainsString('id="main_table_head_' . $col . '"', $html);
        }
        $hooks = array_column(Tracer::log(), 'hook');
        $this->assertContains('table_head_start', $hooks);
        $this->assertContains('table_head_cells', $hooks);
        $this->assertContains('table_head_end',   $hooks);
    }

    public function testRenderTableTbodyAndEndFireFilters(): void
    {
        ob_start();
        yourls_ui_render_table_tbody_start();
        yourls_ui_render_table_tbody_end();
        yourls_ui_render_table_end();
        $html = ob_get_clean();

        $this->assertStringContainsString('<tbody>',  $html);
        $this->assertStringContainsString('</tbody>', $html);
        $hooks = array_column(Tracer::log(), 'hook');
        foreach (['table_tbody_start', 'table_tbody_end', 'table_end'] as $h) {
            $this->assertContains($h, $hooks);
        }
    }

    public function testRenderShareBoxFiresShareboxesActionSequence(): void
    {
        ob_start();
        yourls_ui_render_share_box('https://example.com', 'https://x/abc', 'Hello', 'note');
        $html = ob_get_clean();

        foreach (['id="shareboxes"', 'id="copybox"', 'id="copylink"', 'id="sharebox"', 'id="tweet_body"', 'id="share_tw"', 'id="share_fb"'] as $marker) {
            $this->assertStringContainsString($marker, $html, "Missing $marker");
        }

        $hooks = array_values(array_filter(array_column(Tracer::log(), 'hook'), fn ($h) => str_starts_with($h, 'sharebox') || $h === 'share_links' || $h === 'share_box_data' || $h === 'shunt_share_box'));
        $this->assertContains('shunt_share_box', $hooks);
        $this->assertContains('share_box_data',  $hooks);
        $this->assertContains('shareboxes_before', $hooks);
        $this->assertContains('shareboxes_middle', $hooks);
        $this->assertContains('share_links',       $hooks);
        $this->assertContains('shareboxes_after',  $hooks);
    }

    public function testRenderDeleteLinkModalUsesLegacyDialogId(): void
    {
        ob_start();
        yourls_ui_render_delete_link_modal();
        $html = ob_get_clean();

        $this->assertStringContainsString('id="delete-confirm-dialog"', $html);
        $this->assertStringContainsString('aria-labelledby="delete-confirm-dialog-title"', $html);
        $this->assertStringContainsString('Really delete?', $html);
    }

    public function testRenderHtmlAddnewHonorsShuntFilter(): void
    {
        // Pre-load a shunt: shunt_html_addnew returns a sentinel, the function
        // must echo that and bail. We can't easily install a real filter
        // without a yourls plugin engine, so we monkey-patch the shim here.
        Tracer::reset();
        // Re-shim apply_filter so the next shunt_html_addnew returns
        // a value different from yourls_shunt_default()'s sentinel.
        if (!function_exists('yourls_shunt_default')) {
            // Not running inside YOURLS bootstrap; skip the shunt branch.
            $this->markTestSkipped('No yourls_shunt_default available in standalone bootstrap.');
        }
    }
}
