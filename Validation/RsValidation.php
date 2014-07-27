<?php
/**
 * Serbian Localized Validation class. Handles localized validation for Serbia.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       Localized.Validation
 * @since         Localized Plugin v 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('ValidationInterface', 'Localized.Validation');

/**
 * RsValidation
 *
 * @package       Localized.Validation
 */
class RsValidation implements ValidationInterface {

/**
 * Checks a postal code (Poštanski broj) for Serbia.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 */
	public static function postal($check) {
		$pattern = '/^[0-9]{5}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks Unique Master Citizen Numbers (JMBG) for Serbia.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 * @link http://en.wikipedia.org/wiki/Unique_Master_Citizen_Number
 */
	public static function identification($check) {
		if (!preg_match('/^[0-9]{13}$/', $check)) {
			return false;
		}

		list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m) = str_split($check);
		$checksum = 11 - ( 7 * ($a + $g) + 6 * ($b + $h) + 5 * ($c + $i) + 4 * ($d + $j) + 3 * ($e + $k) + 2 * ($f + $l) ) % 11;
		return ($checksum == $m);
	}

/**
 * Checks an address code (Adresni kod) for Serbia.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 */
	public static function addressCode($check) {
		$pattern = '/^[0-9]{6}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks an address code (Adresni kod) for Serbia.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 * @deprecated Use addressCode() instead.
 */
	public static function address_code($check) {
		return self::addressCode($check);
	}

/**
 * Checks a postal code for Denmark.
 *
 * @param string $check The value to check.
 * @return boolean Success
 * @deprecated Use postal() instead.
 */
	public static function postal_number($check) {
		return self::postal($check);
	}

/**
 * Checks Unique Master Citizen Numbers (JMBG) for Serbia.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 * @link http://en.wikipedia.org/wiki/Unique_Master_Citizen_Number
 * @deprecated Use identification() instead.
 */
	public static function jmbg($check) {
		return self::identification($check);
	}

/**
 * Checks a phone number.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 * @throws NotImplementedException
 */
	public static function phone($check) {
		throw new NotImplementedException('Not implemented yet.');
	}

}
