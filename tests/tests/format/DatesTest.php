<?php

/**
 * Formatting functions for time & dates
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('formatting')]
#[\PHPUnit\Framework\Attributes\Group('timedate')]
class DatesTest extends PHPUnit\Framework\TestCase {

    protected function tearDown(): void {
        yourls_remove_all_filters( 'get_time_offset' );
    }

    /**
     * Test yourls_get_timestamp returns an int
     */
    function test_get_time_offset() {
        $this->assertIsInt( yourls_get_time_offset() );
    }

    /**
     * Test yourls_get_datetime_format returns a string
     */
    function test_get_datetime_format() {
        $this->assertIsString( yourls_get_datetime_format('M d, Y H:i') );
        $this->assertIsString( yourls_get_datetime_format( 10 ) );
        $this->assertIsString( yourls_get_datetime_format(false) );
    }

    /**
     * Test yourls_get_date_format returns a string
     */
    function test_get_date_format() {
        $this->assertIsString( yourls_get_date_format('M d, Y') );
        $this->assertIsString( yourls_get_date_format( 10 ) );
        $this->assertIsString( yourls_get_date_format(false) );
    }

    /**
     * Test yourls_get_time_format returns a string
     */
    function test_get_time_format() {
        $this->assertIsString( yourls_get_time_format('H:i') );
        $this->assertIsString( yourls_get_time_format( 10 ) );
        $this->assertIsString( yourls_get_time_format(false) );
    }

    /**
     * Test yourls_get_timestamp returns unmodified timestamp if no offset
     */
    function test_get_time_offset_zero() {
        $now = time();

        yourls_add_filter('get_time_offset', 'yourls_return_zero' );
        $this->assertEquals( $now, yourls_get_timestamp( $now ) );
    }

    /**
     * Test yourls_get_timestamp returns a timestamp with offset
     */
    function test_get_time_offset_non_zero() {
        $now = time();

        $offset = mt_rand(-12,12);

        yourls_add_filter('get_time_offset', function() use($offset) {return $offset;} );
        $this->assertEquals( $now + ($offset * 3600), yourls_get_timestamp( $now ) );
    }

}
