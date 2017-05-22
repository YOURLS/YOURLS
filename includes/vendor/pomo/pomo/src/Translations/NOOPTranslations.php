<?php
/**
 * This file is part of the POMO package.
 *
 * @copyright 2014 POMO
 * @license GPL
 */

namespace POMO\Translations;

/**
 * Provides the same interface as Translations, but doesn't do anything
 */
class NOOPTranslations implements TranslationsInterface
{
    /**
     * Entries provided availible
     *
     * @var array
     */
    public $entries = array();
    public $headers = array();

    public function add_entry($entry)
    {
        return true;
    }

    public function set_header($header, $value)
    {
    }

    public function set_headers($headers)
    {
    }

    public function get_header($header)
    {
        return false;
    }

    public function translate_entry(EntryTranslations &$entry)
    {
        return false;
    }

    public function translate($singular, $context = null)
    {
        return $singular;
    }

    public function select_plural_form($count)
    {
        return 1 == $count ? 0 : 1;
    }

    public function get_plural_forms_count()
    {
        return 2;
    }

    public function translate_plural(
        $singular,
        $plural,
        $count,
        $context = null
    ) {
        return 1 == $count ? $singular : $plural;
    }

    public function merge_with(TranslationsInterface &$other)
    {
    }
}
