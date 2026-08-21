<?php

/**
 * Debug functions
 */
#[\PHPUnit\Framework\Attributes\Group('debug')]
class DebugLogTest extends PHPUnit\Framework\TestCase {

    private bool $original_debug_mode;

    protected function setUp(): void {
        $this->original_debug_mode = yourls_get_debug_mode();
    }

    protected function tearDown(): void {
        yourls_debug_mode($this->original_debug_mode);
    }

    public function test_debug_log_triggers_action_if_debug() {
        yourls_debug_mode(true);
        $num_actions_before = yourls_did_action( 'debug_log' );
        $this->assertIsInt($num_actions_before);
        yourls_debug_log( 'test' );
        $num_actions = yourls_did_action( 'debug_log' );
        $this->assertEquals( $num_actions, $num_actions_before + 1);
    }

    public function test_debug_log_doesnt_trigger_action_without_debug() {
        yourls_debug_mode(false);
        $num_actions_before = yourls_did_action( 'debug_log' );
        $this->assertIsInt($num_actions_before);
        yourls_debug_log( 'test' );
        $num_actions = yourls_did_action( 'debug_log' );
        $this->assertEquals( $num_actions, $num_actions_before);
    }

    public function test_debug_log_stores_str_if_debug() {
        yourls_debug_mode(true);
        $str = rand_str();

        $this->assertEquals(yourls_debug_log( $str ), $str);
        $log = yourls_get_debug_log();
        // last entry of array $log should be $str
        $log = end($log);
        $this->assertEquals($log, $str);
    }

    public function test_debug_log_doesnt_store_str_without_debug() {
        yourls_debug_mode(false);
        $str = rand_str();

        $this->assertEquals(yourls_debug_log( $str ), $str);
        $log = yourls_get_debug_log();
        // last entry of array $log should NOT be $str
        $log = end($log);
        $this->assertNotEquals($log, $str);
    }

    public function test_get_num_queries_if_debug() {
        yourls_debug_mode(true);
        $num = yourls_get_num_queries();
        // perform dummy query
        $str = rand_str();
        yourls_get_db('read-test')->fetchValue("SELECT '$str'");
        $num_after = yourls_get_num_queries();
        // number of queries should have increased by 1
        $this->assertEquals($num_after, $num + 1);
        // SQL queries should be stored
        $log = yourls_get_debug_log();
        $this->assertStringContainsString($str, end($log));
    }

    public function test_get_num_queries_without_debug() {
        yourls_debug_mode(false);
        $num = yourls_get_num_queries();
        // perform dummy query
        $str = rand_str();
        yourls_get_db('read-test')->fetchValue("SELECT '$str'");
        // number of queries should have not increased and SQL queries should not be stored
        $num_after = yourls_get_num_queries();
        $this->assertEquals($num_after, $num);
        $log = yourls_get_debug_log();
        $this->assertStringNotContainsString($str, end($log));
    }

    public function test_debug_mode_sets_error_reporting() {
        yourls_debug_mode(true);
        $this->assertEquals( error_reporting(), -1 );

        yourls_debug_mode(false);
        $this->assertEquals( error_reporting(), ( E_ERROR | E_PARSE ) );
    }

}
