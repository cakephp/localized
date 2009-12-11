<?php
/**
 * US Localized Validation class. Handles localized validation for The United States
 *
 * PHP versions 4 and 5
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
 * UsValidation
 *
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 */
class UsValidation {

/**
 * Checks phone numbers for The United States
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function phone($check) {
		$pattern = '/^(?:\+?1)?[-. ]?\\(?[2-9][0-8][0-9]\\)?[-. ]?[2-9][0-9]{2}[-. ]?[0-9]{4}$/';
		return preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for The United States
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function postal($check) {
		$pattern = '/\\A\\b[0-9]{5}(?:-[0-9]{4})?\\b\\z/i';
		return preg_match($pattern, $check);
	}

/**
 * Checks social security numbers for The United States
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function ssn($check) {
		$pattern = '/\\A\\b[0-9]{3}-[0-9]{2}-[0-9]{4}\\b\\z/i';
		return preg_match($pattern, $check);
	}
}
?>