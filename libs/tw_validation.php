<?php
/**
 * Taiwan Localized Validation class. Handles localized validation for Taiwan
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
 * @since         localized 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class TwValidation {

/**
 * Checks phone numbers for Taiwan
 *
 * @param string $check The value to check.
 * @access public
 * @return boolean
 */
	function phone($check) {
		$pattern = '/^\\(?(0|\\+886)[-. ]?[2-9][\\)-. ]?([0-9][\\)-. ]?){2}([0-9][-. ]?){3}[0-9]{2}[0-9]?$/';
		return preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for Taiwan
 *
 * @param string $check The value to check.
 * @access public
 * @return boolean
 */
	function postal($check) {
		$pattern = '/^[1-9][0-9]{2}([0-9]{2})?$/';
		return preg_match($pattern, $check);
	}

/**
 * Checks national identify card number for Taiwan
 *
 * @param string $check The value to check.
 * @access public
 * @return boolean
 */
	function nicn($check) {
		$check = strtoupper($check);
		if(strlen($check) != 10) {
            return false;
        }
        if(!preg_match('/^\\A\\b[A-Z][1-2][0-9]{8}\\b\\z/', $check)) {
            return false;
        }
        $keyTable = array('A' => 10, 'B' => 11, 'C' => 12, 'D' => 13, 'E' => 14, 'F' => 15,
        'G' => 16, 'H' => 17, 'I' => 34, 'J' => 18, 'K' => 19, 'L' => 20, 'M' => 21, 'N' => 22,
        'O' => 35, 'P' => 23, 'Q' => 24, 'R' => 25, 'S' => 26, 'T' => 27, 'U' => 28, 'V' => 29,
        'W' => 32, 'X' => 30, 'Y' => 31, 'Z' => 33
        );
        $checksum = 0;
        $n1 = $keyTable[$check{0}];
        $checksum += intval($n1 / 10);
        $checksum += ($n1 % 10) * 9;
        for($i = 1; $i < 9; $i++) {
            $checksum += $check{$i} * (9 - $i);
        }
        if(substr(10 - ($checksum % 10), -1, 1) == $check{9}) {
            return true;
        } else {
            return false;
        }
	}
}