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
 * Interface for query profilers.
 *
 * @package Aura.Sql
 *
 */
interface ProfilerInterface
{
    /**
     *
     * Turns the profiler on and off.
     *
     * @param bool $active True to turn on, false to turn off.
     *
     * @return null
     *
     */
    public function setActive($active);

    /**
     *
     * Is the profiler active?
     *
     * @return bool
     *
     */
    public function isActive();

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
        array $bind_values
    );

    /**
     *
     * Returns all the profiles.
     *
     * @return array
     *
     */
    public function getProfiles();


    /**
     *
     * Reset all the profiles
     *
     * @return null
     *
     */
    public function resetProfiles();
}
