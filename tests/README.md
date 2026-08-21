# Unit Tests for [YOURLS](https://github.com/YOURLS/YOURLS/)

## About

This is the unit test suite for YOURLS: a collection of hundreds of tests to make sure that whenever something in YOURLS is added, changed or removed, everything still works under all the supported PHP versions.

## Getting Started

If you want to run tests locally:

0. Install PHPUnit.
   ```bash
   composer -d tests/ install
   ```
1. Create an empty MySQL database and user. **Do not use an exisiting database** or you will lose data, guaranteed.
3. Copy `<YOURLS_ROOT>tests/data/config/yourls-tests-config-sample.php` to `<YOURLS_ROOT>/tests/yourls-tests-config.php` and edit it to match your setup.
   ```bash
   cp tests/data/config/yourls-tests-config-sample.php tests/yourls-tests-config.php
   ```
4. In YOURLS root directory, you can now run the shell command:
   ```bash
   composer -d tests/ run test -- --configuration=../phpunit.xml.dist ..
   ```

Hopefully you should see something like the following appear:

```
YOURLS installed, starting PHPUnit

PHPUnit by Sebastian Bergmann and contributors.

Configuration: ...\phpunit.xml.dist

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

PHPUnit supports both `phpunit.xml` and `phpunit.xml.dist`, where `phpunit.xml` has higher priority:
if you want to specify your own settings, copy `phpunit.xml.dist` to `phpunit.xml` and edit that file.

## Testing in a new process

Some things can only happen once per PHP process: a constant being defined, a file
being loaded with `require_once`. Asserting on them from within the test suite only
tells you what an earlier test happened to trigger first. For those, run a *scenario*
in a fresh process:

```php
class SomeTest extends PHPUnit\Framework\TestCase {
    use NewProcessTrait;

    public function test_something() {
        $report = $this->run_in_new_process( 'some-scenario', array( 'YOURLS_SOMETHING' => false ) );

        $this->assertArrayNotHasKey( 'YOURLS_USER', $report['constants'] );
        $this->assertNotContains( 'includes/auth.php', $report['included'] );
    }
}

The trait (tests/includes/new-process.php) runs tests/data/scripts/run-scenario.php
in a new process, which:

1. defines the constants asked for, before anything else, so config and core see them
2. boots the same YOURLS as the test suite, via yut_boot_yourls() (tests/includes/boot.php)
3. runs tests/data/scripts/scenarios/some-scenario.php
4. reports back, as JSON, every defined YOURLS_* constant and every file loaded below
YOURLS_ABSPATH

Testing something else is a matter of dropping a new file in scenarios/: plain PHP,
run once YOURLS is booted, no assertions in it -- it only acts, the test asserts on the
report. Note that the database is expected to be already installed by the test suite.
