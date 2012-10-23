<?php
/**
 * Mexican Localized Validation class. Handles localized validation for Mexico
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
 * MxValidation
 *
 * @package       Localized.Validation
 */
class MxValidation {

/**
 * Checks phone numbers for Mexico
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function phone($check) {
		$pattern = '/^(\d{8}|\d{10}|\d{13}|((\d{2}[-,\s]){4}\d{2})|\(\d{3}\)\d{3}-\d{4}|\(\d{2}\)\d{4}-\d{4}|\d{3}[-,\s]\d{2}[-,\s]\d{8})$/i';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for Mexico
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/^\d{5}$/i';
		return (bool)preg_match($pattern, $check);
	}
}
