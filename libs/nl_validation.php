<?php
/**
 * Dutch Localized Validation class. Handles localized validation for The Netherlands
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
 * NlValidation
 *
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 */
class NlValidation {

/**
 * Checks phone numbers for The Netherlands
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function phone($check) {
		$pattern = '/^0(6[\s-]?[1-9]\d{7}|[1-9]\d[\s-]?[1-9]\d{6}|[1-9]\d{2}[\s-]?[1-9]\d{5})$/';
		return preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for The Netherlands
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function postal($check) {
		$pattern = '/^[1-9][0-9]{3}\s?[A-Z]{2}$/i';
		return preg_match($pattern, $check);
	}

/**
 * Checks social security numbers (BSN) for The Netherlands
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function ssn($check) {
		$pattern = '/\\A\\b[0-9]{9}\\b\\z/i';
		return preg_match($pattern, $check);
	}
}
?>