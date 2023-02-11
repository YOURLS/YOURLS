<?php

/**
 * This file is part of the POMO package.
 */

namespace POMO\Streams;

/**
 * Concrete Reader doing nothing.
 */
class NOOPReader extends Reader implements StreamInterface
{
    public function read($bytes)
    {
    }

    public function read_all()
    {
    }

    public function seekto($pos)
    {
    }
}
