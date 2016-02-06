<?php
/**
 * Russian Localized Validation class. Handles localized validation for Russia
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

/**
 * RuValidation
 *
 */
class RuValidation extends LocalizedValidation
{
    /**
     * Checks a postal code for Russia
     *
     * @param string $check The value to check.
     * @return bool Success.
     * @link https://en.wikipedia.org/wiki/List_of_postal_codes_in_Russia
     */
    public static function postal($check)
    {
        $pattern = '/^((1[0-2][1-9]|110|120)|14[0-24]|15[0236]|16[01236789]|17[03]|18[03-8]|19[0-9]|214|236|24[18]|30[01258]|344|35[0589]|36[0-4789]|39[0246-8]|40[034]|41[04]|42[04568]|43[0-2]|44[03]|45[0234]|460|555|60[012367]|61[049]|62[0589]|63[04]|64[04789]|65[056]|66[04579]|67[0125789]|68[035789]|69[03])[0-9]{3}$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks an adress (street) for Russia.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function address1($check)
    {
        $pattern = '/^[a-zA-Z\p{Cyrillic} \.]+,/u';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks phone number for Russia
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        $pattern = '/^\+7 \(\d+\) \d{3,}$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks passport number
     *
     * @param string $check The value to check
     * @return bool Success.
     * @link https://en.wikipedia.org/wiki/Internal_Passport_of_Russia
     */
    public static function passport($check)
    {
        $pattern = '/^\d{4} \d{6}$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * VAT identification number (Tax Identification Number, ИНН)
     *
     * @param string $check The value to check.
     * @return bool Success.
     * @link https://en.wikipedia.org/wiki/VAT_identification_number
     */
    public static function vatin($check)
    {
        $pattern = '/^\d{10}|\d{12}$/';
        if (!preg_match($pattern, $check)) {
            return false;
        }

        $digits = str_split($check); // getting digits & positions from id string

        $calculatedChecksum = null;
        if (strlen($check) === 10) {
            // legal person
            $checksum = array_pop($digits);
            $tbNum = [2, 4, 10, 3, 5, 9, 4, 6, 8];
            $calculatedChecksum = array_sum(array_map(function ($value, $multiplier) {
                return $value * $multiplier;
            }, $tbNum, $digits)) % 11 % 10;
        } else {
            // human person
            $checksum = join('', array_slice($digits, -2));
            $digits = array_slice($digits, 0, -1);

            $tbNum = [
                [7, 2, 4, 10, 3, 5, 9, 4, 6, 8],
                [3, 7, 2, 4, 10, 3, 5, 9, 4, 6, 8],
            ];

            $sum = [0, 0];
            foreach ($tbNum as $key => $multipliers) {
                $sum[$key] = array_sum(array_map(function ($value, $multiplier) {
                    return $value * $multiplier;
                }, $multipliers, $digits)) % 11 % 10;
            }

            $calculatedChecksum = join('', $sum);
        }

        return (int)$checksum === (int)$calculatedChecksum;
    }

    /**
     * Checks a country specific identification number.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId($check)
    {
        return static::snils($check);
    }

    /**
     * Check SNILS (СНИЛС)
     *
     * @param string $check The value to check.
     * @return bool Success.
     * @link https://ru.wikipedia.org/wiki/СНИЛС
     */
    public static function snils($check)
    {
        $pattern = '/\d{3}-\d{3}-\d{3} \d{2}/';
        if (!preg_match($pattern, $check)) {
            return false;
        }

        list ($id, $checksum) = explode(' ', $check, 2);

        $id = str_replace('-', '', $id);
        // getting digits & positions from id string
        $digits = array_reverse(str_split($id));

        $sum = 0;
        foreach ($digits as $position => $value) {
            $sum += ($position + 1) * $value;
        }

        $calculatedChecksum = $sum % 101;
        $calculatedChecksum = str_pad($calculatedChecksum, 2, '0', STR_PAD_LEFT);
        $calculatedChecksum = substr($calculatedChecksum, -2);

        return $calculatedChecksum === $checksum;
    }
}
