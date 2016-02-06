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
 * @since         localized 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

/**
 * LT Localized Validation class. Handles localized validation for the Lithuanian language
 *
 */
class LtValidation extends LocalizedValidation
{
    /**
     * Checks a phone number for the Lithuania.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        $pattern = "/^(([\+]?370)|(8))[\s-]?\(?[0-9]{2,3}\)?[\s-]?([0-9]{2}[\s-]?){2}?[0-9]{1,2}$/";
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a postal code for the Lithuania.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/^(lt)?[\s-]?[\d]{5}$/i';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a social security number for the Lithuania.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId($check)
    {
        $pattern = '/^([a-z]{2})[\s-]?[\d]{7}$/i';
        return (bool)preg_match($pattern, $check);
    }
}
