<?php
/**
 * YOURLS Translation API
 *
 * YOURLS modification of a small subset from WordPress' Translation API implementation.
 * GPL License
 *
 * @package POMO
 * @subpackage i18n
 */

/**
 * Load POMO files required to run library
 */
require_once dirname(__FILE__) . '/pomo/mo.php';
require_once dirname(__FILE__) . '/pomo/translations.php';

/**
 * Gets the current locale.
 *
 * If the locale is set, then it will filter the locale in the 'get_locale' filter
 * hook and return the value.
 *
 * If the locale is not set already, then the YOURLS_LANG constant is used if it is
 * defined. Then it is filtered through the 'get_locale' filter hook and the value
 * for the locale global set and the locale is returned.
 *
 * The process to get the locale should only be done once, but the locale will
 * always be filtered using the 'get_locale' hook.
 *
 * @since 1.6
 * @uses yourls_apply_filters() Calls 'get_locale' hook on locale value.
 * @uses $yourls_locale Gets the locale stored in the global.
 *
 * @return string The locale of the blog or from the 'get_locale' hook.
 */
function yourls_get_locale() {
	global $yourls_locale;

	if ( isset( $yourls_locale ) )
		return yourls_apply_filters( 'get_locale', $yourls_locale );

	// YOURLS_LANG is defined in config.
	if ( defined( 'YOURLS_LANG' ) )
		$yourls_locale = YOURLS_LANG;

	if ( empty( $yourls_locale ) )
		$yourls_locale = 'en_US';

	return yourls_apply_filters( 'get_locale', $yourls_locale );
}

/**
 * Retrieves the translation of $text. If there is no translation, or
 * the domain isn't loaded, the original text is returned.
 *
 * @see yourls__() Don't use yourls_translate() directly, use yourls__()
 * @since 1.6
 * @uses yourls_apply_filters() Calls 'translate' on domain translated text
 *		with the untranslated text as second parameter.
 *
 * @param string $text Text to translate.
 * @param string $domain Domain to retrieve the translated text.
 * @return string Translated text
 */
function yourls_translate( $text, $domain = 'default' ) {
	$translations = yourls_get_translations_for_domain( $domain );
	return yourls_apply_filters( 'translate', $translations->translate( $text ), $text, $domain );
}

/**
 * Retrieves the translation of $text with a given $context. If there is no translation, or
 * the domain isn't loaded, the original text is returned.
 *
 * Quite a few times, there will be collisions with similar translatable text
 * found in more than two places but with different translated context.
 *
 * By including the context in the pot file translators can translate the two
 * strings differently.
 *
 * @since 1.6
 * @param string $text Text to translate.
 * @param string $context Context.
 * @param string $domain Domain to retrieve the translated text.
 * @return string Translated text
 */
function yourls_translate_with_context( $text, $context, $domain = 'default' ) {
	$translations = yourls_get_translations_for_domain( $domain );
	return yourls_apply_filters( 'translate_with_context', $translations->translate( $text, $context ), $text, $context, $domain );
}

/**
 * Retrieves the translation of $text. If there is no translation, or
 * the domain isn't loaded, the original text is returned.
 *
 * @see yourls_translate() An alias of yourls_translate()
 * @since 1.6
 *
 * @param string $text Text to translate
 * @param string $domain Optional. Domain to retrieve the translated text
 * @return string Translated text
 */
function yourls__( $text, $domain = 'default' ) {
	return yourls_translate( $text, $domain );
}

/**
 * Retrieves the translation of $text and escapes it for safe use in an attribute.
 * If there is no translation, or the domain isn't loaded, the original text is returned.
 *
 * @see yourls_translate() An alias of yourls_translate()
 * @see yourls_esc_attr()
 * @since 1.6
 *
 * @param string $text Text to translate
 * @param string $domain Optional. Domain to retrieve the translated text
 * @return string Translated text
 */
function yourls_esc_attr__( $text, $domain = 'default' ) {
	return yourls_esc_attr( yourls_translate( $text, $domain ) );
}

/**
 * Retrieves the translation of $text and escapes it for safe use in HTML output.
 * If there is no translation, or the domain isn't loaded, the original text is returned.
 *
 * @see yourls_translate() An alias of yourls_translate()
 * @see yourls_esc_html()
 * @since 1.6
 *
 * @param string $text Text to translate
 * @param string $domain Optional. Domain to retrieve the translated text
 * @return string Translated text
 */
function yourls_esc_html__( $text, $domain = 'default' ) {
	return yourls_esc_html( yourls_translate( $text, $domain ) );
}

/**
 * Displays the returned translated text from yourls_translate().
 *
 * @see yourls_translate() Echoes returned yourls_translate() string
 * @since 1.6
 *
 * @param string $text Text to translate
 * @param string $domain Optional. Domain to retrieve the translated text
 */
function yourls_e( $text, $domain = 'default' ) {
	echo yourls_translate( $text, $domain );
}

/**
 * Displays translated text that has been escaped for safe use in an attribute.
 *
 * @see yourls_translate() Echoes returned yourls_translate() string
 * @see yourls_esc_attr()
 * @since 1.6
 *
 * @param string $text Text to translate
 * @param string $domain Optional. Domain to retrieve the translated text
 */
function yourls_esc_attr_e( $text, $domain = 'default' ) {
	echo yourls_esc_attr( yourls_translate( $text, $domain ) );
}

/**
 * Displays translated text that has been escaped for safe use in HTML output.
 *
 * @see yourls_translate() Echoes returned yourls_translate() string
 * @see yourls_esc_html()
 * @since 1.6
 *
 * @param string $text Text to translate
 * @param string $domain Optional. Domain to retrieve the translated text
 */
function yourls_esc_html_e( $text, $domain = 'default' ) {
	echo yourls_esc_html( yourls_translate( $text, $domain ) );
}

/**
 * Retrieve translated string with gettext context
 *
 * Quite a few times, there will be collisions with similar translatable text
 * found in more than two places but with different translated context.
 *
 * By including the context in the pot file translators can translate the two
 * strings differently.
 *
 * @since 1.6
 *
 * @param string $text Text to translate
 * @param string $context Context information for the translators
 * @param string $domain Optional. Domain to retrieve the translated text
 * @return string Translated context string without pipe
 */
function yourls_x( $text, $context, $domain = 'default' ) {
	return yourls_translate_with_context( $text, $context, $domain );
}

/**
 * Displays translated string with gettext context
 *
 * @see yourls_x()
 * @since 1.6
 *
 * @param string $text Text to translate
 * @param string $context Context information for the translators
 * @param string $domain Optional. Domain to retrieve the translated text
 * @return string Translated context string without pipe
 */
function yourls_ex( $text, $context, $domain = 'default' ) {
	echo yourls_x( $text, $context, $domain );
}


/**
 * Return translated text, with context, that has been escaped for safe use in an attribute
 *
 * @see yourls_translate() Return returned yourls_translate() string
 * @see yourls_esc_attr()
 * @see yourls_x()
 * @since 1.6
 *
 * @param string $text Text to translate
 * @param string $domain Optional. Domain to retrieve the translated text
 */
function yourls_esc_attr_x( $single, $context, $domain = 'default' ) {
	return yourls_esc_attr( yourls_translate_with_context( $single, $context, $domain ) );
}

/**
 * Return translated text, with context, that has been escaped for safe use in HTML output
 *
 * @see yourls_translate() Return returned yourls_translate() string
 * @see yourls_esc_attr()
 * @see yourls_x()
 * @since 1.6
 *
 * @param string $text Text to translate
 * @param string $domain Optional. Domain to retrieve the translated text
 */
function yourls_esc_html_x( $single, $context, $domain = 'default' ) {
	return yourls_esc_html( yourls_translate_with_context( $single, $context, $domain ) );
}

/**
 * Retrieve the plural or single form based on the amount.
 *
 * If the domain is not set in the $yourls_l10n list, then a comparison will be made
 * and either $plural or $single parameters returned.
 *
 * If the domain does exist, then the parameters $single, $plural, and $number
 * will first be passed to the domain's ngettext method. Then it will be passed
 * to the 'translate_n' filter hook along with the same parameters. The expected
 * type will be a string.
 *
 * @since 1.6
 * @uses $yourls_l10n Gets list of domain translated string (gettext_reader) objects
 * @uses yourls_apply_filters() Calls 'translate_n' hook on domains text returned,
 *		along with $single, $plural, and $number parameters. Expected to return string.
 *
 * @param string $single The text that will be used if $number is 1
 * @param string $plural The text that will be used if $number is not 1
 * @param int $number The number to compare against to use either $single or $plural
 * @param string $domain Optional. The domain identifier the text should be retrieved in
 * @return string Either $single or $plural translated text
 */
function yourls_n( $single, $plural, $number, $domain = 'default' ) {
	$translations = yourls_get_translations_for_domain( $domain );
	$translation = $translations->translate_plural( $single, $plural, $number );
	return yourls_apply_filters( 'translate_n', $translation, $single, $plural, $number, $domain );
}

/**
 * A hybrid of yourls_n() and yourls_x(). It supports contexts and plurals.
 *
 * @since 1.6
 * @see yourls_n()
 * @see yourls_x()
 *
 */
function yourls_nx($single, $plural, $number, $context, $domain = 'default') {
	$translations = yourls_get_translations_for_domain( $domain );
	$translation = $translations->translate_plural( $single, $plural, $number, $context );
	return yourls_apply_filters( 'translate_nx', $translation, $single, $plural, $number, $context, $domain );
}

/**
 * Register plural strings in POT file, but don't translate them.
 *
 * Used when you want to keep structures with translatable plural strings and
 * use them later.
 *
 * Example:
 *  $messages = array(
 *  	'post' => yourls_n_noop('%s post', '%s posts'),
 *  	'page' => yourls_n_noop('%s pages', '%s pages')
 *  );
 *  ...
 *  $message = $messages[$type];
 *  $usable_text = sprintf( yourls_translate_nooped_plural( $message, $count ), $count );
 *
 * @since 1.6
 * @param string $singular Single form to be i18ned
 * @param string $plural Plural form to be i18ned
 * @param string $domain Optional. The domain identifier the text will be retrieved in
 * @return array array($singular, $plural)
 */
function yourls_n_noop( $singular, $plural, $domain = null ) {
	return array(
		0 => $singular,
		1 => $plural, 
		'singular' => $singular,
		'plural' => $plural,
		'context' => null,
		'domain' => $domain
	);
}

/**
 * Register plural strings with context in POT file, but don't translate them.
 *
 * @since 1.6
 * @see yourls_n_noop()
 */
function yourls_nx_noop( $singular, $plural, $context, $domain = null ) {
	return array(
		0 => $singular,
		1 => $plural,
		2 => $context,
		'singular' => $singular,
		'plural' => $plural,
		'context' => $context,
		'domain' => $domain
	);
}

/**
 * Translate the result of yourls_n_noop() or yourls_nx_noop()
 *
 * @since 1.6
 * @param array $nooped_plural Array with singular, plural and context keys, usually the result of yourls_n_noop() or yourls_nx_noop()
 * @param int $count Number of objects
 * @param string $domain Optional. The domain identifier the text should be retrieved in. If $nooped_plural contains
 * 	a domain passed to yourls_n_noop() or yourls_nx_noop(), it will override this value.
 */
function yourls_translate_nooped_plural( $nooped_plural, $count, $domain = 'default' ) {
	if ( $nooped_plural['domain'] )
		$domain = $nooped_plural['domain'];

	if ( $nooped_plural['context'] )
		return yourls_nx( $nooped_plural['singular'], $nooped_plural['plural'], $count, $nooped_plural['context'], $domain );
	else
		return yourls_n( $nooped_plural['singular'], $nooped_plural['plural'], $count, $domain );
}

/**
 * Loads a MO file into the domain $domain.
 *
 * If the domain already exists, the translations will be merged. If both
 * sets have the same string, the translation from the original value will be taken.
 *
 * On success, the .mo file will be placed in the $yourls_l10n global by $domain
 * and will be a MO object.
 *
 * @since 1.6
 * @uses $yourls_l10n Gets list of domain translated string objects
 *
 * @param string $domain Unique identifier for retrieving translated strings
 * @param string $mofile Path to the .mo file
 * @return bool True on success, false on failure
 */
function yourls_load_textdomain( $domain, $mofile ) {
	global $yourls_l10n;

	$plugin_override = yourls_apply_filters( 'override_load_textdomain', false, $domain, $mofile );

	if ( true == $plugin_override ) {
		return true;
	}

	yourls_do_action( 'load_textdomain', $domain, $mofile );

	$mofile = yourls_apply_filters( 'load_textdomain_mofile', $mofile, $domain );

	if ( !is_readable( $mofile ) ) return false;

	$mo = new MO();
	if ( !$mo->import_from_file( $mofile ) ) return false;

	if ( isset( $yourls_l10n[$domain] ) )
		$mo->merge_with( $yourls_l10n[$domain] );

	$yourls_l10n[$domain] = &$mo;

	return true;
}

/**
 * Unloads translations for a domain
 *
 * @since 1.6
 * @param string $domain Textdomain to be unloaded
 * @return bool Whether textdomain was unloaded
 */
function yourls_unload_textdomain( $domain ) {
	global $yourls_l10n;

	$plugin_override = yourls_apply_filters( 'override_unload_textdomain', false, $domain );

	if ( $plugin_override )
		return true;

	yourls_do_action( 'unload_textdomain', $domain );

	if ( isset( $yourls_l10n[$domain] ) ) {
		unset( $yourls_l10n[$domain] );
		return true;
	}

	return false;
}

/**
 * Loads default translated strings based on locale.
 *
 * Loads the .mo file in YOURLS_LANG_DIR constant path from YOURLS root. The
 * translated (.mo) file is named based on the locale.
 *
 * @since 1.6
 */
function yourls_load_default_textdomain() {
	$yourls_locale = yourls_get_locale();

	yourls_load_textdomain( 'default', YOURLS_LANG_DIR . "/$yourls_locale.mo" );

}

/**
 * Returns the Translations instance for a domain. If there isn't one,
 * returns empty Translations instance.
 *
 * @param string $domain
 * @return object A Translation instance
 */
function yourls_get_translations_for_domain( $domain ) {
	global $yourls_l10n;
	if ( !isset( $yourls_l10n[$domain] ) ) {
		$yourls_l10n[$domain] = new NOOP_Translations;
	}
	return $yourls_l10n[$domain];
}

/**
 * Whether there are translations for the domain
 *
 * @since 1.6
 * @param string $domain
 * @return bool Whether there are translations
 */
function yourls_is_textdomain_loaded( $domain ) {
	global $yourls_l10n;
	return isset( $yourls_l10n[$domain] );
}

/**
 * Translates role name. Unused.
 *
 * Unused function for the moment, we'll see when there are roles.
 * From the WP source: Since the role names are in the database and
 * not in the source there are dummy gettext calls to get them into the POT
 * file and this function properly translates them back.
 *
 * @since 1.6
 */
function yourls_translate_user_role( $name ) {
	return yourls_translate_with_context( $name, 'User role' );
}

/**
 * Get all available languages (*.mo files) in a given directory. The default directory is YOURLS_LANG_DIR.
 *
 * @since 1.6
 *
 * @param string $dir A directory in which to search for language files. The default directory is YOURLS_LANG_DIR.
 * @return array Array of language codes or an empty array if no languages are present. Language codes are formed by stripping the .mo extension from the language file names.
 */
function yourls_get_available_languages( $dir = null ) {
	$languages = array();
	
	$dir = is_null( $dir) ? YOURLS_LANG_DIR : $dir;
	
	foreach( (array) glob( $dir . '/*.mo' ) as $lang_file ) {
		$languages[] = basename( $lang_file, '.mo' );
	}
	
	return yourls_apply_filters( 'get_available_languages', $languages );
}
