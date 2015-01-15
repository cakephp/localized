<?php
/**
 * ID Localized Validation class. Handles localized validation for Indonesia.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('LocalizedValidation', 'Localized.Validation');

/**
 * IdValidation
 *
 */
class IdValidation extends LocalizedValidation {

/**
 * Checks a postal code for Indonesia.
 *
 * @param string $check The value to check.
 * @return bool Success.
 */
	public static function postal($check) {
		$pattern = '/[1-9][0-9]{4}/';
		return preg_match($pattern, $check);
	}

/**
 * Basic Check for Valid Mobile Mumbers for Indonesia.
 *
 * @param string $check The value to check.
 * @return bool Success.
 */
	public static function mobile($check) {
		$pattern = '/(^0|^62|\+62)(8[0-9]{8,10})$/';
		return preg_match($pattern, $check);
	}

/**
 * Checks a phone number.
 *
 * @param string $check The value to check.
 * @return bool Success.
 * @throws NotImplementedException
 */
	public static function phone($check) {
		throw new NotImplementedException('Validation method not implemented yet.');
	}

/**
 * Checks a country specific identification number.
 *
 * @param string $check The value to check.
 * @return bool Success.
 * @throws NotImplementedException
 */
	public static function personId($check) {
		throw new NotImplementedException('Validation method not implemented yet.');
	}

}
