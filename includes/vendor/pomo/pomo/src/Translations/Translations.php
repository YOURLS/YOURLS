<?php
/**
 * This file is part of the POMO package.
 *
 * @copyright 2014 POMO
 * @license GPL
 */

namespace POMO\Translations;

/**
 * Class for a set of entries for translation and their associated headers
 */
class Translations implements TranslationsInterface
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
        if (is_array($entry)) {
            $entry = new EntryTranslations($entry);
        }
        $key = $entry->key();
        if (false === $key) {
            return false;
        }
        $this->entries[$key] = &$entry;

        return true;
    }

    /**
     * @param array|EntryTranslations $entry
     * @return bool
     */
    public function add_entry_or_merge($entry)
    {
        if (is_array($entry)) {
            $entry = new EntryTranslations($entry);
        }
        $key = $entry->key();
        if (false === $key) {
            return false;
        }
        if (isset($this->entries[$key])) {
            $this->entries[$key]->merge_with($entry);
        } else {
            $this->entries[$key] = &$entry;
        }

        return true;
    }

    public function set_header($header, $value)
    {
        $this->headers[$header] = $value;
    }

    public function set_headers($headers)
    {
        foreach ($headers as $header => $value) {
            $this->set_header($header, $value);
        }
    }

    public function get_header($header)
    {
        return isset($this->headers[$header]) ? $this->headers[$header] : false;
    }

    public function translate_entry(EntryTranslations &$entry)
    {
        $key = $entry->key();

        return isset($this->entries[$key]) ? $this->entries[$key] : false;
    }

    public function translate($singular, $context = null)
    {
        $entry = new EntryTranslations(array(
                'singular' => $singular,
                'context' => $context
            ));
        $translated = $this->translate_entry($entry);

        return ($translated && !empty($translated->translations)) ?
            $translated->translations[0] :
            $singular;
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
        $entry = new EntryTranslations(array(
                'singular' => $singular,
                'plural' => $plural,
                'context' => $context
            ));
        $translated = $this->translate_entry($entry);
        $index = $this->select_plural_form($count);
        $total_plural_forms = $this->get_plural_forms_count();
        if ($translated && 0 <= $index && $index < $total_plural_forms &&
                is_array($translated->translations) &&
                isset($translated->translations[$index])) {
            return $translated->translations[$index];
        } else {
            return 1 == $count ? $singular : $plural;
        }
    }

    public function merge_with(TranslationsInterface &$other)
    {
        foreach ($other->entries as $entry) {
            $this->entries[$entry->key()] = $entry;
        }
    }

    /**
     * @param Translations $other
     */
    public function merge_originals_with(Translations &$other)
    {
        foreach ($other->entries as $entry) {
            if (!isset($this->entries[$entry->key()])) {
                $this->entries[$entry->key()] = $entry;
            } else {
                $this->entries[$entry->key()]->merge_with($entry);
            }
        }
    }
}
