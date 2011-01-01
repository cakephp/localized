<?php
/**
 * Iranian Localized Validation class. Handles localized validation for Iran
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
 * IrValidation
 *
 * @package       localized
 * @subpackage    localized.libs
 */
class IrValidation {

/**
 * Checks phone numbers for Iran
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function phone($check) {
                $pattern = '/^[- .\(\)]?((98)|(\+98)|(0098)|0){1}[- .\(\)]{0,3}[1-9]{1}[0-9]{1,}[- .\(\)]*[0-9]{3,8}[- .\(\)]?$/';
		return preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for Iran
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function postal($check) {
		$pattern = '/^\d{10}$/';
		return preg_match($pattern, $check);
	}

/**
 * Checks social security numbers for Iran
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function ssn($check) {
		$pattern = '/^\d{10}$/';
                if (!preg_match($pattern, $check)) {
                        return false;
                }
                $sum = 0;
                for ($i = 0; $i < 9; $i++) {
                      $sum+=$check{$i} * (10 - $i);
                }
                $remaining = $sum % 11;
                if ($remaining <= 1) {
                    return ($remaining==$check{9})?true:false;
                }else{
                    return ((11-$remaining)==$check{9})?true:false;
                }
	}
}
