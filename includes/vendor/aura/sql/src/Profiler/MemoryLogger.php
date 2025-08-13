<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
namespace Aura\Sql\Profiler;

use Psr\Log\AbstractLogger;

/**
 *
 * A naive memory-based logger.
 *
 * @package Aura.Sql
 *
 */
class MemoryLogger extends AbstractLogger
{
    /**
     *
     * Log messages.
     *
     * @var array
     *
     */
    protected array $messages = [];

    /**
     *
     * Logs a message.
     *
     * @param mixed $level The log level (ignored).
     *
     * @param string $message The log message.
     *
     * @param array $context Data to interpolate into the message.
     *
     * @return void
     */
    public function log($level, $message, array $context = []): void
    {
        $replace = [];
        foreach ($context as $key => $val) {
            $replace['{' . $key . '}'] = $val;
        }
        $this->messages[] = strtr($message, $replace);
    }

    /**
     *
     * Returns the logged messages.
     *
     * @return array
     *
     */
    public function getMessages(): array
    {
        return $this->messages;
    }
}
