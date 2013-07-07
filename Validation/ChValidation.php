<?php
/**
 * Swiss Localized Validation class. Handles localized validation for Switzerland
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
 * ChValidation
 *
 * @package       Localized.Validation
 */
class ChValidation {

/**
 * Checks zip codes for Switzerland & Liechtenstein
 *
 * @param string $check The value to check.
 * @return boolean
 *
 * @link http://en.wikipedia.org/wiki/Postal_codes_in_Switzerland_and_Liechtenstein
 */
	public static function postal($check) {
		$pattern = '/^[1-9][0-9]{3}$/';
		return (bool)preg_match($pattern, $check);
	}

}
