<?php
/*
 * This file is part of the POMO package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace POMO\Streams;

/**
 * Reads the contents of the file in the beginning.
 *
 * @package POMO
 * @subpackage Streams
 * @author Danilo Segan <danilo@kvota.net>
 */
class CachedFileReader extends StringReader {
	function __construct($filename) {
		parent::__construct();
		$this->_str = file_get_contents($filename);
		if (false === $this->_str)
			return false;
		$this->_pos = 0;
	}
}
