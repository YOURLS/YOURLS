<?php

/**
 * Tests for yourls_sanitize_jsonp_callback()
 */
#[\PHPUnit\Framework\Attributes\Group('formatting')]
class JsonpCallbackTest extends PHPUnit\Framework\TestCase {

    /**
     * Provide valid callback names that should be accepted
     */
    public static function valid_callbacks(): \Iterator {
        yield array( 'myCallback' );
        yield array( 'my_cb_123' );
        yield array( '$.x.y_1' );
        yield array( 'a.b$c_d' );
        yield array( 'JSONP' );
        yield array( 'Z_9.$' );
    }

    /**
     * Provide malicious or invalid callback names that should be rejected
     */
    public static function malicious_callbacks(): \Iterator {
        yield array( 'alert(1)' );
        yield array( 'foo[bar]' );
        yield array( 'foo-bar' );
        yield array( '</script>' );
        yield array( '$.constructor.prototype.alert(1)//' );
        yield array( 'callback;window.location="https://example.com"' );
        yield array( '"evil"' );
        yield array( "\n\r\tcb()" );
        yield array( "cb\u2028\u2029()" );
        yield array( 'cb\\u2028' );
        yield array( '' );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('valid_callbacks')]
    public function test_valid_callbacks_are_accepted( $callback ) : void {
        $result = yourls_validate_jsonp_callback( $callback );
        $this->assertSame( $callback, $result, "Valid callback '$callback' should be returned unchanged" );
        $this->assertNotFalse( $result, "Valid callback '$callback' should not return false" );
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('malicious_callbacks')]
    public function test_malicious_callbacks_are_rejected( $callback ) : void {
        $result = yourls_validate_jsonp_callback( $callback );
        $this->assertFalse( $result, "Invalid callback '$callback' should return false" );
    }
}
