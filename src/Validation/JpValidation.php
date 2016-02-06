<?php
/**
 * Japanese Localized Validation class. Handles localized validation for Japan.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

use Cake\Network\Exception\NotImplementedException;

/**
 * JpValidation
 *
 */
class JpValidation extends LocalizedValidation
{
    /**
     * Checks a phone number for Japan.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        $pattern = '/^(0\d{1,4}[\s-]?\d{1,4}[\s-]?\d{1,4}|\+\d{1,3}[\s-]?\d{1,4}[\s-]?\d{1,4}[\s-]?\d{1,4})$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a postal code for Japan.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/^[0-9]{3}-[0-9]{4}$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks hiragana
     * ぁ-ゖー
     *
     * @param string $check The value to check.
     * @param bool $allowSpace Allow double-byte space.
     * @return bool Success.
     */
    public static function hiragana($check, $allowSpace = true)
    {
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
     * @param bool $allowSpace Allow double-byte space.
     * @return bool Success.
     */
    public static function katakana($check, $allowSpace = true)
    {
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
     * @return bool Success.
     */
    public static function zenkaku($check)
    {
        $length = mb_strlen($check);
        for ($i = 0; $i < $length; $i++) {
            $char = mb_substr($check, $i, 1);
            if (mb_strlen($char) === mb_strwidth($char)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Checks a country specific identification number.
     *
     * @param string $check The value to check.
     * @throws NotImplementedException Exception
     * @return bool Success.
     */
    public static function personId($check)
    {
        throw new NotImplementedException(__d('localized', '%s Not implemented yet.'));
    }
}
