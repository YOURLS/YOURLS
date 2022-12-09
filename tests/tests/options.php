<?php

/**
 * Option functions. Completely stolen from WP Unit Tests.
 *
 * @group options
 * @since 0.1
 */
#[AllowDynamicProperties]
class Option_Tests extends PHPUnit\Framework\TestCase {

	/**
	 * Basic tests
	 *
	 * @since 0.1
	 */
	public function test_the_basics() {
		$key = rand_str();
		$key2 = rand_str();
		$value = rand_str();
		$value2 = rand_str();

		$this->assertFalse( yourls_get_option( 'doesnotexist' ) );
		$this->assertTrue( yourls_add_option( $key, $value ) );
		$this->assertEquals( $value, yourls_get_option( $key ) );
		$this->assertFalse( yourls_add_option( $key, $value ) );  // Already exists
		$this->assertFalse( yourls_update_option( $key, $value ) );  // Value is the same
		$this->assertTrue( yourls_update_option( $key, $value2 ) );
		$this->assertEquals( $value2, yourls_get_option( $key ) );

		$this->assertFalse( yourls_add_option( $key, $value ) );
		$this->assertEquals( $value2, yourls_get_option( $key ) );
		$this->assertTrue( yourls_delete_option( $key ) );
		$this->assertFalse( yourls_get_option( $key ) );
		$this->assertFalse( yourls_delete_option( $key ) );

		$this->assertTrue( yourls_update_option( $key2, $value2 ) );
		$this->assertEquals( $value2, yourls_get_option( $key2 ) );
		$this->assertTrue( yourls_delete_option( $key2 ) );
		$this->assertFalse( yourls_get_option( $key2 ) );
	}

	/**
	 * Check with array and objects
	 *
	 * @since 0.1
	 */
	public function test_serialized_data() {
		$key = rand_str();
		$value = array( 'foo' => true, 'bar' => true );

		$this->assertTrue( yourls_add_option( $key, $value ) );
		$this->assertEquals( $value, yourls_get_option( $key ) );

		$value = (object) $value;
		$this->assertTrue( yourls_update_option( $key, $value ) );
		$this->assertEquals( $value, yourls_get_option( $key ) );
		$this->assertTrue( yourls_delete_option( $key ) );
	}

    /**
	 * Data provider of bad option names
	 */
	public function bad_option_names() {
		return array(
			array( '' ),
			array( '0' ),
			array( ' ' ),
			array( 0 ),
			array( false ),
			array( null ),
		);
	}

	/**
	 * Check with bad option names
	 *
     * @dataProvider bad_option_names
	 * @since 0.1
	 */
	public function test_bad_option_names($empty) {
        $this->assertFalse( yourls_get_option( $empty ) );
        $this->assertFalse( yourls_add_option( $empty, '' ) );
        $this->assertFalse( yourls_update_option( $empty, '' ) );
        $this->assertFalse( yourls_delete_option( $empty ) );
	}

	function setUp(): void {
		parent::setUp();
		$this->slash_1 = 'String with 1 slash \\';
		$this->slash_2 = 'String with 2 slashes \\\\';
		$this->slash_3 = 'String with 3 slashes \\\\\\';
		$this->slash_4 = 'String with 4 slashes \\\\\\\\';
		$this->slash_5 = 'String with 5 slashes \\\\\\\\\\';
		$this->slash_6 = 'String with 6 slashes \\\\\\\\\\\\';
		$this->slash_7 = 'String with 7 slashes \\\\\\\\\\\\\\';
	}

	/**
	 * Tests the model function that expects un-slashed data
	 *
	 * @since 0.1
	 */
	function test_add_option() {
		yourls_add_option( 'slash_test_1', $this->slash_1 );
		yourls_add_option( 'slash_test_2', $this->slash_2 );
		yourls_add_option( 'slash_test_3', $this->slash_3 );
		yourls_add_option( 'slash_test_4', $this->slash_4 );

		$this->assertEquals( $this->slash_1, yourls_get_option( 'slash_test_1' ) );
		$this->assertEquals( $this->slash_2, yourls_get_option( 'slash_test_2' ) );
		$this->assertEquals( $this->slash_3, yourls_get_option( 'slash_test_3' ) );
		$this->assertEquals( $this->slash_4, yourls_get_option( 'slash_test_4' ) );
	}

	/**
	 * Tests the model function that expects un-slashed data
	 *
	 * @since 0.1
	 */
	function test_update_option() {
		yourls_add_option( 'slash_test_5', 'foo' );

		yourls_update_option( 'slash_test_5', $this->slash_1 );
		$this->assertEquals( $this->slash_1, yourls_get_option( 'slash_test_5' ) );

		yourls_update_option( 'slash_test_5', $this->slash_2 );
		$this->assertEquals( $this->slash_2, yourls_get_option( 'slash_test_5' ) );

		yourls_update_option( 'slash_test_5', $this->slash_3 );
		$this->assertEquals( $this->slash_3, yourls_get_option( 'slash_test_5' ) );

		yourls_update_option( 'slash_test_5', $this->slash_4 );
		$this->assertEquals( $this->slash_4, yourls_get_option( 'slash_test_5' ) );
	}
}
