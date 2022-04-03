<?php
/**
 * Plugin Name: Invalid Test Plugin
 * Plugin URI: https://github.com/YOURLS/YOURLS
 * Description: This plugin should fail
 * Version: 1.0
 * Author: Ozh
 * Author URI: https://ozh.org/
 */

// This plugin does nothing. Its role is to be loaded by the unit tests and
// see if the sandbox is able to NOT load it.

function do_something($param) {
    return $param;
}

do_something(); // missing mandatory parameter

