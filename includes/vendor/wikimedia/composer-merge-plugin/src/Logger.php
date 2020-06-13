<?php
/**
 * This file is part of the Composer Merge plugin.
 *
 * Copyright (C) 2015 Bryan Davis, Wikimedia Foundation, and contributors
 *
 * This software may be modified and distributed under the terms of the MIT
 * license. See the LICENSE file for details.
 */

namespace Wikimedia\Composer;

use Composer\IO\IOInterface;

/**
 * Simple logging wrapper for Composer\IO\IOInterface
 *
 * @author Bryan Davis <bd808@bd808.com>
 */
class Logger
{
    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var IOInterface $inputOutput
     */
    protected $inputOutput;

    /**
     * @param string $name
     * @param IOInterface $io
     */
    public function __construct($name, IOInterface $io)
    {
        $this->name = $name;
        $this->inputOutput = $io;
    }

    /**
     * Log a debug message
     *
     * Messages will be output at the "very verbose" logging level (eg `-vv`
     * needed on the Composer command).
     *
     * @param string $message
     */
    public function debug($message)
    {
        if ($this->inputOutput->isVeryVerbose()) {
            $message = "  <info>[{$this->name}]</info> {$message}";
            $this->log($message);
        }
    }

    /**
     * Log an informative message
     *
     * Messages will be output at the "verbose" logging level (eg `-v` needed
     * on the Composer command).
     *
     * @param string $message
     */
    public function info($message)
    {
        if ($this->inputOutput->isVerbose()) {
            $message = "  <info>[{$this->name}]</info> {$message}";
            $this->log($message);
        }
    }

    /**
     * Log a warning message
     *
     * @param string $message
     */
    public function warning($message)
    {
        $message = "  <error>[{$this->name}]</error> {$message}";
        $this->log($message);
    }

    /**
     * Write a message
     *
     * @param string $message
     */
    protected function log($message)
    {
        if (method_exists($this->inputOutput, 'writeError')) {
            $this->inputOutput->writeError($message);
        } else {
            // @codeCoverageIgnoreStart
            // Backwards compatiblity for Composer before cb336a5
            $this->inputOutput->write($message);
            // @codeCoverageIgnoreEnd
        }
    }
}
// vim:sw=4:ts=4:sts=4:et:
