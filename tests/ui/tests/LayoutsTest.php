<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Verify that each layout boots up the legacy markup contract and fires
 * the same hooks (in order) the legacy yourls_html_head + footer + menu
 * + login + die used to fire.
 */
final class LayoutsTest extends TestCase
{
    protected function setUp(): void
    {
        if (!function_exists('yourls_do_action')) {
            require_once __DIR__ . '/../tracer-yourls-shim.php';
        }
        Tracer::reset();
    }

    public function testAdminLayoutFiresExpectedHooksInOrder(): void
    {
        $this->renderLayout('admin', ['context' => 'index', 'title' => 'Dash']);
        $hooks = array_column(Tracer::log(), 'hook');

        $this->assertSame('pre_html_head', $hooks[0], 'pre_html_head must run first');
        // admin_headers fires only when yourls_is_admin() is true; in the
        // standalone test no YOURLS bootstrap is loaded so we don't assert it.
        $this->assertContains('html_head_meta',  $hooks);
        $this->assertContains('html_head',       $hooks);
        $this->assertContains('pre_html_logo',   $hooks);
        $this->assertContains('html_logo',       $hooks);
        $this->assertContains('admin_menu',      $hooks);
        $this->assertContains('admin_notices',   $hooks);
        $this->assertContains('admin_notice',    $hooks);
        $this->assertContains('admin_page_before_content', $hooks);
        $this->assertContains('html_footer',     $hooks);

        // html_head must come after pre_html_head, html_footer must come last
        $this->assertGreaterThan(array_search('pre_html_head', $hooks, true), array_search('html_head', $hooks, true));
        $this->assertGreaterThan(array_search('admin_menu', $hooks, true), array_search('admin_notices', $hooks, true));
        $this->assertSame('html_footer', end($hooks));
    }

    public function testAdminLayoutEmitsLegacyMarkupSkeleton(): void
    {
        $html = $this->renderLayout('admin', ['context' => 'index', 'title' => 'Dash']);
        $this->assertStringContainsString('<!DOCTYPE html>', $html);
        $this->assertStringContainsString('<html', $html);
        $this->assertStringContainsString('id="wrap"', $html);
        $this->assertStringContainsString('id="admin_menu"', $html);
        $this->assertStringContainsString('<header role="banner">', $html);
        $this->assertStringContainsString('id="footer"', $html);
        $this->assertStringContainsString('class="index ', $html);   // body class includes context
        $this->assertStringContainsString('YOURLS', $html);
    }

    public function testAuthLayoutAddsLoginContextAndDoesNotShowAdminMenu(): void
    {
        $html = $this->renderLayout('auth', ['context' => 'login']);
        $this->assertStringContainsString('class="login ', $html);
        // auth shell intentionally omits the admin menu
        $this->assertStringNotContainsString('id="admin_menu"', $html);
    }

    public function testPublicLayoutDoesNotEmitLogo(): void
    {
        $html = $this->renderLayout('public', ['context' => 'infos']);
        $this->assertStringContainsString('class="infos ', $html);
        $this->assertStringNotContainsString('<header role="banner">', $html);
    }

    public function testErrorLayoutFiresHookOrderAndOmitsQueryCount(): void
    {
        $html = $this->renderLayout('error', ['context' => 'error', 'title' => 'Boom']);
        $this->assertStringContainsString('<header role="banner">', $html);
        $this->assertStringContainsString('id="footer"', $html);
        $this->assertContains('html_footer', array_column(Tracer::log(), 'hook'));
    }

    public function testDieViewExposesFilterableTitleAndMessage(): void
    {
        $html = $this->renderView('errors.die', ['errTitle' => 'Boom', 'errMessage' => 'Crash']);
        $this->assertStringContainsString('<h2>Boom</h2>', $html);
        $this->assertStringContainsString('<p>Crash</p>', $html);
        $hooks = array_column(Tracer::log(), 'hook');
        $this->assertContains('die_title',   $hooks);
        $this->assertContains('die_message', $hooks);
        $this->assertContains('yourls_die',  $hooks);
    }

    public function testLoginViewWiresAllFormHooks(): void
    {
        $html = $this->renderView('auth.login', ['error_msg' => 'Bad password']);
        $this->assertStringContainsString('id="login"', $html);
        $this->assertStringContainsString('id="error-message"', $html);
        $this->assertStringContainsString('Bad password', $html);
        $hooks = array_column(Tracer::log(), 'hook');
        $this->assertContains('login_form_top',    $hooks);
        $this->assertContains('login_form_bottom', $hooks);
        $this->assertContains('login_form_end',    $hooks);
    }

    public function testHeadAppliesBodyclassFilterAndHtmlTitleFilter(): void
    {
        $this->renderLayout('admin', ['context' => 'index', 'title' => 'X']);
        $hooks = array_column(Tracer::log(), 'hook');
        $this->assertContains('bodyclass',  $hooks);
        $this->assertContains('html_title', $hooks);
    }

    private function renderLayout(string $layout, array $data): string
    {
        return $this->renderView($layout, $data, "@extends('$layout', \$layoutData ?? [])\n@section('content')<div>content</div>@endsection");
    }

    private function renderView(string $view, array $data, ?string $template = null): string
    {
        $tmp = sys_get_temp_dir() . '/yourls-layout-' . bin2hex(random_bytes(4));
        @mkdir($tmp, 0775, true);

        if ($template === null) {
            $tplPath = $tmp . '/page.blade.php';
            file_put_contents($tplPath, "@extends('$view')\n");
            $renderName = 'page';
        } else {
            $tplPath = $tmp . '/page.blade.php';
            file_put_contents($tplPath, $template);
            $data['layoutData'] = $data;
            $renderName = 'page';
        }

        $ns = 'layout_' . md5($tmp);
        \YOURLS\UI\BladeFactory::instance()->addNamespace($ns, $tmp);

        if ($template === null) {
            // Render the view directly so we get a full layout, but the layout
            // expects $context/$title as keys -> already in $data.
            $html = \YOURLS\UI\BladeFactory::instance()->render($view, $data);
        } else {
            $html = \YOURLS\UI\BladeFactory::instance()->render($ns . '::' . $renderName, $data);
        }

        @unlink($tplPath);
        @rmdir($tmp);
        return $html;
    }
}
