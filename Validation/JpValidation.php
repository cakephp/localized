<?php
/**
 * Japanese Localized Validation class. Handles localized validation for Japan
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
 * JpValidation
 *
 * @package       Localized.Validation
 */
class JpValidation {

/**
 * Checks phone numbers for Japan
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function phone($check) {
		$pattern = '/^(0\d{1,4}[\s-]?\d{1,4}[\s-]?\d{1,4}|\+\d{1,3}[\s-]?\d{1,4}[\s-]?\d{1,4}[\s-]?\d{1,4})$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks zipcodes for Japan
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function postal($check) {
		$pattern = '/^[0-9]{3}-[0-9]{4}$/';
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks hiragana
 * ぁ-ゖー
 *
 * @param string $check The value to check.
 * @param boolean $allowSpace Allow double-byte space.
 * @return boolean
 */
	public static function hiragana($check, $allowSpace = true) {
		if ($allowSpace) {
			$pattern = '/^(\xe3(\x80\x80|\x81[\x81-\xbf]|\x82[\x80-\x96]|\x83\xbc))*$/';
		} else {
			$pattern = '/^(\xe3(\x81[\x81-\xbf]|\x82[\x80-\x96]|\x83\xbc))*$/';
		}
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks katakana
 * ァ-ヶー
 *
 * @param string $check The value to check.
 * @param boolean $allowSpace Allow double-byte space.
 * @return boolean
 */
	public static function katakana($check, $allowSpace = true) {
		if ($allowSpace) {
			$pattern = '/^(\xe3(\x80\x80|\x82[\xa1-\xbf]|\x83[\x80-\xb6]|\x83\xbc))*$/';
		} else {
			$pattern = '/^(\xe3(\x82[\xa1-\xbf]|\x83[\x80-\xb6]|\x83\xbc))*$/';
		}
		return (bool)preg_match($pattern, $check);
	}

/**
 * Checks zenkaku(double-byte characters)
 *
 * @param string $check The value to check.
 * @return boolean
 */
	public static function zenkaku($check) {
		$length = mb_strlen($check);
		for ($i = 0; $i < $length; $i++) {
			$char = mb_substr($check, $i, 1);
			if (mb_strlen($char) === mb_strwidth($char)) {
				return false;
			}
		}
		return true;
	}
}