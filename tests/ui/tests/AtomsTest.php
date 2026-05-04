<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class AtomsTest extends TestCase
{
    /**
     * Smoke render every atom with default props. Failure means the Blade
     * file has a syntax or compilation error.
     */
    #[DataProvider('provideAtoms')]
    public function testAtomCompiles(string $component, array $props, string $slot): void
    {
        $html = $this->renderAtom($component, $props, $slot);
        $this->assertNotSame('', trim($html), "Atom $component produced empty output");
    }

    public static function provideAtoms(): array
    {
        return [
            'button'      => ['button',      ['variant' => 'primary'], 'Save'],
            'icon-button' => ['icon-button', ['icon' => 'pencil', 'label' => 'Edit'], ''],
            'badge'       => ['badge',       ['tone' => 'success', 'dot' => true], 'active'],
            'tag'         => ['tag',         ['closable' => true], 'tag'],
            'avatar'      => ['avatar',      ['initials' => 'MA', 'alt' => 'Marco'], ''],
            'spinner'     => ['spinner',     [], ''],
            'input'       => ['input',       ['name' => 'url', 'placeholder' => 'https://'], ''],
            'textarea'    => ['textarea',    ['name' => 'notes', 'rows' => 3], ''],
            'select'      => ['select',      ['name' => 'lang', 'options' => ['en' => 'English'], 'selected' => 'en', 'label' => 'Language'], ''],
            'checkbox'    => ['checkbox',    ['name' => 'agree', 'label' => 'Agree'], ''],
            'toggle'      => ['toggle',      ['name' => 'dark', 'label' => 'Dark'], ''],
            'radio'       => ['radio',       ['name' => 'opt', 'options' => ['a' => 'A', 'b' => 'B'], 'selected' => 'a'], ''],
            'label'       => ['label',       ['for' => 'email', 'required' => true], 'Email'],
            'help-text'   => ['help-text',   ['tone' => 'error'], 'Required'],
            'divider'     => ['divider',     [], ''],
            'icon'        => ['icon',        ['name' => 'search'], ''],
        ];
    }

    /**
     * When the slot content is a Blade interpolation ({{ $value }}), the
     * value must be HTML-escaped. Raw HTML in the slot is intentionally
     * passed through (contract matches Laravel/Blade), so callers are
     * responsible for escaping any untrusted text.
     */
    public function testButtonEscapesInterpolatedSlotValue(): void
    {
        $tmp = sys_get_temp_dir() . '/yourls-atom-' . bin2hex(random_bytes(4));
        @mkdir($tmp, 0775, true);
        file_put_contents(
            $tmp . '/page.blade.php',
            '<x-atoms::button variant="primary">{{ $payload }}</x-atoms::button>'
        );
        $ns = 'esc_' . md5($tmp);
        \YOURLS\UI\BladeFactory::instance()->addNamespace($ns, $tmp);
        $html = \YOURLS\UI\BladeFactory::instance()->render($ns . '::page', [
            'payload' => '<script>alert(1)</script>',
        ]);
        @unlink($tmp . '/page.blade.php');
        @rmdir($tmp);

        $this->assertStringNotContainsString('<script>alert(1)</script>', $html);
        $this->assertStringContainsString('&lt;script&gt;', $html);
    }

    /**
     * Input value must end up properly attribute-escaped. We pass the
     * value as a PHP-typed prop (`:value`) so Blade applies its standard
     * attribute escaping exactly once.
     */
    public function testInputEscapesValue(): void
    {
        $tmp = sys_get_temp_dir() . '/yourls-atom-' . bin2hex(random_bytes(4));
        @mkdir($tmp, 0775, true);
        file_put_contents(
            $tmp . '/page.blade.php',
            '<x-atoms::input name="q" :value="$payload" />'
        );
        $ns = 'esc2_' . md5($tmp);
        \YOURLS\UI\BladeFactory::instance()->addNamespace($ns, $tmp);
        $html = \YOURLS\UI\BladeFactory::instance()->render($ns . '::page', [
            'payload' => '" onmouseover="alert(1)',
        ]);
        @unlink($tmp . '/page.blade.php');
        @rmdir($tmp);

        $this->assertStringNotContainsString('onmouseover="alert(1)"', $html);
        $this->assertStringContainsString('&quot; onmouseover=&quot;alert(1)', $html);
    }

    public function testButtonAppliesVariantClass(): void
    {
        $html = $this->renderAtom('button', ['variant' => 'danger'], 'Delete');
        $this->assertStringContainsString('bg-danger-600', $html);
    }

    public function testButtonExposesAriaWhenLoading(): void
    {
        $html = $this->renderAtom('button', ['variant' => 'primary', 'loading' => true], 'Save');
        $this->assertStringContainsString('aria-disabled="true"', $html);
        $this->assertStringContainsString('animate-spin', $html);
    }

    private function renderAtom(string $component, array $props, string $slot): string
    {
        $tmp = sys_get_temp_dir() . '/yourls-atom-' . bin2hex(random_bytes(4));
        @mkdir($tmp, 0775, true);

        // Pass scalar props as plain attributes; complex props (arrays,
        // objects) go through the Blade view data so they cross the
        // boundary as PHP, not as JSON-in-attribute strings (which fail
        // to compile because " becomes &quot;).
        $attrs = '';
        $data  = [];
        foreach ($props as $name => $value) {
            if (is_bool($value)) {
                if ($value) $attrs .= ' ' . $name;
                continue;
            }
            if (is_scalar($value)) {
                $attrs .= ' ' . $name . '="' . htmlspecialchars((string) $value, ENT_QUOTES) . '"';
                continue;
            }
            $key = '__prop_' . preg_replace('/[^a-zA-Z0-9_]/', '_', $name);
            $data[$key] = $value;
            $attrs .= ' :' . $name . '="$' . $key . '"';
        }
        file_put_contents($tmp . '/page.blade.php', "<x-atoms::$component$attrs>$slot</x-atoms::$component>");

        $ns = 'test_' . md5($tmp);
        \YOURLS\UI\BladeFactory::instance()->addNamespace($ns, $tmp);
        $html = \YOURLS\UI\BladeFactory::instance()->render($ns . '::page', $data);

        @unlink($tmp . '/page.blade.php');
        @rmdir($tmp);
        return $html;
    }
}
