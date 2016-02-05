<?php
/**
 * French Localized Validation class. Handles localized validation for France.
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

/**
 * FrValidation
 *
 */
class FrValidation extends LocalizedValidation
{
    /**
     * Checks a phone number for France.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        $pattern = '/^0[1-9]{1}(([0-9]{8})|((\s[0-9]{2}){4})|((-[0-9]{2}){4})|((\.[0-9]{2}){4}))$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a postal code for France.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/^\d{5}$/';
        if ((bool)preg_match($pattern, $check)) {
            $value = intval($check);
            return $value >= 1001 && $value <= 99138;
        }
        return false;
    }

    /**
     * Checks a social security number for France.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId($check)
    {
        $pattern = '/^[12]\d{2}(0\d|1[012])(\d{2}|2[AB])\d{8}$/';
        if (!preg_match($pattern, $check)) {
            return false;
        }

        $numberWithoutKey = substr($check, 0, -2);
        $key = substr($check, -2);

        // Corse special cases
        // source : http://xml.insee.fr/schema/nir.html
        // check : http://www.parodie.com/monetique/nir.htm
        if ($numberWithoutKey[6] == 'A') {
            $numberWithoutKey = str_replace('A', '0', $numberWithoutKey);
            $numberWithoutKey -= 1000000;
        } elseif ($numberWithoutKey[6] == 'B') {
            $numberWithoutKey = str_replace('B', '0', $numberWithoutKey);
            $numberWithoutKey -= 2000000;
        }
        return $key == (97 - ($numberWithoutKey - (floor($numberWithoutKey / 97) * 97)));
    }
}
