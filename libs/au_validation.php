<?php
/**
 * Australian Localised Validation class. Handles localised validation for Australia
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       localized
 * @subpackage    localized.libs
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * AuValidation
 *
 * @package       localized
 * @subpackage    localized.libs
 */
class AuValidation {

/**
 * Checks Postal Codes for Australia
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function postal($check) {
		$pattern = '/^[0-9]{4}$/';
		return preg_match($pattern, $check);
	}

/**
 * Basic Check for Valid Mobile Mumbers for Australia
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function mobile($check) {
		$pattern = '/(^0|^61|\+61)(4[0-9]{8})$/';
		return preg_match($pattern, $check);
	}

}
