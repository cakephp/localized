<?php
/**
 * UK Localized Validation class. Handles localized validation for The United Kingdom
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
 * UkValidation
 *
 * @package       Localized.Validation
 */
class UkValidation {

/**
 * Checks phone numbers for The United Kingdom
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function phone($check) {
		$pattern = "/^\(?(?:(?:0(?:0|11)\)?[\s-]?\(?\+?|\+)?(44)\)?[\s-]?\(?(?:0\)?[\s-]?\(?)?|0\)?[\s-]?\(?)?((?:1[1-9]|2[03489]|3[0347]|5[056]|7[04-9]|8[047]|9[018])(?:\)?[\s-]?\d){4}(?:[\s-]?\d){3,4})$/";
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for The United Kingdom
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/\\A\\b[A-Z]{1,2}[0-9][A-Z0-9]? [0-9][ABD-HJLNP-UW-Z]{2}\\b\\z/i';
		return (bool)preg_match($pattern, $check);
	}
}
