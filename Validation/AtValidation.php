<?php
/**
 * Austrian Localized Validation class. Handles localized validation for Austria.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       Localized.Validation
 * @since         Localized Plugin v 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('LocalizedValidation', 'Localized.Validation');

/**
 * AtValidation
 *
 * @package       Localized.Validation
 */
class AtValidation extends LocalizedValidation {

	protected static $_pattern = array(
		'postal' => '/^[0-9]{4}$/'
	);

/**
 * Checks a postal code.
 *
 * @param string $check The value to check.
 * @return boolean Success.
 */
	public static function postal($check) {
		$pattern = static::_getPattern(__FUNCTION__);
		return (bool)preg_match($pattern, $check);
	}

}
