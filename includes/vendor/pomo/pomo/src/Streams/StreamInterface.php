<?php
/**
 * This file is part of the POMO package.
 */

namespace POMO\Streams;

interface StreamInterface
{
    /**
     * Sets the endianness of the file.
     *
     * @param $endian string 'big' or 'little'
     */
    public function setEndian($endian);

    /**
     * Reads a 32bit Integer from the Stream.
     *
     * @return mixed The integer, corresponding to the next 32 bits from the
     *               stream of false if there are not enough bytes or on error
     */
    public function readint32();

    /**
     * Reads an array of 32-bit Integers from the Stream.
     *
     * @param int $count How many elements should be read
     *
     * @return mixed Array of integers or false if there isn't
     *               enough data or on error
     */
    public function readint32array($count);

    /**
     * @param string $bytes
     *
     * @return string
     */
    public function read($bytes);

    /**
     * @return string
     */
    public function read_all();

    /**
     * @param string $string
     * @param int    $start
     * @param int    $length
     *
     * @return string
     */
    public function substr($string, $start, $length);

    /**
     * @param string $string
     *
     * @return int
     */
    public function strlen($string);

    /**
     * @param string $string
     * @param int    $chunk_size
     *
     * @return array
     */
    public function str_split($string, $chunk_size);

    /**
     * @return int
     */
    public function pos();

    /**
     * @param int $pos
     *
     * @return int
     */
    public function seekto($pos);

    /**
     * @return true
     */
    public function is_resource();

    /**
     * @return true
     */
    public function close();
}
