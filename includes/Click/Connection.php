<?php
namespace YOURLS\Click;

class Connection {
    public static function closeAndContinue(): void {
        if ( function_exists( 'fastcgi_finish_request' ) ) {
            @fastcgi_finish_request();
            return;
        }
        @ignore_user_abort( true );
        if ( function_exists( 'litespeed_finish_request' ) ) {
            @litespeed_finish_request();
            return;
        }
        while ( ob_get_level() > 0 ) { @ob_end_flush(); }
        @flush();
    }
}
