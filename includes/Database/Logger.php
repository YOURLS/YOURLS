<?php

/**
 * Custom logger for YOURLS that logs debug messages and queries.
 *
 * Based on \Aura\Sql\Profiler\MemoryLogger
 *
 * @since 1.7.10
 */

namespace YOURLS\Database;

use Psr\Log\AbstractLogger;

class Logger extends AbstractLogger {
    /**
     * Log messages.
     *
     * @var array
     */
    protected $messages = [];

    /**
     * Logs a message.
     *
     * @param string  $level    The log level (ie type of message)
     * @param string  $message  The log message.
     * @param array   $context  Data to interpolate into the message.
     *
     * The logger receives the following:
     *
     * From yourls_debug("something went wrong") :
     *    $level   : string 'debug'
     *    $message : string 'something went wrong'
     *    $context : array()
     * See yourls_debug() in includes/functions-debug.php
     *
     * From a query that triggers the internal logging of Aura SQL :
     *    $level   : string 'query'
     *    $message : string '{function} ({duration} seconds): {statement} {backtrace}'
     *               (which is the default $logFormat from Aura\Sql\Profiler\Profiler), we're not using it)
     *    $context : array(
     *               'function' => string 'perform'
     *               'duration' => float 0.0025360584259033
     *               'statement' => string 'SELECT `keyword`,`url` FROM `yourls_url` WHERE `url` LIKE (:url)'
     *               'values' => array('url' => '%rss%')
     *               )
     * See finish() in Aura\Sql\Profiler\Profiler
     *
     * @return void
     */
    public function log($level, string|\Stringable $message, array $context = []): void {
        // if it's an internal SQL query, format the message, otherwise store a string
        if($level === 'query') {
            $this->messages[] = sprintf(
                'SQL %s: %s (%s s)',
                $context['function'],
                $this->pretty_format($context['statement'], $context['values']),
                number_format($context['duration'], 5)
            );
        } else {
            $this->messages[] = (string)$message;
        }
    }

    /**
     * Returns the logged messages.
     *
     * @return array
     */
    public function getMessages() {
        return $this->messages;
    }

    /**
     * Format PDO statement with bind/values replacement
     *
     * This replaces PDO binds such as 'key_name = :name' with corresponding array values, eg array('name'=>'some value')
     * This is merely a cosmetic replacement to allow for readability: the result WILL NOT be valid SQL! (eg no proper quotes)
     *
     * @since  1.7.3
     * @param  string $statement  SQL query with PDO style named placeholders
     * @param  array  $values     Optional array of values corresponding to placeholders
     * @return string             Readable SQL query with placeholders replaced
     */
    public function pretty_format($statement, array $values = array() ) {
        if (!$values) {
            return $statement;
        }

        return preg_replace_callback(
            '/:([^\s;)]*)/',

            /**
             * @param string $matches
             */
            function ($matches) use ($values) {
                $replacement = isset( $values[$matches[1]] ) ? $values[$matches[1]] : '';
                if(is_array($replacement)) {
                    $replacement = implode(",", $replacement);
                }
                return "'$replacement'";
            },
            $statement
        );
    }

}
