<?php
declare(strict_types=1);

/**
 * Tunisia Localized Validation class. Handles localized validation for Tunisia.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link http://cakephp.org
 * @since Localized Plugin v 0.1
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

/**
 * TnValidation
 */
class TnValidation extends LocalizedValidation
{
    /**
     * Define locale to be used by that localized
     * validation set
     *
     * @var string
     */
    protected static string $validationLocale = 'ar_TN';

    /**
     * Checks a phone number for Tunisia.
     *
     * @param string $check The value to check.
     * @return bool Success.
     * @see https://en.wikipedia.org/wiki/Telephone_numbers_in_Tunisia
     */
    public static function phone(string $check): bool
    {
        $pattern = '/^(00216|\+216){0,1}(2|4|5|7|9)(\d{7})$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a postal code for Tunisia.
     *
     * @param string $check The value to check.
     * @return bool Success.
     * @see https://en.wikipedia.org/wiki/Postal_codes_in_Tunisia
     */
    public static function postal(string $check): bool
    {
        $pattern = '/^[1-9][0-2]\d{2}$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a Tunisian identification number.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId(string $check): bool
    {
        $pattern = '/^\d{8,9}$/';

        return (bool)preg_match($pattern, $check);
    }
}
