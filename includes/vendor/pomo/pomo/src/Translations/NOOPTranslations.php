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

    /**
     * {@inheritdoc}
     */
    public function add_entry($entry)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function set_header($header, $value)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function set_headers($headers)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function get_header($header)
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function translate_entry(&$entry)
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function translate($singular, $context = null)
    {
        return $singular;
    }

    /**
     * {@inheritdoc}
     */
    public function select_plural_form($count)
    {
        return 1 == $count ? 0 : 1;
    }

    /**
     * {@inheritdoc}
     */
    public function get_plural_forms_count()
    {
        return 2;
    }

    /**
     * {@inheritdoc}
     */
    public function translate_plural(
        $singular,
        $plural,
        $count,
        $context = null
    ) {
        return 1 == $count ? $singular : $plural;
    }

    /**
     * {@inheritdoc}
     */
    public function merge_with(&$other)
    {
    }
}
