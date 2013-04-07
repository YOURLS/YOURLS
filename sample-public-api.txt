<?php

/* 
 * This file shows how to implement a public API (no login or username needed) for your setup
 * even if your install is private (no public access to admin area)
 *
 * Rename this file like "api.php" and put it in the same directory as yourls-api.php
 *
 */

define('YOURLS_PRIVATE', false);

require_once( dirname(__FILE__).'/yourls-api.php' );