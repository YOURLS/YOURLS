<?php
/*
Plugin Name: Timezones
Plugin URI: https://yourls.org/
Description: Tell YOURLS what timezone you are in
Version: 1.0
Author: YOURLS contributors
Author URI: https://yourls.org/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/* TODO
 *
 * - register a plugin page
 *      - on this page, display :
 *          - dropdown to select timezone
 *          - maybe something to let the user choose how they want to display dates (in /admin and on stat pages)
 *      - save that into options :
 *          - timezone
 *          - time_format
 *
 * - register filters for core functions to hook in
 *
 * - add some explanation that if people activate this plugin and have YOURLS_HOURS_OFFSET defined,
 *   YOURLS_HOURS_OFFSET will be ignored
 *
 * - what else ?
 */
