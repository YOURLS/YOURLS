<?php

/**
 * API functions
 *
 * @group API
 * @since 0.1
 */
class API_Func_Tests extends PHPUnit_Framework_TestCase {

    public function api_actions() {
        return array(
            array( 'shorturl', '' ),
            array( 'stats', '' ),
            array( 'db-stats', 'db_stats' ),
            array( 'url-stats', 'url_stats' ),
            array( 'expand', '' ),
            array( 'version', '' ),
        );
    }

    /**
     * Check that API actions return an array
     *
     * @since 0.1
     * @dataProvider api_actions
     */
    public function test_api_actions( $action, $alias ) {
        $action = $alias ? $alias : $action;

        $this->assertTrue( is_array( call_user_func( 'yourls_api_action_' . $action ) ) );
    }

}
