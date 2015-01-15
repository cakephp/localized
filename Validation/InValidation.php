<?php
/**
 * Indian Localized Validation class. Handles localized validation for India
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('LocalizedValidation', 'Localized.Validation');

/**
 * InValidation
 */
class InValidation extends LocalizedValidation {

/**
 * Validate postal code
 *
 * @param string $check The value to check.
 * @return bool Success.
 */
	public static function postal($check) {
		$pattern = '/^\d{3}\s?\d{3}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Validate phone number
 *
 * @param string $check The value to check.
 * @return bool Success.
 */
	public static function phone($check) {
		$pattern = '/((\+*)((0[ -]+)*|(91 )*)(\d{12}+|\d{10}+))|\d{5}([- ]*)\d{6}/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks an identification number.
 *
 * @param string $check The value to check.
 * @return bool Success.
 * @throws NotImplementedException
 */
	public static function personId($check) {
		throw new NotImplementedException('Validation method not implemented yet.');
	}

}
