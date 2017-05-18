<?php
/**
 * This file is part of the POMO package.
 *
 * @copyright 2014 POMO
 * @license GPL
 */

namespace POMO\Translations;

/**
 * Contains EntryTranslations class
 * EntryTranslations class encapsulates a translatable string
 */
class EntryTranslations
{
    /**
     * Whether the entry contains a string and its plural form, default is false
     *
     * @var boolean
     */
    public $is_plural = false;

    public $context = null;
    public $singular = null;
    public $plural = null;
    public $translations = array();
    public $translator_comments = '';
    public $extracted_comments = '';
    public $references = array();
    public $flags = array();

    /**
     * @param array $args associative array, support following keys:
     *                    - singular (string) -- the string to translate, if omitted and empty entry will be created
     *                    - plural (string) -- the plural form of the string, setting this will set {@link $is_plural} to true
     *                    - translations (array) -- translations of the string and possibly -- its plural forms
     *                    - context (string) -- a string differentiating two equal strings used in different contexts
     *                    - translator_comments (string) -- comments left by translators
     *                    - extracted_comments (string) -- comments left by developers
     *                    - references (array) -- places in the code this strings is used, in relative_to_root_path/file.php:linenum form
     *                    - flags (array) -- flags like php-format
     */
    public function __construct($args=array())
    {
        // if no singular -- empty object
        if (!isset($args['singular'])) {
            return;
        }
        // get member variable values from args hash
        foreach ($args as $varname => $value) {
            $this->$varname = $value;
        }
        if (isset($args['plural'])) {
            $this->is_plural = true;
        }
        if (!is_array($this->translations)) {
            $this->translations = array();
        }
        if (!is_array($this->references)) {
            $this->references = array();
        }
        if (!is_array($this->flags)) {
            $this->flags = array();
        }
    }

    /**
     * Generates a unique key for this entry
     *
     * @return string|bool the key or false if the entry is empty
     */
    public function key()
    {
        if (is_null($this->singular)) {
            return false;
        }
        // prepend context and EOT, like in MO files
        return is_null($this->context) ? $this->singular : $this->context.chr(4).$this->singular;
    }

    public function merge_with(&$other)
    {
        $this->flags = array_unique(array_merge($this->flags, $other->flags));
        $this->references = array_unique(array_merge($this->references, $other->references));
        if ($this->extracted_comments != $other->extracted_comments) {
            $this->extracted_comments .= $other->extracted_comments;
        }

    }
}
