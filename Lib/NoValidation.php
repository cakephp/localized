<?php
/**
 * Norwegian Localized Validation class. Handles localized validation for Norway
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       Localized.Lib
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * NoValidation
 *
 * @package       Localized.Lib
 */
class NoValidation {

/**
 * Checks Postal Codes for Norway
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/^[0-9]{4}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks social security numbers for Norway
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function ssn($check) {
		$pattern = '/[0-9]{11}/';
		return (bool)preg_match($pattern, $check);
	}
}
