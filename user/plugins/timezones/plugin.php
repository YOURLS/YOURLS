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

 	// Get value from database
 	$time_zone = yourls_get_option( 'time_zone' );

 	// Create nonce
 	$nonce = yourls_create_nonce( 'time_zone_config' );

  // Get all available time zones
  $available_time_zones = DateTimeZone::listIdentifiers(DateTimeZone::ALL);

  ?>

  <h2>Time Zone Configuration</h2>
  <p>This plugin enables the configuration of which time zone to use when displaying dates and time.</p>
  <form method="post">
    <input type="hidden" name="nonce" value="<?php echo $nonce ?>" />
    <p><label for="time_zone">Time zone: </label>
    <select name="time_zone" id="time_zone">
      <?php
        if (!in_array($time_zone, $available_time_zones)){ ?>
          <option selected="selected">Choose a time zone</option>
        <?php } ?>
      <?php
        foreach($available_time_zones as $available_time_zone) { ?>
          <option value="<?php echo $available_time_zone ?>" <?php if ($available_time_zone == $time_zone) echo 'selected'; ?>  ><?php echo $available_time_zone ?></option>
      <?php
        } ?>
    </select>
    <p><input type="submit" value="Update time zone" /></p>
  </form>

<?php
 }


 // Update time zone in database
 function contributors_yourls_time_zone_config_update_timezone() {
 	$in = $_POST['time_zone'];

 	if( $in ) {
    // Validate input on being a string
 		$in = strval( $in);

 		// Update value in database
 		yourls_update_option( 'time_zone', $in );
 	}
 }
