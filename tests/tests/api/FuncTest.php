<?php

/**
 * API functions
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('API')]
class FuncTest extends PHPUnit\Framework\TestCase {

    public static function api_actions(): \Iterator
    {
        yield array( 'shorturl', '' );
        yield array( 'stats', '' );
        yield array( 'db-stats', 'db_stats' );
        yield array( 'url-stats', 'url_stats' );
        yield array( 'expand', '' );
        yield array( 'version', '' );
    }

    /**
     * Check that API actions return an array
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('api_actions')]
    public function test_api_actions( $action, $alias ) {
        $action = $alias ? $alias : $action;

        $function = 'yourls_api_action_' . $action;

        $this->assertTrue( is_callable( $function ) );
        $this->assertTrue( is_array( $function() ) );
    }

}
