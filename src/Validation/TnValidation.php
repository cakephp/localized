<?php
/**
 * Tunisia Localized Validation class. Handles localized validation for Tunisia.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

/**
 * TnValidation
 *
 */
class TnValidation extends LocalizedValidation
{
    /**
     * Checks a phone number for Tunisia.
     *
     * @param string $check The value to check.
     * @return bool Success.
     * @see https://en.wikipedia.org/wiki/Telephone_numbers_in_Tunisia
     */
    public static function phone($check)
    {
        $pattern = '/^(00216|\+216){0,1}(2|4|5|7|9)([0-9]{7})$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a postal code for Tunisia.
     *
     * @param string $check The value to check.
     * @return bool Success.
     * @see https://en.wikipedia.org/wiki/Postal_codes_in_Tunisia
     */
    public static function postal($check)
    {
        $pattern = '/^[1-9][0-2][0-9]{2}$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a Tunisian identification number.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId($check)
    {
        $pattern = '/^[0-9]{8,9}$/';

        return (bool)preg_match($pattern, $check);
    }
}
