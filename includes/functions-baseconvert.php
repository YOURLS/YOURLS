<?php
/*
 * PHP Number Base Conversion Functions
 * Version 1.0 - February 2004
 * Version 2.0 - January 2005 - converted to using bcmath
 * Version 2.1 - September 2005 - added decimal point conversion ability
 * (c) 2004,2005 Paul Gregg <pgregg@pgregg.com>
 * http://www.pgregg.com
 *
 * Function: Arbitrary Number Base conversion from base 2 - 62
 * This file should be included by other php scripts
 * For normal base 2 - 36 conversion use the built in base_convert function
 *
 * Open Source Code:	 If you use this code on your site for public
 * access (i.e. on the Internet) then you must attribute the author and
 * source web site: http://www.pgregg.com/projects/
 * You must also make this original source code available for download
 * unmodified or provide a link to the source.	Additionally you must provide
 * the source to any modified or translated versions or derivatives.
 *
 */
 
/* Ozh' note: this script:
 * - allows handling large integers on 32bits machines, which base_convert() does not
 * - allows encoding upt to base 64 (base_convert() is limited to 36)
 * - needs PHP extension BCCOMP (http://www.php.net/bccomp)
 */
 
function yourls_dec2base($iNum, $iBase, $iScale=0) { // cope with base 2..62
	$LDEBUG = FALSE;
	$sChars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$sResult = ''; // Store the result

	// special case for Base64 encoding
	if ($iBase == 64)
	 $sChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_';

	$sNum = is_integer($iNum) ? "$iNum" : (string)$iNum;
	$iBase = yourls_intval($iBase); // incase it is a string or some weird decimal

	// Check to see if we are an integer or real number
	if (strpos($sNum, '.') !== FALSE) {
		list ($sNum, $sReal) = explode('.', $sNum, 2);
		$sReal = '0.' . $sReal;
	} else
		$sReal = '0';

	while (bccomp($sNum, 0, $iScale) != 0) { // still data to process
		$sRem = bcmod($sNum, $iBase); // calc the remainder
		$sNum = bcdiv( bcsub($sNum, $sRem, $iScale), $iBase, $iScale );
		$sResult = $sChars[$sRem] . $sResult;
	}
	if ($sReal != '0') {
		$sResult .= '.';
		$fraciScale = $iScale;
		while($fraciScale-- && bccomp($sReal, 0, $iScale) != 0) { // still data to process
			if ($LDEBUG) print "<br> -> $sReal * $iBase = ";
			$sReal = bcmul($sReal, $iBase, $iScale); // multiple the float part with the base
			if ($LDEBUG) print "$sReal	=> ";
			$sFrac = 0;
			if (bccomp($sReal ,1, $iScale) > -1)
				list($sFrac, $dummy) = explode('.', $sReal, 2); // get the yourls_intval
			if ($LDEBUG) print "$sFrac\n";
			$sResult .= $sChars[$sFrac];
			$sReal = bcsub($sReal, $sFrac, $iScale);
		}
	}

	return $sResult;
}


function yourls_base2dec($sNum, $iBase=0, $iScale=0) {
	$sChars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$sResult = '';

	$iBase = yourls_intval($iBase); // incase it is a string or some weird decimal

	// special case for Base64 encoding
	if ($iBase == 64)
	 $sChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_';

	// clean up the input string if it uses particular input formats
	switch ($iBase) {
		case 16: // remove 0x from start of string
			if (strtolower(substr($sNum, 0, 2)) == '0x') $sNum = substr($sNum, 2);
			break;
		case 8: // remove the 0 from the start if it exists - not really required
			if (strpos($sNum, '0')===0) $sNum = substr($sNum, 1);
			break;
		case 2: // remove an 0b from the start if it exists
			if (strtolower(substr($sNum, 0, 2)) == '0b') $sNum = substr($sNum, 2);
			break;
		case 64: // remove padding chars: =
			$sNum = str_replace('=', '', $sNum);
			break;
		default: // Look for numbers in the format base#number,
						 // if so split it up and use the base from it
			if (strpos($sNum, '#') !== false) {
				list ($sBase, $sNum) = explode('#', $sNum, 2);
				$iBase = yourls_intval($sBase);	// take the new base
			}
			if ($iBase == 0) {
				print("yourls_base2dec called without a base value and not in base#number format");
				return '';
			}
			break;
	}

	// Convert string to upper case since base36 or less is case insensitive
	if ($iBase < 37) $sNum = strtoupper($sNum);

	// Check to see if we are an integer or real number
	if (strpos($sNum, '.') !== FALSE) {
		list ($sNum, $sReal) = explode('.', $sNum, 2);
		$sReal = '0.' . $sReal;
	} else
		$sReal = '0';


	// By now we know we have a correct base and number
	$iLen = strlen($sNum);
	
	// Now loop through each digit in the number
	for ($i=$iLen-1; $i>=0; $i--) {
		$sChar = $sNum[$i]; // extract the last char from the number
		$iValue = strpos($sChars, $sChar); // get the decimal value
		if ($iValue > $iBase) {
			print("yourls_base2dec: $sNum is not a valid base $iBase number");
			return '';
		}
		// Now convert the value+position to decimal
		$sResult = bcadd($sResult, bcmul( $iValue, bcpow($iBase, ($iLen-$i-1))) );
	}

	// Now append the real part
	if (strcmp($sReal, '0') != 0) {
		$sReal = substr($sReal, 2); // Chop off the '0.' characters
		$iLen = strlen($sReal);
		for ($i=0; $i<$iLen; $i++) {
			$sChar = $sReal[$i]; // extract the first, second, third, etc char
			$iValue = strpos($sChars, $sChar); // get the decimal value
			if ($iValue > $iBase) {
				print("yourls_base2dec: $sNum is not a valid base $iBase number");
				return '';
			}
			$sResult = bcadd($sResult, bcdiv($iValue, bcpow($iBase, ($i+1)), $iScale), $iScale);
		}
	}

	return $sResult;
}
		
function yourls_base2base($iNum, $iBase, $oBase, $iScale=0) {
	if (!function_exists('bccomp'))
		return base_convert($iNum, $iBase, $oBase);

	if ($iBase != 10) $oNum = yourls_base2dec($iNum, $iBase, $iScale);
		else $oNum = $iNum;
	$oNum = yourls_dec2base($oNum, $oBase, $iScale);
		return $oNum;
}

