<?php

/**
 * THIS FILE IS FOR BACKWARDS COMPATIBLITY ONLY
 *
 * If you were not already including this file in your project, please ignore it
 */

$file = __DIR__ . '/../../vendor/autoload.php';

if (!file_exists($file)) {
  $exception = 'This library must be installed via composer or by downloading the full package.';
  $exception .= ' See the instructions at https://github.com/google/google-api-php-client#installation.';
  throw new Exception($exception);
}

$error = 'google-api-php-client\'s autoloader was moved to vendor/autoload.php in 2.0.0. This ';
$error .= 'redirect will be removed in 2.1. Please adjust your code to use the new location.';
trigger_error($error, E_USER_DEPRECATED);

require_once $file;
