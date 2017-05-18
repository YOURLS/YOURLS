<?php
/**
 * This file is part of the POMO package.
 *
 * @copyright 2014 POMO
 * @license GPL
 */

namespace POMO\Streams;

/**
 * Provides file-like methods for manipulating a string instead
 * of a physical file.
 *
 * @author Danilo Segan <danilo@kvota.net>
 */
class StringReader extends Reader
{
    public $_str = '';

    public function __construct($str = '')
    {
        parent::__construct();
        $this->_str = $str;
        $this->_pos = 0;
    }

    public function read($bytes)
    {
        $data = $this->substr($this->_str, $this->_pos, $bytes);
        $this->_pos += $bytes;
        if ($this->strlen($this->_str) < $this->_pos) {
            $this->_pos = $this->strlen($this->_str);
        }

        return $data;
    }

    public function seekto($pos)
    {
        $this->_pos = $pos;
        if ($this->strlen($this->_str) < $this->_pos) {
            $this->_pos = $this->strlen($this->_str);
        }

        return $this->_pos;
    }

    public function length()
    {
        return $this->strlen($this->_str);
    }

    public function read_all()
    {
        return $this->substr(
            $this->_str,
            $this->_pos,
            $this->strlen($this->_str)
        );
    }

}
