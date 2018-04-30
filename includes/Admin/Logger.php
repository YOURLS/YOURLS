<?php

/**
 * YOURLS simple logger
 *
 * @since 1.7.3
 */

namespace YOURLS\Admin;

use YOURLS\Database\YDB;

class Logger extends \Aura\Sql\Profiler {

    /**
     * the YDB instance
     * @var YDB
     */
    protected $ydb;

    /**
     * Debug log where messages are stored
     * @var array
     */
    protected $debug_log = array();

    public function __construct(YDB $ydb) {
        $this->ydb = $ydb;
        /**
         * @todo Extend this to allow calling an external logger
         */
    }

    /**
     * @param string $message
     */
    public function log($message) {
        yourls_do_action('debug_log', $message);
        $this->debug_log[] = $message;
    }

    public function get_log() {
        return $this->debug_log;
    }

    /**
     * Extends \Aura\Sql\Profiler::addProfile() to log queries in our YOURLS logger
     *
     * @since  1.7.3
     * @param  float  $duration     The query duration.
     * @param  string $function     The PDO method that made the entry.
     * @param  string $statement    The SQL query statement.
     * @param  array  $bind_values  The values bound to the statement.
     * @return void
     */
    public function addProfile($duration, $function, $statement, array $bind_values = array() ) {
        parent::addProfile($duration, $function, $statement, $bind_values);

        if($function == 'connect') {
            $this->log( sprintf('SQL: CONNECT (%s s)', number_format($duration, 5)) );
            return;
        }

        // If we are emulating prepare, don't log 'prepare' statement, as they are not actual queries sent to the server
        // See YDB::get_queries() for details
        if ($this->ydb->get_emulate_state() && $function !== 'prepare') {
            $this->log( sprintf('SQL: %s (%s s)', $this->pretty_format($statement, $bind_values), number_format($duration, 5) ) );
        }
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
