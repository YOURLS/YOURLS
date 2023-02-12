<?php

/**
 * This file is part of the POMO package.
 */

namespace POMO\Streams;

/**
 * Reads the contents of the file in the beginning.
 */
class CachedFileReader extends StringReader implements StreamInterface
{
    public function __construct($filename)
    {
        parent::__construct();
        $this->_str = file_get_contents($filename);
        if (false === $this->_str) {
            return false;
        }
        $this->_pos = 0;
    }
}
