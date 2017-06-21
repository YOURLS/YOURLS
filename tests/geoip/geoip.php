<?php

/**
 * YOURLS Unit Tests for the Geolocation API
 *
 * @group geoip
 */

class GeoIP_Tests extends PHPUnit_Framework_TestCase {

	/**
	 * Check that a few IPv4 resolve to the correct country code
	 *
	 * @dataProvider ipv4_samples
	 * @since 0.1
	 */
	public function test_ip_to_countrycode_ipv4( $ip, $country ) {
		$this->assertEquals( $country, yourls_geo_ip_to_countrycode( $ip, 'none' ) );
	}
	
	/**
	 * Check that a few IPv6 resolve to the correct country code
	 *
	 * @dataProvider ipv6_samples
	 * @since 0.1
	 */
	public function test_ip_to_countrycode_ipv6( $ip, $country ) {
		$this->assertEquals( $country, yourls_geo_ip_to_countrycode( $ip, 'none' ) );
	}
	
	/**
	 * Check a few country code => country name pairs
	 *
	 * @dataProvider country_codes
	 * @since 0.1
	 */
	public function test_countrycode_to_countryname( $code, $country ) {
		$this->assertEquals( $country, yourls_geo_countrycode_to_countryname( $code ) );
	}
	
	/**
	 * Data provider : array of arrays of ( 'ip', 'country code' ) in IPv4 notation
	 *
	 * @since 0.1
	 */
	public function ipv4_samples() {
		return array(
			array( '2.3.4.5', 'FR' ),
			array( '13.37.13.37', 'US' ),
			array( '79.79.79.79', 'GB' ),
			array( '10.0.0.1', 'none' ),
			array( 'helloworld', 'none' ),
		);
	}
	
	/**
	 * Data provider : array of arrays of ( 'ip', 'country code' ) in IPv6 notation
	 *
	 * @since 0.1
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
	 *
	 * No need to test for non existant codes since in YOURLS all country codes are produced by the GeoIP API, hence
	 * cannot be user made or arbitrary.
	 *
	 * @since 0.1
	 */
	public function country_codes() {
		return array(
			array( 'AU', 'Australia' ),
			array( 'BZ', 'Belize' ),
			array( 'CA', 'Canada' ),
		);
	}
	
	
	
}
