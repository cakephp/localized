<?php
/**
 * Swiss Localized Validation class. Handles localized validation for Switzerland.
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
 * ChValidation
 *
 */
class ChValidation extends LocalizedValidation {

/**
 * Checks a postal code for Switzerland & Liechtenstein
 *
 * @param string $check The value to check.
 * @return bool Success.
 *
 * @link http://en.wikipedia.org/wiki/Postal_codes_in_Switzerland_and_Liechtenstein
 */
	public static function postal($check) {
		$pattern = '/^[1-9][0-9]{3}$/';
		return (bool)preg_match($pattern, $check);
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
