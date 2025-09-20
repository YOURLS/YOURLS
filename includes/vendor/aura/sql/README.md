# Aura.Sql

Provides an extension to the native [PDO](http://php.net/PDO) along with a
profiler and connection locator. Because _ExtendedPdo_ is an extension of the
native _PDO_, code already using the native _PDO_ or typehinted to the native
_PDO_ can use _ExtendedPdo_ without any changes.

Added functionality in _Aura.Sql_ over the native _PDO_ includes:

- **Lazy connection.** _ExtendedPdo_ connects to the database only on
  method calls that require a connection. This means you can create an
  instance and not incur the cost of a connection if you never make a query.

- **Decoration.** _DecoratedPdo_ can be used to decorate an existing PDO
  instance. This means that a PDO instance can be "extended" **at runtime** to
  provide the _ExtendedPdo_ behaviors.

- **Array quoting.** The `quote()` method will accept an array as input, and
  return a string of comma-separated quoted values.

- **New `perform()` method.** The `perform()` method acts just like `query()`,
  but binds values to a prepared statement as part of the call.  In addition,
  placeholders that represent array values will be replaced with comma-
  separated quoted values. This means you can bind an  array of values to a
  placeholder used with an `IN (...)`  condition when using `perform()`.

- **New `fetch*()` methods.** The new `fetch*()` methods provide for
  commonly-used fetch actions. For example, you can call `fetchAll()` directly
  on the instance instead of having to prepare a statement, bind values,
  execute, and then fetch from the prepared statement. All of the `fetch*()`
  methods take an array of values to bind to to the query statement, and use
  the new `perform()` method internally.

- **New `yield*()` methods.** These are complements to the `fetch*()` methods
  that `yield` results instead of `return`ing them.

- **Exceptions by default.** _ExtendedPdo_ starts in the `ERRMODE_EXCEPTION`
  mode for error reporting instead of the `ERRMODE_SILENT` mode.

- **Profiler.** An optional query profiler is provided, along with an
  interface for other implementations, that logs to any PSR-3 interface.

- **Connection locator.** A optional lazy-loading service locator is provided
  for picking different database connections (default, read, and write).


## Installation and Autoloading

This package is installable and PSR-4 autoloadable via Composer as
[aura/sql][].

Alternatively, [download a release][], or clone this repository, then map the
`Aura\Sql\` namespace to the package `src/` directory.

## Dependencies

This package requires PHP 8.1 or later; it has also been tested on PHP 8.1-8.2.
We recommend using the latest available version of PHP as a matter of
principle.

Aura library packages may sometimes depend on external interfaces, but never on
external implementations. This allows compliance with community standards
without compromising flexibility. For specifics, please examine the package
[composer.json][] file.

## Quality

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/auraphp/Aura.Sql/badges/quality-score.png?b=5.x)](https://scrutinizer-ci.com/g/auraphp/Aura.Sql/)
[![Code Coverage](https://scrutinizer-ci.com/g/auraphp/Aura.Sql/badges/coverage.png?b=5.x)](https://scrutinizer-ci.com/g/auraphp/Aura.Sql/)
[![Build Status](https://github.com/auraphp/Aura.Sql/actions/workflows/continuous-integration.yml/badge.svg?branch=5.x)](https://github.com/auraphp/Aura.Sql/actions/workflows/continuous-integration.yml)
[![PDS Skeleton](https://img.shields.io/badge/pds-skeleton-blue.svg?style=flat-square)](https://github.com/php-pds/skeleton)

This project adheres to [Semantic Versioning](http://semver.org/).

To run the unit tests at the command line, issue `composer install` and then
`./vendor/bin/phpunit` at the package root. (This requires [Composer][] to be
available as `composer`.)

This package attempts to comply with [PSR-1][], [PSR-2][], and [PSR-4][]. If
you notice compliance oversights, please send a patch via pull request.

## Community

To ask questions, provide feedback, or otherwise communicate with other Aura
users, please join our [Google Group][], follow [@auraphp][], or chat with us
on Freenode in the #auraphp channel.

## Documentation

This package is fully documented [here](./docs/index.md).

[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md
[Composer]: http://getcomposer.org/
[Google Group]: http://groups.google.com/group/auraphp
[@auraphp]: http://twitter.com/auraphp
[download a release]: https://github.com/auraphp/Aura.Sql/releases
[aura/sql]: https://packagist.org/packages/aura/sql
[composer.json]: ./composer.json
