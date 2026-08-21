<?php

/**
 * Helper to run YOURLS in a fresh PHP process from within a test.
 *
 * Use this when what's being tested can only happen once per process: a constant being defined
 * (or not), a file being loaded with require_once, a bootstrap step behaving differently
 * depending on a config constant.
 *
 * The scenario is a file in tests/data/scripts/scenarios/, run once YOURLS is fully booted with
 * the given constants defined beforehand. See tests/data/scripts/run-scenario.php.
 */
trait NewProcessTrait {

    /**
     * Boot YOURLS in a new PHP process, run a scenario, and return its report
     *
     * @param string $scenario   Scenario name, ie file scenarios/<name>.php
     * @param array  $constants  Constants to define before YOURLS boots, as $name => $value
     * @return array             Report with keys 'scenario', 'constants' (defined YOURLS_* constants,
     *                           as $name => $value) and 'included' (files loaded, relative to YOURLS_ABSPATH)
     */
    protected function run_in_new_process( $scenario, $constants = array() ) {
        if( !defined( 'YOURLS_PHP_BIN' ) ) {
            $this->markTestSkipped( 'No PHP binary defined -- cannot run YOURLS in a new process' );
        }

        $cmd = sprintf( '%s %s %s %s',
            YOURLS_PHP_BIN,
            escapeshellarg( YOURLS_TESTDATA_DIR . '/scripts/run-scenario.php' ),
            escapeshellarg( $scenario ),
            escapeshellarg( json_encode( $constants ) )
        );

        exec( $cmd, $output, $return );
        $output = implode( "\n", $output );

        $this->assertSame( 0, $return, sprintf( "Scenario '%s' failed: %s\n%s", $scenario, $cmd, $output ) );

        // The report is the last line: anything a scenario echoes before it is left alone
        $report = json_decode( substr( strrchr( "\n" . $output, "\n" ), 1 ), true );

        $this->assertIsArray( $report, sprintf( "Unexpected output for scenario '%s':\n%s", $scenario, $output ) );

        return $report;
    }

}
