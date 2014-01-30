<?php

/**
 * YOURLS Logger Interface
 * This file is part of the YOURLS package.
 */
 
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Construct a logger engine
 * 
 * @package Monolog
 */
class Log extends Logger {

    /**
     * @param string $channel The name of the channel
     */
    public function __construct( $channel ) {
        parent::__construct( 'YOURLS.' . $channel );
        if ( defined( 'YOURLS_DEBUG' ) && YOURLS_DEBUG == true ) {
            $this->pushHandler( new StreamHandler( YOURLS_USERDIR . '/yourls.log' ) );
        }
    }  
}
