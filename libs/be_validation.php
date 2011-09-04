<?php
/**
 * Belgian Localized Validation class. Handles localized validation for Belgium
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
 * BeValidation
 *
 * @package       localized
 * @subpackage    localized.libs
 */
class BeValidation {

/**
 * Checks zipcodes for Belgium
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function postal($check) {
		$pattern = '/^[1-9]{1}[0-9]{3}|0612$/';
		return preg_match($pattern, $check);
	}

/**
 * Checks social security numbers (rijksregisternummer) for Belgium
 * 
 * Strict format is: ##.##.##-###.##
 *
 * @param string $check The value to check.
 * @param bool $strictFormat Boolean to toggle strict format checking
 * @return boolean
 * @access public
 */
	function ssn($check, $strictFormat = true) {
		if ($strictFormat && !preg_match('/[\d]{2}\.[\d]{2}\.[\d]{2}-[\d]{3}\.[\d]{2}/', $check)) {
			return false;
		}

		$ssn = preg_replace('/\D/','',$check);
		$controlDigits = substr($ssn, -2);
		$principal = substr($ssn, 0, -2);

		if (97 - ($principal % 97) == $controlDigits) {
			return true;
		}

		$principal = '2' . $principal;
		if (97 - ($principal % 97) == $controlDigits) {
			return true;
		}

		return false;
	}
}
