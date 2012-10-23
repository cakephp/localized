<?php
/**
 * Dutch Localized Validation class. Handles localized validation for The Netherlands
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
 * NlValidation
 *
 * @package       Localized.Validation
 */
class NlValidation {

/**
 * Checks phone numbers for The Netherlands
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function phone($check) {
		$pattern = '/^0(6[\s-]?[1-9]\d{7}|[1-9]\d[\s-]?[1-9]\d{6}|[1-9]\d{2}[\s-]?[1-9]\d{5})$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for The Netherlands
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/^[1-9][0-9]{3}\s?[A-Z]{2}$/i';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks social security numbers (BSN) for The Netherlands
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function ssn($check) {
		$pattern = '/\\A\\b[0-9]{9}\\b\\z/i';
		return (bool)preg_match($pattern, $check);
	}
}
