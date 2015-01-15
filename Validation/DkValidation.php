<?php
/**
 * Danish Localized Validation class. Handles localized validation for Denmark.
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
 * DkValidation
 *
 */
class DkValidation extends LocalizedValidation {

/**
 * Checks a social security number for Denmark.
 *
 * @param string $check The value to check.
 * @return bool Success
 */
	public static function personId($check) {
		$pattern = '/\\A\\b[0-9]{6}-[0-9]{4}\\b\\z/i';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks a postal code for Denmark.
 *
 * @param string $check The value to check.
 * @return bool Success
 * @throws NotImplementedException
 */
	public static function postal($check) {
		throw new NotImplementedException('Validation method not implemented yet.');
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

}
