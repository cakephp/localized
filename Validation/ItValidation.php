<?php
/**
 * Italian Localized Validation class. Handles localized validation for Italy
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
 * ItValidation
 *
 * @package       Localized.Validation
 */
class ItValidation {

/**
 * Checks phone numbers for Italy
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function phone($check) {
		$pattern = '/^([0-9]*\-?\ ?\/?[0-9]*)$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for Italy
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/^[0-9]{5}$/i';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks Codice Fiscale for Italy
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function cf($check) {
		$check = strtoupper($check);
		if (strlen($check) != 16 || !preg_match('/[A-Z]{6}[0-9]{2}[A-Z][0-9]{2}[A-Z][0-9]{3}[A-Z]/', $check)) {
			return false;
		}

		$checkOdd = array(
			'0' => 1, '1' => 0, '2' => 5, '3' => 7, '4' => 9, '5' => 13,
			'6' => 15, '7' => 17, '8' => 19, '9' => 21,
			'A' => 1, 'B' => 0, 'C' => 5, 'D' => 7, 'E' => 9, 'F' => 13,
			'G' => 15, 'H' => 17, 'I' => 19, 'J' => 21, 'K' => 2, 'L' => 4,
			'M' => 18, 'N' => 20, 'O' => 11, 'P' => 3, 'Q' => 6, 'R' => 8,
			'S' => 12, 'T' => 14, 'U' => 16, 'V' => 10, 'W' => 22, 'X' => 25,
			'Y' => 24, 'Z' => 23);
		$sum = 0;

		for ($i = 1; $i <= 13; $i += 2) {
			$sum += (is_numeric($check[$i])) ? (int)$check[$i] : ord($check[$i]) - ord('A');
		}

		for ($i = 0; $i <= 14; $i += 2) {
			$sum += $checkOdd[$check[$i]];
		}
		return (chr($sum % 26 + ord('A')) == $check[15]);
	}
}
