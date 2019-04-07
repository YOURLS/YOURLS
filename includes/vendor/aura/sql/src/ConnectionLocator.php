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
     * Whether or not to turn on profiling when retrieving a connection.
     *
     * @var bool
     *
     */
    protected $profiling = false;

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

        $connection = $this->registry['default'];
        $this->setProfiler($connection);
        return $connection;
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

        $connection = $this->registry[$type][$name];
        $this->setProfiler($connection);
        return $connection;
    }

    /**
     *
     * Given a connection, enable or disable profiling on it. If a profiler has
     * not been set into the connection, this will instantiate and set one.
     *
     * @param ExtendedPdo $connection The connection.
     *
     * @return null
     *
     */
    protected function setProfiler(ExtendedPdo $connection)
    {
        $profiler = $connection->getProfiler();

        if (! $this->profiling && ! $profiler) {
            return;
        }

        if (! $profiler) {
            $profiler = new Profiler();
            $connection->setProfiler($profiler);
        }

        $profiler->setActive($this->profiling);
    }

    /**
     *
     * Set profiling on all connections at retrieval time?
     *
     * @param bool $profiling True to enable, or false to disable, profiling on
     * each connection as it is retrieved.
     *
     * @return null
     *
     */
    public function setProfiling($profiling = true)
    {
        $this->profiling = (bool) $profiling;
    }

    /**
     *
     * Gets the profiles from all connections.
     *
     * @return array
     *
     */
    public function getProfiles()
    {
        $profiles = array();

        if ($this->converted['default']) {
            $connection = $this->registry['default'];
            $this->addProfiles('default', $connection, $profiles);
        }

        foreach (array('read', 'write') as $type) {
            foreach ($this->registry[$type] as $name) {
                if ($this->converted[$type][$name]) {
                    $connection = $this->registry[$type][$name];
                    $this->addProfiles("{$type}:{$name}", $connection, $profiles);
                }
            }
        }

        ksort($profiles);
        return $profiles;
    }

    /**
     *
     * Adds profiles from a connection, with a label for the connection name.
     *
     * @param string $label The connection label.
     *
     * @param ExtendedPdo $connection The connection.
     *
     * @param array &$profiles Add the connection profiles to this array, in
     * place.
     *
     * @return null
     */
    protected function addProfiles($label, ExtendedPdo $connection, &$profiles)
    {
        $profiler = $connection->getProfiler();
        if (! $profiler) {
            return;
        }

        foreach ($profiler->getProfiles() as $key => $profile) {
            $profile = array('connection' => $label) + $profile;
            $profiles[$key] = $profile;
        }
    }
}
