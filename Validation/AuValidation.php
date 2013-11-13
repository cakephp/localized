<?php
/**
 * Australian Localised Validation class. Handles localised validation for Australia
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
 * @package       Localized.Validation
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * AuValidation
 *
 * @package       Localized.Validation
 */
class AuValidation {

/**
 * Checks Postal Codes for Australia
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/^[0-9]{4}$/';
		return (bool)preg_match($pattern, $check);
	}
/**
 * Checks Phone Numbers for Australia w/o parentheses.
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public statuc function phone($check) {
		$pattern = '/^(((0|\+61\s?)[2378])(\s|-)?\d{4}(\s|-)?\d{4}|((0|\+61\s?)4\d{2}|130?0?|1800|190[02])(\s|-)?\d{3}(\s|-)?\d{3})$/';
		return (bool)preg_match($pattern, $check);
	}
}
