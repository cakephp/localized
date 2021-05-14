<?php
declare(strict_types=1);

/**
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
 * Polish Localized Validation class. Handles localized validation for Poland.
 */
class PlValidation extends \Cake\Localized\Validation\LocalizedValidation
{
    /**
     * Define locale to be used by that localized
     * validation set
     *
     * @var string
     */
    protected static $validationLocale = 'pl_PL';

    /**
     * Checks a postal code for Poland.
     *
     * @param string $check Value to check
     * @return bool Success.
     */
    public static function postal(string $check): bool
    {
        $pattern = '/^\d{2}-\d{3}$/D';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a VAT identification number (NIP) for Poland.
     *
     * Note: the method name is misleading. In order to validate Person ID (PESEL) please use `pesel()` method instead.
     *
     * @param string $check Value to check
     * @return bool Success.
     * @deprecated 3.3.2 This method does not validate Polish Person ID and will be changed in the next major version.

     * To validate Person ID (PESEL) please use `pesel()` method instead.
     */
    public static function personId(string $check): bool
    {
        return static::nip($check);
    }

    /**
     * Checks a VAT identification number (NIP) for Poland.
     *
     * @param string $check Value to check
     * @return bool Success.
     * @link http://pl.wikipedia.org/wiki/NIP
     */
    public static function nip(string $check): bool
    {
        $pattern = '/^(\d{3}-\d{3}-\d{2}-\d{2})|(\d{3}-\d{2}-\d{2}-\d{3})|(\d{10})$/';
        if (!preg_match($pattern, $check)) {
            return false;
        }
        $sum = 0;
        $weights = [6, 5, 7, 2, 3, 4, 5, 6, 7];
        $check = str_replace('-', '', $check);
        for ($i = 0; $i < 9; $i++) {
            $sum += $check[$i] * $weights[$i];
        }
        $control = $sum % 11;
        if ($control === 10) {
            $control = 0;
        }

        return $check[9] == $control;
    }

    /**
     * Checks PESEL
     * Universal Electronic System for Registration of the Population in Poland
     *
     * @param string $check Value to check
     * @return bool Success.
     * @link http://pl.wikipedia.org/wiki/PESEL
     */
    public static function pesel(string $check): bool
    {
        $pattern = '/^\d{11}$/';
        if (preg_match($pattern, $check)) {
            $sum = 0;
            $weights = [1, 3, 7, 9, 1, 3, 7, 9, 1, 3];
            for ($i = 0; $i < 10; $i++) {
                $sum += $check[$i] * $weights[$i];
            }
            $control = 10 - $sum % 10;
            if ($control === 10) {
                $control = 0;
            }
            if ($check[10] == $control) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks REGON
     * National Business Registry Number in Poland
     * Used script from https://github.com/kiczort/polish-validator
     *
     * @param string $check Value to check
     * @return bool Success.
     * @link http://pl.wikipedia.org/wiki/REGON
     */
    public static function regon(string $check): bool
    {
        if (!preg_match('/^([\d]{9}|[\d]{14})$/', $check)) {
            return false;
        }

        $chars = str_split(strval($check));

        if (strlen($check) === 9) {
            // Validate short version (9 digits)
            $sum = array_sum(array_map(function ($weight, $digit) {
                return $weight * $digit;
            }, [8, 9, 2, 3, 4, 5, 6, 7], array_slice($chars, 0, 8)));
            $checksum = $sum % 11;

            return $checksum % 10 == $chars[8];
        } else {
            // Validate long version (14 digits)
            $sum = array_sum(array_map(function ($weight, $digit) {
                return $weight * $digit;
            }, [2, 4, 8, 5, 0, 9, 7, 3, 6, 1, 2, 4, 8], array_slice($chars, 0, 13)));
            $checksum = $sum % 11;

            return $checksum % 10 == $chars[13];
        }
    }

    /**
     * Checks a phone number.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone(string $check): bool
    {
        $pattern = '/^([0+]48)?\d{9}$/';

        return (bool)preg_match($pattern, str_replace([' ', '-'], '', $check));
    }
}
