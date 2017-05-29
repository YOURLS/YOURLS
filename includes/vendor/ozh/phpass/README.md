Openwall Phpass, modernized
===========================

[![Build Status](https://secure.travis-ci.org/ozh/phpass.png?branch=master)](http://travis-ci.org/ozh/phpass)

This is Openwall's [Phpass](http://openwall.com/phpass/), based on the 0.3 release, but modernized slightly:

- Namespaced
- Composer support (Autoloading)
- PHP 5 style
- Unit Tested

The modernization has been done by Hautelook, from whom I stole this library to repackage it for PHP 5.3 to 7.1 compatibility in a single file and branch (Hautelook's port consisting of two branches, one for PHP 5.3 to 5.5, and another one for 5.6+)

## Installation ##

Add this requirement to your `composer.json` file and run `composer.phar install`:

    {
        "require": {
            "ozh/phpass": "1.2.0"
        }
    }

## Usage ##

The following example shows how to hash a password (to then store the hash in the database), and how to check whether a provided password is correct (hashes to the same value):

``` php
<?php

namespace Your\Namespace;

use Ozh\Phpass\PasswordHash;

require_once(__DIR__ . "/vendor/autoload.php");

$passwordHasher = new PasswordHash(8,false);

$password = $passwordHasher->HashPassword('secret');
var_dump($password);

$passwordMatch = $passwordHasher->CheckPassword('secret', "$2a$08$0RK6Yw6j9kSIXrrEOc3dwuDPQuT78HgR0S3/ghOFDEpOGpOkARoSu");
var_dump($passwordMatch);

