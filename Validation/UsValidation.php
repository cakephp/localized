<?php
/**
 * US Localized Validation class. Handles localized validation for The United States
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       Localized.Validation
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * UsValidation
 *
 * @package       Localized.Validation
 */
class UsValidation {

/**
 * Checks phone numbers for The United States
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function phone($check) {
		$pattern = '/^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|3[02-689][0-9]|9[02-57-9][0-9]|[246-8][02-46-8][02-46-9])\s*\)';
		$pattern .= '|(55[0-46-9]|5[0-46-9][5]|[0-46-9]55|[2-9]1[02-9]|[2-9][02-8]1|[2-46-9][02-46-8][02-46-9]))\s*(?:[.-]\s*)?)';
		$pattern .= '(?!(555(?:\s*(?:[.|\-|\s]\s*))(01([0-9][0-9])|1212)))';
		$pattern .= '(?!(555(01([0-9][0-9])|1212)))';
		$pattern .= '([2-9]1[02-9]|[2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)';
		$pattern .= '?([0-9]{4})';
		$pattern .= '(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for The United States
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/\\A\\b[0-9]{5}(?:-[0-9]{4})?\\b\\z/i';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks social security numbers for The United States
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function ssn($check) {
		$pattern = '/\\A\\b[0-9]{3}-[0-9]{2}-[0-9]{4}\\b\\z/i';
		return (bool)preg_match($pattern, $check);
	}
}
