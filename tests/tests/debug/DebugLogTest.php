<?php

/**
 * Debug functions
 */
#[\PHPUnit\Framework\Attributes\Group('debug')]
class DebugLogTest extends PHPUnit\Framework\TestCase {

    public function test_debug_log_triggers_action() {
        $num_actions_before = yourls_did_action( 'debug_log' );
        $this->assertIsInt($num_actions_before);
        yourls_debug_log( 'test' );
        $num_actions = yourls_did_action( 'debug_log' );
        $this->assertEquals( $num_actions, $num_actions_before + 1);
    }

    public function test_get_debug_log_is_array() {
        $log = yourls_get_debug_log();
        $this->assertIsArray($log);
        $this->assertNotEmpty($log);
    }

    public function test_debug_log_stores_str() {
        $str = rand_str();
        $log_before = yourls_get_debug_log();
        $this->assertNotEmpty($log_before);

        $this->assertEquals(yourls_debug_log( $str ), $str);
        $log = yourls_get_debug_log();
        // last entry of array $log should be $str
        $log = end($log);
        $this->assertEquals($log, $str);
    }

    public function test_get_num_queries() {
        $num = yourls_get_num_queries();
        $this->assertIsInt($num);
        $this->assertGreaterThan(0, $num);
    }

    public function test_get_debug_mode_returns_bool() {
        $this->assertIsBool(yourls_get_debug_mode());
    }

    public function test_debug_mode_sets_error_reporting() {
        $debug = yourls_get_debug_mode();

        $str = rand_str();
        yourls_debug_mode(true);
        $this->assertEquals( error_reporting(), -1 );
        // SQL queries should be stored
        yourls_get_db('read-test_rand')->fetchValue("SELECT '$str'");
        $log = yourls_get_debug_log();
        $this->assertStringContainsString($str, end($log));

        $str = rand_str();
        yourls_debug_mode(false);
        $this->assertEquals( error_reporting(), ( E_ERROR | E_PARSE ) );
        // SQL queries should not be stored
        yourls_get_db('read-test_rand')->fetchValue("SELECT '$str'");
        $log = yourls_get_debug_log();
        $this->assertStringNotContainsString($str, end($log));

        // Restore
        yourls_debug_mode($debug);
    }

}
