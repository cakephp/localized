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
 * @package       Localized.Validation
 * @since         Localized Plugin v 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('LocalizedValidation', 'Localized.Validation');

/**
 * BdValidation
 *
 * @package       Localized.Validation
 */
class BdValidation extends LocalizedValidation {

/**
 * Checks a postal code for Bangladesh.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 */
	public static function postal($check) {
		$pattern = '/^\d{4}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * BdValidation::phone()
 *
 * @param mixed $string
 * @return boolean Success.
 * @throws NotImplementedException
 */
	public static function phone($string) {
		throw new NotImplementedException('Not implemented yet.');
	}

/**
 * BdValidation::personId()
 *
 * @param mixed $string
 * @return boolean Success.
 * @throws NotImplementedException
 */
	public static function personId($string) {
		throw new NotImplementedException('Not implemented yet.');
	}

}
