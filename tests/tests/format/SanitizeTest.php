<?php

/**
 * Sanitizing functions
 *
 * @since 0.1
 */
#[\PHPUnit\Framework\Attributes\Group('formatting')]
class SanitizeTest extends PHPUnit\Framework\TestCase {

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
        $this->assertSame( $fallback, yourls_sanitize_title( '', $fallback ) );
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
    static function random_ips(): \Iterator
    {
        yield array( '255.255.255.255', true );
        yield array( '127.1', true );
        yield array( '559.559.559', true );
        yield array( '::1', true );
        yield array( '127.0.0.omg', false );
        yield array( '1:1:omg', false );
        yield array( '#@~&', false );
    }

    /**
     * Sanitize IPs
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('random_ips')]
    function test_sanitize_ip( $ip, $is_ip ) {
        $this->assertSame( $ip == yourls_sanitize_ip( $ip ), $is_ip );
    }

    /**
     * Some strings that look like m(m)/d(d)/yyyy dates and a boolean showing if they should pass or not
     */
    static function random_dates(): \Iterator
    {
        yield array( '1/1/2345' , true );
        yield array( '12/2/2345', true );
        yield array( '9/10/2345', true );
        yield array( '90/99', false );
        yield array( '90/99/123', false );
    }

    /**
     * Sanitize dates
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('random_dates')]
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
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('random_dates')]
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
    static function random_filenames(): \Iterator
    {
        yield array( '/home/ozh/plugin.php' , '/home/ozh/plugin.php' );
        yield array( '\home\ozh\plugin.php' , '/home/ozh/plugin.php' );
        yield array( '\\home\\ozh\\plugin.php' , '/home/ozh/plugin.php' );
        yield array( '//home/ozh/plugin.php' , '/home/ozh/plugin.php' );
    }

    /**
     * Sanitize filenames
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('random_filenames')]
    function test_sanitize_filename( $filename, $expected ) {
        $this->assertSame( $expected, yourls_sanitize_filename( $filename ) );
    }

    /**
     * Some strings that look like versions (1.2.3-alpha) how they should be sanitized
     */
    static function random_versions(): \Iterator
    {
        yield array('1.2.3',                    '1.2.3');
        yield array('1.2.3.4',                  '1.2.3.4');
        yield array('1.2.3-leet',               '1.2.3');
        yield array('1.0-RC1-Almost-Final',     '1.0');
        yield array('beta-4',                   '');
        yield array('4.something',              '');
        yield array('4-final',                  '');
        yield array('1-2-3',                    '');
        yield array('omgmysql-5.5-ubuntu-4.20', '5.5');
        yield array('mysql5.5-ubuntu-4.20',     '5.5');
        yield array('5.5-ubuntu-4.20',          '5.5');
        yield array('5.5-beta2',                '5.5');
        yield array('5.5.beta2',                '5.5');
        yield array('5.5',                      '5.5');
        yield array('5.5.',                     '5.5');
        yield array('5',                        '');
        yield array('5.',                       '');
        yield array('100.1',                    '100.1');
        yield array('mysql-10.10-beta',         '10.10');
    }

    /**
     * Sanitize versions
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('random_versions')]
    function test_sanitize_version( $version, $expected ) {
        $this->assertSame( $expected, yourls_sanitize_version( $version ) );
    }

    /**
     * Some random keywords to sanitize
     */
    public static function keywords_to_sanitize(): \Iterator
    {
        yield array( 'hello-world', 'helloworld' );
        yield array( '1337ozhOZH', '1337ozhOZH' );
        yield array( 'yeah@#!?*', 'yeah' );
        yield array( 'Motörhead', 'Motrhead' );
    }

	/**
     * Checking that keyword are correctly sanitized
     *
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('keywords_to_sanitize')]
    public function test_sanitize_keywords( $keyword, $expected ) {
        // the "soft" way: assume keyword can be anything we have in a URL (here, should remain unchanged)
        $this->assertSame( $keyword, yourls_sanitize_keyword( $keyword ) );

        // the "hard" way: keyword must comply to acceptable short URL charset
        $this->assertSame( $expected, yourls_sanitize_keyword( $keyword, true ) );
    }

}
