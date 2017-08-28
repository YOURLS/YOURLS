<?php

/**
 * Sanitizing functions
 *
 * @group formatting
 * @since 0.1
 */
class Format_Sanitize extends PHPUnit_Framework_TestCase {

    /**
     * Sanitize titles
     *
     * @since 0.1
     */
    function test_sanitize_title() {
        $expected = "How Will I Laugh Tomorrow When I Can't Even Smile Today";
        $unsane   = "How <strong>Will</strong> I Laugh Tomorrow <em>When I Can't Even Smile Today</em>";
        $this->assertSame( $expected, yourls_sanitize_title( $unsane ) );
        
        $expected = 'Twilight of the Thunder God';
        $unsane   = 'Twilight <bleh omg="wtf" >of</bleh> the <blah something>Thunder God';
        $this->assertSame( $expected, yourls_sanitize_title( $unsane ) );
    }
    
    /**
     * Sanitize titles with fallback
     *
     * @since 0.1
     */
    function test_sanitize_title_with_fallback() {
        $fallback = rand_str();
        $expected = '';
        $unsane   = '<tag></tag><omg>';
        $this->assertSame( $expected, yourls_sanitize_title( $unsane ) );
        $this->assertSame( $fallback, yourls_sanitize_title( $unsane, $fallback ) );
    }
 
    /**
     * Sanitize integers
     *
     * @since 0.1
     */
    function test_sanitize_int() {
        for ( $i = 1; $i <= 10; $i++ ) {
            $string = yourls_rnd_string( 20, 6 ) . '1'; // make sure there's at least one digit :P
            $int = yourls_sanitize_int( $string );
            $this->assertTrue( ctype_digit( $int ) );
        }
    }

    /**
     * Some strings that look like IPs and a boolean showing if they should pass or not
     */
    function random_ips() {
        return array(
            array( '255.255.255.255', true ),
            array( '127.1', true ),
            array( '559.559.559', true ),
            array( '::1', true ),
            array( '127.0.0.omg', false ),
            array( '1:1:omg', false ),
            array( '#@~&', false ),
        );
    }

    /**
     * Sanitize IPs
     *
     * @dataProvider random_ips
     * @since 0.1
     */
    function test_sanitize_ip( $ip, $is_ip ) {
        $this->assertSame( $ip == yourls_sanitize_ip( $ip ), $is_ip );
    }

    /**
     * Some strings that look like m(m)/d(d)/yyyy dates and a boolean showing if they should pass or not
     */
    function random_dates() {
        return array(
            array( '1/1/2345' , true ),
            array( '12/2/2345', true ),
            array( '9/10/2345', true ),
            array( '90/99', false ),
            array( '90/99/123', false ),
        );
    }

    /**
     * Sanitize dates
     *
     * @dataProvider random_dates
     * @since 0.1
     */
    function test_sanitize_date( $date, $is_date ) {
        if( !$is_date ) {
            $this->assertFalse( yourls_sanitize_date( $date ) );
        } else {
            $this->assertSame( $date, yourls_sanitize_date( $date ) );
        }
    }

    /**
     * Sanitize dates for SQL search
     *
     * @dataProvider random_dates
     * @since 0.1
     */
    function test_sanitize_date_sql( $date, $is_date ) {
        if( !$is_date ) {
            $this->assertFalse( yourls_sanitize_date_for_sql( $date ) );
        } else {
            $this->assertNotFalse( DateTime::createFromFormat('Y-m-d', yourls_sanitize_date_for_sql( $date ) ) );
        }
    }

    /**
     * Some strings that look like filenames how they should be sanitized
     */
    function random_filenames() {
        return array(
            array( '/home/ozh/plugin.php' , '/home/ozh/plugin.php' ),
            array( '\home\ozh\plugin.php' , '/home/ozh/plugin.php' ),
            array( '\\home\\ozh\\plugin.php' , '/home/ozh/plugin.php' ),
            array( '//home/ozh/plugin.php' , '/home/ozh/plugin.php' ),
        );
    }

    /**
     * Sanitize filenames
     *
     * @dataProvider random_filenames
     * @since 0.1
     */
    function test_sanitize_filename( $filename, $expected ) {
        $this->assertSame( $expected, yourls_sanitize_filename( $filename ) );
    }

    /**
     * Some strings that look like versions (1.2.3-alpha) how they should be sanitized
     */
    function random_versions() {
        return array(
            array('1.2.3',                    '1.2.3'),
            array('1.2.3.4',                  '1.2.3.4'),
            array('1.2.3-leet',               '1.2.3'),
            array('1.0-RC1-Almost-Final',     '1.0'),
            array('beta-4',                   ''),
            array('4.something',              ''),
            array('4-final',                  ''),
            array('1-2-3',                    ''),
            array('omgmysql-5.5-ubuntu-4.20', '5.5'),
            array('mysql5.5-ubuntu-4.20',     '5.5'),
            array('5.5-ubuntu-4.20',          '5.5'),
            array('5.5-beta2',                '5.5'),
            array('5.5.beta2',                '5.5'),
            array('5.5',                      '5.5'),
            array('5.5.',                     '5.5'),
            array('5',                        ''),
            array('5.',                       ''),
            array('100.1',                    '100.1'),
            array('mysql-10.10-beta',         '10.10'),
        );
    }

    /**
     * Sanitize versions
     *
     * @dataProvider random_versions
     * @since 0.1
     */
    function test_sanitize_version( $version, $expected ) {
        $this->assertSame( $expected, yourls_sanitize_version( $version ) );
    }
    
    /**
     * Some random keywords to sanitize
     */
    public function keywords_to_sanitize() {
        return array(
            array( 'hello-world', 'helloworld' ),
            array( '1337ozhOZH', '1337ozhOZH' ),
            array( 'yeah@#!?*', 'yeah' ),
            array( 'Motörhead', 'Motrhead' ),
        );
    }

	/**
	 * Checking that string2htmlid is an alphanumeric string
	 *
     * @dataProvider keywords_to_sanitize
	 * @since 0.1
	 */
    public function test_sanitize_string( $string, $expected ) {
        $this->assertSame( $expected, yourls_sanitize_string( $string ) );
        $this->assertSame( $expected, yourls_sanitize_keyword( $string ) );
    }

}
