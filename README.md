Unit Tests for [YOURLS](https://github.com/YOURLS/YOURLS/) [![Build Status](https://api.travis-ci.org/YOURLS/YOURLS-unit-tests.png?branch=master)](https://travis-ci.org/YOURLS/YOURLS-unit-tests) 
=================


About
-----

This is the unit test suite for YOURLS : a collection of hundreds of tests to make sure that whenever something in YOURLS is added, changed or removed, everything still works under all the supported PHP versions.

Tests
-----------
If you want to run tests locally:

0. Install PHPUnit (which is as simple as writing a composer command, or downloading a .phar archive)
1. Copy your existent YOURLS version into a **new** `YOURLS/` subdirectory, **or** clone the YOURLS repository:  
```bash
$ git clone https://github.com/YOURLS/YOURLS.git
```
2. Create an empty MySQL database and user. **Do not use an exisiting database** or you will lose data, guaranteed.  
3. Copy `yourls-tests-config-sample.php` to `yourls-tests-config.php`, edit it and include your database name, user and password.  
4. In that same directory, run the tests:
```bash
$ phpunit
```

Hopefully you should see something like the following appear:

```
PHPUnit 5.3.0 by Sebastian Bergmann and contributors.

Configuration read from /home/your/test/dir/tests/phpunit-travis.xml.dist

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

Notes
-----
* When run locally (as opposed to when in the [Travis-CI environment](https://travis-ci.org/YOURLS/YOURLS)) the
test script will start by dropping all tables in the selected database. Again, **do not use an existing database**.

* Test cases live in the `tests/` subdirectory. All files in that directory will be included by default.  
PHPUnit will initialize and install a complete running copy of YOURLS each time it is run.

* PHPUnit supports both `phpunit.xml` and `phpunit.xml.dist`, where `phpunit.xml` has higher priority:
if you want to specify your own settings, copy `phpunit.xml.dist` to `phpunit.xml` and edit that file.
