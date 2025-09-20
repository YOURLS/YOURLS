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
use Generator;
use PDO;
use PDOStatement;

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
    public function lazyConnect(): void;

    /**
     *
     * Disconnects from the database.
     *
     */
    public function disconnect(): void;

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
    public function fetchAffected(string $statement, array $values = []): int;

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
    public function fetchAll(string $statement, array $values = []): array;

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
    public function fetchAssoc(string $statement, array $values = []): array;

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
    public function fetchCol(string $statement, array $values = []): array;

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
        string $statement,
        array $values = [],
        int $style = PDO::FETCH_COLUMN
    ): array;

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
     * @return object|false
     *
     */
    public function fetchObject(
        string $statement,
        array $values = [],
        string $class = 'stdClass',
        array $args = []
    ): object|false;

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
        string $statement,
        array $values = [],
        string $class = 'stdClass',
        array $args = []
    ): array;

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
    public function fetchOne(string $statement, array $values = []): array|false;

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
    public function fetchPairs(string $statement, array $values = []): array;

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
    public function fetchValue(string $statement, array $values = []): mixed;

    /**
     *
     * Returns the Parser instance.
     *
     * @return ParserInterface
     *
     */
    public function getParser(): ParserInterface;

    /**
     *
     * Return the inner PDO (if any)
     *
     * @return \PDO
     *
     */
    public function getPdo(): PDO;

    /**
     *
     * Returns the Profiler instance.
     *
     * @return ProfilerInterface
     *
     */
    public function getProfiler(): ProfilerInterface;

    /**
     *
     * Quotes a multi-part (dotted) identifier name.
     *
     * @param string $name The multi-part identifier name.
     *
     * @return string The multi-part identifier name, quoted.
     *
     */
    public function quoteName(string $name): string;

    /**
     *
     * Quotes a single identifier name.
     *
     * @param string $name The identifier name.
     *
     * @return string The quoted identifier name.
     *
     */
    public function quoteSingleName(string $name): string;

    /**
     *
     * Is the PDO connection active?
     *
     * @return bool
     *
     */
    public function isConnected(): bool;

    /**
     *
     * Sets the Parser instance.
     *
     * @param ParserInterface $parser The Parser instance.
     *
     */
    public function setParser(ParserInterface $parser): void;

    /**
     *
     * Sets the Profiler instance.
     *
     * @param ProfilerInterface $profiler The Profiler instance.
     *
     */
    public function setProfiler(ProfilerInterface $profiler): void;

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
    public function yieldAll(string $statement, array $values = []): Generator;

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
    public function yieldAssoc(string $statement, array $values = []): Generator;

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
    public function yieldCol(string $statement, array $values = []): Generator;

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
        string $statement,
        array $values = [],
        string $class = 'stdClass',
        array $args = []
    ): Generator;

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
    public function yieldPairs(string $statement, array $values = []): Generator;

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
    public function perform(string $statement, array $values = []): PDOStatement;

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
    public function prepareWithValues(string $statement, array $values = []): PDOStatement;
}
