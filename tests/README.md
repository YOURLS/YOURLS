Unit Tests for [YOURLS](https://github.com/YOURLS/YOURLS/) [![Build Status](https://api.travis-ci.org/YOURLS/YOURLS-unit-tests.png?branch=master)](https://travis-ci.org/YOURLS/YOURLS) 
=================


About
-----

This is the unit test suite for YOURLS : a collection of hundreds of tests to make sure that whenever something in YOURLS is added, changed or removed, everything still works under all the supported PHP versions.

Tests
-----------
If you want to run tests locally:

0. Install PHPUnit
1. Create an empty MySQL database and user. **Do not use an exisiting database** or you will lose data, guaranteed.  
3. Copy `<YOURLS_ROOT>tests/data/config/yourls-tests-config-sample.php` to `<YOURLS_ROOT>/tests/yourls-tests-config.php` and edit it to match your setup.  
4. In YOURLS root directory, you can now run the shell command:
```bash
$ phpunit
```

Hopefully you should see something like the following appear:

```
YOURLS installed, starting PHPUnit

PHPUnit 7.5.20 by Sebastian Bergmann and contributors.

Runtime:       PHP 7.4.3
Configuration: D:\home\planetozh\ozh.in\phpunit.xml.dist

...............................................................  63 / 519 ( 12%)
............................................................... 126 / 519 ( 24%)
............................................................... 189 / 519 ( 36%)
............................................................... 252 / 519 ( 48%)
............................................................... 315 / 519 ( 60%)
............................................................... 378 / 519 ( 72%)
............................................................... 441 / 519 ( 84%)
............................................................... 504 / 519 ( 97%)
...............                                                 519 / 519 (100%)

Time: 6.06 seconds, Memory: 24.25Mb

OK (519 tests, 1123 assertions)
```

You can elect to run only selected groups of tests, eg:

```bash
$ phpunit --group formatting
```

See each `@group` directive in selected tests.

PHPUnit supports both `phpunit.xml` and `phpunit.xml.dist`, where `phpunit.xml` has higher priority:
if you want to specify your own settings, copy `phpunit.xml.dist` to `phpunit.xml` and edit that file.
