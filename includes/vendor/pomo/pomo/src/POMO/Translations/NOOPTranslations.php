<?php
/*
 * This file is part of the POMO package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace POMO\Translations;

/**
 * Provides the same interface as Translations, but doesn't do anything
 *
 * @package POMO
 * @subpackage Translations
 */
class NOOPTranslations {
	var $entries = array();
	var $headers = array();

	function add_entry($entry) {
		return true;
	}

	function set_header($header, $value) {
	}

	function set_headers($headers) {
	}

	function get_header($header) {
		return false;
	}

	function translate_entry(&$entry) {
		return false;
	}

	function translate($singular, $context=null) {
		return $singular;
	}

	function select_plural_form($count) {
		return 1 == $count? 0 : 1;
	}

	function get_plural_forms_count() {
		return 2;
	}

	function translate_plural($singular, $plural, $count, $context = null) {
			return 1 == $count? $singular : $plural;
	}

	function merge_with(&$other) {
	}
}
