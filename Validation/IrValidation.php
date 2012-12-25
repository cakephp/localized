<?php
/**
 * Iranian Localized Validation class. Handles localized validation for Iran
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
 * IrValidation
 *
 * @package       Localized.Validation
 */
class IrValidation {

/**
 * Check for Persian/Farsi characters and number an zero width non-joiner space.
 * Also accpets latin numbers preventing potential problem until PHP becomes fully unicode compatible.
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function alphaNumeric($check) {
		$pattern = '/[^\x{0600}-\x{06FF}\x{FB50}-\x{FDFD}\x{FE70}-\x{FEFF}\x{0750}-\x{077F}0-9\s\x{200C}]+/u';
		return !preg_match($pattern, $check);
	}

/**
 * Checks for Persian/Farsi digits only and won't accept Arabic and Latin digits.
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function numeric($check) {
		$pattern = '/[^\x{06F0}-\x{06F9}\x]+/u';
		return !preg_match($pattern, $check);
	}

/**
 * Validation of Iran credit card numbers.
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function cc($check) {
		$pattern = '/[0-9]{4}-?[0-9]{4}-?[0-9]{4}-?[0-9]{4}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks phone numbers for Iran
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function phone($check) {
		$pattern = '/^[- .\(\)]?((98)|(\+98)|(0098)|0){1}[- .\(\)]{0,3}[1-9]{1}[0-9]{1,}[- .\(\)]*[0-9]{3,8}[- .\(\)]?$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks mobile numbers for Iran
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function mobile($check) {
		$pattern = '/^[- .\(\)]?((98)|(\+98)|(0098)|0){1}[- .\(\)]{0,3}((91)|(93)){1}[0-9]{8}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for Iran
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/^\d{10}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks social security numbers for Iran
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function ssn($check) {
		$pattern = '/^\d{10}$/';
		if (!preg_match($pattern, $check)) {
			return false;
		}
		$sum = 0;
		$equivalent = 0;
		for ($i = 0; $i < 9; $i++) {
			$sum += $check{$i} * (10 - $i);
			if ($check{1} == $check{$i}) {
				$equivalent++;
			}
		}
		if ($equivalent == 10) {
			return false;
		}
		$remaining = $sum % 11;
		if ($remaining <= 1) {
			return (bool)($remaining == $check{9});
		} else {
			return (bool)((11 - $remaining) == $check{9});
		}
	}
}
