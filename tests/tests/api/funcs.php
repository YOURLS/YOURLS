<?php

/**
 * API functions
 *
 * @group API
 * @since 0.1
 */
class API_Func_Tests extends PHPUnit\Framework\TestCase {

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

        $function = 'yourls_api_action_' . $action;

        $this->assertTrue( is_callable( $function ) );
        $this->assertTrue( is_array( $function() ) );
    }

}
