<?php
/**
 * Norwegian Localized Validation class. Handles localized validation for Norway.
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

/**
 * NoValidation
 *
 */
class NoValidation extends LocalizedValidation
{
    /**
     * Checks date of birth formal format for Norway (dd.mm.yyyy),
     * afterwards checks if is a valid gregorian calendar date.
     *
     * @param string $check the date of birth.
     * @return bool Success.
     */
    public static function dob($check)
    {
        $pattern = '/^\d{1,2}\.\d{1,2}\.(\d{2}|\d{4})$/';
        $return = preg_match($pattern, $check);
        if (!$return) {
            return false;
        }
        $check = str_replace('.', ',', $check);
        $check = explode(',', $check, 3);
        return checkdate((int)$check[1], (int)$check[0], (int)$check[2]);
    }

    /**
     * Checks a phone number for Norway.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        return (bool)preg_match('/^((\d{8})|(\d{3} \d{2} \d{3})|(\d{2} \d{2} \d{2} \d{2}))$/', $check);
    }

    /**
     * Checks a postal code for Norway.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/^\d{4}$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a social security number for Norway.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId($check)
    {
        $pattern = '/^(\d{11})|(\d{6} \d{5})$/';
        return (bool)preg_match($pattern, $check);
    }
}
