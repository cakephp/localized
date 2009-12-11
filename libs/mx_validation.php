<?php
/**
 * Mexican Localized Validation class. Handles localized validation for Mexico
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
 * MxValidation
 *
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 */
class MxValidation {

/**
 * Checks phone numbers for Mexico
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function phone($check) {
		$pattern = '/^(\d{8}|\d{10}|\d{13}|((\d{2}[-,\s]){4}\d{2})|\(\d{3}\)\d{3}-\d{4}|\(\d{2}\)\d{4}-\d{4}|\d{3}[-,\s]\d{2}[-,\s]\d{8})$/i';
		return preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for Mexico
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function postal($check) {
		$pattern = '/^\d{5}$/i';
		return preg_match($pattern, $check);
	}
}
?>