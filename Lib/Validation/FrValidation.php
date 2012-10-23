<?php
/**
 * French Localized Validation class. Handles localized validation for France
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
 * FrValidation
 *
 * @package       Localized.Validation
 */
class FrValidation {

/**
 * Checks phone numbers for France
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function phone($check) {
		$pattern = '/^0[1-6]{1}(([0-9]{2}){4})|((\s[0-9]{2}){4})|((-[0-9]{2}){4})$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for France
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/^\d{5}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks social security numbers numbers for France
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function ssn($check) {
		$pattern = '/^[12]\d{2}(0\d|1[012])(\d{2}|2[AB])\d{8}$/';
		if (!preg_match($pattern, $check)) {
			return false;
		}

		$numberWithoutKey = substr($check, 0, -2);
		$key = substr($check, -2);

		// Corse special cases
		// source : http://xml.insee.fr/schema/nir.html
		// check : http://www.parodie.com/monetique/nir.htm
		if ($numberWithoutKey[6] == 'A') {
			$numberWithoutKey = str_replace('A', '0', $numberWithoutKey);
			$numberWithoutKey -= 1000000;
		} elseif ($numberWithoutKey[6] == 'B') {
			$numberWithoutKey = str_replace('B', '0', $numberWithoutKey);
			$numberWithoutKey -= 2000000;
		}
		return $key == (97 - ($numberWithoutKey - (floor($numberWithoutKey / 97) * 97)));
	}
}
