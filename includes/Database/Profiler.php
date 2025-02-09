<?php

/**
 * Custom profiler for YOURLS
 *
 * Based on \Aura\Sql\Profiler\Profiler to tweak function finish()
 *
 * @since 1.7.10
 */

namespace YOURLS\Database;

class Profiler extends \Aura\Sql\Profiler\Profiler {
    /**
     *
     * Finishes and logs a profile entry.
     *
     * We're just overriding the original class finish() to
     * - not throw an exception and collect a backtrace that will remain unused
     * - not flatten the array of 'values' into a string
     *
     * @param string $statement The statement being profiled, if any.
     * @param array $values The values bound to the statement, if any.
     * @return void
     */
    public function finish(?string $statement = null, array $values = []): void
    {
        if (! $this->active) {
            return;
        }

        $this->context['duration'] = microtime(true) - $this->context['start'];
        $this->context['statement'] = $statement;
        $this->context['values'] = (array)$values;

        $this->logger->log($this->logLevel, $this->logFormat, $this->context);

        $this->context = [];
    }
}
