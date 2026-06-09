<?php

/**
 * Tests for yourls_get_flood_delay() and yourls_get_flood_ip_whitelist().
 */
#[\PHPUnit\Framework\Attributes\Group('shorturls')]
#[\PHPUnit\Framework\Attributes\Group('flood')]
class FloodTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_all_filters( 'get_flood_delay' );
        yourls_remove_all_filters( 'get_flood_ip_whitelist' );
        yourls_remove_all_filters( 'shunt_check_IP_flood' );
        yourls_remove_all_filters( 'is_installing' );
        yourls_remove_all_filters( 'is_private' );
        yourls_remove_all_filters( 'shunt_is_valid_user' );
        yourls_remove_all_filters( 'get_IP' );
        yourls_remove_all_actions( 'pre_yourls_die' );
    }

    /**
     * yourls_get_flood_delay() returns an integer
     */
    public function test_flood_delay_is_int() {
        $this->assertIsInt( yourls_get_flood_delay() );
    }

    /**
     * Flood delay is either defined (should not be in the test suite) or defaults to 15 when undefined
     */
    public function test_flood_delay_matches_constant() {
        $expected = defined( 'YOURLS_FLOOD_DELAY_SECONDS' ) ? (int) YOURLS_FLOOD_DELAY_SECONDS : 15;

        $this->assertSame( $expected, yourls_get_flood_delay() );
    }

    /**
     * Flood delay is filterable
     */
    public function test_flood_delay_filter_can_override() {
        yourls_add_filter( 'get_flood_delay', fn() => 42 );

        $this->assertSame( 42, yourls_get_flood_delay() );
    }

    /**
     * The int return type coerces a non-int filtered value
     */
    public function test_flood_delay_is_cast_to_int() {
        yourls_add_filter( 'get_flood_delay', fn() => '30' );

        $this->assertSame( 30, yourls_get_flood_delay() );
    }

    /**
     * yourls_get_flood_ip_whitelist() returns an array
     */
    public function test_flood_ip_whitelist_is_array() {
        $this->assertIsArray( yourls_get_flood_ip_whitelist() );
    }

    /**
     * Flood whitelist is either defined (should not be in the test suite) or defaults to '' when undefined
     */
    public function test_flood_ip_whitelist_matches_constant() {
        $raw      = defined( 'YOURLS_FLOOD_IP_WHITELIST' ) ? (string) YOURLS_FLOOD_IP_WHITELIST : '';
        $expected = array_values( array_filter( array_map(
            fn( $ip ) => yourls_sanitize_ip( trim( $ip ) ),
            explode( ',', $raw )
        ) ) );

        $this->assertSame( $expected, yourls_get_flood_ip_whitelist() );
    }

    /**
     * Flood whitelist is filterable, and the returned IPs are sanitized
     */
    public function test_flood_ip_whitelist_filter_can_override() {
        $list = [ '1.2.3.4', '5.6.7.8', '    0.0.0.0    ' ];
        $ok   = [ '1.2.3.4', '5.6.7.8', '0.0.0.0' ];
        yourls_add_filter( 'get_flood_ip_whitelist', fn() => $list );

        $this->assertSame( $ok, yourls_get_flood_ip_whitelist() );
    }

    /**
     * Function can be shunted
     */
    public function test_check_ip_flood_is_shuntable() {
        yourls_add_filter( 'shunt_check_IP_flood', fn() => 'shunted' );
        $this->assertSame( 'shunted', yourls_check_IP_flood( '1.2.3.4' ) );
    }

    /**
     * No flood check while installing
     */
    public function test_check_ip_flood_passes_when_installing() {
        yourls_add_filter( 'get_flood_delay', fn() => 666 );
        yourls_add_filter( 'is_installing', 'yourls_return_true' );
        $this->assertTrue( yourls_check_IP_flood( '1.2.3.4' ) );
    }

    /**
     * Logged-in users are not throttled (private install + valid user)
     */
    public function test_check_ip_flood_passes_for_logged_in_user() {
        yourls_add_filter( 'get_flood_delay', fn() => 666 );
        yourls_add_filter( 'is_private', 'yourls_return_true' );
        yourls_add_filter( 'shunt_is_valid_user', 'yourls_return_true' );

        $this->assertTrue( yourls_check_IP_flood( '1.2.3.4' ) );
    }

    /**
     * Whitelisted IPs are not throttled
     */
    public function test_check_ip_flood_passes_for_whitelisted_ip() {
        yourls_add_filter( 'get_flood_delay', fn() => 666 );
        yourls_add_filter( 'is_private', 'yourls_return_false' );
        yourls_add_filter( 'get_flood_ip_whitelist', fn() => [ '1.2.3.4' ] );

        $this->assertTrue( yourls_check_IP_flood( '1.2.3.4' ) );
    }

    /**
     * A too-fast second request from the same IP triggers the flood guard (yourls_die)
     */
    public function test_check_ip_flood_dies_on_flood() {
        $ip = '203.0.113.42';
        yourls_add_filter( 'get_flood_delay', fn() => 3600 );
        yourls_add_filter( 'is_private', 'yourls_return_false' );
        yourls_add_filter( 'get_IP', fn() => $ip );

        // A link was just added from this IP (recent timestamp)
        yourls_insert_link_in_db( 'https://' . rand_str(), rand_str(), rand_str() );

        // Intercept yourls_die() before it actually dies
        yourls_add_action( 'pre_yourls_die', function() { throw new Exception( 'flood' ); } );

        $this->expectException( Exception::class );
        $this->expectExceptionMessage( 'flood' );

        yourls_check_IP_flood( $ip );
    }

}
