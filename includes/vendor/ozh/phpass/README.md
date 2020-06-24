Openwall Phpass, modernized
===========================

[![Build Status](https://secure.travis-ci.org/ozh/phpass.png?branch=master)](http://travis-ci.org/ozh/phpass)

This is Openwall's [Phpass](http://openwall.com/phpass/), based on the 0.5 release, but modernized slightly:

- Namespaced
- Composer support (Autoloading)
- Unit Tested

The modernization has been done by Hautelook, from whom I stole this library to originally repackage it for PHP 5.3 to 7.0 compatibility in a single file and branch (Hautelook's port consisting of two branches, one for PHP 5.3 to 5.5, and another one for 5.6+).

Current version requires PHP 5.6+

## Installation ##

Add this requirement to your `composer.json` file and run `composer install`:

    {
        "require": {
            "ozh/phpass": "1.3.0"
        }
    }

## Usage ##

The following example shows how to hash a password (to then store the hash in the database), and how to check whether a provided password is correct (hashes to the same value):

``` php
<?php

namespace Your\Namespace;

use Ozh\Phpass\PasswordHash;

require_once(__DIR__ . "/vendor/autoload.php"); // or require_once('path/to/src/Ozh/Phpass/PasswordHash.php');

$passwordHasher = new PasswordHash(8,false);

// Encrypt
$password = $passwordHasher->HashPassword('secret');
var_dump($password);
    // Will output something like:
    // '$2a$08$a6XFLs8SrjClF1szoDDkI.6gtWVb4//QnzUjkxlus83AKCNjuD8Ha' (length=60)
    // '$2a$08$Qze1smZ//VAwHJ1t52zklOY/yLwlbKR6Ighf6B7uqGXdYVozTPEdG' (length=60)
    // '$2a$08$u2uKfE9igO.Cz0SptWxlXeVi0CQglfl3FdRK3YpbGm1NfF1d.CFPm' (length=60)

// Decrypt
var_dump( $passwordHasher->CheckPassword('secret', '$2a$08$0RK6Yw6j9kSIXrrEOc3dwuDPQuT78HgR0S3/ghOFDEpOGpOkARoSu') );
    // true
var_dump( $passwordHasher->CheckPassword('secret', '$2a$08$Qze1smZ//VAwHJ1t52zklOY/yLwlbKR6Ighf6B7uqGXdYVozTPEdG') );
    // true
var_dump( $passwordHasher->CheckPassword('secret', '$2a$08$u2uKfE9igO.Cz0SptWxlXeVi0CQglfl3FdRK3YpbGm1NfF1d.CFPm') );
    // true
