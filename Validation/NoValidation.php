<?php
/**
 * Norwegian Localized Validation class. Handles localized validation for Norway
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
 * NoValidation
 *
 * @package       Localized.Validation
 */
class NoValidation {

/**
 * Checks date of birth formal format for Norway (dd.mm.yyyy),
 * afterwards checks it is a valid gregorian calendar date.
 *
 * @param string $check the date of birth.
 * @return boolean
 */
	public static function dob($check) {
		$pattern = '/^\d{1,2}\.\d{1,2}\.(\d{2}|\d{4})$/';
		$return = preg_match($pattern, $check);
		if ($return) {
			$check = str_replace('.', ',', $check);
		} else {
			return false;
		}
		$check = explode(',', $check, 3);
		return checkdate((int)$check[1], (int)$check[0], (int)$check[2]);
	}

/**
 * Checks phone numbers for Norway
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function phone($check) {
		return (bool)preg_match('/^((\d{8})|(\d{3} \d{2} \d{3})|(\d{2} \d{2} \d{2} \d{2}))$/', $check);
	}

/**
 * Checks Postal Codes for Norway
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/^\d{4}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks social security numbers for Norway
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function ssn($check) {
		$pattern = '/^(\d{11})|(\d{6} \d{5})$/';
		return (bool)preg_match($pattern, $check);
	}
}
