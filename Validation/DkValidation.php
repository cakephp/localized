<?php
/**
 * Danish Localized Validation class. Handles localized validation for Denmark.
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
App::uses('ValidationInterface', 'Localized.Validation');

/**
 * DkValidation
 *
 * @package       Localized.Validation
 */
class DkValidation implements ValidationInterface {

/**
 * Checks a social security number for Denmark.
 *
 * @param string $check The value to check.
 * @return boolean Success
 */
	public static function identification($check) {
		$pattern = '/\\A\\b[0-9]{6}-[0-9]{4}\\b\\z/i';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks a social security number for Denmark.
 *
 * @param string $check The value to check.
 * @return boolean Success
 * @deprecated Use identification() instead.
 */
	public static function ssn($check) {
		return self::identification($check);
	}

/**
 * Checks a postal code for Denmark.
 *
 * @param string $check The value to check.
 * @return boolean Success
 * @throws NotImplementedException
 */
	public static function postal($check) {
		throw new NotImplementedException('Not implemented yet.');
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

}
