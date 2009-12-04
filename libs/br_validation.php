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
 * @since         localized 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class BrValidation {

/**
 * Checks phone numbers for Brazil
 *
 * @param string $check The value to check.
 * @access public
 * @return boolean
 */
	function phone($check) {
		return (bool)preg_match('/^(\+?\d{1,3}? ?)?(\(0?\d{2}\) ?)?\d{4}[-. ]?\d{4}$/', $check);
	}

/**
 * Checks zipcodes (CEP) for Brazil
 *
 * @param string $check The value to check.
 * @access public
 * @return boolean
 */
	function postal($check) {
		return (bool)preg_match('/^[0-9]{5}-?[0-9]{3}$/', $check);
	}

/**
 * Checks cadastro de pessoa física (CPF) for Brazil
 *
 * @param string $check The value to check.
 * @access public
 * @return boolean
 */
	function ssn($check) {
		$check = str_replace(array(' ', '-', '.'), '', $check);
		if (strlen($check) !== 11 || !ctype_digit($check)) {
			return false;
		}
		$dv = substr($check, -2);
		for ($pos = 9; $pos <= 10; $pos++) {
			$sum = 0;
			$position = $pos + 1;
			for ($i = 0; $i <= $pos - 1; $i++, $position--) {
				$sum += $check{$i} * $position;
			}
			$div = $sum % 11;
			if ($div < 2) {
				$check{$pos} = 0;
			} else {
				$check{$pos} = 11 - $div;
			}
		}
		$dvRight = $check{9} * 10 + $check{10};
		return $dvRight == $dv;
	}
}
?>