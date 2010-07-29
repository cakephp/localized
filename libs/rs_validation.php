<?php
/**
 * Serbian Localized Validation class. Handles localized validation for Serbia
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
 * @subpackage    localized.libs
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * RsValidation
 *
 * @package       localized
 * @subpackage    localized.libs
 */
class RsValidation {

/**
 * Checks Postal Numbers (Poštanski broj) for Serbia
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function postal_number($check) {
		$pattern = '/^[0-9]{5}$/';
		return preg_match($pattern, $check);
	}

/**
 * Checks Address Codes (Adresni kod) for Serbia
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function address_code($check) {
		$pattern = '/^[0-9]{6}$/';
		return preg_match($pattern, $check);
	}

/**
 * Checks Unique Master Citizen Numbers (JMBG) for Serbia
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 * @link http://en.wikipedia.org/wiki/Unique_Master_Citizen_Number
 */	
	function jmbg($check) {
		if (!preg_match('/^[0-9]{13}$/', $check)) {
			return false;
		}

		list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m) = str_split($check);		
		$checksum = 11 - ( 7 * ($a + $g) + 6 * ($b + $h) + 5 * ($c + $i) + 4 * ($d + $j) + 3 * ($e + $k) + 2 * ($f + $l) ) % 11;
		return ($checksum == $m);
	}
}
