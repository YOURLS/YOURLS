# Unit Tests for [YOURLS](https://github.com/YOURLS/YOURLS/)

## About

This is the unit test suite for YOURLS: a collection of hundreds of tests to make sure that whenever something in YOURLS
is added, changed or removed, everything still works under all the supported PHP versions.

## Getting Started

1. Start the development environment:
   ```bash
   docker compose up -d
   ```
2. Connect to the web container:
   ```bash
   docker compose exec web bash
   ```
3. Install PHPUnit:
   ```bash
   composer -d tests/ install
   ```
4. Run the tests:
   ```bash
   composer test
   ```


### Running specific tests

You can filter by group or test name:

```bash
composer test -- --group formatting
composer test -- --filter test_hash_passwords_now
```

PHPUnit supports both `phpunit.xml` and `phpunit.xml.dist`, where `phpunit.xml` has higher priority:
if you want to specify your own settings, copy `phpunit.xml.dist` to `phpunit.xml` and edit that file.
