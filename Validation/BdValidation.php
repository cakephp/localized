<?php
/**
 * BD Localized Validation class. Handles localized validation for Bangladesh.
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
 * @since         Localized Plugin v 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('ValidationInterface', 'Localized.Validation');

/**
 * BdValidation
 *
 */
class BdValidation implements ValidationInterface {

/**
 * Checks a postal code for Bangladesh.
 *
 * @param string $check The value to check.
 * @return bool Success.
 */
	public static function postal($check) {
		$pattern = '/^\d{4}$/';
		return (bool)preg_match($pattern, $check);
	}

	public static function phone($string) {
		throw new NotImplementedException('Not implemented yet.');
	}

	public static function identification($string) {
		throw new NotImplementedException('Not implemented yet.');
	}

}
