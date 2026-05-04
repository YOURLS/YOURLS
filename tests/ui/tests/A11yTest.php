<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Accessibility regression tests for the new components: ARIA wiring,
 * focus-visible styles, role="alert" vs "status", aria-labelledby on
 * dialogs, keyboard handlers on tabs.
 */
final class A11yTest extends TestCase
{
    public function testBannerUsesAlertRoleForCriticalTones(): void
    {
        foreach (['danger', 'warning'] as $tone) {
            $html = $this->render("<x-organisms::banner tone=\"$tone\">x</x-organisms::banner>");
            $this->assertStringContainsString('role="alert"',         $html, "$tone should use role=alert");
            $this->assertStringContainsString('aria-live="assertive"', $html, "$tone should use assertive live region");
        }
        foreach (['info', 'success', 'notice'] as $tone) {
            $html = $this->render("<x-organisms::banner tone=\"$tone\">x</x-organisms::banner>");
            $this->assertStringContainsString('role="status"',     $html, "$tone should use role=status");
            $this->assertStringContainsString('aria-live="polite"', $html, "$tone should use polite live region");
        }
    }

    public function testModalAndDialogExposeAriaLabelledBy(): void
    {
        $modal = $this->render('<x-organisms::modal id="m1" title="Confirm">x</x-organisms::modal>');
        $this->assertStringContainsString('aria-labelledby="m1-title"', $modal);
        $this->assertStringContainsString('id="m1-title"', $modal);

        $dialog = $this->render('<x-organisms::dialog id="d1" title="Hi" tone="info">body</x-organisms::dialog>');
        $this->assertStringContainsString('aria-labelledby="d1-title"', $dialog);
        $this->assertStringContainsString('id="d1-title"', $dialog);
    }

    public function testTabsExposeArrowKeyNavigation(): void
    {
        $html = $this->render('<x-molecules::tabs :tabs="$tabs" active="a" idPrefix="t">slot</x-molecules::tabs>', [
            'tabs' => ['a' => 'A', 'b' => 'B'],
        ]);
        $this->assertStringContainsString('aria-orientation="horizontal"', $html);
        $this->assertStringContainsString('keydown.right', $html);
        $this->assertStringContainsString('keydown.left',  $html);
        $this->assertStringContainsString('keydown.home',  $html);
        $this->assertStringContainsString('keydown.end',   $html);
        $this->assertStringContainsString('focus-visible:ring', $html);
    }

    public function testToggleHasFocusRing(): void
    {
        $html = $this->render('<x-atoms::toggle name="x" label="X" />');
        $this->assertStringContainsString('peer-focus-visible:ring', $html);
    }

    public function testInteractiveAtomsHaveFocusVisibleStyles(): void
    {
        $atoms = [
            'button'    => '<x-atoms::button>x</x-atoms::button>',
            'input'     => '<x-atoms::input name="x" />',
            'textarea'  => '<x-atoms::textarea name="x" />',
            'select'    => '<x-atoms::select name="x" :options="[\'a\'=>\'A\']" />',
        ];
        foreach ($atoms as $name => $tpl) {
            $html = $this->render($tpl);
            $this->assertStringContainsString('focus-visible:', $html, "$name must declare focus-visible styles");
        }
    }

    private function render(string $template, array $data = []): string
    {
        $tmp = sys_get_temp_dir() . '/yourls-a11y-' . bin2hex(random_bytes(4));
        @mkdir($tmp, 0775, true);
        file_put_contents($tmp . '/page.blade.php', $template);
        $ns = 'a11y_' . md5($tmp);
        \YOURLS\UI\BladeFactory::instance()->addNamespace($ns, $tmp);
        $html = \YOURLS\UI\BladeFactory::instance()->render($ns . '::page', $data);
        @unlink($tmp . '/page.blade.php');
        @rmdir($tmp);
        return $html;
    }
}
