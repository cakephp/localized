<?php
/**
 * RO Localized Validation class. Handles localized validation for Romania
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
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * RoValidation
 *
 */
class RoValidation {

/**
 * Checks postal codes for Romania
 *
 * @param string $check The value to check.
 * @return bool
 */
	public static function postal($check) {
		$pattern = '/^[0-9]{6}$/';
		return (bool)preg_match($pattern, $check);
	}

}
