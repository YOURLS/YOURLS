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
 * Retains query profiles.
 *
 * @package Aura.Sql
 *
 */
class Profiler implements ProfilerInterface
{
    /**
     *
     * Is the profiler active?
     *
     * @var bool
     *
     */
    protected $active = false;

    /**
     *
     * Retained profiles.
     *
     * @var array
     *
     */
    protected $profiles = array();

    protected static $count = 0;

    /**
     *
     * Turns the profiler on and off.
     *
     * @param bool $active True to turn on, false to turn off.
     *
     * @return null
     *
     */
    public function setActive($active)
    {
        $this->active = (bool) $active;
    }

    /**
     *
     * Is the profiler active?
     *
     * @return bool
     *
     */
    public function isActive()
    {
        return (bool) $this->active;
    }

    /**
     *
     * Adds a profile entry.
     *
     * @param float $duration The query duration.
     *
     * @param string $function The PDO method that made the entry.
     *
     * @param string $statement The SQL query statement.
     *
     * @param array $bind_values The values bound to the statement.
     *
     * @return null
     *
     */
    public function addProfile(
        $duration,
        $function,
        $statement,
        array $bind_values = array()
    ) {
        if (! $this->isActive()) {
            return;
        }

        $e = new \Exception;

        // this allows for multiple profilers getting inter-sorted later
        $k = self::$count ++;

        $this->profiles[$k] = array(
            'duration'    => $duration,
            'function'    => $function,
            'statement'   => $statement,
            'bind_values' => $bind_values,
            'trace'       => $e->getTraceAsString(),
        );
    }

    /**
     *
     * Returns all the profile entries.
     *
     * @return array
     *
     */
    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     *
     * Reset all the profiles
     *
     * @return null
     *
     */
    public function resetProfiles()
    {
        $this->profiles = array();
        self::$count = 0;
    }
}
