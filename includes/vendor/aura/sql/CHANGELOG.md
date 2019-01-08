# CHANGELOG

## 2.6.0

This release adds two new off-interface methods to `ConnectionLocator`:

- `setProfiling()` to activate profiling across all connections

- `getProfiles()` to get the profiles from all connections


## 2.5.3

- `ExtendedPdo::bindValue()` method now binds `PDO::PARAM_BOOL` values as string '0' and string '1'; this addresses a not-a-bug-but-still-surprising behavior in PDO; cf. <https://bugs.php.net/bug.php?id=49255>.

- Other hygiene fixes to docs, docblocks, etc.

## 2.5.2

- Fix #111 : Binding variables conflicts with some Postgres SQL queries

- Added phpunit to composer.json

- Fix #166 : PHPStorm exception handling check

## 2.5.1

Hygiene release: update documentation and testing.

## 2.5.0

This release adds new `yield*()` methods to _ExtendedPdo_; these return iterators to generate one result row at a time, which can reduce memory usage with very large result sets.

## 2.4.3

This release modifies the testing structure and updates other support files.

## 2.4.2

This is a hygiene release to update support files.

## 2.4.1

- FIX: #96: Allow first bind value of query with numbered placeholders to be null.

## 2.4.0

The previous release changed the ExtendedPdoInterface by adding a new `disconnect()` method. That was an unintentional BC break to existing implementations of the interface. This release corrects that break by removing the `disconnect()` method from the interface, while leaving it in the implementation.

## 2.3.0

- ADD: ExtendedPdo::disconnect() method to close connections explicitly. This does not work for injected PDO connection objects, which should be managed from their creation point, not as part of ExtendedPdo. Thanks to both Jacob Emerick and Jacques Woodcock for their initial implementations.

- CHG: ExtendedPdo::bindValue() now throws Exception\CannotBindValue when it encounters a non-bindable value. This helps with debugging values that make their way down to the PDO layer, which PDO cannot bind.

## 2.2.1

- CHG: ExtendedPdo::prepare() now profiles the query-preparation time

## 2.2.0

- SEC: ExtendedPdo no longer enables self::ATTR_EMULATE_PREPARES by default; this is to avoid security holes when using emulation.

- REF: Extract the statement-rebuilding logic to its own Rebuilder class

- ADD: ExtendedPdo::fetchGroup() functionality.

- ADD: When binding values via perform(), add the self::PARAM_* type based on the value being bound.

- TST: Update testing structure

## 2.1.0

- NEW: Method Profiler::resetProfiles() allows you to clear existing profiles.

- FIX: Correctly handles zero-indexed placeholder arrays on execute.

- FIX: Passes all tests on HHVM.

- REF: Added Scrutinizer-CI checks, along with code modifications to improve Scrutinizer score without changing functionality.

- DOC: Updates to the README and various docblocks.

## 2.0.1

Release 2.0.1 includes a fix that moves PDO parameters explicitly back into the
constructor. This restores named parameter matching for DI containers.

## 2.0.0

First stable release of Aura.Sql 2.0.0

Version 2 of Aura.Sql is greatly reduced from version 1, providing only an
ExtendedPDO class, a query profiler, and a connection locator. No query
objects, data mappers, or schema discovery objects are included; these are
available in separate Aura.Sql_* packages. This keeps the package tightly
focused as an extension for PDO, rather than a more general SQL toolset.

This is a breaking change from the beta. Previously, the ExtendedPdo object itself would retain values to bind against the next query. After discussion with interested parties, notably Rasmus Schultz, I was convinced that it was too much of a departure from normal PDO semantics.

Thus, the collection of values for binding has been removed. The methods query(), exec(), and prepare() no longer take bound values directly. Instead,we have a new method perform() that acts like query() but takes an array of values to bind at query time. We also have a new method prepareWithValues() that prepares a statement and binds values at that time. Finally, the new method fetchAffected() acts like exec(), but with bind values passed at the time of calling (just like with the other fetch*() methods).

In addition, you can now pass an existing PDO connection to ExtendedPdo so decorate that existing PDO instance with the ExtendedPdo behaviors.

Thanks to ralouphie, koriym, jblotus, and stof for their fixes and improvements in this release. Thanks also to Stan Lemon for the new proxy/decorator behavior, Rasmus Schultz for his semantic insights, and (as always) to Hari KT for his continued attention to detail.

The full list of changes follows.

- [BRK] Remove methods bindValue(), bindValues(), and getBindValues()

- [BRK] query(), exec(), and prepare() no longer bind values; perform() and prepareWithValues() do

- [FIX] setAttribute() needs to return a bool; thanks @mindplay-dk

- [FIX] PDO::quote() now converts NULL to ''; this fix honors the normal PDO behavior.

- [FIX] Method rollBack() now returns a boolean result

- [ADD] Extract PdoInterface from ExtendedPdoInterface

- [ADD] Add fetchObject*() to ExtendedPdoInterface

- [ADD] Add methods perform() and prepareWithValues() to bind values as part of the call

- [ADD] Add method fetchAffected() as an exec()-with-values replacement

- [CHG] Constructor is now polymorphic; inject an existing PDO instance to be decorated, or pass PDO params

- [ADD] Add method getPdo() to return the proxied/decorated instance


## 2.0.0-beta1

- Initial release of 2.0.0-beta1.

Version 2 of Aura.Sql is greatly reduced from version 1, providing only an
ExtendedPDO class, a query profiler, and a connection locator. No query
objects, data mappers, or schema discovery objects are included; these are
available in separate Aura.Sql_* packages. This keeps the package tightly
focused as an extension for PDO, rather than a more general SQL toolset.

## 1.3.1

Hygiene release.

- Fix UnitOfWork test for PHP 5.5

- Merge pull request #58 from MAXakaWIZARD/pr-select-query-reset-fix, fixes $from_key count when resetting select statement.

- Merge pull request #56 from MAXakaWIZARD/pr-correct-join-order, implements correct join order for Query\Select

- Keep a running count of FROM keys in Select, instead of counting each time

- Remove commented-out code and update docblocks

## 1.3.0

- [NEW] Query\Sqlite\(Select|Insert|Update|Delete) classes to support
  SQLite-specific behaviors

- [NEW] Query\Pgsql\(Select|Insert|Update|Delete) classes to support
  PostgreSQL-specific behaviors

- [REF] Refactor existing limit/offset behaviors to Query\LimitTrait and Query\OffsetTrait

- [REF] Refactor existing order-by behaviors to Query\OrderByTrait

- [REF] Refactor query-string indenting and comma-separation behaviors to new
  methods

- [ADD] Methods on each db-specific connection object to return db-specific
  query objects; e.g., Connection\Mysql::newMysqlSelect(),
  Connection\Pgsql::newPgsqlInsert(), etc.

Many thanks to @MAXakaWIZARD for his work on the features in this release.

## 1.2.0

- [ADD] Profiler::getLastQuery() to get the last profiled query.

- [CHG] AbstractConnection::fetchAll(), fetchAssoc(), fetchCol(), and
  fetchPairs() all now take a third param: a callable to apply to each row in
  the results.

- [ADD] AbstractConnection::disconnect(), mostly to help with testing.

- [NEW] Query\Mysql classes to support MySQL-specific functionality:

    - [NEW] Query\Mysql\Select with SQL_CALC_FOUND_ROWS and other
      mysql-specific flags.

    - [NEW] Query\Mysql\Insert with IGNORE and other mysql-specific flags.

    - [NEW] Query\Mysql\Update with IGNORE and other mysql-specific flags,
      as well as LIMIT functionality.

    - [NEW] Query\Mysql\Delete with LOW_PRIORITY and other mysql-specific
      flags, as well as LIMIT functionality.

- [LIC] Update license copyright dates.

- [TST] Add PHP 5.5 to Travis build.

- [DOC] Update README.

## 1.1.0

- [ADD] AbstractConnection::setPdo() to inject a pre-existing PDO connection.
  Thanks, Stan Lemon, for the feature request.

- [ADD] Add missing properties AbstractConnection::$profiler and
  AbstractConnection::$query_factory.

- [CHG] Varios typo fixes by Pascal Borrelli and Henrique Moody.

- [CHG] Gateway registry entries *must* be wrapped in a callable from now on.

- [ADD] Method Column::__isset()

## 1.0.0

WARNING: This release has backwards compatiblity breaks.

Breaks
------

- [BRK] Rename "Adapter" to "Connection" throughout the package

- [BRK] Rename "sql" to "connection" throughout the package


Other Changes
-------------

- [ADD] Methods Query\AbstractQuery::setBind(), addBind(), and getBind() to
  allow bind data to be carried along with the query object.

- [ADD] Method Query\AbstractQuery::getConnection() to get the injected
  database connection.

- [NEW] Classes Gateway, GatewayIterator, and GatewayLocator (table data
  gateway implementation)

- [NEW] Class AbstractMapper (mapper implementation)

- [NEW] Class UnitOfWork (unit-of-work implemetation)

