<?php
/*
Plugin Name: Time Zone Configuration
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

 // Register our plugin admin page
 yourls_add_action( 'plugins_loaded', 'contributors_yourls_time_zone_config' );
 function contributors_yourls_time_zone_config() {
   yourls_register_plugin_page( 'time_zone_config', 'Time Zone Configuration', 'contributors_yourls_time_zone_config_do_page' );
 	// parameters: page slug, page title, and function that will display the page itself
 }

 yourls_add_filter( 'get_timezoned_offset', 'contributors_yourls_time_zone_config_get_offset' );

 function contributors_yourls_time_zone_config_get_offset() {

   $time_zone = yourls_get_option( 'time_zone' );

   // If YOURLS_HOURS_OFFSET is not set and time_zone isn't set either
   if ( !is_string($time_zone) ) {
     return 0;
   }

   $datetimezone = new DateTimeZone($time_zone);

   // Compare current time zone time vs current GMT time to get the offset
   return $datetimezone->getOffset(new DateTime("now", new DateTimeZone("GMT"))) / 3600;

 }

 // Display time zone configuration page
 function contributors_yourls_time_zone_config_do_page() {

 	// Check if a form was submitted
 	if( isset( $_POST['time_zone'] ) ) {

 		// Check nonce
 		yourls_verify_nonce( 'time_zone_config' );

 		// Process form
 		contributors_yourls_time_zone_config_update_timezone();
 	}

 	// Get current time zone from database
 	$current_time_zone = yourls_get_option( 'time_zone' );

  // Get current date format from database
  $current_date_format = yourls_get_option( 'date_format' );

  // Get current time format from database
  $current_time_format = yourls_get_option( 'time_format' );

 	// Create nonce
 	$nonce = yourls_create_nonce( 'time_zone_config' );


  // Continent list
  $continent = array(
  'Africa'     => DateTimeZone::AFRICA,
  'America'    => DateTimeZone::AMERICA,
  'Antarctica' => DateTimeZone::ANTARCTICA,
  'Aisa'       => DateTimeZone::ASIA,
  'Atlantic'   => DateTimeZone::ATLANTIC,
  'Europe'     => DateTimeZone::EUROPE,
  'Indian'     => DateTimeZone::INDIAN,
  'Pacific'    => DateTimeZone::PACIFIC,
  );

  // Timezones per continents
  $timezones = array();
  foreach ($continent as $name => $mask) {
    $zones = DateTimeZone::listIdentifiers($mask);
    foreach($zones as $timezone) {
        // Remove region name and add a sample time
        $timezones[$name][$timezone] = substr($timezone, strlen($name) + 1);
    	}
  }

  // Manual UTC offset
  $offset_range = array(
      -12,     -11.5,    -11,     -10.5,    -10,     -9.5,     -9,
      -8.5,    -8,       -7.5,    -7,       -6.5,    -6,       -5.5,
      -5,      -4.5,     -4,      -3.5,     -3,      -2.5,     -2,
      -1.5,    -1,       -0.5,    0,        0.5,     1,        1.5,
      2,       2.5,      3,       3.5,      4,       4.5,      5,
      5.5,     5.75,     6,       6.5,      7,       7.5,      8,
      8.5,     8.75,     9,       9.5,      10,      10.5,     11,
      11.5,    12,       12.75,   13,       13.75,   14
  );

  foreach( $offset_range as $offset ) {
    if ( 0 <= $offset ) {
      $offset_name = '+' . $offset;
    }
    else {
      $offset_name = (string) $offset;
    }
    $offset_value = $offset_name;
    $offset_name  = str_replace( array( '.25', '.5', '.75' ), array( ':15', ':30', ':45' ), $offset_name );
    $offset_name  = 'UTC' . $offset_name;
    $offset_value = 'UTC' . $offset_value;
    $timezones['UTC'][$offset_value] = $offset_name;
  }

  // View
  print '<h2>Time Zone Configuration</h2>';
  print '<p>This plugin enables the configuration of which time zone to use when displaying dates and time.</p>';
  print '<form method="post">';
  print '<input type="hidden" name="nonce" value="' . $nonce . '" />';

  print '<label for="time_zone">Time zone: </label><br>';
  print '<select name="time_zone" id="time_zone">';
  print '<option name="">Choose a time zone</option>';

  foreach($timezones as $region => $list) {
    print '<optgroup label="' . $region . '">' . "\n";

    foreach($list as $timezone => $name) {

      print '<option value="' . $timezone . '" ' . (($timezone == $current_time_zone) ? "selected":"") . '>' . $name . '</option>' . "\n";
    }
    print '<optgroup>' . "\n";
  }
  print '</select>';

  print '<br><br><label>Date format:</label><br>';
  print '<input type="radio" name="date_format" value="j F Y"' . (($current_date_format== 'j F Y') ?  "checked" : "") . '>';
  print ' <label>13 April 2020</label><br>';
  print '<input type="radio" name="date_format" value="F j, Y"' . (($current_date_format== 'F j, Y') ?  "checked" : "") . '>';
  print ' <label>April 13, 2020</label><br>';
  print '<input type="radio" name="date_format" value="d/m/Y"' . (($current_date_format== 'd/m/Y') ?  "checked" : "") . '>';
  print ' <label>13/04/2020</label><br>';
  print '<input type="radio" name="date_format" value="m/d/Y"' . (($current_date_format== 'm/d/Y') ?  "checked" : "") . '>';
  print ' <label>04/13/2020</label><br>';
  print '<input type="radio" name="date_format" value="Y/m/d"' . (($current_date_format== 'Y/m/d') ?  "checked" : "") . '>';
  print ' <label>2020/04/13</label><br>';

  print '<br>';
  print '<label>Time format:</label><br>';
  print '<input type="radio" name="time_format" value="H:i"' . (($current_time_format== 'H:i') ?  "checked" : "") . '>';
  print ' <label>21:23</label><br>';
  print '<input type="radio" name="time_format" value="g:i a"' . (($current_time_format== 'g:i a') ?  "checked" : "") . '>';
  print ' <label>9:23 pm</label><br>';
  print '<input type="radio" name="time_format" value="g:i A"' . (($current_time_format== 'g:i A') ?  "checked" : "") . '>';
  print ' <label>9:23 PM</label><br>';

  print '<p><input type="submit" value="Update configuration" /></p>';
  print '</form>';

  }


 // Update time zone in database
 function contributors_yourls_time_zone_config_update_timezone() {
 	$in_time_zone = $_POST['time_zone'];
  $in_date_format = $_POST['date_format'];
  $in_time_format = $_POST['time_format'];

 	if( $in_time_zone ) {
    // Validate input on being a string
 		$in_time_zone = strval( $in_time_zone);

 		// Update value in database
 		yourls_update_option( 'time_zone', $in_time_zone );
 	}
  if( $in_date_format ) {
    // Validate input on being a string
    $in_date_format = strval( $in_date_format);

    // Update value in database
    yourls_update_option( 'date_format', $in_date_format );
  }
  if( $in_time_format ) {
    // Validate input on being a string
    $in_time_format = strval( $in_time_format);

    // Update value in database
    yourls_update_option( 'time_format', $in_time_format );
  }
 }
