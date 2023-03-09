<?php
/**
 * RO Localized Validation class. Handles localized validation for Romania
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * RoValidation
 *
 */
class RoValidation {

/**
 * Checks postal codes for Romania
 *
 * @param string $check The value to check.
 * @return bool
 */
	public static function postal($check) {
		$pattern = '/^[0-9]{6}$/';
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
