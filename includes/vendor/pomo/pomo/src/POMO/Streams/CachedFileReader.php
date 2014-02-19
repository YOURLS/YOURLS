<?php
/**
 * This file is part of the POMO package.
 *
 * @copyright POMO 2014 - GPLv2
 * @package POMO
 */

namespace POMO\Streams;

/**
 * Reads the contents of the file in the beginning.
 *
 * @subpackage Streams
 * @author Danilo Segan <danilo@kvota.net>
 */
class CachedFileReader extends StringReader
{
    public function __construct($filename)
    {
        parent::__construct();
        $this->_str = file_get_contents($filename);
        if (false === $this->_str)
            return false;
        $this->_pos = 0;
    }
}
