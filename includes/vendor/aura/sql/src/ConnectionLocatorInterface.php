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
     * @return null
     *
     */
    public function setDefault($callable);

    /**
     *
     * Returns the default connection object.
     *
     * @return ExtendedPdoInterface
     *
     */
    public function getDefault();

    /**
     *
     * Sets a read connection registry entry by name.
     *
     * @param string $name The name of the registry entry.
     *
     * @param callable $callable The registry entry.
     *
     * @return null
     *
     */
    public function setRead($name, $callable);

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
    public function getRead($name = null);

    /**
     *
     * Sets a write connection registry entry by name.
     *
     * @param string $name The name of the registry entry.
     *
     * @param callable $callable The registry entry.
     *
     * @return null
     *
     */
    public function setWrite($name, $callable);

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
    public function getWrite($name = null);
}
