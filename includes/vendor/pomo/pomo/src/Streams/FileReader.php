<?php
/**
 * This file is part of the POMO package.
 */

namespace POMO\Streams;

/**
 * Classes, which help reading streams of data from files.
 *
 * @property bool|resource _f
 *
 * @author Danilo Segan <danilo@kvota.net>
 */
class FileReader extends Reader implements StreamInterface
{
    /**
     * @param string $filename
     */
    public function __construct($filename)
    {
        parent::__construct();
        $this->_f = fopen($filename, 'rb');
    }

    public function read($bytes)
    {
        return fread($this->_f, $bytes);
    }

    public function seekto($pos)
    {
        if (-1 == fseek($this->_f, $pos, SEEK_SET)) {
            return false;
        }
        $this->_pos = $pos;

        return true;
    }

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

    public function close()
    {
        return fclose($this->_f);
    }

    public function read_all()
    {
        $all = '';
        while (!$this->feof()) {
            $all .= $this->read(4096);
        }

        return $all;
    }
}
