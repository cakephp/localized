<?php
/**
 * Brazillian Localized Validation class. Handles localized validation for Brazil
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
 * BrValidation
 *
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 */
class BrValidation {

/**
 * Checks phone numbers for Brazil
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function phone($check) {
		return (bool)preg_match('/^(\+?\d{1,3}? ?)?(\(0?\d{2}\) ?)?\d{4}[-. ]?\d{4}$/', $check);
	}

/**
 * Checks zipcodes (CEP) for Brazil
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function postal($check) {
		return (bool)preg_match('/^[0-9]{5}-?[0-9]{3}$/', $check);
	}

/**
 * Checks SSN for Brazil
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function ssn($check) {
		$check = preg_replace('/[^0-9]/', '', $check);
		return BrValidation::cpf($check) || BrValidation::cnjp($check);
	}

/**
 * Checks CPF for Brazil
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function cpf($check) {
		if (strlen($check) != 11) {
			return false;
		}
		$dv = substr($check, -2);
		for ($pos = 9; $pos <= 10; $pos++) {
			$sum = 0;
			$position = $pos + 1;
			for ($i = 0; $i <= $pos - 1; $i++, $position--) {
				$sum += $check[$i] * $position;
			}
			$div = $sum % 11;
			if ($div < 2) {
				$check[$pos] = 0;
			} else {
				$check[$pos] = 11 - $div;
			}
		}
		$dvRight = $check[9] * 10 + $check[10];
		return ($dvRight == $dv);
	}

/**
 * Checks CNJP for Brazil
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function cnjp($check) {
		if (strlen($check) != 14) {
			return false;
		}
		$first_sum = ($check[0] * 5) + ($check[1] * 4) + ($check[2] * 3) + ($check[3] * 2) +
			($check[4] * 9) + ($check[5] * 8) + ($check[6] * 7) + ($check[7] * 6) +
			($check[8] * 5) + ($check[9] * 4) + ($check[10] * 3) + ($check[11] * 2);

		$first_verification_digit = ($first_sum % 11) < 2 ? 0 : 11 - ($first_sum % 11);

		$second_sum = ($check[0] * 6) + ($check[1] * 5) + ($check[2] * 4)+($check[3] * 3) +
			($check[4] * 2) + ($check[5] * 9) + ($check[6] * 8) + ($check[7] * 7) +
			($check[8] * 6) + ($check[9] * 5) + ($check[10] * 4) + ($check[11] * 3) +
			($check[12] * 2);

		$second_verification_digit = ($second_sum % 11) < 2 ? 0 : 11 - ($second_sum % 11);
		return ($check[12] == $first_verification_digit) && ($check[13] == $second_verification_digit);
	}
}
?>