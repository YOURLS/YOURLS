<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Records every yourls_do_action / yourls_apply_filter call into a plain
 * array so milestones can compare hook ordering against a captured baseline.
 *
 * The tracer is strictly opt-in: nothing happens until install() is called.
 */
final class HookTracerTest extends TestCase
{
    public function testTracerCapturesActionsAndFilters(): void
    {
        Tracer::reset();
        Tracer::install();

        // Call a few hooks. These functions are provided by the YOURLS plugin
        // API; if they are not available (running outside YOURLS bootstrap),
        // simulate them so the test still validates the tracer logic.
        if (!function_exists('yourls_do_action')) {
            require __DIR__ . '/../tracer-yourls-shim.php';
        }

        yourls_do_action('demo_action', 'a', 'b');
        $value = yourls_apply_filter('demo_filter', 'hello', ['ctx' => 1]);

        $log = Tracer::log();
        $this->assertCount(2, $log);
        $this->assertSame('action', $log[0]['kind']);
        $this->assertSame('demo_action', $log[0]['hook']);
        $this->assertSame(['a', 'b'], $log[0]['args']);
        $this->assertSame('filter', $log[1]['kind']);
        $this->assertSame('demo_filter', $log[1]['hook']);
        $this->assertSame('hello', $value); // no listeners -> identity
    }
}

/**
 * Lightweight tracer used both by this test and by the future hook-fidelity
 * suite that will diff legacy vs Blade output.
 */
final class Tracer
{
    /** @var array<int, array{kind:string, hook:string, args:array}> */
    private static array $log = [];
    private static bool $installed = false;

    public static function reset(): void
    {
        self::$log = [];
    }

    /** @return array<int, array{kind:string, hook:string, args:array}> */
    public static function log(): array
    {
        return self::$log;
    }

    public static function install(): void
    {
        if (self::$installed) return;
        self::$installed = true;

        // Use YOURLS plugin API if available; otherwise rely on the shim.
        if (function_exists('yourls_add_action')) {
            // The YOURLS plugin API lacks a wildcard, but we can attach a
            // catch-all to the pre-call wrapper exposed via globals if a
            // plugin/test hooks at global scope. For the baseline comparison
            // workflow we instead drive recording via direct tracer calls
            // wrapped into HookBridge::action / ::filter; see baseline tests.
            return;
        }
    }

    public static function recordAction(string $hook, array $args): void
    {
        self::$log[] = ['kind' => 'action', 'hook' => $hook, 'args' => $args];
    }

    public static function recordFilter(string $hook, array $args): mixed
    {
        self::$log[] = ['kind' => 'filter', 'hook' => $hook, 'args' => $args];
        return $args[0] ?? null;
    }
}
