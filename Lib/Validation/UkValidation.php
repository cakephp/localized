<?php
/**
 * UK Localized Validation class. Handles localized validation for The United Kingdom
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
 * UkValidation
 *
 * @package       Localized.Validation
 */
class UkValidation {

/**
 * Checks zipcodes for The United Kingdom
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/\\A\\b[A-Z]{1,2}[0-9][A-Z0-9]? [0-9][ABD-HJLNP-UW-Z]{2}\\b\\z/i';
		return (bool)preg_match($pattern, $check);
	}
}
