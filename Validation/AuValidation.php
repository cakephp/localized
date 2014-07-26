<?php
/**
 * Australian Localised Validation class. Handles localised validation for Australia
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
 * AuValidation
 *
 * @package       Localized.Validation
 */
class AuValidation {

/**
 * Checks Postal Codes for Australia
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/^[0-9]{4}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks Phone Numbers for Australia
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function phone($check) {
		$normalized = preg_replace('/(\s+|-|\(|\))/', '', preg_replace('/0011\s?61/', '+61', $check)); //remove spaces, parentheses and hyphens, convert full intl prefix.
		$pattern = '/^(((0|\+61)[2378])(\d){8}|((0|\+61)[45](\d){2}|1300|1800|190[02])(\d){6}|(\+61)?180(\d){4}|(\+61)?13\d{4}|(\+61)?12[2-8](\d){1,7}|(\+61|0)14[12357](\d){6})$/';
		return (bool)preg_match($pattern, $normalized);
	}
}
