<?php
/**
 * Turkey Localised Validation class. Handles localised validation for Turkey.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       Localized.Validation
 * @since         Localized Plugin v 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('LocalizedValidation', 'Localized.Validation');

/**
 * TrValidation
 *
 * @package       Localized.Validation
 */
class TrValidation extends LocalizedValidation {

/**
 * Checks a postal code for Turkey.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 */
	public static function postal($check) {
		$pattern = '/^[0-9]{5}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks an identity number for Turkey.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 */
	public static function personId($check) {
		$pattern = '/^[0-9]{11}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks a phone number.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 * @throws NotImplementedException
 */
	public static function phone($check) {
		throw new NotImplementedException('Not implemented yet.');
	}

/**
 * Checks an identity number for Turkey.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 * @deprecated Use personId() instead.
 */
	public static function trIdentityNumber($check) {
		return self::personId($check);
	}

}
