<?php
declare(strict_types=1);

/**
 * Spanish Localized Validation class. Handles localized validation for Spain.
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
 * EsValidation
 */
class EsValidation extends LocalizedValidation
{
    /**
     * Define locale to be used by that localized
     * validation set
     *
     * @var string
     */
    protected static string $validationLocale = 'es_ES';

    /**
     * The list of allowed personId codes. Sorted as wee need them.
     *
     * @var string
     */
    protected static string $CODES = 'TRWAGMYFPDXBNJZSQVHLCKE';

    /**
     * Checks a postal code for Spain.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal(string $check): bool
    {
        $pattern = '/^(5[0-2]|[0-4]\d)\d{3}$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a phone number for Spain.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone(string $check): bool
    {
        $pattern = '/^\+?(34[-. ]?)?(([6789]{1})((\d{2})[-. ]?|(\d{1})[-. ]?(\d{1}))|70[-. ]?(\d{1}))(\d{2})[-. ]?(\d{1})[-. ]?(\d{1})[-. ]?(\d{2})$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a country specific identification number.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId(string $check): bool
    {
        $checks = ['dni', 'nie', 'nif'];

        foreach ($checks as $method) {
            if (static::$method($check)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Only checks the DNI type personId.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function dni(string $check): bool
    {
        if (!preg_match('/^(\d+)([A-Z]{1})$/', $check, $matches)) {
            return false;
        }

        array_shift($matches);
        [$num, $letter] = $matches;

        return $letter === static::$CODES[$num % 23];
    }

    /**
     * Only checks the NIE type personId.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function nie(string $check): bool
    {
        if (!preg_match('/^([XYZ])(\d+)([A-Z]{1})$/', $check, $matches)) {
            return false;
        }

        array_shift($matches);
        [$first, $num, $letter] = $matches;
        $num = strtr($first, 'XYZ', '012') . $num;

        return $letter === static::$CODES[$num % 23];
    }

    /**
     * Only checks the NIF type personId.
     *
     * @param string $check The value to check.
     * @return bool Success
     */
    public static function nif(string $check): bool
    {
        if (!preg_match('/^[KLM]{1}(\d+)([A-Z]{1})$/', $check, $matches)) {
            return false;
        }

        $sum = $check[2] + $check[4] + $check[6];

        for ($i = 1; $i < 8; $i += 2) {
            $tmp = (string)(2 * $check[$i]);
            $sum += $tmp[0] + (strlen($tmp) === 2 ? $tmp[1] : 0);
        }

        $num = 10 - substr(strval($sum), -1);

        return $check[strlen($check) - 1] === chr($num + 64);
    }
}
