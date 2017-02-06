<?php
/**
 * Turkey Localised Validation class. Handles localised validation for Turkey.
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
 * TrValidation
 *
 */
class TrValidation extends LocalizedValidation
{
    /**
     * Checks a postal code for Turkey.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/^(0[1-9]|[1-7][0-9]|8[0-1])[0-9]{3}$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks an identity number for Turkey.
     *
     * @param string $tckn The value to check.
     * @return bool Success.
     */
    public static function personId($tckn)
    {
        if (strlen($tckn) !== 11) {
            return false;
        }

        if ($tckn[0] === 0) {
            return false;
        }

        $even = $tckn[0] + $tckn[2] + $tckn[4] + $tckn[6] + $tckn[8];
        $odd = $tckn[1] + $tckn[3] + $tckn[5] + $tckn[7];
        $check = ($even * 7) - $odd;
        if ($check % 10 !== (int)$tckn[9]) {
            return false;
        }

        $check = $even + $odd + $tckn[9];
        if ($check % 10 !== (int)$tckn[10]) {
            return false;
        }

        return true;
    }

    /**
     * Checks a phone number.
     *
     * @param string $check The value to check.
     * @throws NotImplementedException Exception
     * @return bool Success.
     */
    public static function phone($check)
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
    public static function trIdentityNumber($check)
    {
        return static::personId($check);
    }
}
