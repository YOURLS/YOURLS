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
 * Manages PDO connection objects for default, read, and write connections.
 *
 * @package Aura.Sql
 *
 */
class ConnectionLocator implements ConnectionLocatorInterface
{
    /**
     *
     * A registry of PDO connection entries.
     *
     * @var array
     *
     */
    protected $registry = array(
        'default' => null,
        'read' => array(),
        'write' => array(),
    );

    /**
     *
     * Whether or not registry entries have been converted to objects.
     *
     * @var array
     *
     */
    protected $converted = array(
        'default' => false,
        'read' => array(),
        'write' => array(),
    );

    /**
     *
     * Constructor.
     *
     * @param callable $default A callable to create a default connection.
     *
     * @param array $read An array of callables to create read connections.
     *
     * @param array $write An array of callables to create write connections.
     *
     */
    public function __construct(
        $default = null,
        array $read = array(),
        array $write = array()
    ) {
        if ($default) {
            $this->setDefault($default);
        }
        foreach ($read as $name => $callable) {
            $this->setRead($name, $callable);
        }
        foreach ($write as $name => $callable) {
            $this->setWrite($name, $callable);
        }
    }

    /**
     *
     * Sets the default connection registry entry.
     *
     * @param callable $callable The registry entry.
     *
     * @return null
     *
     */
    public function setDefault($callable)
    {
        $this->registry['default'] = $callable;
        $this->converted['default'] = false;
    }

    /**
     *
     * Returns the default connection object.
     *
     * @return ExtendedPdoInterface
     *
     */
    public function getDefault()
    {
        if (! $this->converted['default']) {
            $callable = $this->registry['default'];
            $this->registry['default'] = call_user_func($callable);
            $this->converted['default'] = true;
        }

        return $this->registry['default'];
    }

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
    public function setRead($name, $callable)
    {
        $this->registry['read'][$name] = $callable;
        $this->converted['read'][$name] = false;
    }

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
    public function getRead($name = null)
    {
        return $this->getConnection('read', $name);
    }

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
    public function setWrite($name, $callable)
    {
        $this->registry['write'][$name] = $callable;
        $this->converted['write'][$name] = false;
    }

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
    public function getWrite($name = null)
    {
        return $this->getConnection('write', $name);
    }

    /**
     *
     * Returns a connection by name.
     *
     * @param string $type The connection type ('read' or 'write').
     *
     * @param string $name The name of the connection.
     *
     * @return ExtendedPdoInterface
     *
     * @throws Exception\ConnectionNotFound
     */
    protected function getConnection($type, $name)
    {
        if (! $this->registry[$type]) {
            return $this->getDefault();
        }

        if (! $name) {
            $name = array_rand($this->registry[$type]);
        }

        if (! isset($this->registry[$type][$name])) {
            throw new Exception\ConnectionNotFound("{$type}:{$name}");
        }

        if (! $this->converted[$type][$name]) {
            $callable = $this->registry[$type][$name];
            $this->registry[$type][$name] = call_user_func($callable);
            $this->converted[$type][$name] = true;
        }

        return $this->registry[$type][$name];
    }
}
