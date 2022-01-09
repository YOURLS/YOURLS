<?php

/**
 * YOURLS Unit Tests for the Geolocation API
 *
 * @group geoip
 */

class GeoIP_Tests extends PHPUnit\Framework\TestCase {

	/**
	 * Check that a few IPv4 resolve to the correct country code
	 *
	 * @dataProvider ipv4_samples
	 */
	public function test_ip_to_countrycode_ipv4( $ip, $country ) {
		$this->assertEquals( $country, yourls_geo_ip_to_countrycode( $ip, 'none' ) );
	}

	/**
	 * Check that a few IPv6 resolve to the correct country code
	 *
	 * @dataProvider ipv6_samples
	 */
	public function test_ip_to_countrycode_ipv6( $ip, $country ) {
		$this->assertEquals( $country, yourls_geo_ip_to_countrycode( $ip, 'none' ) );
	}

	/**
	 * Check a few country code => country name pairs
	 *
	 * @dataProvider country_codes
	 */
	public function test_countrycode_to_countryname( $code, $country ) {
		$this->assertEquals( $country, yourls_geo_countrycode_to_countryname( $code ) );
	}

    /**
     * Check a few code return a string when getting their country flag
     */
    public function test_country_images() {
        $this->assertIsString(yourls_geo_get_flag('AU'));      // something like http://yourls/includes/geo/flags/flag_au.gif
        $this->assertIsString(yourls_geo_get_flag('FR'));
        $this->assertIsString(yourls_geo_get_flag(''));        // something like http://yourls/includes/geo/flags/flag_.gif
        $this->assertIsString(yourls_geo_get_flag('OMGLOL'));  // fall back to default ''
    }

    /**
	 * Data provider : array of arrays of ( 'ip', 'country code' ) in IPv4 notation
	 */
	public function ipv4_samples() {
		return array(
			array( '8.8.8.8', 'US' ),
			array( '13.37.13.37', 'FR' ),
			array( '79.79.79.79', 'GB' ),
			array( '10.0.0.1', 'none' ),
			array( 'helloworld', 'none' ),
		);
	}

	/**
	 * Data provider : array of arrays of ( 'ip', 'country code' ) in IPv6 notation
	 */
	public function ipv6_samples() {
		return array(
			array( '::80.24.24.24', 'ES' ),
			array( '2001:4860:0:1001::68', 'US' ),
			array( '2001:67c:3a0:ffff:ffff:ffff:ffff:ffff', 'NL' ),
			array( '::1', 'none' ),
			array( 'mynameisozh', 'none' ),
		);
	}

	/**
	 * Data provider : array of arrays of ( 'country code', 'country name' )
	 */
	public function country_codes() {
		return array(
			array( 'AU', 'Australia' ),
			array( 'BZ', 'Belize' ),
			array( 'CA', 'Canada' ),
			array( 'WW', '' ),          // fake code
		);
	}

}
