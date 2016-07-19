<?php
/**
 * Ukrainian Localized Validation class. Handles localized validation for Ukraine
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @since         Localized Plugin v 1.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

use Cake\Network\Exception\NotImplementedException;

/**
 * UaValidation
 *
 */
class UaValidation extends LocalizedValidation
{
    /**
     * Checks a postal (zip) code for Ukraine
     *
     * @example 85111; 01996; 65000;
     * @param string $check The value to check.
     * @return bool Success.
     * @link https://en.wikipedia.org/wiki/Postal_codes_in_Ukraine
     */
    public static function postal($check)
    {
        $pattern = '/^(0[1-9][0-9][0-9][0-9]|1[0-9][0-9][0-9][0-9]|2[0-9][0-9][0-9][0-9]|3[0-9][0-9][0-9][0-9]|4[0-9][0-9][0-9][0-9]|5[0-9][0-9][0-9][0-9]|6[0-9][0-9][0-9][0-9]|7[0-9][0-9][0-9][0-9]|8[0-9][0-9][0-9][0-9]|9[0-9][0-9][0-9][0-9]|)$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks phone number for Ukraine
     *
     * @example +38-044-283-93-57; (068)2839357; +380442839357; +38 (063)537-28-07; 8044223-95-26; +380612839357;
     * @param string $check The value to check.
     * @return bool Success.
     * @link https://en.wikipedia.org/wiki/Telephone_numbers_in_Ukraine
     */
    public static function phone($check)
    {
        $pattern = '/^((8|\+38)-?)?(\(?+...\)?)?-?\d{3}-?\d{2}-?\d{2}$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks passport number from 1992 until 2016.
     *
     * @example КС845696; МН655933;
     * @param string $check The value to check
     * @return bool Success.
     * @link https://en.wikipedia.org/wiki/Ukrainian_identity_card#Previous_internal_passport
     */
    public static function passport($check)
    {
        $pattern = '/^[АБВГҐДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯ]{2}\d{6}/u';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks passport ID card. From 2016.
     *
     * @param string $check The value to check
     * @return bool Success.
     * @link https://en.wikipedia.org/wiki/Ukrainian_identity_card#Current_identity_card
     */
    public static function idCard($check)
    {
        $pattern = '/^(\d{8}-\d{5})$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a country specific identification number.
     *
     * @param string $check The value to check.
     * @return bool Success.
     * @link https://en.wikipedia.org/wiki/VAT_identification_number#VAT_numbers_of_non-EU_countries
     */
    public static function personId($check)
    {
        $pattern = '/^\d{10}$/';

        return (bool)preg_match($pattern, $check);
    }
}
