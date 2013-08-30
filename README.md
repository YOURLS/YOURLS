YOURLS Unit Tests
=================

About
-----
*v0.0.2* - do not use.  
Things may not even look remotely like this when this gets somewhere.  
If that gets somewhere.  

Tests
-----------
If you think you know what you and I are doing:

1. Copy your existent YOURLS version into a new `YOURLS/` subdirectory **or** clone the YOURLS repository:  
```bash
$ git clone https://github.com/YOURLS/YOURLS.git
```

2. Create a clean MySQL database and user. **Do not use an exisiting database** or you will lose data, guaranteed.  
3. Copy `yourls-tests-config-sample.php` to `yourls-tests-config.php`, edit it and include your database name, user and password.  
4. In that same directory, run the tests:
```bash
$ phpunit
```

Notes
-----
Test cases live in the `tests/` subdirectory. All files in that directory will be included by default.  
PHPUnit will initialize and install a (more or less) complete running copy of YOURLS each time it is run. This makes it possible to run functional interface and module tests against a fully working database and codebase, as opposed to pure unit tests with mock objects and stubs. Pure unit tests may be used also, of course.
