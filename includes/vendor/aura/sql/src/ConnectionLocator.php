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
 * Manages ExtendedPdo instances for default, read, and write connections.
 *
 * @package Aura.Sql
 *
 */
class ConnectionLocator implements ConnectionLocatorInterface
{
    /**
     *
     * A default ExtendedPdo connection factory/instance.
     *
     * @var callable
     *
     */
    protected $default;

    /**
     *
     * A registry of ExtendedPdo "read" factories/instances.
     *
     * @var array
     *
     */
    protected array $read = [];

    /**
     *
     * A registry of ExtendedPdo "write" factories/instances.
     *
     * @var array
     *
     */
    protected array $write = [];

    /**
     *
     * Constructor.
     *
     * @param callable|null $default A callable to create a default connection.
     *
     * @param array $read An array of callables to create read connections.
     *
     * @param array $write An array of callables to create write connections.
     *
     */
    public function __construct(
        ?callable $default = null,
        array $read = [],
        array $write = []
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
     * Sets the default connection factory.
     *
     * @param callable $callable The factory for the connection.
     *
     * @return void
     */
    public function setDefault(callable $callable): void
    {
        $this->default = $callable;
    }

    /**
     *
     * Returns the default connection object.
     *
     * @return ExtendedPdoInterface
     *
     * @throws Exception\ConnectionNotFound
     */
    public function getDefault(): ExtendedPdoInterface
    {
        if (! $this->default) {
            throw new Exception\ConnectionNotFound("default");
        }

        if (! $this->default instanceof ExtendedPdo) {
            $this->default = call_user_func($this->default);
        }

        return $this->default;
    }

    /**
     *
     * Sets a read connection factory by name.
     *
     * @param string $name The name of the connection.
     *
     * @param callable $callable The factory for the connection.
     *
     * @return void
     */
    public function setRead(string $name, callable $callable): void
    {
        $this->read[$name] = $callable;
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
     * @throws \Aura\Sql\Exception\ConnectionNotFound
     */
    public function getRead(string $name = ''): ExtendedPdoInterface
    {
        return $this->getConnection('read', $name);
    }

    /**
     *
     * Sets a write connection factory by name.
     *
     * @param string $name The name of the connection.
     *
     * @param callable $callable The factory for the connection.
     *
     * @return void
     */
    public function setWrite(string $name, callable $callable): void
    {
        $this->write[$name] = $callable;
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
     * @throws \Aura\Sql\Exception\ConnectionNotFound
     */
    public function getWrite(string $name = ''): ExtendedPdoInterface
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
     *
     */
    protected function getConnection(string $type, string $name): ExtendedPdoInterface
    {
        $conn = &$this->{$type};

        if (empty($conn)) {
            return $this->getDefault();
        }

        if ($name === '') {
            $name = array_rand($conn);
        }

        if (! isset($conn[$name])) {
            throw new Exception\ConnectionNotFound("$type:$name");
        }

        if (! $conn[$name] instanceof ExtendedPdo) {
            $conn[$name] = call_user_func($conn[$name]);
        }

        return $conn[$name];
    }
}
