<?php

/**
 * Execution context getters: yourls_is_Ajax(), yourls_is_GO(), yourls_is_windows()
 */
#[\PHPUnit\Framework\Attributes\Group('utils')]
class ContextTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_all_filters( 'is_Ajax' );
        yourls_remove_all_filters( 'is_GO' );
    }

    public function test_is_ajax_is_bool() {
        $this->assertIsBool( yourls_is_Ajax() );
    }

    public function test_is_ajax_is_filterable() {
        yourls_add_filter( 'is_Ajax', 'yourls_return_true' );
        $this->assertTrue( yourls_is_Ajax() );

        yourls_remove_all_filters( 'is_Ajax' );
        yourls_add_filter( 'is_Ajax', 'yourls_return_false' );
        $this->assertFalse( yourls_is_Ajax() );
    }

    public function test_is_go_is_bool() {
        $this->assertIsBool( yourls_is_GO() );
    }

    public function test_is_go_is_filterable() {
        yourls_add_filter( 'is_GO', 'yourls_return_true' );
        $this->assertTrue( yourls_is_GO() );

        yourls_remove_all_filters( 'is_GO' );
        yourls_add_filter( 'is_GO', 'yourls_return_false' );
        $this->assertFalse( yourls_is_GO() );
    }

    public function test_is_windows_is_bool() {
        $this->assertIsBool( yourls_is_windows() );
    }

}
