<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('ValidationInterface', 'Localized.Validation');

/**
 * Localized Validation base class.
 *
 */
abstract class LocalizedValidation implements ValidationInterface {

/**
 * Checks that a value is a valid identification number.
 * In the case of US this would be the Social Security Number (SSN).
 *
 * This is necessary for CakePHP2.x validation and BC compatibility.
 *
 * @param string $check The value to check.
 * @return bool Success.
 * @deprecated Use personId() instead.
 */
	public static function ssn($check) {
		return static::personId($check);
	}

}
