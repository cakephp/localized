<?php
/**
 * Spanish Localized Validation class. Handles localized validation for Spain.
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
 * EsValidation
 *
 */
class EsValidation extends LocalizedValidation
{
    /**
     * The list of allowed personId codes. Sorted as wee need them.
     *
     * @var string
     */
    protected static $CODES = 'TRWAGMYFPDXBNJZSQVHLCKE';

    /**
     * Checks a postal code for Spain.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/^(5[0-2]|[0-4][0-9])[0-9]{3}$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a phone number for Spain.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        $pattern = '/^\\+?(34[-. ]?)?(([6789]{1})(([0-9]{2})[-. ]?|([0-9]{1})[-. ]?([0-9]{1}))|70[-. ]?([0-9]{1}))([0-9]{2})[-. ]?([0-9]{1})[-. ]?([0-9]{1})[-. ]?([0-9]{2})$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a country specific identification number.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId($check)
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
    public static function dni($check)
    {
        if (!preg_match('/^([0-9]+)([A-Z]{1})$/', $check, $matches)) {
            return false;
        }

        array_shift($matches);
        list($num, $letter) = $matches;

        return $letter === static::$CODES[$num % 23];
    }

    /**
     * Only checks the NIE type personId.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function nie($check)
    {
        if (!preg_match('/^([XYZ])([0-9]+)([A-Z]{1})$/', $check, $matches)) {
            return false;
        }

        array_shift($matches);
        list($first, $num, $letter) = $matches;
        $num = strtr($first, 'XYZ', '012') . $num;

        return $letter === static::$CODES[$num % 23];
    }

    /**
     * Only checks the NIF type personId.
     *
     * @param string $check The value to check.
     * @return bool Success
     */
    public static function nif($check)
    {
        if (!preg_match('/^[KLM]{1}([0-9]+)([A-Z]{1})$/', $check, $matches)) {
            return false;
        }

        $sum = $check[2] + $check[4] + $check[6];

        for ($i = 1; $i < 8; $i += 2) {
            $tmp = (string)(2 * $check[$i]);
            $sum += $tmp[0] + ((strlen($tmp) == 2) ? $tmp[1] : 0);
        }

        $num = 10 - substr($sum, -1);

        return $check[strlen($check) - 1] === chr($num + 64);
    }
}
