<?php

/**
 * This file is part of the POMO package.
 */

namespace POMO\Streams;

/**
 * Classes, which help reading streams of data from files.
 *
 * @property bool $is_overloaded
 * @property int $_pos
 * @author Danilo Segan <danilo@kvota.net>
 */
#[AllowDynamicProperties]
abstract class Reader implements StreamInterface
{
    public $endian = 'little';
    public $_pos;
    public $is_overloaded;

    public function __construct()
    {
        if (
            function_exists('mb_substr')
            && ((int) ini_get('mbstring.func_overload') & 2) // phpcs:ignore PHPCompatibility.IniDirectives.RemovedIniDirectives.mbstring_func_overloadDeprecated
        ) {
            $this->is_overloaded = true;
        } else {
            $this->is_overloaded = false;
        }

        $this->_pos = 0;
    }

    /**
     * Sets the endianness of the file.
     *
     * @param string $endian Set the endianness of the file. Accepts 'big', or 'little'.
     */
    public function setEndian($endian)  // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.MethodNameInvalid
    {
        $this->endian = $endian;
    }

    /**
     * Reads a 32bit Integer from the Stream
     *
     * @return mixed The integer, corresponding to the next 32 bits from
     *  the stream of false if there are not enough bytes or on error
     */
    public function readint32()
    {
        $bytes = $this->read(4);
        if (4 != $this->strlen($bytes)) {
            return false;
        }
        $endian_letter = ('big' === $this->endian) ? 'N' : 'V';
        $int           = unpack($endian_letter, $bytes);
        return reset($int);
    }

    /**
     * Reads an array of 32-bit Integers from the Stream
     *
     * @param int $count How many elements should be read
     * @return mixed Array of integers or false if there isn't
     *  enough data or on error
     */
    public function readint32array($count)
    {
        $bytes = $this->read(4 * $count);
        if (4 * $count != $this->strlen($bytes)) {
            return false;
        }
        $endian_letter = ('big' === $this->endian) ? 'N' : 'V';
        return unpack($endian_letter . $count, $bytes);
    }

    /**
     * @param string $input_string
     * @param int    $start
     * @param int    $length
     * @return string
     */
    public function substr($input_string, $start, $length)
    {
        if ($this->is_overloaded) {
            return mb_substr($input_string, $start, $length, 'ascii');
        } else {
            return substr($input_string, $start, $length);
        }
    }

    /**
     * @param string $input_string
     * @return int
     */
    public function strlen($input_string)
    {
        if ($this->is_overloaded) {
            return mb_strlen($input_string, 'ascii');
        } else {
            return strlen($input_string);
        }
    }

    /**
     * @param string $input_string
     * @param int    $chunk_size
     * @return array
     */
    public function str_split($input_string, $chunk_size)
    {
        if (! function_exists('str_split')) {
            $length = $this->strlen($input_string);
            $out    = array();
            for ($i = 0; $i < $length; $i += $chunk_size) {
                $out[] = $this->substr($input_string, $i, $chunk_size);
            }
            return $out;
        } else {
            return str_split($input_string, $chunk_size);
        }
    }

    /**
     * @return int
     */
    public function pos()
    {
        return $this->_pos;
    }

    /**
     * @return true
     */
    public function is_resource()
    {
        return true;
    }

    /**
     * @return true
     */
    public function close()
    {
        return true;
    }
}
