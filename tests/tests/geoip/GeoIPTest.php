<?php

/**
 * YOURLS Unit Tests for the Geolocation API
 */
#[\PHPUnit\Framework\Attributes\Group('geoip')]
class GeoIPTest extends PHPUnit\Framework\TestCase {

    /**
     * Check that a few IPv4 resolve to the correct country code
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('ipv4_samples')]
    public function test_ip_to_countrycode_ipv4( $ip, $country ) {
        $this->assertEquals( $country, yourls_geo_ip_to_countrycode( $ip, 'none' ) );
    }

    /**
     * Check that a few IPv6 resolve to the correct country code
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('ipv6_samples')]
    public function test_ip_to_countrycode_ipv6( $ip, $country ) {
        $this->assertEquals( $country, yourls_geo_ip_to_countrycode( $ip, 'none' ) );
    }

    /**
     * Check a few country code => country name pairs
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('country_codes')]
    public function test_countrycode_to_countryname( $code, $country ) {
        $this->assertEquals( $country, yourls_geo_countrycode_to_countryname( $code ) );
    }

    /**
     * Check a few code return a string when getting their country flag
     */
    public function test_country_images() {
        $this->assertIsString(yourls_geo_get_flag('AU'));      // something like http://yourls/includes/geo/flags/flag_au.gif
        $this->assertIsString(yourls_geo_get_flag(''));        // something like http://yourls/includes/geo/flags/flag_.gif
        $this->assertIsString(yourls_geo_get_flag('OMGLOL'));  // fall back to default ''
    }

    /**
     * Data provider : array of arrays of ( 'ip', 'country code' ) in IPv4 notation
     */
    public static function ipv4_samples(): \Iterator
    {
        yield array( '8.8.8.8', 'US' );
        yield array( '13.37.13.37', 'FR' );
        yield array( '79.79.79.79', 'GB' );
        yield array( '10.0.0.1', 'none' );
        yield array( 'helloworld', 'none' );
    }

    /**
     * Data provider : array of arrays of ( 'ip', 'country code' ) in IPv6 various notations
     */
    public static function ipv6_samples(): \Iterator
    {
        yield array( '::80.24.24.24', 'ES' );
        // yield array( '2606:4700:4700::1111', 'US' );
        yield array( '2001:0240:2000::', 'JP' );
        yield array( '::1', 'none' );
        yield array( 'mynameisozh', 'none' );
    }

    /**
     * Data provider : array of arrays of ( 'country code', 'country name' )
     */
    public static function country_codes(): \Iterator
    {
        yield array( 'AU', 'Australia' );
        yield array( 'BZ', 'Belize' );
        yield array( 'CA', 'Canada' );
        yield array( 'WW', '' );
    }

}
