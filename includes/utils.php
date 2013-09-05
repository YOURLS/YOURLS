<?php

/**
 * Helper functions & classes for the YOURLS Unit Tests suite
 */

/**
 * Check if we are running locally (someone typed 'phpunit' in a shell) or in Travis. Return true if local.
 *
 * @since 0.1
 */
function yourls_tests_is_local() {
	return defined( 'LOCAL_TESTSUITE' ) && LOCAL_TESTSUITE == true;
}

/**
 * Destroy tables in selected DB if tests run locally
 *
 * If not running in Travis environment, this function will drop all tables in the selected DB
 *
 * @since 0.1
 */
function drop_all_tables_if_local() {
	if( !yourls_tests_is_local() )
		return;

	// If not running in Travis environment, drop any tables from the selected database prior to starting tests
	global $ydb;
	$sql = sprintf( "SELECT group_concat(table_name) FROM information_schema.tables WHERE table_schema = '%s';", YOURLS_DB_NAME );
	try {
		$tables = $ydb->get_var( $sql );
	} catch( Exception $e ) {
		return;
	}
	if( $tables ) {
		try {
			$drop = $ydb->get_var( sprintf( 'DROP TABLE %s', $tables ) );
		} catch( Exception $e ) {
			return;
		}
	}
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
		if( !yourls_tests_is_local() )
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
 
/**
 * Include or exclude specific files or directory for the Code Coverage
 *
 * The idea is to be able to dynamically include or exclude files, based on YOURLS_ABSPATH, which
 * we can't do in phpunit.xml.dist because everything is hardcoded there.
 * Usage:
 * YOURLS_Code_Coverage::addDirectoryToCodeCoverageWhitelist( YOURLS_INC );
 * YOURLS_Code_Coverage::ignoreDirectoryInStackTraces( YOURLS_INC . '/ezSQL' );
 * Source: http://stackoverflow.com/a/9026604/36850
 *
 * @since 0.1
 * @param string $var Stuff
 * @return string Result
 */
abstract class YOURLS_Code_Coverage extends PHPUnit_Framework_TestCase {
    private static $_codeCoverageFiles = array();

    public static function addDirectoryToCodeCoverageWhitelist($path) {
        self::addFilesToCodeCoverageWhitelist(self::getFilesForDirectory($path));
    }

    public static function addFileToCodeCoverageWhitelist($path) {
        self::addFilesToCodeCoverageWhitelist(array($path));
    }

    public static function addFilesToCodeCoverageWhitelist(array $paths) {
        self::$_codeCoverageFiles = array_merge(self::$_codeCoverageFiles, $paths);
    }

    public static function getFilesForDirectory($path) {
        $facade = new File_Iterator_Facade;
        return $facade->getFilesAsArray($path, '.php');
    }

    private static function setCodeCoverageWhitelist(PHP_CodeCoverage $coverage = null) {
        if ($coverage && self::$_codeCoverageFiles) {
            $coverage->setProcessUncoveredFilesFromWhitelist(true); // pick your poison
            $coverage->filter()->addFilesToWhitelist(self::$_codeCoverageFiles);
            self::$_codeCoverageFiles = array();
        }
    }

    public function runBare() {
        self::setCodeCoverageWhitelist($this->getTestResultObject()->getCodeCoverage());
        parent::runBare();
    }
	
    public static function ignoreDirectoryInStackTraces($path) {
        self::ignoreFilesInStackTraces(self::getFilesForDirectory($path));
    }

    public static function ignoreFileInStackTraces($path) {
        self::ignoreFilesInStackTraces(array($path));
    }

    public static function ignoreFilesInStackTraces($files) {
        static $reflector = null;
        if (!$reflector) {
            PHPUnit_Util_GlobalState::phpunitFiles();
            $reflector = new ReflectionProperty('PHPUnit_Util_GlobalState', 'phpunitFiles');
            $reflector->setAccessible(true);
        }
        $map = $reflector->getValue();
        foreach ($files as $file) {
            $map[$file] = $file;
        }
        $reflector->setValue($map);
    }
}

