<?php
/**
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
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * ValidationInterface
 *
 * @package       Localized.Validation
 */
interface ValidationInterface {

/**
 * Checks a phone number.
 *
 * @param string $string The value to check.
 * @return boolean Success.
 */
	public static function phone($string);

/**
 * Checks a postal code.
 *
 * @param string $string The value to check.
 * @return boolean Success.
 */
	public static function postal($string);

/**
 * Checks a country specific identification number.
 *
 * @param string $string The value to check.
 * @return boolean Success.
 */
	public static function identification($string);

}
