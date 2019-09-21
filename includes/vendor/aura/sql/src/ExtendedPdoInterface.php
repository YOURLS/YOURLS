<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 *
 */
namespace Aura\Sql;

/**
 *
 * An interface to the Aura.Sql extended PDO object.
 *
 * @package Aura.Sql
 *
 * @method Iterator\AllIterator yieldAll(string $statment, array $values = array())     Yields rows from the database keyed on the first column of each row.
 * @method Iterator\AssocIterator yieldAssoc(string $statment, array $values = array())   Yields rows from the database keyed on the first column of each row.
 * @method Iterator\ColIterator yieldCol(string $statment, array $values = array())   Yields the first column of each row.
 * @method Iterator\ObjectsIterator yieldObjects(string $statment, array $values = array(), $class_name = 'stdClass', array $ctor_args = array())  Yields objects where the column values are mapped to object properties.
 * @method Iterator\PairsIterator yieldPairs(string $statment, array $values = array())   Yields key-value pairs (first column is the key, second column is the value).
 */
interface ExtendedPdoInterface extends PdoInterface
{
    /**
     *
     * Connects to the database and sets PDO attributes.
     *
     * @return null
     *
     * @throws \PDOException if the connection fails.
     *
     */
    public function connect();

    /**
     *
     * Performs a statement and returns the number of affected rows.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return array
     *
     */
    public function fetchAffected($statement, array $values = array());

    /**
     *
     * Fetches a sequential array of rows from the database; the rows
     * are represented as associative arrays.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @param callable $callable A callable to be applied to each of the rows
     * to be returned.
     *
     * @return array
     *
     */
    public function fetchAll($statement, array $values = array(), $callable = null);

    /**
     *
     * Fetches an associative array of rows from the database; the rows
     * are represented as associative arrays. The array of rows is keyed
     * on the first column of each row.
     *
     * N.b.: if multiple rows have the same first column value, the last
     * row with that value will override earlier rows.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @param callable $callable A callable to be applied to each of the rows
     * to be returned.
     *
     * @return array
     *
     */
    public function fetchAssoc($statement, array $values = array(), $callable = null);

    /**
     *
     * Fetches the first column of rows as a sequential array.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @param callable $callable A callable to be applied to each of the rows
     * to be returned.
     *
     * @return array
     *
     */
    public function fetchCol($statement, array $values = array(), $callable = null);

    /**
     *
     * Fetches one row from the database as an object, mapping column values
     * to object properties.
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
     * @param string $class_name The name of the class to create.
     *
     * @param array $ctor_args Arguments to pass to the object constructor.
     *
     * @return object|false
     *
     */
    public function fetchObject(
        $statement,
        array $values = array(),
        $class_name = 'StdClass',
        array $ctor_args = array()
    );

    /**
     *
     * Fetches a sequential array of rows from the database; the rows
     * are represented as objects, where the column values are mapped to
     * object properties.
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
     * @param string $class_name The name of the class to create from each
     * row.
     *
     * @param array $ctor_args Arguments to pass to each object constructor.
     *
     * @return array
     *
     */
    public function fetchObjects(
        $statement,
        array $values = array(),
        $class_name = 'StdClass',
        array $ctor_args = array()
    );

    /**
     *
     * Fetches one row from the database as an associative array.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return array|false
     *
     */
    public function fetchOne($statement, array $values = array());

    /**
     *
     * Fetches an associative array of rows as key-value pairs (first
     * column is the key, second column is the value).
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @param callable $callable A callable to be applied to each of the rows
     * to be returned.
     *
     * @return array
     *
     */
    public function fetchPairs($statement, array $values = array(), $callable = null);

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
    public function fetchValue($statement, array $values = array());

    /**
     *
     * Returns the DSN for a lazy connection; if the underlying PDO instance
     * was injected at construction time, this will be null.
     *
     * @return string|null
     *
     */
    public function getDsn();

    /**
     *
     * Returns the underlying PDO connection object.
     *
     * @return PDO or Null if connection was manually disconnected
     *
     */
    public function getPdo();

    /**
     *
     * Returns the profiler object.
     *
     * @return ProfilerInterface
     *
     */
    public function getProfiler();

    /**
     *
     * Is the instance connected to a database?
     *
     * @return bool
     *
     */
    public function isConnected();

    /**
     *
     * Performs a query after preparing the statement with bound values, then
     * returns the result as a PDOStatement.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return \PDOStatement
     *
     */
    public function perform($statement, array $values = array());

    /**
     *
     * Sets the profiler object.
     *
     * @param ProfilerInterface $profiler
     *
     * @return null
     *
     */
    public function setProfiler(ProfilerInterface $profiler);
}
