<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
namespace Aura\Sql;

use PDO;
use PDOStatement;

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
    public function beginTransaction(): bool;

    /**
     *
     * Commits the existing transaction and restores autocommit mode.
     *
     * @return bool True on success, false on failure.
     *
     * @see http://php.net/manual/en/pdo.commit.php
     *
     */
    public function commit(): bool;

    /**
     *
     * Introduced in 6.x due to PHP 8.4 change. This is a BC break for Aura.Sql.
     *
     * @param string $dsn The Data Source Name, or DSN, contains the information required to connect to the database.
     *
     * @param string | null $username  The user name for the DSN string. This parameter is optional for some PDO drivers.
     *
     * @param string | null $password The password for the DSN string. This parameter is optional for some PDO drivers.
     *
     * @param array | null $options  A key=>value array of driver-specific connection options.
     *
     * @return \PDO Returns an instance of a generic PDO instance.
     *
     * @see https://www.php.net/manual/en/pdo.connect.php
     */
    public static function connect(
        string $dsn,
        ?string $username = null,
        #[\SensitiveParameter] ?string $password = null,
        ?array $options = null
    ): static;

    /**
     *
     * Gets the most recent error code.
     *
     * @return string|null
     */
    public function errorCode(): ?string;

    /**
     *
     * Gets the most recent error info.
     *
     * @return array
     *
     */
    public function errorInfo(): array;

    /**
     *
     * Executes an SQL statement and returns the number of affected rows.
     *
     * @param string $statement The SQL statement to execute.
     *
     * @return int|false The number of rows affected.
     *
     * @see http://php.net/manual/en/pdo.exec.php
     *
     */
    public function exec(string $statement): int|false;

    /**
     *
     * Gets a PDO attribute value.
     *
     * @param int $attribute The PDO::ATTR_* constant.
     *
     * @return bool|int|string|array|null The value for the attribute.
     *
     */
    public function getAttribute(int $attribute): bool|int|string|array|null;

    /**
     *
     * Returns all currently available PDO drivers.
     *
     * @return array
     *
     */
    public static function getAvailableDrivers(): array;

    /**
     *
     * Is a transaction currently active?
     *
     * @return bool
     *
     * @see http://php.net/manual/en/pdo.intransaction.php
     *
     */
    public function inTransaction(): bool;

    /**
     *
     * Returns the last inserted autoincrement sequence value.
     *
     * @param string|null $name The name of the sequence to check; typically needed
     * only for PostgreSQL, where it takes the form of `<table>_<column>_seq`.
     *
     * @return string|false
     *
     * @see http://php.net/manual/en/pdo.lastinsertid.php
     *
     */
    public function lastInsertId(?string $name = null): string|false;

    /**
     *
     * Prepares an SQL statement for execution.
     *
     * @param string $query The SQL statement to prepare for execution.
     *
     * @param array $options Set these attributes on the returned
     * PDOStatement.
     *
     * @return \PDOStatement|false
     *
     * @see http://php.net/manual/en/pdo.prepare.php
     */
    public function prepare(string $query, array $options = []): PDOStatement|false;

    /**
     *
     * Queries the database and returns a PDOStatement.
     *
     * @param string $query The SQL statement to prepare and execute.
     *
     * @param int|null $fetchMode
     *
     * @param mixed ...$fetch_mode_args Optional fetch-related parameters.
     *
     * @return \PDOStatement|false
     *
     * @see http://php.net/manual/en/pdo.query.php
     *
     */
    public function query(string $query, ?int $fetchMode = null, ...$fetch_mode_args): PDOStatement|false;

    /**
     *
     * Quotes a value for use in an SQL statement.
     *
     * @param string|int|array|float|null $value The value to quote.
     *
     * @param int $type A data type hint for the database driver.
     *
     * @return string|false The quoted value.
     *
     * @see http://php.net/manual/en/pdo.quote.php
     *
     */
    public function quote(string|int|array|float|null $value, int $type = PDO::PARAM_STR): string|false;

    /**
     *
     * Rolls back the current transaction and restores autocommit mode.
     *
     * @return bool True on success, false on failure.
     *
     * @see http://php.net/manual/en/pdo.rollback.php
     *
     */
    public function rollBack(): bool;

    /**
     *
     * Sets a PDO attribute value.
     *
     * @param int $attribute The PDO::ATTR_* constant.
     *
     * @param mixed $value The value for the attribute.
     *
     * @return bool
     *
     */
    public function setAttribute(int $attribute, mixed $value): bool;
}
