<?php
/**
 * German Localized Validation class. Handles localized validation for Germany
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
 * DeValidation
 *
 * @package       Localized.Validation
 */
class DeValidation {

/**
 * Checks zipcodes for Germany
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/^[0-9]{5}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks an adress (street and number) for Germany.
 * That is what is called "Straße und Hausnummer",
 * the first line of a german formal address block.
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function address1($check) {
		$pattern = '/[a-zA-ZäöüÄÖÜß \.]+ [0-9]+[a-zA-Z]?/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks phone number for Germany
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function phone($check) {
		$pattern = '/[0-9\/. \-]*/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks date of birth formal format for Germany (dd.mm.yyyy),
 * afterwards checks it is a valid gregorian calendar date.
 *
 * @param string $check the date of birth.
 * @return boolean
 */
	public static function dob($check) {
		$pattern = '/^\d{2}\.\d{2}\.(\d{2}|\d{4})$/';
		$return = preg_match($pattern, $check);
		if ($return) {
			$check = str_replace('.', ',', $check);
		} else {
			return false;
		}
		$check = explode(',', $check, 3);
		return checkdate((int)$check[1], (int)$check[0], (int)$check[2]);
	}

}
