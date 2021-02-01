<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
namespace Aura\Sql;

use Aura\Sql\Exception;
use Aura\Sql\Parser\ParserInterface;
use Aura\Sql\Profiler\ProfilerInterface;
use BadMethodCallException;
use PDO;
use PDOStatement;

/**
 *
 * Provides array quoting, profiling, a new `perform()` method, new `fetch*()`
 * methods, and new `yield*()` methods.
 *
 * @package Aura.Sql
 *
 */
abstract class AbstractExtendedPdo extends PDO implements ExtendedPdoInterface
{
    /**
     *
     * The internal PDO connection.
     *
     * @var PDO
     *
     */
    protected $pdo;

    /**
     *
     * Tracks and logs query profiles.
     *
     * @var ProfilerInterface
     *
     */
    protected $profiler;

    /**
     *
     * Parses queries to rebuild them for easier parameter binding.
     *
     * @var ParserInterface
     *
     */
    protected $parser;

    /**
     *
     * Prefix to use when quoting identifier names.
     *
     * @var string
     *
     */
    protected $quoteNamePrefix = '"';

    /**
     *
     * Suffix to use when quoting identifier names.
     *
     * @var string
     *
     */
    protected $quoteNameSuffix = '"';

    /**
     *
     * Find this string when escaping identifier names.
     *
     * @var string
     *
     */
    protected $quoteNameEscapeFind = '"';

    /**
     *
     * Use this as the replacement when escaping identifier names.
     *
     * @var string
     *
     */
    protected $quoteNameEscapeRepl = '""';

    /**
     *
     * Proxies to PDO methods created for specific drivers; in particular,
     * `sqlite` and `pgsql`.
     *
     * @param string $name The PDO method to call; e.g. `sqliteCreateFunction`
     * or `pgsqlGetPid`.
     *
     * @param array $arguments Arguments to pass to the called method.
     *
     * @return mixed
     *
     * @throws BadMethodCallException when the method does not exist.
     *
     */
    public function __call($name, array $arguments)
    {
        $this->connect();

        if (! method_exists($this->pdo, $name)) {
            $class = get_class($this);
            $message = "Class '{$class}' does not have a method '{$name}'";
            throw new BadMethodCallException($message);
        }

        return call_user_func_array([$this->pdo, $name], $arguments);
    }

    /**
     *
     * Begins a transaction and turns off autocommit mode.
     *
     * @return bool True on success, false on failure.
     *
     * @see http://php.net/manual/en/pdo.begintransaction.php
     *
     */
    public function beginTransaction()
    {
        $this->connect();
        $this->profiler->start(__FUNCTION__);
        $result = $this->pdo->beginTransaction();
        $this->profiler->finish();
        return $result;
    }

    /**
     *
     * Commits the existing transaction and restores autocommit mode.
     *
     * @return bool True on success, false on failure.
     *
     * @see http://php.net/manual/en/pdo.commit.php
     *
     */
    public function commit()
    {
        $this->connect();
        $this->profiler->start(__FUNCTION__);
        $result = $this->pdo->commit();
        $this->profiler->finish();
        return $result;
    }

    /**
     *
     * Connects to the database.
     *
     * @return null
     *
     */
    abstract public function connect();

    /**
     *
     * Disconnects from the database.
     *
     * @return null
     *
     */
    abstract public function disconnect();

    /**
     *
     * Gets the most recent error code.
     *
     * @return mixed
     *
     */
    public function errorCode()
    {
        $this->connect();
        return $this->pdo->errorCode();
    }

    /**
     *
     * Gets the most recent error info.
     *
     * @return array
     *
     */
    public function errorInfo()
    {
        $this->connect();
        return $this->pdo->errorInfo();
    }

    /**
     *
     * Executes an SQL statement and returns the number of affected rows.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @return int The number of affected rows.
     *
     * @see http://php.net/manual/en/pdo.exec.php
     *
     */
    public function exec($statement)
    {
        $this->connect();
        $this->profiler->start(__FUNCTION__);
        $affectedRows = $this->pdo->exec($statement);
        $this->profiler->finish($statement);
        return $affectedRows;
    }

    /**
     *
     * Performs a statement and returns the number of affected rows.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return int
     *
     */
    public function fetchAffected($statement, array $values = [])
    {
        $sth = $this->perform($statement, $values);
        return $sth->rowCount();
    }

    /**
     *
     * Fetches a sequential array of rows from the database; the rows
     * are returned as associative arrays.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return array
     *
     */
    public function fetchAll($statement, array $values = [])
    {
        $sth = $this->perform($statement, $values);
        return $sth->fetchAll(self::FETCH_ASSOC);
    }

    /**
     *
     * Fetches an associative array of rows from the database; the rows
     * are returned as associative arrays, and the array of rows is keyed
     * on the first column of each row.
     *
     * N.b.: If multiple rows have the same first column value, the last
     * row with that value will override earlier rows.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return array
     *
     */
    public function fetchAssoc($statement, array $values = [])
    {
        $sth  = $this->perform($statement, $values);
        $data = [];
        while ($row = $sth->fetch(self::FETCH_ASSOC)) {
            $data[current($row)] = $row;
        }
        return $data;
    }

    /**
     *
     * Fetches the first column of rows as a sequential array.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return array
     *
     */
    public function fetchCol($statement, array $values = [])
    {
        $sth = $this->perform($statement, $values);
        return $sth->fetchAll(self::FETCH_COLUMN, 0);
    }

    /**
     *
     * Fetches multiple from the database as an associative array. The first
     * column will be the index key.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @param int $style a fetch style defaults to PDO::FETCH_COLUMN for single
     * values, use PDO::FETCH_NAMED when fetching a multiple columns
     *
     * @return array
     *
     */
    public function fetchGroup(
        $statement,
        array $values = [],
        $style = PDO::FETCH_COLUMN
    ) {
        $sth = $this->perform($statement, $values);
        return $sth->fetchAll(self::FETCH_GROUP | $style);
    }

    /**
     *
     * Fetches one row from the database as an object where the column values
     * are mapped to object properties.
     *
     * Warning: PDO "injects property-values BEFORE invoking the constructor -
     * in other words, if your class initializes property-values to defaults
     * in the constructor, you will be overwriting the values injected by
     * fetchObject() !"
     *
     * <http://www.php.net/manual/en/pdostatement.fetchobject.php#111744>
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @param string $class The name of the class to create.
     *
     * @param array $args Arguments to pass to the object constructor.
     *
     * @return object
     *
     */
    public function fetchObject(
        $statement,
        array $values = [],
        $class = 'stdClass',
        array $args = []
    ) {
        $sth = $this->perform($statement, $values);

        if (! empty($args)) {
            return $sth->fetchObject($class, $args);
        }

        return $sth->fetchObject($class);
    }

    /**
     *
     * Fetches a sequential array of rows from the database; the rows
     * are returned as objects where the column values are mapped to
     * object properties.
     *
     * Warning: PDO "injects property-values BEFORE invoking the constructor -
     * in other words, if your class initializes property-values to defaults
     * in the constructor, you will be overwriting the values injected by
     * fetchObject() !"
     *
     * <http://www.php.net/manual/en/pdostatement.fetchobject.php#111744>
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @param string $class The name of the class to create from each
     * row.
     *
     * @param array $args Arguments to pass to each object constructor.
     *
     * @return array
     *
     */
    public function fetchObjects(
        $statement,
        array $values = [],
        $class = 'stdClass',
        array $args = []
    ) {
        $sth = $this->perform($statement, $values);

        if (! empty($args)) {
            return $sth->fetchAll(self::FETCH_CLASS, $class, $args);
        }

        return $sth->fetchAll(self::FETCH_CLASS, $class);
    }

    /**
     *
     * Fetches one row from the database as an associative array.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return array
     *
     */
    public function fetchOne($statement, array $values = [])
    {
        $sth = $this->perform($statement, $values);
        return $sth->fetch(self::FETCH_ASSOC);
    }

    /**
     *
     * Fetches an associative array of rows as key-value pairs (first
     * column is the key, second column is the value).
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return array
     *
     */
    public function fetchPairs($statement, array $values = [])
    {
        $sth = $this->perform($statement, $values);
        return $sth->fetchAll(self::FETCH_KEY_PAIR);
    }

    /**
     *
     * Fetches the very first value (i.e., first column of the first row).
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return mixed
     *
     */
    public function fetchValue($statement, array $values = [])
    {
        $sth = $this->perform($statement, $values);
        return $sth->fetchColumn(0);
    }

    /**
     *
     * Returns the Parser instance.
     *
     * @return ParserInterface
     *
     */
    public function getParser()
    {
        return $this->parser;
    }

    /**
     *
     * Return the inner PDO (if any)
     *
     * @return \PDO
     *
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     *
     * Returns the Profiler instance.
     *
     * @return ProfilerInterface
     *
     */
    public function getProfiler()
    {
        return $this->profiler;
    }

    /**
     *
     * Is a transaction currently active?
     *
     * @return bool
     *
     * @see http://php.net/manual/en/pdo.intransaction.php
     *
     */
    public function inTransaction()
    {
        $this->connect();
        $this->profiler->start(__FUNCTION__);
        $result = $this->pdo->inTransaction();
        $this->profiler->finish();
        return $result;
    }

    /**
     *
     * Is the PDO connection active?
     *
     * @return bool
     *
     */
    public function isConnected()
    {
        return (bool) $this->pdo;
    }

    /**
     *
     * Returns the last inserted autoincrement sequence value.
     *
     * @param string $name The name of the sequence to check; typically needed
     * only for PostgreSQL, where it takes the form of `<table>_<column>_seq`.
     *
     * @return string
     *
     * @see http://php.net/manual/en/pdo.lastinsertid.php
     *
     */
    public function lastInsertId($name = null)
    {
        $this->connect();
        $this->profiler->start(__FUNCTION__);
        $result = $this->pdo->lastInsertId($name);
        $this->profiler->finish();
        return $result;
    }

    /**
     *
     * Performs a query with bound values and returns the resulting
     * PDOStatement; array values will be passed through `quote()` and their
     * respective placeholders will be replaced in the query string.
     *
     * @param string $statement The SQL statement to perform.
     *
     * @param array $values Values to bind to the query
     *
     * @return PDOStatement
     *
     * @see quote()
     *
     */
    public function perform($statement, array $values = [])
    {
        $this->connect();
        $sth = $this->prepareWithValues($statement, $values);
        $this->profiler->start(__FUNCTION__);
        $sth->execute();
        $this->profiler->finish($statement, $values);
        return $sth;
    }

    /**
     *
     * Prepares an SQL statement for execution.
     *
     * @param string $statement The SQL statement to prepare for execution.
     *
     * @param array $options Set these attributes on the returned
     * PDOStatement.
     *
     * @return PDOStatement
     *
     * @see http://php.net/manual/en/pdo.prepare.php
     *
     */
    public function prepare($statement, $options = [])
    {
        $this->connect();
        $sth = $this->pdo->prepare($statement, $options);
        return $sth;
    }

    /**
     *
     * Prepares an SQL statement with bound values.
     *
     * This method only binds values that have placeholders in the
     * statement, thereby avoiding errors from PDO regarding too many bound
     * values. It also binds all sequential (question-mark) placeholders.
     *
     * If a placeholder value is an array, the array is converted to a string
     * of comma-separated quoted values; e.g., for an `IN (...)` condition.
     * The quoted string is replaced directly into the statement instead of
     * using `PDOStatement::bindValue()` proper.
     *
     * @param string $statement The SQL statement to prepare for execution.
     *
     * @param array $values The values to bind to the statement, if any.
     *
     * @return PDOStatement
     *
     * @see http://php.net/manual/en/pdo.prepare.php
     *
     */
    public function prepareWithValues($statement, array $values = [])
    {
        // if there are no values to bind ...
        if (empty($values)) {
            // ... use the normal preparation
            return $this->prepare($statement);
        }

        $this->connect();

        // rebuild the statement and values
        $parser = clone $this->parser;
        list ($statement, $values) = $parser->rebuild($statement, $values);

        // prepare the statement
        $sth = $this->pdo->prepare($statement);

        // for the placeholders we found, bind the corresponding data values
        foreach ($values as $key => $val) {
            $this->bindValue($sth, $key, $val);
        }

        // done
        return $sth;
    }

    /**
     *
     * Queries the database and returns a PDOStatement.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param mixed ...$fetch Optional fetch-related parameters.
     *
     * @return PDOStatement
     *
     * @see http://php.net/manual/en/pdo.query.php
     *
     */
    public function query($statement, ...$fetch)
    {
        $this->connect();
        $this->profiler->start(__FUNCTION__);
        $sth = $this->pdo->query($statement, ...$fetch);
        $this->profiler->finish($sth->queryString);
        return $sth;
    }

    /**
     *
     * Quotes a value for use in an SQL statement.
     *
     * This differs from `PDO::quote()` in that it will convert an array into
     * a string of comma-separated quoted values.
     *
     * @param mixed $value The value to quote.
     *
     * @param int $type A data type hint for the database driver.
     *
     * @return string The quoted value.
     *
     * @see http://php.net/manual/en/pdo.quote.php
     *
     */
    public function quote($value, $type = self::PARAM_STR)
    {
        $this->connect();

        // non-array quoting
        if (! is_array($value)) {
            return $this->pdo->quote($value, $type);
        }

        // quote array values, not keys, then combine with commas
        foreach ($value as $k => $v) {
            $value[$k] = $this->pdo->quote($v, $type);
        }
        return implode(', ', $value);
    }

    /**
     *
     * Quotes a multi-part (dotted) identifier name.
     *
     * @param string $name The multi-part identifier name.
     *
     * @return string The multi-part identifier name, quoted.
     *
     */
    public function quoteName($name)
    {
        if (strpos($name, '.') === false) {
            return $this->quoteSingleName($name);
        }

        return implode(
            '.',
            array_map(
                [$this, 'quoteSingleName'],
                explode('.', $name)
            )
        );
    }

    /**
     *
     * Quotes a single identifier name.
     *
     * @param string $name The identifier name.
     *
     * @return string The quoted identifier name.
     *
     */
    public function quoteSingleName($name)
    {
        $name = str_replace(
            $this->quoteNameEscapeFind,
            $this->quoteNameEscapeRepl,
            $name
        );
        return $this->quoteNamePrefix
            . $name
            . $this->quoteNameSuffix;
    }

    /**
     *
     * Rolls back the current transaction, and restores autocommit mode.
     *
     * @return bool True on success, false on failure.
     *
     * @see http://php.net/manual/en/pdo.rollback.php
     *
     */
    public function rollBack()
    {
        $this->connect();
        $this->profiler->start(__FUNCTION__);
        $result = $this->pdo->rollBack();
        $this->profiler->finish();
        return $result;
    }

    /**
     *
     * Sets the Parser instance.
     *
     * @param ParserInterface $parser The Parser instance.
     *
     */
    public function setParser(ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    /**
     *
     * Sets the Profiler instance.
     *
     * @param ProfilerInterface $profiler The Profiler instance.
     *
     */
    public function setProfiler(ProfilerInterface $profiler)
    {
        $this->profiler = $profiler;
    }

    /**
     *
     * Yields rows from the database.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return \Generator
     *
     */
    public function yieldAll($statement, array $values = [])
    {
        $sth = $this->perform($statement, $values);
        while ($row = $sth->fetch(self::FETCH_ASSOC)) {
            yield $row;
        }
    }

    /**
     *
     * Yields rows from the database keyed on the first column of each row.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return \Generator
     *
     */
    public function yieldAssoc($statement, array $values = [])
    {
        $sth = $this->perform($statement, $values);
        while ($row = $sth->fetch(self::FETCH_ASSOC)) {
            $key = current($row);
            yield $key => $row;
        }
    }

    /**
     *
     * Yields the first column of each row.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return \Generator
     *
     */
    public function yieldCol($statement, array $values = [])
    {
        $sth = $this->perform($statement, $values);
        while ($row = $sth->fetch(self::FETCH_NUM)) {
            yield $row[0];
        }
    }

    /**
     *
     * Yields objects where the column values are mapped to object properties.
     *
     * Warning: PDO "injects property-values BEFORE invoking the constructor -
     * in other words, if your class initializes property-values to defaults
     * in the constructor, you will be overwriting the values injected by
     * fetchObject() !"
     * <http://www.php.net/manual/en/pdostatement.fetchobject.php#111744>
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @param string $class The name of the class to create from each
     * row.
     *
     * @param array $args Arguments to pass to each object constructor.
     *
     * @return \Generator
     *
     */
    public function yieldObjects(
        $statement,
        array $values = [],
        $class = 'stdClass',
        array $args = []
    ) {
        $sth = $this->perform($statement, $values);

        if (empty($args)) {
            while ($instance = $sth->fetchObject($class)) {
                yield $instance;
            }
        } else {
            while ($instance = $sth->fetchObject($class, $args)) {
                yield $instance;
            }
        }
    }

    /**
     *
     * Yields key-value pairs (first column is the key, second column is the
     * value).
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return \Generator
     *
     */
    public function yieldPairs($statement, array $values = [])
    {
        $sth = $this->perform($statement, $values);
        while ($row = $sth->fetch(self::FETCH_NUM)) {
            yield $row[0] => $row[1];
        }
    }

    /**
     *
     * Bind a value using the proper PDO::PARAM_* type.
     *
     * @param PDOStatement $sth The statement to bind to.
     *
     * @param mixed $key The placeholder key.
     *
     * @param mixed $val The value to bind to the statement.
     *
     * @return boolean
     *
     * @throws Exception\CannotBindValue when the value to be bound is not
     * bindable (e.g., array, object, or resource).
     *
     */
    protected function bindValue(PDOStatement $sth, $key, $val)
    {
        if (is_int($val)) {
            return $sth->bindValue($key, $val, self::PARAM_INT);
        }

        if (is_bool($val)) {
            return $sth->bindValue($key, $val, self::PARAM_BOOL);
        }

        if (is_null($val)) {
            return $sth->bindValue($key, $val, self::PARAM_NULL);
        }

        if (! is_scalar($val)) {
            $type = gettype($val);
            throw new Exception\CannotBindValue(
                "Cannot bind value of type '{$type}' to placeholder '{$key}'"
            );
        }

        return $sth->bindValue($key, $val);
    }

    /**
     *
     * Returns a new Parser instance.
     *
     * @param string $driver Return a parser for this driver.
     *
     * @return ParserInterface
     *
     */
    protected function newParser($driver)
    {
        $class = 'Aura\Sql\Parser\\' . ucfirst($driver) . 'Parser';
        if (! class_exists($class)) {
            $class = 'Aura\Sql\Parser\SqliteParser';
        }
        return new $class();
    }

    /**
     *
     * Sets quoting properties based on the PDO driver.
     *
     * @param string $driver The PDO driver name.
     *
     * @return null
     *
     */
    protected function setQuoteName($driver)
    {
        switch ($driver) {
            case 'mysql':
                $this->quoteNamePrefix = '`';
                $this->quoteNameSuffix = '`';
                $this->quoteNameEscapeFind = '`';
                $this->quoteNameEscapeRepl = '``';
                return;
            case 'sqlsrv':
                $this->quoteNamePrefix = '[';
                $this->quoteNameSuffix = ']';
                $this->quoteNameEscapeFind = ']';
                $this->quoteNameEscapeRepl = '][';
                return;
            default:
                $this->quoteNamePrefix = '"';
                $this->quoteNameSuffix = '"';
                $this->quoteNameEscapeFind = '"';
                $this->quoteNameEscapeRepl = '""';
                return;
        }
    }

    /**
     *
     * Retrieve a database connection attribute
     *
     * @param int $attribute
     * @return mixed
     */
    public function getAttribute($attribute)
    {
        $this->connect();
        return $this->pdo->getAttribute($attribute);
    }

    /**
     *
     * Set a database connection attribute
     *
     * @param int $attribute
     * @param mixed $value
     * @return bool
     */
    public function setAttribute($attribute, $value)
    {
        $this->connect();
        return $this->pdo->setAttribute($attribute, $value);
    }
}
