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
 * @uses yourls_apply_filter() Calls 'get_locale' hook on locale value.
 * @uses $yourls_locale Gets the locale stored in the global.
 *
 * @return string The locale of the blog or from the 'get_locale' hook.
 */
function yourls_get_locale() {
	global $yourls_locale;

	if ( !isset( $yourls_locale ) ) {
		// YOURLS_LANG is defined in config.
		if ( defined( 'YOURLS_LANG' ) )
			$yourls_locale = YOURLS_LANG;
	}

    if ( !$yourls_locale )
        $yourls_locale = '';

	return yourls_apply_filter( 'get_locale', $yourls_locale );
}

/**
 * Retrieves the translation of $text. If there is no translation, or
 * the domain isn't loaded, the original text is returned.
 *
 * @see yourls__() Don't use yourls_translate() directly, use yourls__()
 * @since 1.6
 * @uses yourls_apply_filter() Calls 'translate' on domain translated text
 *		with the untranslated text as second parameter.
 *
 * @param string $text Text to translate.
 * @param string $domain Domain to retrieve the translated text.
 * @return string Translated text
 */
function yourls_translate( $text, $domain = 'default' ) {
	$translations = yourls_get_translations_for_domain( $domain );
	return yourls_apply_filter( 'translate', $translations->translate( $text ), $text, $domain );
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
	return yourls_apply_filter( 'translate_with_context', $translations->translate( $text, $context ), $text, $context, $domain );
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
 * Return a translated sprintf() string (mix yourls__() and sprintf() in one func)
 *
 * Instead of doing sprintf( yourls__( 'string %s' ), $arg ) you can simply use:
 * yourls_s( 'string %s', $arg )
 * This function accepts an arbitrary number of arguments:
 * - first one will be the string to translate, eg "hello %s my name is %s"
 * - following ones will be the sprintf arguments, eg "world" and "Ozh"
 * - if there are more arguments passed than needed, the last one will be used as the translation domain
 *
 * @see sprintf()
 * @since 1.6
 *
 * @param string $pattern Text to translate
 * @param string $arg1, $arg2... Optional: sprintf tokens, and translation domain
 * @return string Translated text
 */
function yourls_s( $pattern ) {
	// Get pattern and pattern arguments 
	$args = func_get_args();
	// If yourls_s() called by yourls_se(), all arguments are wrapped in the same array key
	if( count( $args ) == 1 && is_array( $args[0] ) ) {
		$args = $args[0];
	}
	$pattern = $args[0];
	
	// get list of sprintf tokens (%s and such)
	$num_of_tokens = substr_count( $pattern, '%' ) - 2 * substr_count( $pattern, '%%' );
	
	$domain = 'default';
	// More arguments passed than needed for the sprintf? The last one will be the domain
	if( $num_of_tokens < ( count( $args ) - 1 ) ) {
		$domain = array_pop( $args );
	}
	
	// Translate text
	$args[0] = yourls__( $pattern, $domain );
	
	return call_user_func_array( 'sprintf', $args );	
}

/**
 * Echo a translated sprintf() string (mix yourls__() and sprintf() in one func)
 *
 * Instead of doing printf( yourls__( 'string %s' ), $arg ) you can simply use:
 * yourls_se( 'string %s', $arg )
 * This function accepts an arbitrary number of arguments:
 * - first one will be the string to translate, eg "hello %s my name is %s"
 * - following ones will be the sprintf arguments, eg "world" and "Ozh"
 * - if there are more arguments passed than needed, the last one will be used as the translation domain
 *
 * @see yourls_s()
 * @see sprintf()
 * @since 1.6
 *
 * @param string $text Text to translate
 * @param string $arg1, $arg2... Optional: sprintf tokens, and translation domain
 * @return string Translated text
 */
function yourls_se( $pattern ) {
	echo yourls_s( func_get_args() );
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
 * @return string Translated context string
 */
function yourls_x( $text, $context, $domain = 'default' ) {
	return yourls_translate_with_context( $text, $context, $domain );
}

/**
 * Displays translated string with gettext context
 *
 * @see yourls_x()
 * @since 1.7.1
 *
 * @param string $text Text to translate
 * @param string $context Context information for the translators
 * @param string $domain Optional. Domain to retrieve the translated text
 * @return string Translated context string
 */
function yourls_xe( $text, $context, $domain = 'default' ) {
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
 * @param string   $single
 * @param string   $context
 * @param string   $domain Optional. Domain to retrieve the translated text
 * @internal param string $text Text to translate
 * @return string
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
 * @param string   $single
 * @param string   $context
 * @param string   $domain Optional. Domain to retrieve the translated text
 * @internal param string $text Text to translate
 * @return string
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
 * @uses yourls_apply_filter() Calls 'translate_n' hook on domains text returned,
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
	return yourls_apply_filter( 'translate_n', $translation, $single, $plural, $number, $domain );
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
	return yourls_apply_filter( 'translate_nx', $translation, $single, $plural, $number, $context, $domain );
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
 * @return string
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

	$plugin_override = yourls_apply_filter( 'override_load_textdomain', false, $domain, $mofile );

	if ( true == $plugin_override ) {
		return true;
	}

	yourls_do_action( 'load_textdomain', $domain, $mofile );

	$mofile = yourls_apply_filter( 'load_textdomain_mofile', $mofile, $domain );

	if ( !is_readable( $mofile ) ) {
        trigger_error( 'Cannot read file ' . str_replace( YOURLS_ABSPATH.'/', '', $mofile ) . '.'
                    . ' Make sure there is a language file installed. More info: http://yourls.org/translations' );
        return false;
    }

	$mo = new MO();
	if ( !$mo->import_from_file( $mofile ) )
        return false;

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

	$plugin_override = yourls_apply_filter( 'override_unload_textdomain', false, $domain );

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
 * @return bool True on success, false on failure
 */
function yourls_load_default_textdomain() {
	$yourls_locale = yourls_get_locale();
    
    if( !empty( $yourls_locale ) )
        return yourls_load_textdomain( 'default', YOURLS_LANG_DIR . "/$yourls_locale.mo" );
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
	
	return yourls_apply_filter( 'get_available_languages', $languages );
}

/**
 * Return integer number to format based on the locale.
 *
 * @since 1.6
 *
 * @param int $number The number to convert based on locale.
 * @param int $decimals Precision of the number of decimal places.
 * @return string Converted number in string format.
 */
function yourls_number_format_i18n( $number, $decimals = 0 ) {
	global $yourls_locale_formats;
	if( !isset( $yourls_locale_formats ) )
		$yourls_locale_formats = new YOURLS_Locale_Formats();
		
	$formatted = number_format( $number, abs( intval( $decimals ) ), $yourls_locale_formats->number_format['decimal_point'], $yourls_locale_formats->number_format['thousands_sep'] );
	return yourls_apply_filter( 'number_format_i18n', $formatted );
}

/**
 * Return the date in localized format, based on timestamp.
 *
 * If the locale specifies the locale month and weekday, then the locale will
 * take over the format for the date. If it isn't, then the date format string
 * will be used instead.
 *
 * @since 1.6
 *
 * @param string   $dateformatstring Format to display the date.
 * @param bool|int $unixtimestamp    Optional. Unix timestamp.
 * @param bool     $gmt              Optional, default is false. Whether to convert to GMT for time.
 * @return string The date, translated if locale specifies it.
 */
function yourls_date_i18n( $dateformatstring, $unixtimestamp = false, $gmt = false ) {
	global $yourls_locale_formats;
	if( !isset( $yourls_locale_formats ) )
		$yourls_locale_formats = new YOURLS_Locale_Formats();

	$i = $unixtimestamp;

	if ( false === $i ) {
		if ( ! $gmt )
			$i = yourls_current_time( 'timestamp' );
		else
			$i = time();
		// we should not let date() interfere with our
		// specially computed timestamp
		$gmt = true;
	}

	// store original value for language with untypical grammars
	// see http://core.trac.wordpress.org/ticket/9396
	$req_format = $dateformatstring;

	$datefunc = $gmt? 'gmdate' : 'date';

	if ( ( !empty( $yourls_locale_formats->month ) ) && ( !empty( $yourls_locale_formats->weekday ) ) ) {
		$datemonth            = $yourls_locale_formats->get_month( $datefunc( 'm', $i ) );
		$datemonth_abbrev     = $yourls_locale_formats->get_month_abbrev( $datemonth );
		$dateweekday          = $yourls_locale_formats->get_weekday( $datefunc( 'w', $i ) );
		$dateweekday_abbrev   = $yourls_locale_formats->get_weekday_abbrev( $dateweekday );
		$datemeridiem         = $yourls_locale_formats->get_meridiem( $datefunc( 'a', $i ) );
		$datemeridiem_capital = $yourls_locale_formats->get_meridiem( $datefunc( 'A', $i ) );
		
		$dateformatstring = ' '.$dateformatstring;
		$dateformatstring = preg_replace( "/([^\\\])D/", "\\1" . yourls_backslashit( $dateweekday_abbrev ), $dateformatstring );
		$dateformatstring = preg_replace( "/([^\\\])F/", "\\1" . yourls_backslashit( $datemonth ), $dateformatstring );
		$dateformatstring = preg_replace( "/([^\\\])l/", "\\1" . yourls_backslashit( $dateweekday ), $dateformatstring );
		$dateformatstring = preg_replace( "/([^\\\])M/", "\\1" . yourls_backslashit( $datemonth_abbrev ), $dateformatstring );
		$dateformatstring = preg_replace( "/([^\\\])a/", "\\1" . yourls_backslashit( $datemeridiem ), $dateformatstring );
		$dateformatstring = preg_replace( "/([^\\\])A/", "\\1" . yourls_backslashit( $datemeridiem_capital ), $dateformatstring );

		$dateformatstring = substr( $dateformatstring, 1, strlen( $dateformatstring ) -1 );
	}
	$timezone_formats = array( 'P', 'I', 'O', 'T', 'Z', 'e' );
	$timezone_formats_re = implode( '|', $timezone_formats );
	if ( preg_match( "/$timezone_formats_re/", $dateformatstring ) ) {
	
		// TODO: implement a timezone option
		$timezone_string = yourls_get_option( 'timezone_string' );
		if ( $timezone_string ) {
			$timezone_object = timezone_open( $timezone_string );
			$date_object = date_create( null, $timezone_object );
			foreach( $timezone_formats as $timezone_format ) {
				if ( false !== strpos( $dateformatstring, $timezone_format ) ) {
					$formatted = date_format( $date_object, $timezone_format );
					$dateformatstring = ' '.$dateformatstring;
					$dateformatstring = preg_replace( "/([^\\\])$timezone_format/", "\\1" . yourls_backslashit( $formatted ), $dateformatstring );
					$dateformatstring = substr( $dateformatstring, 1, strlen( $dateformatstring ) -1 );
				}
			}
		}
	}
	$j = @$datefunc( $dateformatstring, $i );
	// allow plugins to redo this entirely for languages with untypical grammars
	$j = yourls_apply_filter('date_i18n', $j, $req_format, $i, $gmt);
	return $j;
}

/**
 * Retrieve the current time based on specified type. Stolen from WP.
 *
 * The 'mysql' type will return the time in the format for MySQL DATETIME field.
 * The 'timestamp' type will return the current timestamp.
 *
 * If $gmt is set to either '1' or 'true', then both types will use GMT time.
 * if $gmt is false, the output is adjusted with the GMT offset in the WordPress option.
 *
 * @since 1.6
 *
 * @param string $type Either 'mysql' or 'timestamp'.
 * @param int|bool $gmt Optional. Whether to use GMT timezone. Default is false.
 * @return int|string String if $type is 'gmt', int if $type is 'timestamp'.
 */
function yourls_current_time( $type, $gmt = 0 ) {
	switch ( $type ) {
		case 'mysql':
			return ( $gmt ) ? gmdate( 'Y-m-d H:i:s' ) : gmdate( 'Y-m-d H:i:s', time() + YOURLS_HOURS_OFFSET * 3600 );
			break;
		case 'timestamp':
			return ( $gmt ) ? time() : time() + YOURLS_HOURS_OFFSET * 3600;
			break;
	}
}


/**
 * Class that loads the calendar locale.
 *
 * @since 1.6
 */
class YOURLS_Locale_Formats {
	/**
	 * Stores the translated strings for the full weekday names.
	 *
	 * @since 1.6
	 * @var array
	 * @access private
	 */
	var $weekday;

	/**
	 * Stores the translated strings for the one character weekday names.
	 *
	 * There is a hack to make sure that Tuesday and Thursday, as well
	 * as Sunday and Saturday, don't conflict. See init() method for more.
	 *
	 * @see YOURLS_Locale_Formats::init() for how to handle the hack.
	 *
	 * @since 1.6
	 * @var array
	 * @access private
	 */
	var $weekday_initial;

	/**
	 * Stores the translated strings for the abbreviated weekday names.
	 *
	 * @since 1.6
	 * @var array
	 * @access private
	 */
	var $weekday_abbrev;

	/**
	 * Stores the translated strings for the full month names.
	 *
	 * @since 1.6
	 * @var array
	 * @access private
	 */
	var $month;

	/**
	 * Stores the translated strings for the abbreviated month names.
	 *
	 * @since 1.6
	 * @var array
	 * @access private
	 */
	var $month_abbrev;

	/**
	 * Stores the translated strings for 'am' and 'pm'.
	 *
	 * Also the capitalized versions.
	 *
	 * @since 1.6
	 * @var array
	 * @access private
	 */
	var $meridiem;

	/**
	 * Stores the translated number format
	 *
	 * @since 1.6
	 * @var array
	 * @access private
	 */
	var $number_format;

	/**
	 * The text direction of the locale language.
	 *
	 * Default is left to right 'ltr'.
	 *
	 * @since 1.6
	 * @var string
	 * @access private
	 */
	var $text_direction = 'ltr';

	/**
	 * Sets up the translated strings and object properties.
	 *
	 * The method creates the translatable strings for various
	 * calendar elements. Which allows for specifying locale
	 * specific calendar names and text direction.
	 *
	 * @since 1.6
	 * @access private
	 */
	function init() {
		// The Weekdays
		$this->weekday[0] = /* //translators: weekday */ yourls__( 'Sunday' );
		$this->weekday[1] = /* //translators: weekday */ yourls__( 'Monday' );
		$this->weekday[2] = /* //translators: weekday */ yourls__( 'Tuesday' );
		$this->weekday[3] = /* //translators: weekday */ yourls__( 'Wednesday' );
		$this->weekday[4] = /* //translators: weekday */ yourls__( 'Thursday' );
		$this->weekday[5] = /* //translators: weekday */ yourls__( 'Friday' );
		$this->weekday[6] = /* //translators: weekday */ yourls__( 'Saturday' );

		// The first letter of each day. The _%day%_initial suffix is a hack to make
		// sure the day initials are unique.
		$this->weekday_initial[yourls__( 'Sunday' )]    = /* //translators: one-letter abbreviation of the weekday */ yourls__( 'S_Sunday_initial' );
		$this->weekday_initial[yourls__( 'Monday' )]    = /* //translators: one-letter abbreviation of the weekday */ yourls__( 'M_Monday_initial' );
		$this->weekday_initial[yourls__( 'Tuesday' )]   = /* //translators: one-letter abbreviation of the weekday */ yourls__( 'T_Tuesday_initial' );
		$this->weekday_initial[yourls__( 'Wednesday' )] = /* //translators: one-letter abbreviation of the weekday */ yourls__( 'W_Wednesday_initial' );
		$this->weekday_initial[yourls__( 'Thursday' )]  = /* //translators: one-letter abbreviation of the weekday */ yourls__( 'T_Thursday_initial' );
		$this->weekday_initial[yourls__( 'Friday' )]    = /* //translators: one-letter abbreviation of the weekday */ yourls__( 'F_Friday_initial' );
		$this->weekday_initial[yourls__( 'Saturday' )]  = /* //translators: one-letter abbreviation of the weekday */ yourls__( 'S_Saturday_initial' );

		foreach ($this->weekday_initial as $weekday_ => $weekday_initial_) {
			$this->weekday_initial[$weekday_] = preg_replace('/_.+_initial$/', '', $weekday_initial_);
		}

		// Abbreviations for each day.
		$this->weekday_abbrev[ yourls__( 'Sunday' ) ]    = /* //translators: three-letter abbreviation of the weekday */ yourls__( 'Sun' );
		$this->weekday_abbrev[ yourls__( 'Monday' ) ]    = /* //translators: three-letter abbreviation of the weekday */ yourls__( 'Mon' );
		$this->weekday_abbrev[ yourls__( 'Tuesday' ) ]   = /* //translators: three-letter abbreviation of the weekday */ yourls__( 'Tue' );
		$this->weekday_abbrev[ yourls__( 'Wednesday' ) ] = /* //translators: three-letter abbreviation of the weekday */ yourls__( 'Wed' );
		$this->weekday_abbrev[ yourls__( 'Thursday' ) ]  = /* //translators: three-letter abbreviation of the weekday */ yourls__( 'Thu' );
		$this->weekday_abbrev[ yourls__( 'Friday' ) ]    = /* //translators: three-letter abbreviation of the weekday */ yourls__( 'Fri' );
		$this->weekday_abbrev[ yourls__( 'Saturday' ) ]  = /* //translators: three-letter abbreviation of the weekday */ yourls__( 'Sat' );

		// The Months
		$this->month['01'] = /* //translators: month name */ yourls__( 'January' );
		$this->month['02'] = /* //translators: month name */ yourls__( 'February' );
		$this->month['03'] = /* //translators: month name */ yourls__( 'March' );
		$this->month['04'] = /* //translators: month name */ yourls__( 'April' );
		$this->month['05'] = /* //translators: month name */ yourls__( 'May' );
		$this->month['06'] = /* //translators: month name */ yourls__( 'June' );
		$this->month['07'] = /* //translators: month name */ yourls__( 'July' );
		$this->month['08'] = /* //translators: month name */ yourls__( 'August' );
		$this->month['09'] = /* //translators: month name */ yourls__( 'September' );
		$this->month['10'] = /* //translators: month name */ yourls__( 'October' );
		$this->month['11'] = /* //translators: month name */ yourls__( 'November' );
		$this->month['12'] = /* //translators: month name */ yourls__( 'December' );

		// Abbreviations for each month. Uses the same hack as above to get around the
		// 'May' duplication.
		$this->month_abbrev[ yourls__( 'January' ) ]   = /* //translators: three-letter abbreviation of the month */ yourls__( 'Jan_January_abbreviation' );
		$this->month_abbrev[ yourls__( 'February' ) ]  = /* //translators: three-letter abbreviation of the month */ yourls__( 'Feb_February_abbreviation' );
		$this->month_abbrev[ yourls__( 'March' ) ]     = /* //translators: three-letter abbreviation of the month */ yourls__( 'Mar_March_abbreviation' );
		$this->month_abbrev[ yourls__( 'April' ) ]     = /* //translators: three-letter abbreviation of the month */ yourls__( 'Apr_April_abbreviation' );
		$this->month_abbrev[ yourls__( 'May' ) ]       = /* //translators: three-letter abbreviation of the month */ yourls__( 'May_May_abbreviation' );
		$this->month_abbrev[ yourls__( 'June' ) ]      = /* //translators: three-letter abbreviation of the month */ yourls__( 'Jun_June_abbreviation' );
		$this->month_abbrev[ yourls__( 'July' ) ]      = /* //translators: three-letter abbreviation of the month */ yourls__( 'Jul_July_abbreviation' );
		$this->month_abbrev[ yourls__( 'August' ) ]    = /* //translators: three-letter abbreviation of the month */ yourls__( 'Aug_August_abbreviation' );
		$this->month_abbrev[ yourls__( 'September' ) ] = /* //translators: three-letter abbreviation of the month */ yourls__( 'Sep_September_abbreviation' );
		$this->month_abbrev[ yourls__( 'October' ) ]   = /* //translators: three-letter abbreviation of the month */ yourls__( 'Oct_October_abbreviation' );
		$this->month_abbrev[ yourls__( 'November' ) ]  = /* //translators: three-letter abbreviation of the month */ yourls__( 'Nov_November_abbreviation' );
		$this->month_abbrev[ yourls__( 'December' ) ]  = /* //translators: three-letter abbreviation of the month */ yourls__( 'Dec_December_abbreviation' );

		foreach ($this->month_abbrev as $month_ => $month_abbrev_) {
			$this->month_abbrev[$month_] = preg_replace('/_.+_abbreviation$/', '', $month_abbrev_);
		}

		// The Meridiems
		$this->meridiem['am'] = yourls__( 'am' );
		$this->meridiem['pm'] = yourls__( 'pm' );
		$this->meridiem['AM'] = yourls__( 'AM' );
		$this->meridiem['PM'] = yourls__( 'PM' );

		// Numbers formatting
		// See http://php.net/number_format

		/* //translators: $thousands_sep argument for http://php.net/number_format, default is , */
		$trans = yourls__( 'number_format_thousands_sep' );
		$this->number_format['thousands_sep'] = ('number_format_thousands_sep' == $trans) ? ',' : $trans;

		/* //translators: $dec_point argument for http://php.net/number_format, default is . */
		$trans = yourls__( 'number_format_decimal_point' );
		$this->number_format['decimal_point'] = ('number_format_decimal_point' == $trans) ? '.' : $trans;

		// Set text direction.
		if ( isset( $GLOBALS['text_direction'] ) )
			$this->text_direction = $GLOBALS['text_direction'];
		/* //translators: 'rtl' or 'ltr'. This sets the text direction for YOURLS. */
		elseif ( 'rtl' == yourls_x( 'ltr', 'text direction' ) )
			$this->text_direction = 'rtl';
	}

	/**
	 * Retrieve the full translated weekday word.
	 *
	 * Week starts on translated Sunday and can be fetched
	 * by using 0 (zero). So the week starts with 0 (zero)
	 * and ends on Saturday with is fetched by using 6 (six).
	 *
	 * @since 1.6
	 * @access public
	 *
	 * @param int $weekday_number 0 for Sunday through 6 Saturday
	 * @return string Full translated weekday
	 */
	function get_weekday( $weekday_number ) {
		return $this->weekday[ $weekday_number ];
	}

	/**
	 * Retrieve the translated weekday initial.
	 *
	 * The weekday initial is retrieved by the translated
	 * full weekday word. When translating the weekday initial
	 * pay attention to make sure that the starting letter does
	 * not conflict.
	 *
	 * @since 1.6
	 * @access public
	 *
	 * @param string $weekday_name
	 * @return string
	 */
	function get_weekday_initial( $weekday_name ) {
		return $this->weekday_initial[ $weekday_name ];
	}

	/**
	 * Retrieve the translated weekday abbreviation.
	 *
	 * The weekday abbreviation is retrieved by the translated
	 * full weekday word.
	 *
	 * @since 1.6
	 * @access public
	 *
	 * @param string $weekday_name Full translated weekday word
	 * @return string Translated weekday abbreviation
	 */
	function get_weekday_abbrev( $weekday_name ) {
		return $this->weekday_abbrev[ $weekday_name ];
	}

	/**
	 * Retrieve the full translated month by month number.
	 *
	 * The $month_number parameter has to be a string
	 * because it must have the '0' in front of any number
	 * that is less than 10. Starts from '01' and ends at
	 * '12'.
	 *
	 * You can use an integer instead and it will add the
	 * '0' before the numbers less than 10 for you.
	 *
	 * @since 1.6
	 * @access public
	 *
	 * @param string|int $month_number '01' through '12'
	 * @return string Translated full month name
	 */
	function get_month( $month_number ) {
		return $this->month[ sprintf( '%02s', $month_number ) ];		
	}

	/**
	 * Retrieve translated version of month abbreviation string.
	 *
	 * The $month_name parameter is expected to be the translated or
	 * translatable version of the month.
	 *
	 * @since 1.6
	 * @access public
	 *
	 * @param string $month_name Translated month to get abbreviated version
	 * @return string Translated abbreviated month
	 */
	function get_month_abbrev( $month_name ) {
		return $this->month_abbrev[ $month_name ];
	}

	/**
	 * Retrieve translated version of meridiem string.
	 *
	 * The $meridiem parameter is expected to not be translated.
	 *
	 * @since 1.6
	 * @access public
	 *
	 * @param string $meridiem Either 'am', 'pm', 'AM', or 'PM'. Not translated version.
	 * @return string Translated version
	 */
	function get_meridiem( $meridiem ) {
		return $this->meridiem[ $meridiem ];
	}

	/**
	 * Global variables are deprecated. For backwards compatibility only.
	 *
	 * @deprecated For backwards compatibility only.
	 * @access private
	 *
	 * @since 1.6
	 */
	function register_globals() {
		$GLOBALS['weekday']         = $this->weekday;
		$GLOBALS['weekday_initial'] = $this->weekday_initial;
		$GLOBALS['weekday_abbrev']  = $this->weekday_abbrev;
		$GLOBALS['month']           = $this->month;
		$GLOBALS['month_abbrev']    = $this->month_abbrev;
	}

	/**
	 * Constructor which calls helper methods to set up object variables
	 *
	 * @uses YOURLS_Locale_Formats::init()
	 * @uses YOURLS_Locale_Formats::register_globals()
	 * @since 1.6
	 *
	 * @return YOURLS_Locale_Formats
	 */
	function __construct() {
		$this->init();
		$this->register_globals();
	}

	/**
	 * Checks if current locale is RTL.
	 *
	 * @since 1.6
	 * @return bool Whether locale is RTL.
	 */
	function is_rtl() {
		return 'rtl' == $this->text_direction;
	}
}

/**
 * Loads a custom translation file (for a plugin, a theme, a public interface...)
 *
 * The .mo file should be named based on the domain with a dash, and then the locale exactly,
 * eg 'myplugin-pt_BR.mo'
 *
 * @since 1.6
 *
 * @param string $domain Unique identifier (the "domain") for retrieving translated strings
 * @param string $path Full path to directory containing MO files.
 * @return bool True on success, false on failure
 */
function yourls_load_custom_textdomain( $domain, $path ) {
	$locale = yourls_apply_filter( 'load_custom_textdomain', yourls_get_locale(), $domain );
	$mofile = rtrim( $path, '/' ) . '/'. $domain . '-' . $locale . '.mo';

	return yourls_load_textdomain( $domain, $mofile );
}

/**
 * Checks if current locale is RTL. Stolen from WP.
 *
 * @since 1.6
 * @return bool Whether locale is RTL.
 */
function yourls_is_rtl() {
	global $yourls_locale_formats;
	if( !isset( $yourls_locale_formats ) )
		$yourls_locale_formats = new YOURLS_Locale_Formats();
		
	return $yourls_locale_formats->is_rtl();
}

/**
 * Return translated weekday abbreviation (3 letters, eg 'Fri' for 'Friday')
 *
 * The $weekday var can be a textual string ('Friday'), a integer (0 to 6) or an empty string
 * If $weekday is an empty string, the function returns an array of all translated weekday abbrev
 *
 * @since 1.6
 * @param mixed $weekday A full textual weekday, eg "Friday", or an integer (0 = Sunday, 1 = Monday, .. 6 = Saturday)
 * @return mixed Translated weekday abbreviation, eg "Ven" (abbrev of "Vendredi") for "Friday" or 5, or array of all weekday abbrev
 */
function yourls_l10n_weekday_abbrev( $weekday = '' ){
	global $yourls_locale_formats;
	if( !isset( $yourls_locale_formats ) )
		$yourls_locale_formats = new YOURLS_Locale_Formats();
		
	if( $weekday === '' )
		return $yourls_locale_formats->weekday_abbrev;
	
	if( is_int( $weekday ) ) {
		$day = $yourls_locale_formats->weekday[ $weekday ];
		return $yourls_locale_formats->weekday_abbrev[ $day ];
	} else {
		return $yourls_locale_formats->weekday_abbrev[ yourls__( $weekday ) ];
	}
}

/**
 * Return translated weekday initial (1 letter, eg 'F' for 'Friday')
 *
 * The $weekday var can be a textual string ('Friday'), a integer (0 to 6) or an empty string
 * If $weekday is an empty string, the function returns an array of all translated weekday initials
 *
 * @since 1.6
 * @param mixed $weekday A full textual weekday, eg "Friday", an integer (0 = Sunday, 1 = Monday, .. 6 = Saturday) or empty string
 * @return mixed Translated weekday initial, eg "V" (initial of "Vendredi") for "Friday" or 5, or array of all weekday initials
 */
function yourls_l10n_weekday_initial( $weekday = '' ){
	global $yourls_locale_formats;
	if( !isset( $yourls_locale_formats ) )
		$yourls_locale_formats = new YOURLS_Locale_Formats();
		
	if( $weekday === '' )
		return $yourls_locale_formats->weekday_initial;
	
	if( is_int( $weekday ) ) {
		$weekday = $yourls_locale_formats->weekday[ $weekday ];
		return $yourls_locale_formats->weekday_initial[ $weekday ];
	} else {
		return $yourls_locale_formats->weekday_initial[ yourls__( $weekday ) ];
	}
}

/**
 * Return translated month abbrevation (3 letters, eg 'Nov' for 'November')
 *
 * The $month var can be a textual string ('November'), a integer (1 to 12), a two digits strings ('01' to '12), or an empty string
 * If $month is an empty string, the function returns an array of all translated abbrev months ('January' => 'Jan', ...)
 *
 * @since 1.6
 * @param mixed $month Empty string, a full textual weekday, eg "November", or an integer (1 = January, .., 12 = December)
 * @return mixed Translated month abbrev (eg "Nov"), or array of all translated abbrev months
 */
function yourls_l10n_month_abbrev( $month = '' ){
	global $yourls_locale_formats;
	if( !isset( $yourls_locale_formats ) )
		$yourls_locale_formats = new YOURLS_Locale_Formats();
	
	if( $month === '' )
		return $yourls_locale_formats->month_abbrev;
	
	if( intval( $month ) > 0 ) {
        $month = sprintf('%02d', intval( $month ) );
		$month = $yourls_locale_formats->month[ $month ];
		return $yourls_locale_formats->month_abbrev[ $month ];
	} else {
		return $yourls_locale_formats->month_abbrev[ yourls__( $month ) ];
	}
}

/**
 * Return array of all translated months
 *
 * @since 1.6
 * @return array Array of all translated months
 */
function yourls_l10n_months(){
	global $yourls_locale_formats;
	if( !isset( $yourls_locale_formats ) )
		$yourls_locale_formats = new YOURLS_Locale_Formats();
	
	return $yourls_locale_formats->month;
}
