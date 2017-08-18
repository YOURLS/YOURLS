<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 *
 */
namespace Aura\Sql;

use PDO;

/**
 *
 * An interface to the native PDO object.
 *
 * @package Aura.Sql
 *
 */
interface PdoInterface
{
    /**
     *
     * Begins a transaction and turns off autocommit mode.
     *
     * @return bool True on success, false on failure.
     *
     * @see http://php.net/manual/en/pdo.begintransaction.php
     *
     */
    public function beginTransaction();

    /**
     *
     * Commits the existing transaction and restores autocommit mode.
     *
     * @return bool True on success, false on failure.
     *
     * @see http://php.net/manual/en/pdo.commit.php
     *
     */
    public function commit();

    /**
     *
     * Gets the most recent error code.
     *
     * @return mixed
     *
     */
    public function errorCode();

    /**
     *
     * Gets the most recent error info.
     *
     * @return array
     *
     */
    public function errorInfo();

    /**
     *
     * Executes an SQL statement and returns the number of affected rows.
     *
     * @param string $statement The SQL statement to execute.
     *
     * @return int The number of rows affected.
     *
     * @see http://php.net/manual/en/pdo.exec.php
     *
     */
    public function exec($statement);

    /**
     *
     * Gets a PDO attribute value.
     *
     * @param mixed $attribute The PDO::ATTR_* constant.
     *
     * @return mixed The value for the attribute.
     *
     */
    public function getAttribute($attribute);

    /**
     *
     * Is a transaction currently active?
     *
     * @return bool
     *
     * @see http://php.net/manual/en/pdo.intransaction.php
     *
     */
    public function inTransaction();

    /**
     *
     * Returns the last inserted autoincrement sequence value.
     *
     * @param string $name The name of the sequence to check; typically needed
     * only for PostgreSQL, where it takes the form of `<table>_<column>_seq`.
     *
     * @return int
     *
     * @see http://php.net/manual/en/pdo.lastinsertid.php
     *
     */
    public function lastInsertId($name = null);

    /**
     *
     * Prepares an SQL statement for execution.
     *
     * @param string $statement The SQL statement to prepare for execution.
     *
     * @param array $options Set these attributes on the returned
     * PDOStatement.
     *
     * @return \PDOStatement
     *
     * @see http://php.net/manual/en/pdo.prepare.php
     *
     */
    public function prepare($statement, $options = null);

    /**
     *
     * Queries the database and returns a PDOStatement.
     *
     * @param string $statement The SQL statement to prepare and execute.
     *
     * @param int $fetch_mode The `PDO::FETCH_*` type to set on the returned
     * `PDOStatement::setFetchMode()`.
     *
     * @param mixed $fetch_arg1 The first additional argument to send to
     * `PDOStatement::setFetchMode()`.
     *
     * @param mixed $fetch_arg2 The second additional argument to send to
     * `PDOStatement::setFetchMode()`.
     *
     * @return \PDOStatement
     *
     * @see http://php.net/manual/en/pdo.query.php
     *
     */
    public function query($statement);

    /**
     *
     * Quotes a value for use in an SQL statement.
     *
     * @param mixed $value The value to quote.
     *
     * @param int $parameter_type A data type hint for the database driver.
     *
     * @return mixed The quoted value.
     *
     * @see http://php.net/manual/en/pdo.quote.php
     *
     */
    public function quote($value, $parameter_type = PDO::PARAM_STR);

    /**
     *
     * Rolls back the current transaction and restores autocommit mode.
     *
     * @return bool True on success, false on failure.
     *
     * @see http://php.net/manual/en/pdo.rollback.php
     *
     */
    public function rollBack();

    /**
     *
     * Sets a PDO attribute value.
     *
     * @param mixed $attribute The PDO::ATTR_* constant.
     *
     * @param mixed $value The value for the attribute.
     *
     * @return bool
     *
     */
    public function setAttribute($attribute, $value);

    /**
     *
     * Returns all currently available PDO drivers.
     *
     * @return array
     *
     */
    public static function getAvailableDrivers();
}
