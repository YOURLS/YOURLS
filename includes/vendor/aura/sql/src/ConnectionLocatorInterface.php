<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
namespace Aura\Sql;

/**
 *
 * Locates PDO connections for default, read, and write databases.
 *
 * @package Aura.Sql
 *
 */
interface ConnectionLocatorInterface
{
    /**
     *
     * Sets the default connection registry entry.
     *
     * @param callable $callable The registry entry.
     *
     * @return void
     */
    public function setDefault(callable $callable): void;

    /**
     *
     * Returns the default connection object.
     *
     * @return ExtendedPdoInterface
     *
     */
    public function getDefault(): ExtendedPdoInterface;

    /**
     *
     * Sets a read connection registry entry by name.
     *
     * @param string $name The name of the registry entry.
     *
     * @param callable $callable The registry entry.
     *
     * @return void
     */
    public function setRead(string $name, callable $callable): void;

    /**
     *
     * Returns a read connection by name; if no name is given, picks a
     * random connection; if no read connections are present, returns the
     * default connection.
     *
     * @param string $name The read connection name to return.
     *
     * @return ExtendedPdoInterface
     *
     */
    public function getRead(string $name = ''): ExtendedPdoInterface;

    /**
     *
     * Sets a write connection registry entry by name.
     *
     * @param string $name The name of the registry entry.
     *
     * @param callable $callable The registry entry.
     *
     * @return void
     */
    public function setWrite(string $name, callable $callable): void;

    /**
     *
     * Returns a write connection by name; if no name is given, picks a
     * random connection; if no write connections are present, returns the
     * default connection.
     *
     * @param string $name The write connection name to return.
     *
     * @return ExtendedPdoInterface
     *
     */
    public function getWrite(string $name = ''): ExtendedPdoInterface;
}
