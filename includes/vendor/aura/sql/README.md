# Aura.Sql

Provides an extension to the native [PDO](http://php.net/PDO) along with a
profiler and connection locator. Because _ExtendedPdo_ is an extension of the
native _PDO_, code already using the native _PDO_ or typehinted to the native
_PDO_ can use _ExtendedPdo_ without any changes.

Added functionality in _Aura.Sql_ over the native _PDO_ includes:

- **Lazy connection.** _ExtendedPdo_ connects to the database only on
  method calls that require a connection. This means you can create an
  instance and not incur the cost of a connection if you never make a query.

- **Decoration.** _ExtendedPdo_ can be used to decorate an existing PDO
  instance. This means that a PDO instance can be "extended" **at runtime** to
  provide the _ExtendedPdo_ behaviors. (Note that lazy connection is not
  possible in this case, as the PDO instance being decorated has already
  connected.)

- **Array quoting.** The `quote()` method will accept an array as input, and
  return a string of comma-separated quoted values.

- **New `perform()` method.** The `perform()` method acts just like `query()`,
  but binds values to a prepared statement as part of the call.  In addition, placeholders that represent array values will be replaced with comma-
  separated quoted values. This means you can bind an  array of values to a placeholder used with an `IN (...)`  condition when using `perform()`.

- **New `fetch*()` methods.** The new `fetch*()` methods provide for
  commonly-used fetch actions. For example, you can call `fetchAll()` directly
  on the instance instead of having to prepare a statement, bind values,
  execute, and then fetch from the prepared statement. All of the `fetch*()`
  methods take an array of values to bind to to the query statement, and use
  the new `perform()` method internally.

- **New `yield*()` methods.** The equivalent of various `fetch*()` methods, the
  `yield*()` methods return an iterator instead of a complete result set. Using
  the iterator to fetch one result at a time can help reduce memory usage with
  very large result sets.

- **Exceptions by default.** _ExtendedPdo_ starts in the `ERRMODE_EXCEPTION`
  mode for error reporting instead of the `ERRMODE_SILENT` mode.

- **Profiler.** An optional query profiler is provided, along with an
  interface for other implementations.

- **Connection locator.** A optional lazy-loading service locator is provided
  for picking different database connections (default, read, and write).


## Foreword

### Installation

This library requires PHP 5.3 or later; we recommend using the latest available version of PHP as a matter of principle. It has no userland dependencies.

It is installable and autoloadable via Composer as [aura/sql](https://packagist.org/packages/aura/sql).

Alternatively, [download a release](https://github.com/auraphp/Aura.Sql/releases) or clone this repository, then require or include its _autoload.php_ file.

### Quality

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/auraphp/Aura.Sql/badges/quality-score.png?b=2.x)](https://scrutinizer-ci.com/g/auraphp/Aura.Sql/)
[![Code Coverage](https://scrutinizer-ci.com/g/auraphp/Aura.Sql/badges/coverage.png?b=2.x)](https://scrutinizer-ci.com/g/auraphp/Aura.Sql/)
[![Build Status](https://travis-ci.org/auraphp/Aura.Sql.png?branch=2.x)](https://travis-ci.org/auraphp/Aura.Sql)

To run the [PHPUnit](http://phpunit.de/manual/) unit tests at the command line, issue `composer install` and then `vendor/bin/phpunit` at the package root. (This requires [Composer](http://getcomposer.org/) to be available as `composer`.)


This library attempts to comply with [PSR-1][], [PSR-2][], and [PSR-4][]. If
you notice compliance oversights, please send a patch via pull request.

[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md

### Community

To ask questions, provide feedback, or otherwise communicate with the Aura community, please join our [Google Group](http://groups.google.com/group/auraphp), follow [@auraphp on Twitter](http://twitter.com/auraphp), or chat with us on #auraphp on Freenode.

## Getting Started

### Instantiation

You can instantiate _ExtendedPdo_ so that it uses lazy connection, or you can use it to decorate an existing _PDO_ instance.

#### Lazy Connection Instance

Instantiation is the same as with the native _PDO_ class: pass a data source
name, username, password, and driver options. There is one additional
parameter that allows you to pass attributes to be set after the connection is
made.

```php
use Aura\Sql\ExtendedPdo;

$pdo = new ExtendedPdo(
    'mysql:host=localhost;dbname=test',
    'username',
    'password',
    array(), // driver options as key-value pairs
    array()  // attributes as key-value pairs
);
```

> N.b.: The `sqlsrv` extension will fail to connect when using error mode `PDO::ERRMODE_EXCEPTION`. To connect, you will need to explicitly pass `array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)` (or `PDO::ERRMODE_SILENT`) when using `sqlsrv`.

Whereas the native _PDO_ connects on instantiation, _ExtendedPdo_ does not connect immediately. Instead, it connects only when you call a method that actually needs the connection to the database; e.g., on `query()`.

If you want to force a connection, call the `connect()` method.

```php
// does not connect to the database
$pdo = new ExtendedPdo(
    'mysql:host=localhost;dbname=test',
    'username',
    'password'
);

// automatically connects
$pdo->exec('SELECT * FROM test');

// explicitly forces a connection
$pdo->connect();
```

If you want to explicitly force a disconnect, call the `disconnect()` method.

```php
// explicitly forces disconnection
$pdo->disconnect();
```

Doing so will close the connection by unsetting the internal _PDO_ instance. However, calling an _ExtendedPdo_ method that implicitly establishes a connection, such as `query()` or one of the `fetch*()` methods, will automatically re-connect to the database.

#### Decorator Instance

The _ExtendedPdo_ class can be used to decorate an existing PDO connection as well. To do so, instantiate _ExtendedPdo_ by passing an existing PDO connection:

```php
use Aura\Sql\ExtendedPdo;

$pdo = new PDO(...);
$extended_pdo = new ExtendedPdo($pdo);
```

The decorated _PDO_ instance now provides all the _ExtendedPdo_ functionality (aside from lazy connection, which is not possible since the _PDO_ instance by definition has already connected).

Decoration of this kind can be useful when you have access to an existing _PDO_ connection managed elsewhere in your application.

> N.b.: The `disconnect()` method **will not work** on decorated _PDO_ connections, since _ExtendedPdo_ did not create the connection itself. You will need to manage the decorated _PDO_ instance yourself in that case.

### Array Quoting

The native _PDO_ `quote()` method will not quote arrays. This makes it
difficult to bind an array to something like an `IN (...)` condition in SQL.
However, _ExtendedPdo_ recognizes arrays and converts them into comma-
separated quoted strings.

```php
// the array to be quoted
$array = array('foo', 'bar', 'baz');

// the native PDO way:
// "Warning:  PDO::quote() expects parameter 1 to be string, array given"
$pdo = new PDO(...);
$cond = 'IN (' . $pdo->quote($array) . ')';

// the ExtendedPdo way:
// "IN ('foo', 'bar', 'baz')"
$pdo = new ExtendedPdo(...);
$cond = 'IN (' . $pdo->quote($array) . ')';
```

### The `perform()` Method

The new `perform()` method will prepare a query with bound values in a single
step.  Also, because the native _PDO_ does not deal with bound array values,
`perform()` modifies the query string to replace array-bound placeholders with
the quoted array.  Note that this is *not* the same thing as binding:
the query string itself is modified before passing to the database for value
binding.

```php
// the array to be quoted
$array = array('foo', 'bar', 'baz');

// the statement to prepare
$stm = 'SELECT * FROM test WHERE foo IN (:foo)'

// the native PDO way does not work (PHP Notice:  Array to string conversion)
$pdo = new ExtendedPdo(...);
$sth = $pdo->prepare($stm);
$sth->bindValue('foo', $array);

// the ExtendedPdo way allows a single call to prepare and execute the query.
// it quotes the array and replaces the array placeholder directly in the
// query string
$pdo = new ExtendedPdo(...);
$bind_values = array('foo' => $array);
$sth = $pdo->perform($stm, $bind_values);
echo $sth->queryString;
// the query string has been modified by ExtendedPdo to become
// "SELECT * FROM test WHERE foo IN ('foo', 'bar', 'baz')"
```

Finally, note that array quoting works only via the `perform()` method,
not on returned _PDOStatement_ instances.


### New `fetch*()` Methods

_ExtendedPdo_ comes with `fetch*()` methods to help reduce boilerplate code.
Instead of issuing `prepare()`, a series of `bindValue()` calls, `execute()`,
and then `fetch*()` on a _PDOStatement_, you can bind values and fetch results
in one call on _ExtendedPdo_ directly.  (The `fetch*()` methods use `perform()`
internally, so quoting-and-replacement of array placeholders is supported.)

```php
$stm  = 'SELECT * FROM test WHERE foo = :foo AND bar = :bar';
$bind = array('foo' => 'baz', 'bar' => 'dib');

// the native PDO way to "fetch all" where the result is a sequential array
// of rows, and the row arrays are keyed on the column names
$pdo = new PDO(...);
$sth = $pdo->prepare($stm);
$sth->execute($bind);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

// the ExtendedPdo way to do the same kind of "fetch all"
$pdo = new ExtendedPdo(...);
$result = $pdo->fetchAll($stm, $bind);

// fetchAssoc() returns an associative array of all rows where the key is the
// first column, and the row arrays are keyed on the column names
$result = $pdo->fetchAssoc($stm, $bind);

// fetchGroup() is like fetchAssoc() except that the values aren't wrapped in
// arrays. Instead, single column values are returned as a single dimensional
// array and multiple columns are returned as an array of arrays
// Set style to PDO::FETCH_NAMED when values are an array
// (i.e. there are more than two columns in the select)
$result = $pdo->fetchGroup($stm, $bind, $style = PDO::FETCH_COLUMN)

// fetchObject() returns the first row as an object of your choosing; the
// columns are mapped to object properties. an optional 4th parameter array
// provides constructor arguments when instantiating the object.
$result = $pdo->fetchObject($stm, $bind, 'ClassName', array('ctor_arg_1'));

// fetchObjects() returns an array of objects of your choosing; the
// columns are mapped to object properties. an optional 4th parameter array
// provides constructor arguments when instantiating the object.
$result = $pdo->fetchObjects($stm, $bind, 'ClassName', array('ctor_arg_1'));

// fetchOne() returns the first row as an associative array where the keys
// are the column names
$result = $pdo->fetchOne($stm, $bind);

// fetchPairs() returns an associative array where each key is the first
// column and each value is the second column
$result = $pdo->fetchPairs($stm, $bind);

// fetchValue() returns the value of the first row in the first column
$result = $pdo->fetchValue($stm, $bind);

// fetchAffected() returns the number of affected rows
$stm = "UPDATE test SET incr = incr + 1 WHERE foo = :foo AND bar = :bar";
$row_count = $pdo->fetchAffected($stm, $bind);
```

The methods `fetchAll()`, `fetchAssoc()`, `fetchCol()`, and `fetchPairs()`
take an optional third parameter, a callable, to apply to each row of the
results before returning.

```php
$result = $pdo->fetchAssoc($stm, $bind, function (&$row) {
    // add a column to the row
    $row['my_new_col'] = 'Added this column from the callable.';
});
```

### New `yield*()` Methods

_ExtendedPdo_ comes with `yield*()` methods to help reduce memory usage. Whereas
many `fetch*()` methods collect all the query result rows before returning them
all at once, the equivalent `yield*()` methods return an iterator that generates
one result row at a time. For example:

```php
$stm  = 'SELECT * FROM test WHERE foo = :foo AND bar = :bar';
$bind = array('foo' => 'baz', 'bar' => 'dib');

// like fetchAll(), each row is an associative array
foreach ($pdo->yieldAll($stm, $bind) as $row) {
    // ...
}

// like fetchAssoc(), each key is the first column,
// and the row is an associative array
foreach ($pdo->yieldAssoc($stm, $bind) as $key => $row) {
    // ...
}

// like fetchCol(), each result is a value from the first column
foreach ($pdo->yieldCol($stm, $bind) as $val) {
    // ...
}

// like fetchObjects(), each result is an object; pass an optional
// class name and optional array of constructor arguments.
$class = 'ClassName';
$args = ['arg0', 'arg1', 'arg2'];
foreach ($pdo->yieldObjects($stm, $bind, $class, $args) as $object) {
    // ...
}

// like fetchPairs(), each result is a key-value pair from the
// first and second columns
foreach ($pdo->yieldPairs($stm, $bind) as $key => $val) {
    // ...
}
```

## Profiler

When debugging, it is often useful to see what queries have been executed,
where they were issued from in the codebase, and how long they took to
complete. _ExtendedPdo_ comes with an optional profiler that you can use to
discover that information.

```php
use Aura\Sql\ExtendedPdo;
use Aura\Sql\Profiler;

$pdo = new ExtendedPdo(...);
$pdo->setProfiler(new Profiler);

// ...
// query(), fetch(), beginTransaction()/commit()/rollback() etc.
// ...

// now retrieve the profile information:
$profiles = $pdo->getProfiler()->getProfiles();
```

Each profile entry will have these keys:

- `duration`: How long the query took to complete, in seconds.

- `function`: The method that was called on _ExtendedPdo_ that created the
  profile entry.

- `statement`: The query string that was issued, if any. (Methods like
  `connect()` and `rollBack()` do not send query strings.)

- `bind_values`: Any values that were bound to the query.

- `trace`: An exception stack trace indicating where the query was issued from
  in the codebase.

Note that an entry is made into the profile for each call to underlying _ExtendedPDO_ methods.  For example, in a simple query using a bind value, there will be two entries, one for the call to `prepare` and one for the call to `perform`.

Setting the _Profiler_ into the _ExtendedPdo_ instance is optional. Once it
is set, you can activate and deactivate it as you wish using the
`Profiler::setActive()` method. When not active, query profiles will not be
retained.

```php
$pdo = new ExtendedPdo(...);
$pdo->setProfiler(new Profiler);

// deactivate, issue a query, and reactivate;
// the query will not show up in the profiles
$pdo->getProfiler()->setActive(false);
$pdo->fetchAll('SELECT * FROM foo');
$pdo->getProfiler()->setActive(true);
```

## Connection Locator

Frequently, high-traffic PHP applications use multiple database servers,
generally one for writes, and one or more for reads. The _ConnectionLocator_
allows you to define multiple _ExtendedPdo_ objects for lazy-loaded read and
write connections. It will create the connections only when they are when
called. The creation logic is wrapped in a callable.

First, create the _ConnectionLocator_:

```php
use Aura\Sql\ExtendedPdo;
use Aura\Sql\ConnectionLocator;

$connectionLocator = new ConnectionLocator;
```

Now add a default connection; this will be used when a read or write
connection is not defined. (This is also useful for setting up connection
location in advance of actually having multiple database servers.)

```php
$connectionLocator->setDefault(function () {
    return new ExtendedPdo(
        'mysql:host=default.db.localhost;dbname=database',
        'username',
        'password'
    );
});
```

Next, add as many named read and write connections as you like:

```php
// the write (master) server
$connectionLocator->setWrite('master', function () {
    return new ExtendedPdo(
        'mysql:host=master.db.localhost;dbname=database',
        'username',
        'password'
    );
});

// read (slave) #1
$connectionLocator->setRead('slave1', function () {
    return new ExtendedPdo(
        'mysql:host=slave1.db.localhost;dbname=database',
        'username',
        'password'
    );
});

// read (slave) #2
$connectionLocator->setRead('slave2', function () {
    return new ExtendedPdo(
        'mysql:host=slave2.db.localhost;dbname=database',
        'username',
        'password'
    );
});

// read (slave) #3
$connectionLocator->setRead('slave3', function () {
    return new ExtendedPdo(
        'mysql:host=slave3.db.localhost;dbname=database',
        'username',
        'password'
    );
});
```

Finally, retrieve a connection from the locator when you need it. This will
create the connection (if needed) and then return it.

- `getDefault()` will return the default connection.

- `getRead()` will return a named read connection; if no name is specified, it
  will return a random read connection. If no read connections are defined, it
  will return the default connection.

- `getWrite()` will return a named write connection; if no name is specified,
  it will return a random write connection. If no write connections are
  defined, it will return the default connection.

```php
$read = $connectionLocator->getRead();
$results = $read->fetchAll('SELECT * FROM table_name LIMIT 10');
```

### Construction-Time Configuration

The _ConnectionLocator_ can be configured with all its connections at
construction time; this is useful with dependency injection mechanisms.

```php
use Aura\Sql\ConnectionLocator;
use Aura\Sql\ExtendedPdo;

// default connection
$default = function () {
    return new ExtendedPdo(
        'mysql:host=default.db.localhost;dbname=database',
        'username',
        'password'
    );
};

// read connections
$read = array(
    'slave1' => function () {
        return new ExtendedPdo(
            'mysql:host=slave1.db.localhost;dbname=database',
            'username',
            'password'
        );
    },
    'slave2' => function () {
        return new ExtendedPdo(
            'mysql:host=slave2.db.localhost;dbname=database',
            'username',
            'password'
        );
    },
    'slave3' => function () {
        return new ExtendedPdo(
            'mysql:host=slave3.db.localhost;dbname=database',
            'username',
            'password'
        );
    },
);

// write connection
$write = array(
    'master' => function () {
        return new ExtendedPdo(
            'mysql:host=master.db.localhost;dbname=database',
            'username',
            'password'
        );
    },
);

// configure locator at construction time
$connectionLocator = new ConnectionLocator($default, $read, $write);
```

### Profiler

You can turn profiling on and off for all connections in the locator using the
`setProfiling()` method. (If no profiler has been set on a connection, the
locator will set a default profiler into it automatically.) To get all the
profiled queries using the `getProfiles()` method.

```php
$connectionLocator->setProfiling(true);
// perform queries, then:
$profiles = $connectionLocator->getProfiles();
```

