<?php

/**
 * Helper functions & classes for the YOURLS Unit Tests suite
 */

/**
 * Return a random string (for option name, etc...)
 *
 * @since 0.1
 * @param string $len Optional string length
 * @return string Random string
 */
function rand_str( $len=32 ) {
	return substr( md5( uniqid( rand() ) ), 0, $len );
}

/**
 * Check if we are running locally (someone typed 'phpunit' in a shell) or in Travis. Return true if local.
 *
 * @since 0.1
 */
function yut_is_local() {
	return ! defined( 'YOURLS_TESTS_CI' ) || YOURLS_TESTS_CI === false;
}

/**
 * Dummy function to be called by hook function tests
 *
 * @since 0.1
 */
function change_one_global() {
    $var_name = $GLOBALS['test_var'];
    $GLOBALS[ $var_name ] = rand_str();
}

/**
 * Dummy function to be called by hook function tests
 *
 * @since 0.1
 */
function change_variable( $var ) {
    $var = rand_str();
    return $var;
}

/**
 * Dummy class & function to be called by hook function tests
 *
 * @since 0.1
 */
class Change_One_Global {
    static function change_it() {
        $var_name = $GLOBALS['test_var'];
        $GLOBALS[ $var_name ] = rand_str();
    }
}

/**
* Dummy class & function to be called by hook function tests
*
* @since 0.1
*/
class Change_Variable {
    static function change_it( $var ) {
        return rand_str();
    }
}

/**
* print() for Unit Tests
*/
function yourls_ut_print( ...$what ) {
    ob_start();
    $count = count($what);
    for ($i = 0; $i < $count; $i++) {
        print($what[$i]);
    }
    $display = ob_get_contents();
    ob_end_clean();

    fwrite( STDERR, $display );
}

/**
* var_dump() for Unit Tests
*
* @since 0.1
*/
function yourls_ut_var_dump( ...$what ) {
    ob_start();
    $count = count($what);
    for ($i = 0; $i < $count; $i++) {
        var_dump($what[$i]); $line_of_vardump = __LINE__; // lazy: keep track of where var_dump() is called
    }
    $display = ob_get_contents();
    ob_end_clean();

    // If we have xdebug enabled, remove first line of output of each var_dump() (ie `/path/to/tests/includes/utils.php:79:`)
    if( ini_get('xdebug.overload_var_dump') == 2 ) {
        $line = __FILE__ . ':' . $line_of_vardump . ":";
        $line = str_replace('\\', '\\\\', $line); // escape the backslashes on Windows paths otherwise they will break the regex
        $display = preg_replace("/$line\n/", '', $display);
    }

    fwrite( STDERR, $display );
}

/**
 * Log in a local text file, in case you need to var_dump() stuff within a test
 *
 * By design, you cannot var_dump() stuff during a unit test. A workaround is to export into a log file.
 * Usage : anywhere you would have used a regular var_dump() you can simply add:
 * Log_in_File::log( $something );
 *
 */
class Log_in_File {

	public static $has_logged = false;

	public static function log( $what ) {
		// Don't mess with Travis
		if( !yut_is_local() )
			return;

		if( ! self::$has_logged ) {
			self::$has_logged = true;
			self::start_log();
		}

		ob_start();
		var_dump( $what );
		$what = ob_get_clean();

		error_log( $what."\n", 3, dirname( dirname( __FILE__ ) ) . '/log.txt' );
	}

	public static function start_log() {
		self::log( "---------------- START TESTS ----------------" );
	}

}
