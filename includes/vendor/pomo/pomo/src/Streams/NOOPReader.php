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
        return null;
    }

    public function read_all()
    {
        return null;
    }

    public function seekto($pos)
    {
        return null;
    }
}
