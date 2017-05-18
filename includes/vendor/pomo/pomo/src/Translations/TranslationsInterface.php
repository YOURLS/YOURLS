<?php
/**
 * This file is part of the POMO package.
 *
 * @copyright 2014 POMO
 * @license GPL
 */

namespace POMO\Translations;

/**
 * Translations Interface that all POMO Translators must implement
 *
 * @author Léo Colombaro <git@colombaro.fr>
 */
interface TranslationsInterface
{
    /**
     * Add entry to the PO structure
     *
     * @param  object &$entry
     * @return bool   true on success, false if the entry doesn't have a key
     */
    public function add_entry($entry);

    /**
     * Sets $header PO header to $value
     *
     * If the header already exists, it will be overwritten
     *
     * @todo This should be out of this class, it is gettext specific
     * @param string $header header name, without trailing :
     * @param string $value  header value, without trailing \n
     */
    public function set_header($header, $value);

    public function set_headers($headers);

    public function get_header($header);

    public function translate_entry(&$entry);

    /**
     * Translate an entry in the singular way
     *
     * @param  string $singular Singular form of the entry
     * @param  mixed  $context
     * @return string The translation
     */
    public function translate($singular, $context = null);

    /**
     * Given the number of items, returns the 0-based index of the plural form
     * to use
     *
     * Here, in the base Translations class, the common logic for English is
     * implemented:
     * 	0 if there is one element, 1 otherwise
     *
     * This function should be overrided by the sub-classes. For example MO/PO
     * can derive the logic from their headers.
     *
     * @param integer $count number of items
     */
    public function select_plural_form($count);

    public function get_plural_forms_count();

    /**
     * Plural sensitive tranlation of an entry
     *
     * Same behavior as {@link translate()} but with plural analyser, provide by
     * {@link select_plural_form()} parser.
     *
     * @param  string  $singular Singular form of the entry
     * @param  string  $plural   Plural form of the entry
     * @param  integer $count    Number of items for the plural context
     * @param  mixed   $context
     * @return string  The correct translation
     */
    public function translate_plural(
        $singular,
        $plural,
        $count,
        $context = null
    );

    /**
     * Merge $other in the current object.
     *
     * @param  Object &$other Another Translation object, whose translations
     *                        will be merged in this one
     * @return void
     **/
    public function merge_with(&$other);
}
