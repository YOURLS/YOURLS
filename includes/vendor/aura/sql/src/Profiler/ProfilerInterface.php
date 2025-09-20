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
    public function setActive(bool $active);

    /**
     *
     * Returns true if logging is active.
     *
     * @return bool
     *
     */
    public function isActive(): bool;

    /**
     *
     * Returns the underlying logger instance.
     *
     * @return \Psr\Log\LoggerInterface
     *
     */
    public function getLogger(): \Psr\Log\LoggerInterface;

    /**
     *
     * Returns the level at which to log profile messages.
     *
     * @return string
     *
     */
    public function getLogLevel(): string;

    /**
     *
     * Level at which to log profile messages.
     *
     * @param string $logLevel A PSR LogLevel constant.
     *
     * @return void
     */
    public function setLogLevel(string $logLevel): void;

    /**
     *
     * Returns the log message format string, with placeholders.
     *
     * @return string
     *
     */
    public function getLogFormat(): string;

    /**
     *
     * Sets the log message format string, with placeholders.
     *
     * @param string $logFormat
     *
     * @return void
     */
    public function setLogFormat(string $logFormat): void;

    /**
     *
     * Starts a profile entry.
     *
     * @param string $function The function starting the profile entry.
     *
     * @return void
     */
    public function start(string $function): void;

    /**
     *
     * Finishes and logs a profile entry.
     *
     * @param string|null $statement The statement being profiled, if any.
     *
     * @param array $values The values bound to the statement, if any.
     *
     * @return void
     */
    public function finish(?string $statement = null, array $values = []): void;
}
