<?php
/**
 * ID Localized Validation class. Handles localized validation for Indonesia
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * IdValidation
 *
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 */
class IdValidation {

/**
 * Checks zipcodes for Indonesia
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/[1-9][0-9]{4}/';
		return preg_match($pattern, $check);
	}

/**
 * Basic Check for Valid Mobile Mumbers for Indonesia
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function mobile($check) {
		$pattern = '/(^0|^62|\+62)(8[0-9]{8,10})$/';
		return preg_match($pattern, $check);
	}
}
