<?php
  /*
Plugin Name: 302 Instead
Plugin URI: https://github.com/EpicPilgrim/302-instead
Description: Send a 302 (temporary) redirect instead of 301 (permanent) for sites where shortlinks may change
Version: 1.2
Author: BrettR
Author URI: https://github.com/EpicPilgrim/302-instead
  */

yourls_add_action('pre_redirect','temp_instead_function');
function temp_instead_function($args) {
  $url  = $args[0];
  $code = $args[1];
  if ($code != 302) {
    // Redirect with 302 instead
    yourls_redirect($url,302);
  }
}
