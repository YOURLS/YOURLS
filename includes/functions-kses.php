<?php
/**
 * YOURLS modification of a small subset from WordPress' KSES implementation.
 * Straight from the Let's Not Reinvent The Wheel department.
 */

/**
 * kses 0.2.2 - HTML/XHTML filter that only allows some elements and attributes
 * Copyright (C) 2002, 2003, 2005  Ulf Harnhammar
 *
 * This program is free software and open source software; you can redistribute
 * it and/or modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin St, Fifth Floor, Boston, MA 02110-1301, USA
 * http://www.gnu.org/licenses/gpl.html
 *
 * [kses strips evil scripts!]
 *
 * @version 0.2.2
 * @copyright (C) 2002, 2003, 2005
 * @author Ulf Harnhammar <http://advogato.org/person/metaur/>
 *
 * @package External
 * @subpackage KSES
 *
 */

/* NOTE ABOUT GLOBALS
 * Two globals are defined: $yourls_allowedentitynames and $yourls_allowedprotocols
 * - $yourls_allowedentitynames is used internally in KSES functions to sanitize HTML entities
 * - $yourls_allowedprotocols is used in various parts of YOURLS, not just in KSES, albeit being defined here
 * Two globals are not defined and unused at this moment: $yourls_allowedtags_all and $yourls_allowedtags
 * The code for these vars is here and ready for any future use 
 */

// Populate after plugins have loaded to allow user defined values
yourls_add_action( 'plugins_loaded', 'yourls_kses_init' );
 
/**
 * Init KSES globals if not already defined (by a plugin)
 *
 * @since 1.6
 *
 */
function yourls_kses_init() {
	global $yourls_allowedentitynames, $yourls_allowedprotocols;

	if( ! $yourls_allowedentitynames ) {
		$yourls_allowedentitynames = yourls_apply_filter( 'kses_allowed_entities', yourls_kses_allowed_entities() );
	}
	
	if( ! $yourls_allowedprotocols ) {
		$yourls_allowedprotocols   = yourls_apply_filter( 'kses_allowed_protocols', yourls_kses_allowed_protocols() );
	}	

	/** See NOTE ABOUT GLOBALS **
	
	if( ! $yourls_allowedtags_all ) {
		$yourls_allowedtags_all = yourls_kses_allowed_tags_all();
		$yourls_allowedtags_all = array_map( '_yourls_add_global_attributes', $yourls_allowedtags_all );
		$yourls_allowedtags_all = yourls_apply_filter( 'kses_allowed_tags_all', $yourls_allowedtags_all );
	} else {
		// User defined: let's sanitize
		$yourls_allowedtags_all = yourls_kses_array_lc( $yourls_allowedtags_all );
	}
	
	if( ! $yourls_allowedtags ) {
		$yourls_allowedtags = yourls_kses_allowed_tags();
		$yourls_allowedtags = array_map( '_yourls_add_global_attributes', $yourls_allowedtags );
		$yourls_allowedtags = yourls_apply_filter( 'kses_allowed_tags', $yourls_allowedtags );
	} else {
		// User defined: let's sanitize
		$yourls_allowedtags = yourls_kses_array_lc( $yourls_allowedtags );
	}

	/**/
}
 
/**
 * Kses global for all allowable HTML tags.
 *
 * Complete (?) list of HTML tags. Keep this function available for any plugin or
 * future feature that will want to display lots of HTML.
 *
 * @since 1.6
 *
 * @return array All tags
 */
function yourls_kses_allowed_tags_all() {
	return array(
		'address' => array(),
		'a' => array(
			'href' => true,
			'rel' => true,
			'rev' => true,
			'name' => true,
			'target' => true,
		),
		'abbr' => array(),
		'acronym' => array(),
		'area' => array(
			'alt' => true,
			'coords' => true,
			'href' => true,
			'nohref' => true,
			'shape' => true,
			'target' => true,
		),
		'article' => array(
			'align' => true,
			'dir' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'aside' => array(
			'align' => true,
			'dir' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'b' => array(),
		'big' => array(),
		'blockquote' => array(
			'cite' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'br' => array(),
		'button' => array(
			'disabled' => true,
			'name' => true,
			'type' => true,
			'value' => true,
		),
		'caption' => array(
			'align' => true,
		),
		'cite' => array(
			'dir' => true,
			'lang' => true,
		),
		'code' => array(),
		'col' => array(
			'align' => true,
			'char' => true,
			'charoff' => true,
			'span' => true,
			'dir' => true,
			'valign' => true,
			'width' => true,
		),
		'del' => array(
			'datetime' => true,
		),
		'dd' => array(),
		'details' => array(
			'align' => true,
			'dir' => true,
			'lang' => true,
			'open' => true,
			'xml:lang' => true,
		),
		'div' => array(
			'align' => true,
			'dir' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'dl' => array(),
		'dt' => array(),
		'em' => array(),
		'fieldset' => array(),
		'figure' => array(
			'align' => true,
			'dir' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'figcaption' => array(
			'align' => true,
			'dir' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'font' => array(
			'color' => true,
			'face' => true,
			'size' => true,
		),
		'footer' => array(
			'align' => true,
			'dir' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'form' => array(
			'action' => true,
			'accept' => true,
			'accept-charset' => true,
			'enctype' => true,
			'method' => true,
			'name' => true,
			'target' => true,
		),
		'h1' => array(
			'align' => true,
		),
		'h2' => array(
			'align' => true,
		),
		'h3' => array(
			'align' => true,
		),
		'h4' => array(
			'align' => true,
		),
		'h5' => array(
			'align' => true,
		),
		'h6' => array(
			'align' => true,
		),
		'header' => array(
			'align' => true,
			'dir' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'hgroup' => array(
			'align' => true,
			'dir' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'hr' => array(
			'align' => true,
			'noshade' => true,
			'size' => true,
			'width' => true,
		),
		'i' => array(),
		'img' => array(
			'alt' => true,
			'align' => true,
			'border' => true,
			'height' => true,
			'hspace' => true,
			'longdesc' => true,
			'vspace' => true,
			'src' => true,
			'usemap' => true,
			'width' => true,
		),
		'ins' => array(
			'datetime' => true,
			'cite' => true,
		),
		'kbd' => array(),
		'label' => array(
			'for' => true,
		),
		'legend' => array(
			'align' => true,
		),
		'li' => array(
			'align' => true,
		),
		'map' => array(
			'name' => true,
		),
		'menu' => array(
			'type' => true,
		),
		'nav' => array(
			'align' => true,
			'dir' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'p' => array(
			'align' => true,
			'dir' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'pre' => array(
			'width' => true,
		),
		'q' => array(
			'cite' => true,
		),
		's' => array(),
		'span' => array(
			'dir' => true,
			'align' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'section' => array(
			'align' => true,
			'dir' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'small' => array(),
		'strike' => array(),
		'strong' => array(),
		'sub' => array(),
		'summary' => array(
			'align' => true,
			'dir' => true,
			'lang' => true,
			'xml:lang' => true,
		),
		'sup' => array(),
		'table' => array(
			'align' => true,
			'bgcolor' => true,
			'border' => true,
			'cellpadding' => true,
			'cellspacing' => true,
			'dir' => true,
			'rules' => true,
			'summary' => true,
			'width' => true,
		),
		'tbody' => array(
			'align' => true,
			'char' => true,
			'charoff' => true,
			'valign' => true,
		),
		'td' => array(
			'abbr' => true,
			'align' => true,
			'axis' => true,
			'bgcolor' => true,
			'char' => true,
			'charoff' => true,
			'colspan' => true,
			'dir' => true,
			'headers' => true,
			'height' => true,
			'nowrap' => true,
			'rowspan' => true,
			'scope' => true,
			'valign' => true,
			'width' => true,
		),
		'textarea' => array(
			'cols' => true,
			'rows' => true,
			'disabled' => true,
			'name' => true,
			'readonly' => true,
		),
		'tfoot' => array(
			'align' => true,
			'char' => true,
			'charoff' => true,
			'valign' => true,
		),
		'th' => array(
			'abbr' => true,
			'align' => true,
			'axis' => true,
			'bgcolor' => true,
			'char' => true,
			'charoff' => true,
			'colspan' => true,
			'headers' => true,
			'height' => true,
			'nowrap' => true,
			'rowspan' => true,
			'scope' => true,
			'valign' => true,
			'width' => true,
		),
		'thead' => array(
			'align' => true,
			'char' => true,
			'charoff' => true,
			'valign' => true,
		),
		'title' => array(),
		'tr' => array(
			'align' => true,
			'bgcolor' => true,
			'char' => true,
			'charoff' => true,
			'valign' => true,
		),
		'tt' => array(),
		'u' => array(),
		'ul' => array(
			'type' => true,
		),
		'ol' => array(
			'start' => true,
			'type' => true,
		),
		'var' => array(),
	);
}
 
/**
 * Kses global for default allowable HTML tags. TODO: trim down to necessary only.
 *
 * Short list of HTML tags used in YOURLS core for display
 *
 * @since 1.6
 *
 * @return array Allowed tags
 */
function yourls_kses_allowed_tags() {
	return array(
		'a' => array(
			'href' => true,
			'title' => true,
		),
		'abbr' => array(
			'title' => true,
		),
		'acronym' => array(
			'title' => true,
		),
		'b' => array(),
		'blockquote' => array(
			'cite' => true,
		),
		'cite' => array(),
		'code' => array(),
		'del' => array(
			'datetime' => true,
		),
		'em' => array(),
		'i' => array(),
		'q' => array(
			'cite' => true,
		),
		'strike' => array(),
		'strong' => array(),
	);
}

/**
 * Kses global for allowable HTML entities.
 *
 * @since 1.6
 *
 * @return array Allowed entities
 */
function yourls_kses_allowed_entities() {
	return array(
		'nbsp',    'iexcl',  'cent',    'pound',  'curren', 'yen',
		'brvbar',  'sect',   'uml',     'copy',   'ordf',   'laquo',
		'not',     'shy',    'reg',     'macr',   'deg',    'plusmn',
		'acute',   'micro',  'para',    'middot', 'cedil',  'ordm',
		'raquo',   'iquest', 'Agrave',  'Aacute', 'Acirc',  'Atilde',
		'Auml',    'Aring',  'AElig',   'Ccedil', 'Egrave', 'Eacute',
		'Ecirc',   'Euml',   'Igrave',  'Iacute', 'Icirc',  'Iuml',
		'ETH',     'Ntilde', 'Ograve',  'Oacute', 'Ocirc',  'Otilde',
		'Ouml',    'times',  'Oslash',  'Ugrave', 'Uacute', 'Ucirc',
		'Uuml',    'Yacute', 'THORN',   'szlig',  'agrave', 'aacute',
		'acirc',   'atilde', 'auml',    'aring',  'aelig',  'ccedil',
		'egrave',  'eacute', 'ecirc',   'euml',   'igrave', 'iacute',
		'icirc',   'iuml',   'eth',     'ntilde', 'ograve', 'oacute',
		'ocirc',   'otilde', 'ouml',    'divide', 'oslash', 'ugrave',
		'uacute',  'ucirc',  'uuml',    'yacute', 'thorn',  'yuml',
		'quot',    'amp',    'lt',      'gt',     'apos',   'OElig',
		'oelig',   'Scaron', 'scaron',  'Yuml',   'circ',   'tilde',
		'ensp',    'emsp',   'thinsp',  'zwnj',   'zwj',    'lrm',
		'rlm',     'ndash',  'mdash',   'lsquo',  'rsquo',  'sbquo',
		'ldquo',   'rdquo',  'bdquo',   'dagger', 'Dagger', 'permil',
		'lsaquo',  'rsaquo', 'euro',    'fnof',   'Alpha',  'Beta',
		'Gamma',   'Delta',  'Epsilon', 'Zeta',   'Eta',    'Theta',
		'Iota',    'Kappa',  'Lambda',  'Mu',     'Nu',     'Xi',
		'Omicron', 'Pi',     'Rho',     'Sigma',  'Tau',    'Upsilon',
		'Phi',     'Chi',    'Psi',     'Omega',  'alpha',  'beta',
		'gamma',   'delta',  'epsilon', 'zeta',   'eta',    'theta',
		'iota',    'kappa',  'lambda',  'mu',     'nu',     'xi',
		'omicron', 'pi',     'rho',     'sigmaf', 'sigma',  'tau',
		'upsilon', 'phi',    'chi',     'psi',    'omega',  'thetasym',
		'upsih',   'piv',    'bull',    'hellip', 'prime',  'Prime',
		'oline',   'frasl',  'weierp',  'image',  'real',   'trade',
		'alefsym', 'larr',   'uarr',    'rarr',   'darr',   'harr',
		'crarr',   'lArr',   'uArr',    'rArr',   'dArr',   'hArr',
		'forall',  'part',   'exist',   'empty',  'nabla',  'isin',
		'notin',   'ni',     'prod',    'sum',    'minus',  'lowast',
		'radic',   'prop',   'infin',   'ang',    'and',    'or',
		'cap',     'cup',    'int',     'sim',    'cong',   'asymp',
		'ne',      'equiv',  'le',      'ge',     'sub',    'sup',
		'nsub',    'sube',   'supe',    'oplus',  'otimes', 'perp',
		'sdot',    'lceil',  'rceil',   'lfloor', 'rfloor', 'lang',
		'rang',    'loz',    'spades',  'clubs',  'hearts', 'diams',
	);
}

/**
 * Kses global for allowable protocols.
 *
 * @since 1.6
 *
 * @return array Allowed protocols
 */
function yourls_kses_allowed_protocols() {
	// More or less common stuff in links. From http://en.wikipedia.org/wiki/URI_scheme
	return array(
		// Common
		'http://', 'https://', 'ftp://',
		'file://', 'smb://',
		'sftp://',
		'feed:', 'feed://',
		'mailto:',
		'news:', 'nntp://',
		
		// Old school bearded geek
		'gopher://', 'telnet://', 'finger://',
		'nntp://', 'worldwind://',
		
		// Dev
		'ssh://', 'svn://', 'svn+ssh://', 'git://', 'cvs://',
		'apt:',
		'market://', // Google Play
		'view-source:',
		
		// P2P
		'ed2k://', 'magnet:', 'udp://',
		
		// Streaming stuff
		'mms://', 'lastfm://', 'spotify:', 'rtsp://',

		// Text & voice
		'aim:', 'facetime://', 'gtalk:', 'xmpp:',
		'irc://', 'ircs://', 'mumble://', 
		'callto:', 'skype:', 'sip:',
		'teamspeak://', 'tel:', 'ventrilo://', 'xfire:', 
		'ymsgr:', 

		// Misc
		'steam:', 'steam://',
		'bitcoin:',
		'ldap://', 'ldaps://',
		
		// Purposedly removed for security
		/*
		'about:', 'chrome://', 'chrome-extension://',
		'javascript:', 
		'data:',
		*/
	);
}


/**
 * Converts and fixes HTML entities.
 *
 * This function normalizes HTML entities. It will convert "AT&T" to the correct
 * "AT&amp;T", "&#00058;" to "&#58;", "&#XYZZY;" to "&amp;#XYZZY;" and so on.
 *
 * @since 1.6
 *
 * @param string $string Content to normalize entities
 * @return string Content with normalized entities
 */
function yourls_kses_normalize_entities($string) {
	# Disarm all entities by converting & to &amp;

	$string = str_replace('&', '&amp;', $string);

	# Change back the allowed entities in our entity whitelist

	$string = preg_replace_callback('/&amp;([A-Za-z]{2,8});/', 'yourls_kses_named_entities', $string);
	$string = preg_replace_callback('/&amp;#(0*[0-9]{1,7});/', 'yourls_kses_normalize_entities2', $string);
	$string = preg_replace_callback('/&amp;#[Xx](0*[0-9A-Fa-f]{1,6});/', 'yourls_kses_normalize_entities3', $string);

	return $string;
}

/**
 * Callback for yourls_kses_normalize_entities() regular expression.
 *
 * This function only accepts valid named entity references, which are finite,
 * case-sensitive, and highly scrutinized by HTML and XML validators.
 *
 * @since 1.6
 *
 * @param array $matches preg_replace_callback() matches array
 * @return string Correctly encoded entity
 */
function yourls_kses_named_entities($matches) {
	global $yourls_allowedentitynames;

	if ( empty($matches[1]) )
		return '';

	$i = $matches[1];
	return ( ( ! in_array($i, $yourls_allowedentitynames) ) ? "&amp;$i;" : "&$i;" );
}

/**
 * Callback for yourls_kses_normalize_entities() regular expression.
 *
 * This function helps yourls_kses_normalize_entities() to only accept 16-bit values
 * and nothing more for &#number; entities.
 *
 * @access private
 * @since 1.6
 *
 * @param array $matches preg_replace_callback() matches array
 * @return string Correctly encoded entity
 */
function yourls_kses_normalize_entities2($matches) {
	if ( empty($matches[1]) )
		return '';

	$i = $matches[1];
	if (yourls_valid_unicode($i)) {
		$i = str_pad(ltrim($i,'0'), 3, '0', STR_PAD_LEFT);
		$i = "&#$i;";
	} else {
		$i = "&amp;#$i;";
	}

	return $i;
}

/**
 * Callback for yourls_kses_normalize_entities() for regular expression.
 *
 * This function helps yourls_kses_normalize_entities() to only accept valid Unicode
 * numeric entities in hex form.
 *
 * @access private
 * @since 1.6
 *
 * @param array $matches preg_replace_callback() matches array
 * @return string Correctly encoded entity
 */
function yourls_kses_normalize_entities3($matches) {
	if ( empty($matches[1]) )
		return '';

	$hexchars = $matches[1];
	return ( ( ! yourls_valid_unicode(hexdec($hexchars)) ) ? "&amp;#x$hexchars;" : '&#x'.ltrim($hexchars,'0').';' );
}

/**
 * Helper function to add global attributes to a tag in the allowed html list.
 *
 * @since 1.6
 * @access private
 *
 * @param array $value An array of attributes.
 * @return array The array of attributes with global attributes added.
 */
function _yourls_add_global_attributes( $value ) {
	$global_attributes = array(
		'class' => true,
		'id' => true,
		'style' => true,
		'title' => true,
	);

	if ( true === $value )
		$value = array();

	if ( is_array( $value ) )
		return array_merge( $value, $global_attributes );

	return $value;
}

/**
 * Helper function to determine if a Unicode value is valid.
 *
 * @since 1.6
 *
 * @param int $i Unicode value
 * @return bool True if the value was a valid Unicode number
 */
function yourls_valid_unicode($i) {
	return ( $i == 0x9 || $i == 0xa || $i == 0xd ||
			($i >= 0x20 && $i <= 0xd7ff) ||
			($i >= 0xe000 && $i <= 0xfffd) ||
			($i >= 0x10000 && $i <= 0x10ffff) );
}

/**
 * Goes through an array and changes the keys to all lower case.
 *
 * @since 1.6
 *
 * @param array $inarray Unfiltered array
 * @return array Fixed array with all lowercase keys
 */
function yourls_kses_array_lc($inarray) {
	$outarray = array ();

	foreach ( (array) $inarray as $inkey => $inval) {
		$outkey = strtolower($inkey);
		$outarray[$outkey] = array ();

		foreach ( (array) $inval as $inkey2 => $inval2) {
			$outkey2 = strtolower($inkey2);
			$outarray[$outkey][$outkey2] = $inval2;
		} # foreach $inval
	} # foreach $inarray

	return $outarray;
}

/**
 * Convert all entities to their character counterparts.
 *
 * This function decodes numeric HTML entities (&#65; and &#x41;). It doesn't do
 * anything with other entities like &auml;, but we don't need them in the URL
 * protocol whitelisting system anyway.
 *
 * @since 1.6
 *
 * @param string $string Content to change entities
 * @return string Content after decoded entities
 */
function yourls_kses_decode_entities($string) {
	$string = preg_replace_callback('/&#([0-9]+);/', '_yourls_kses_decode_entities_chr', $string);
	$string = preg_replace_callback('/&#[Xx]([0-9A-Fa-f]+);/', '_yourls_kses_decode_entities_chr_hexdec', $string);

	return $string;
}

/**
 * Regex callback for yourls_kses_decode_entities()
 *
 * @since 1.6
 *
 * @param array $match preg match
 * @return string
 */
function _yourls_kses_decode_entities_chr( $match ) {
	return chr( $match[1] );
}

/**
 * Regex callback for yourls_kses_decode_entities()
 *
 * @since 1.6
 *
 * @param array $match preg match
 * @return string
 */
function _yourls_kses_decode_entities_chr_hexdec( $match ) {
	return chr( hexdec( $match[1] ) );
}

/**
 * Removes any null characters in $string.
 *
 * @since 1.6
 *
 * @param string $string
 * @return string
 */
function yourls_kses_no_null($string) {
	$string = preg_replace( '/\0+/', '', $string );
	$string = preg_replace( '/(\\\\0)+/', '', $string );

	return $string;
}
