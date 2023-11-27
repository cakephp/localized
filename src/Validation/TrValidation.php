<?php
declare(strict_types=1);

/**
 * Turkey Localised Validation class. Handles localised validation for Turkey.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link https://cakephp.org
 * @since Localized Plugin v 0.1
 * @license https://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

use Cake\Http\Exception\NotImplementedException;

/**
 * TrValidation
 */
class TrValidation extends LocalizedValidation
{
    /**
     * Define locale to be used by that localized
     * validation set
     *
     * @var string
     */
    protected static string $validationLocale = 'tr_TR';

    /**
     * Checks a postal code for Turkey.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal(string $check): bool
    {
        $pattern = '/^(0[1-9]|[1-7]\d|8[0-1])\d{3}$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks an identity number for Turkey.
     *
     * @param string $tckn The value to check.
     * @return bool Success.
     */
    public static function personId(string $tckn): bool
    {
        if (strlen($tckn) !== 11) {
            return false;
        }


        if ((int)$tckn[0] === 0) {
            return false;
        }

        $even = (int)$tckn[0] + (int)$tckn[2] + (int)$tckn[4] + (int)$tckn[6] + (int)$tckn[8];
        $odd = (int)$tckn[1] + (int)$tckn[3] + (int)$tckn[5] + (int)$tckn[7];
        $check = ($even * 7) - $odd;
        if ($check % 10 !== (int)$tckn[9]) {
            return false;
        }

        $check = $even + $odd + (int)$tckn[9];
        if ($check % 10 !== (int)$tckn[10]) {
            return false;
        }

        return true;
    }

    /**
     * Checks a phone number.
     *
     * @param string $check The value to check.
     * @throws \Cake\Http\Exception\NotImplementedException Exception
     * @return bool Success.
     */
    public static function phone(string $check): bool
    {
        throw new NotImplementedException(__d('localized', '%s Not implemented yet.'));
    }

    /**
     * Checks an identity number for Turkey.
     *
     * @param string $check The value to check.
     * @return bool Success.
     * @deprecated Use personId() instead.
     */
    public static function trIdentityNumber(string $check): bool
    {
        return static::personId($check);
    }
}
