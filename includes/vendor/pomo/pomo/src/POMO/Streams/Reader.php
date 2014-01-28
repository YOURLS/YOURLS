<?php
/*
 * This file is part of the POMO package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace POMO\Streams;

/**
 * Classes, which help reading streams of data from files.
 *
 * @package POMO
 * @subpackage Streams
 * @author Danilo Segan <danilo@kvota.net>
 */
class Reader {

	var $endian = 'little';
	var $_post = '';

	function __construct() {
		$this->is_overloaded = ((ini_get("mbstring.func_overload") & 2) != 0) && function_exists('mb_substr');
		$this->_pos = 0;
	}

	/**
	 * Sets the endianness of the file.
	 *
	 * @param $endian string 'big' or 'little'
	 */
	function setEndian($endian) {
		$this->endian = $endian;
	}

	/**
	 * Reads a 32bit Integer from the Stream
	 *
	 * @return mixed The integer, corresponding to the next 32 bits from
	 * 	the stream of false if there are not enough bytes or on error
	 */
	function readint32() {
		$bytes = $this->read(4);
		if (4 != $this->strlen($bytes))
			return false;
		$endian_letter = ('big' == $this->endian)? 'N' : 'V';
		$int = unpack($endian_letter, $bytes);
		return array_shift($int);
	}

	/**
	 * Reads an array of 32-bit Integers from the Stream
	 *
	 * @param integer count How many elements should be read
	 * @return mixed Array of integers or false if there isn't
	 * 	enough data or on error
	 */
	function readint32array($count) {
		$bytes = $this->read(4 * $count);
		if (4*$count != $this->strlen($bytes))
			return false;
		$endian_letter = ('big' == $this->endian)? 'N' : 'V';
		return unpack($endian_letter.$count, $bytes);
	}


	function substr($string, $start, $length) {
		if ($this->is_overloaded) {
			return mb_substr($string, $start, $length, 'ascii');
		} else {
			return substr($string, $start, $length);
		}
	}

	function strlen($string) {
		if ($this->is_overloaded) {
			return mb_strlen($string, 'ascii');
		} else {
			return strlen($string);
		}
	}

	function str_split($string, $chunk_size) {
		if (!function_exists('str_split')) {
			$length = $this->strlen($string);
			$out = array();
			for ($i = 0; $i < $length; $i += $chunk_size)
				$out[] = $this->substr($string, $i, $chunk_size);
			return $out;
		} else {
			return str_split( $string, $chunk_size );
		}
	}


	function pos() {
		return $this->_pos;
	}

	function is_resource() {
		return true;
	}

	function close() {
		return true;
	}
}
