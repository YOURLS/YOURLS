<?php

/**
 * Tests for yourls_sanitize_jsonp_callback()
 */
#[\PHPUnit\Framework\Attributes\Group('formatting')]
class JsonpCallbackTest extends PHPUnit\Framework\TestCase {

    /**
     * Provide valid callback names that should be left untouched
     */
    public static function valid_callbacks(): \Iterator {
        yield array( 'myCallback' , 'myCallback' );
        yield array( 'my_cb_123'  , 'my_cb_123' );
        yield array( '$.x.y_1'    , '$.x.y_1' );
        yield array( 'a.b$c_d'    , 'a.b$c_d' );
        yield array( 'JSONP'      , 'JSONP' );
        yield array( 'Z_9.$'      , 'Z_9.$' );
    }

    /**
     * Provide malicious or invalid callback names and their sanitized result
     */
    public static function malicious_callbacks(): \Iterator {
        yield array( 'alert(1)'                         , 'alert1' );
        yield array( 'foo[bar]'                         , 'foobar' );
        yield array( 'foo-bar'                          , 'foobar' );
        yield array( '</script>'                        , 'script' );
        yield array( '$.constructor.prototype.alert(1)//', '$.constructor.prototype.alert1' );
        yield array( 'callback;window.location="https://example.com"', 'callbackwindow.locationhttpsexample.com' );
        yield array( "\"evil\"", 'evil' );
        yield array( "\n\r\tcb()", 'cb' );
        yield array( "cb\u2028\u2029()", 'cb' );
        yield array( '', '' );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('valid_callbacks')]
    public function test_valid_callbacks_are_kept( $raw, $expected ) : void {
        $this->assertSame( $expected, yourls_sanitize_jsonp_callback( $raw ) );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('malicious_callbacks')]
    public function test_malicious_callbacks_are_sanitized( $raw, $expected ) : void {
        $this->assertSame( $expected, yourls_sanitize_jsonp_callback( $raw ) );
    }
}
