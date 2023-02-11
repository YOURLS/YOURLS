<?php

/**
 * This file is part of the POMO package.
 */

namespace POMO\Streams;

/**
 * Classes, which help reading streams of data from files.
 *
 * @property bool|resource $_f
 *
 * @author Danilo Segan <danilo@kvota.net>
 */
class FileReader extends Reader implements StreamInterface
{
    /**
     * File pointer resource.
     *
     * @var resource|false
     */
    public $_f;

    /**
     * @param string $filename
     */
    public function __construct($filename)
    {
        parent::__construct();
        $this->_f = fopen($filename, 'rb');
    }

    /**
     * @param int $bytes
     * @return string|false Returns read string, otherwise false.
     */
    public function read($bytes)
    {
        return fread($this->_f, $bytes);
    }

    /**
     * @param int $pos
     * @return bool
     */
    public function seekto($pos)
    {
        if (-1 == fseek($this->_f, $pos, SEEK_SET)) {
            return false;
        }
        $this->_pos = $pos;
        return true;
    }

    /**
     * @return bool
     */
    public function is_resource()
    {
        return is_resource($this->_f);
    }

    /**
     * @return bool
     */
    public function feof()
    {
        return feof($this->_f);
    }

    /**
     * @return bool
     */
    public function close()
    {
        return fclose($this->_f);
    }

    /**
     * @return string
     */
    public function read_all()
    {
        return stream_get_contents($this->_f);
    }
}
