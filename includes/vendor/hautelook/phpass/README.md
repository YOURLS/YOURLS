Openwall Phpass, modernized
===========================

[![Build Status](https://secure.travis-ci.org/hautelook/phpass.png?branch=master)](http://travis-ci.org/hautelook/phpass)

This is Openwall's [Phpass](http://openwall.com/phpass/), based on the 0.3 release, but modernized slightly:

- Namespaced
- Composer support (Autoloading)
- PHP 5 style
- Unit Tested

The changes are minimal and only stylistic. The source code is in the public domain. We claim no ownership, but needed it for one of our projects, and wanted to make it available to other people as well. 

## Installation ##

Add this requirement to your `composer.json` file and run `composer.phar install`:

    {
        "require": {
            "hautelook/phpass": "dev-master"
        }
    }

## Usage ##

The following example shows how to hash a password (to then store the hash in the database), and how to check whether a provided password is correct (hashes to the same value):  

``` php
<?php

namespace Your\Namespace;

use Hautelook\Phpass\PasswordHash;

require_once(__DIR__ . "/vendor/autoload.php");
 
$passwordHasher = new PasswordHash(8,false);
 
$password = $passwordHasher->HashPassword('secret');
var_dump($password);
 
$passwordMatch = $passwordHasher->CheckPassword('secret', "$2a$08$0RK6Yw6j9kSIXrrEOc3dwuDPQuT78HgR0S3/ghOFDEpOGpOkARoSu");
var_dump($passwordMatch);

