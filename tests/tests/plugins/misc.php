<?php

/**
 * Helpers and misc related plugin functions
 *
 * This test class should revert everything before each test: be cautious not to introduce
 * tests with a "depends" annotation
 *
 * @group plugins
 * @since 0.1
 */
class Plugin_Misc_Tests extends PHPUnit_Framework_TestCase {

    protected function tearDown() {
        // remove filters and actions
        yourls_remove_all_filters( 'is_ssl' );
        yourls_remove_all_filters( 'needs_ssl' );
        yourls_remove_all_actions('pre_yourls_die');

        // unregister plugin pages
        global $ydb;
        $ydb->set_plugin_pages(array());
    }

    /**
    * Check that yourls_plugin_url() complies with SSL needs (1/4)
    *
    * @since 0.1
    */
    public function test_yourls_plugin_url_ssl_mode_1() {
        $plugin = rand_str();

        yourls_add_filter( 'is_ssl', 'yourls_return_false' );
        yourls_add_filter( 'needs_ssl', 'yourls_return_false' );
        $plugin_url = yourls_plugin_url( $plugin );
        $this->assertStringStartsWith( 'http://', $plugin_url );
    }

    /**
    * Check that yourls_plugin_url() complies with SSL needs (2/4)
    *
    * @since 0.1
    */
    public function test_yourls_plugin_url_ssl_mode_2() {
        $plugin = rand_str();

        yourls_add_filter( 'is_ssl', 'yourls_return_true' );
        yourls_add_filter( 'needs_ssl', 'yourls_return_false' );
        $plugin_url = yourls_plugin_url( $plugin );
        $this->assertStringStartsWith( 'https://', $plugin_url );
    }

    /**
    * Check that yourls_plugin_url() complies with SSL needs (3/4)
    *
    * @since 0.1
    */
    public function test_yourls_plugin_url_ssl_mode_3() {
        $plugin = rand_str();

        yourls_add_filter( 'is_ssl', 'yourls_return_true' );
        yourls_add_filter( 'needs_ssl', 'yourls_return_true' );
        $plugin_url = yourls_plugin_url( $plugin );
        $this->assertStringStartsWith( 'https://', $plugin_url );
    }

    /**
    * Check that yourls_plugin_url() complies with SSL needs (4/4)
    *
    * @since 0.1
    */
    public function test_yourls_plugin_url_ssl_mode_4() {
        $plugin = rand_str();

        yourls_add_filter( 'is_ssl', 'yourls_return_false' );
        yourls_add_filter( 'needs_ssl', 'yourls_return_true' );
        $plugin_url = yourls_plugin_url( $plugin );
        $this->assertStringStartsWith( 'https://', $plugin_url );
    }

    /**
    * Test registering a plugin page
    *
    * @since 0.1
    */
    public function test_register_plugin_page() {
        global $ydb;
        $plugin = rand_str();
        $title = rand_str();
        $func = rand_str();

        // no plugin page registered
        $this->assertEquals( 0, count( $ydb->get_plugin_pages() ) );

        // register one and check
        yourls_register_plugin_page( $plugin, $title, $func );
        $this->assertEquals( 1, count( $ydb->get_plugin_pages() ) );
        $expected = array(
            'slug' => $plugin,
            'title' => $title,
            'function' => $func,
        );
        $pages = $ydb->get_plugin_pages();
        $this->assertSame( $pages[ $plugin ], $expected );

        // deregister it
        $ydb->set_plugin_pages(array());
    }

    /**
    * Check list of plugin admin pages
    *
    * @since 0.1
    */
    public function test_list_plugin_page() {
        global $ydb;
        $plugin = rand_str();
        $title = rand_str();
        $func = rand_str();

        // no plugin page registered
        $this->assertEmpty( yourls_list_plugin_admin_pages() );

        // register one plugin
        yourls_register_plugin_page( $plugin, $title, $func );
        $pages = yourls_list_plugin_admin_pages();

        $this->assertSame( 1, count( $pages ) );
        $this->assertArrayHasKey( 'url', $pages[ $plugin ] );
        $this->assertArrayHasKey( 'anchor', $pages[ $plugin ] );
    }

    /**
    * Simulate a non existent plugin admin page
    *
    * @expectedException Exception
    * @since 0.1
    */
    public function test_plugin_admin_page_fake() {
        // intercept yourls_die() before it actually dies
        yourls_add_action( 'pre_yourls_die', function() { throw new Exception( 'I have died' ); } );

        // This should trigger yourls_die()
        yourls_plugin_admin_page( rand_str() );
    }

    /**
    * Simulate a valid plugin admin page
    *
    * @since 0.1
    */
    public function test_plugin_admin_page() {
        global $ydb;
        $plugin = rand_str();
        $title  = rand_str();
        $action = rand_str();
        $func = function() use ( $action ) { yourls_do_action( $action ); };
        yourls_register_plugin_page( $plugin, $title, $func );

        $this->assertSame( 0, yourls_did_action( 'load-' . $plugin ) );

        ob_start();
        yourls_plugin_admin_page( $plugin );
        ob_end_clean();

        // The page should have been drawn, and the plugin page callback should have been triggered
        $this->assertSame( 1, yourls_did_action( 'load-' . $plugin ) );
        $this->assertSame( 1, yourls_did_action( $action ) );
    }

}
