<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
namespace Aura\Sql;

use Aura\Sql\Parser\ParserInterface;
use Aura\Sql\Profiler\ProfilerInterface;
use PDO;

/**
 *
 * An interface to the Aura.Sql extended PDO object.
 *
 * @package Aura.Sql
 *
 */
interface ExtendedPdoInterface extends PdoInterface
{
    /**
     *
     * Connects to the database.
     *
     */
    public function connect();

    /**
     *
     * Disconnects from the database.
     *
     */
    public function disconnect();

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
    public function fetchAffected($statement, array $values = []);

    /**
     *
     * Fetches a sequential array of rows from the database; the rows
     * are represented as associative arrays.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return array
     *
     */
    public function fetchAll($statement, array $values = []);

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
     * @return array
     *
     */
    public function fetchAssoc($statement, array $values = []);

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
    public function fetchCol($statement, array $values = []);

    /**
     *
     * Fetches multiple from the database as an associative array.
     * The first column will be the index
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
    );

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
    );

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
    public function fetchOne($statement, array $values = []);

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
    public function fetchPairs($statement, array $values = []);

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
    public function fetchValue($statement, array $values = []);

    /**
     *
     * Returns the Parser instance.
     *
     * @return ParserInterface
     *
     */
    public function getParser();

    /**
     *
     * Return the inner PDO (if any)
     *
     * @return \PDO
     *
     */
    public function getPdo();

    /**
     *
     * Returns the Profiler instance.
     *
     * @return ProfilerInterface
     *
     */
    public function getProfiler();

    /**
     *
     * Quotes a multi-part (dotted) identifier name.
     *
     * @param string $name The multi-part identifier name.
     *
     * @return string The multi-part identifier name, quoted.
     *
     */
    public function quoteName($name);

    /**
     *
     * Quotes a single identifier name.
     *
     * @param string $name The identifier name.
     *
     * @return string The quoted identifier name.
     *
     */
    public function quoteSingleName($name);

    /**
     *
     * Is the PDO connection active?
     *
     * @return bool
     *
     */
    public function isConnected();

    /**
     *
     * Sets the Parser instance.
     *
     * @param ParserInterface $parser The Parser instance.
     *
     */
    public function setParser(ParserInterface $parser);

    /**
     *
     * Sets the Profiler instance.
     *
     * @param ProfilerInterface $profiler The Profiler instance.
     *
     */
    public function setProfiler(ProfilerInterface $profiler);

    /**
     *
     * Yields rows from the database
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return \Generator
     *
     */
    public function yieldAll($statement, array $values = []);

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
    public function yieldAssoc($statement, array $values = []);

    /**
     *
     * Yields the first column of all rows
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param array $values Values to bind to the query.
     *
     * @return \Generator
     *
     */
    public function yieldCol($statement, array $values = []);

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
    );

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
    public function yieldPairs($statement, array $values = []);

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
    public function perform($statement, array $values = []);

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
     * @return \PDOStatement
     *
     * @see http://php.net/manual/en/pdo.prepare.php
     *
     */
    public function prepareWithValues($statement, array $values = []);
}
