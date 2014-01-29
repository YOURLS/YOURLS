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
class CachedIntFileReader extends CachedFileReader {
	function __construct($filename) {
		parent::__construct($filename);
	}
}
