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
class CachedIntFileReader extends CachedFileReader
{
    public function __construct($filename)
    {
        parent::__construct($filename);
    }
}
