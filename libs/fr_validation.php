<?php
/**
 * French Localized Validation class. Handles localized validation for France
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * FrValidation
 *
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 */
class FrValidation {

/**
 * Checks phone numbers for France
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function phone($check) {
		$pattern = '/^0[1-6]{1}(([0-9]{2}){4})|((\s[0-9]{2}){4})|((-[0-9]{2}){4})$/';
		return preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for France
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function postal($check) {
		$pattern = '/^\d{5}$/';
		return preg_match($pattern, $check);
	}

/**
 * Checks social security numbers numbers for France
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function ssn($check) {
		$pattern = '/^[12]\d{2}(0\d|1[012])(\d{2}|2[AB])(\d{6}|\d{8})$/';
		if (!preg_match($pattern, $check)) {
			return false;
		}

		// No key to check
		if (strlen($check) == 13) {
			return true;
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

		// bcmod works with large numbers where % doesn't
		$expectedKey = 97 - bcmod($numberWithoutKey, 97);

		return ($expectedKey == $key);
	}
}
?>