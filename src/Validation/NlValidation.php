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
 * @since         Localized Plugin v 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

/**
 * Dutch Localized Validation class. Handles localized validation for The Netherlands
 *
 */
class NlValidation extends LocalizedValidation
{
    /**
     * Checks a phone number for The Netherlands
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        $pattern = '/^0(6[\s-]?[1-9]\d{7}|[1-9]\d[\s-]?[1-9]\d{6}|[1-9]\d{2}[\s-]?[1-9]\d{5})$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a postal code for The Netherlands
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/^[1-9][0-9]{3}\s?[A-Z]{2}$/i';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a social security number (BSN) for The Netherlands
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId($check)
    {
        $pattern = '/\\A\\b[0-9]{9}\\b\\z/i';
        return (bool)preg_match($pattern, $check);
    }
}
