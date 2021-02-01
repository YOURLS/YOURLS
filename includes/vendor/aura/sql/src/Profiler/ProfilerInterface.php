<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
namespace Aura\Sql\Profiler;

/**
 *
 * Interface to send query profiles to a logger.
 *
 * @package Aura.Sql
 *
 */
interface ProfilerInterface
{
    /**
     *
     * Enable or disable profiler logging.
     *
     * @param bool $active
     *
     */
    public function setActive($active);

    /**
     *
     * Returns true if logging is active.
     *
     * @return bool
     *
     */
    public function isActive();

    /**
     *
     * Returns the underlying logger instance.
     *
     * @return \Psr\Log\LoggerInterface
     *
     */
    public function getLogger();

    /**
     *
     * Returns the level at which to log profile messages.
     *
     * @return string
     *
     */
    public function getLogLevel();

    /**
     *
     * Level at which to log profile messages.
     *
     * @param string $logLevel A PSR LogLevel constant.
     *
     * @return null
     *
     */
    public function setLogLevel($logLevel);

    /**
     *
     * Returns the log message format string, with placeholders.
     *
     * @return string
     *
     */
    public function getLogFormat();

    /**
     *
     * Sets the log message format string, with placeholders.
     *
     * @param string $logFormat
     *
     * @return null
     *
     */
    public function setLogFormat($logFormat);

    /**
     *
     * Starts a profile entry.
     *
     * @param string $function The function starting the profile entry.
     *
     * @return null
     *
     */
    public function start($function);

    /**
     *
     * Finishes and logs a profile entry.
     *
     * @param string $statement The statement being profiled, if any.
     *
     * @param array $values The values bound to the statement, if any.
     *
     * @return null
     *
     */
    public function finish($statement = null, array $values = []);
}
