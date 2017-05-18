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
class CachedIntFileReader extends CachedFileReader
{
    public function __construct($filename)
    {
        parent::__construct($filename);
    }
}
