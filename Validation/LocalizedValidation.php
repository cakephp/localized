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
 * LocalizedValidation
 *
 * @package       Localized.Validation
 */
abstract class LocalizedValidation {

/**
 * Holds the patterns for the various checks.
 *
 * @var array
 */
	protected static $_pattern = array();

/**
 * Checks a phone number.
 *
 * @param string $string The value to check.
 * @return boolean Success.
 */
	public static function phone($string) {
		$pattern = static::_getPattern('phone');
		return (bool)preg_match($pattern, $string);
	}

/**
 * Checks a postal code.
 *
 * @param string $string The value to check.
 * @return boolean Success.
 */
	public static function postal($string) {
		$pattern = static::_getPattern('postal');
		return (bool)preg_match($pattern, $string);
	}

/**
 * Checks a country specific person ID.
 *
 * @param string $string The value to check.
 * @return boolean Success.
 */
	public static function personId($string) {
		$pattern = static::_getPattern('personId');
		return (bool)preg_match($pattern, $string);
	}

/**
 * Get the regexp pattern for a specific name.
 *
 * @param string $name Name.
 * @return string Regex pattern.
 * @throws NotImplementedException If no regex pattern can be found for this name.
 */
	protected static function _getPattern($name) {
		if (isset(static::$_pattern[$name])) {
			return static::$_pattern[$name];
		}
		if (isset(self::$_pattern[$name])) {
			return self::$_pattern[$name];
		}
		throw new NotImplementedException(__d('localized', 'There is no regex pattern for %s defined', $name));
	}

}
