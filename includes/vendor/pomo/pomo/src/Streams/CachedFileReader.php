<?php
/**
 * This file is part of the POMO package.
 *
 * @copyright 2014 POMO
 * @license GPL
 */

namespace POMO\Streams;

/**
 * Reads the contents of the file in the beginning.
 *
 * @author Danilo Segan <danilo@kvota.net>
 */
class CachedFileReader extends StringReader
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
