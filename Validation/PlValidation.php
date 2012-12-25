<?php
/**
 * Polish Localized Validation class. Handles localized validation for Poland
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
 * PlValidation
 *
 * @package       Localized.Validation
 */
class PlValidation {

/**
 * Check zipcodes for Poland
 *
 * @param string $check Value to check
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/^[0-9]{2}-[0-9]{3}$/D';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks social security numbers (NIP) for Poland
 *
 * @param string $check Value to check
 * @return boolean
 * @link http://pl.wikipedia.org/wiki/NIP
 */
	public static function ssn($check) {
		$pattern = '/^([0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2})|([0-9]{3}-[0-9]{2}-[0-9]{2}-[0-9]{3})|([0-9]{10})$/';
		if (!preg_match($pattern, $check)) {
			return false;
		}

		$sum = 0;
		$weights = array(6, 5, 7, 2, 3, 4, 5, 6, 7);
		$check = str_replace('-', '', $check);

		for ($i = 0; $i < 9; $i++) {
			$sum += $check[$i] * $weights[$i];
		}

		$control = $sum % 11;
		if ($control == 10) {
			$control = 0;
		}

		if ($check[9] == $control) {
			return true;
		}
		return false;
	}

/**
 * Check PESEL
 * Universal Electronic System for Registration of the Population in Poland
 *
 * @param string $check Value to check
 * @return boolean
 * @link http://pl.wikipedia.org/wiki/PESEL
 */
	public static function pesel($check) {
		$pattern = '/^[0-9]{11}$/';
		if (preg_match($pattern, $check)) {
			$sum = 0;
			$weights = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3);

			for ($i = 0; $i < 10; $i++) {
				$sum += $check[$i] * $weights[$i];
			}

			$control = 10 - $sum % 10;
			if ($control == 10) {
				$control = 0;
			}

			if ($check[10] == $control) {
				return true;
			}
		}
		return false;
	}

/**
 * Check REGON
 * National Business Registry Number in Poland
 *
 * @param string $check Value to check
 * @return boolean
 * @link http://pl.wikipedia.org/wiki/REGON
 */
	public static function regon($check) {
		$pattern = '/^[0-9]{9}$/';
		if (preg_match($pattern, $check)) {
			$sum = 0;
			$weights = array(8, 9, 2, 3, 4, 5, 6, 7);

			for ($i = 0; $i < 8; $i++) {
				$sum += $check[$i] * $weights[$i];
			}

			$control = $sum % 11;
			if ($control == 10) {
				$control = 0;
			}

			if ($check[8] == $control) {
				return true;
			}
		}
		return false;
	}
}
