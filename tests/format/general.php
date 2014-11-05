<?php

/**
 * General formatting functions.
 *
 * @since 0.1
 */
class Option_Format_General extends PHPUnit_Framework_TestCase {

	/**
	 * Serialized data. Stolen from WP.
	 *
	 * @since 0.1
	 */
	public function test_is_serialized() {
		$cases = array(
			serialize(null),
			serialize(true),
			serialize(false),
			serialize(-25),
			serialize(25),
			serialize(1.1),
			serialize('this string will be serialized'),
			serialize("a\nb"),
			serialize(array()),
			serialize(array(1,1,2,3,5,8,13)),
			serialize( (object)array('test' => true, '3', 4) )
		);
		foreach ( $cases as $case )
			$this->assertTrue( yourls_is_serialized($case), "Serialized data: $case" );

		$not_serialized = array(
			'a string',
			'garbage:a:0:garbage;',
			// 'b:4;',  // this test fails in WP test suite, not sure if intentional or what...
			's:4:test;'
		);
		foreach ( $not_serialized as $case )
			$this->assertFalse( yourls_is_serialized($case), "Test data: $case" );
	}
	
	/**
	 * Integer (1337) to string (3jk) to integer
	 *
	 * @since 0.1
	 */
	public function test_int_to_string_to_int() {
		// 10 random integers
		$rnd = array();
		for( $i=0; $i<10; $i++ ) {
			$rnd[]= mt_rand( 1, 1000000 );
		}
	
		foreach( $rnd as $integer ) {
			$this->assertEquals( $integer, yourls_string2int( yourls_int2string( $integer ) ) );
		}
	
	}

	/**
	 * String (3jk) to integer (1337) to string
	 *
	 * @since 0.1
	 */
	public function test_string_to_int_to_string() {
		// 10 random strings that do not start with a zero
		$rnd = array();
		$i = 0;
		while( $i < 10 ) {
			if( $notempty = ltrim( rand_str( mt_rand( 2, 10 ) ), '0' ) ) {
				$rnd[]= $notempty;
				$i++;
			}
		}
	
		foreach( $rnd as $string ) {
			$this->assertEquals( $string, yourls_int2string( yourls_string2int( $string ) ) );
		}
	}

}