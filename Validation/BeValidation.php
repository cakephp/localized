<?php
/**
 * Belgian Localized Validation class. Handles localized validation for Belgium.
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
 * BeValidation
 *
 * @package       Localized.Validation
 */
class BeValidation extends LocalizedValidation {

/**
 * Checks a postal code for Belgium.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 */
	public static function postal($check) {
		$pattern = '/^[1-9]{1}[0-9]{3}$/';
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
 * Checks a country specific person id.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 * @throws NotImplementedException
 */
	public static function personId($check) {
		throw new NotImplementedException('Not implemented yet.');
	}

}
