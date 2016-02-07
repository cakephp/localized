<?php
/**
 * German Localized Validation class. Handles localized validation for Germany.
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
 * DeValidation
 *
 */
class DeValidation extends LocalizedValidation
{
    /**
     * Checks a postal code for Germany.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/^(0[1-46-9]\d{3}|[1-357-9]\d{4}|[4][0-24-9]\d{3}|[6][013-9]\d{3})$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks an address (street and number) for Germany.
     * That is what is called "Straße und Hausnummer",
     * the first line of a german formal address block.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function address1($check)
    {
        $pattern = '/[a-zA-ZäöüÄÖÜß \.]+ [0-9]+[a-zA-Z]?/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a phone number for Germany.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        $pattern = '/^[0-9\/. \-]*$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks date of birth formal format for Germany (dd.mm.yyyy),
     * afterwards checks it is a valid gregorian calendar date.
     *
     * @param string $check the date of birth.
     * @return bool Success.
     */
    public static function dob($check)
    {
        $pattern = '/^\d{2}\.\d{2}\.(\d{2}|\d{4})$/';
        $return = preg_match($pattern, $check);
        if (!$return) {
            return false;
        }
        $check = str_replace('.', ',', $check);
        $check = explode(',', $check, 3);
        return checkdate((int)$check[1], (int)$check[0], (int)$check[2]);
    }

    /**
     * Checks a country specific identification number.
     *
     * @param string $check The value to check.
     * @throws NotImplementedException Exception
     * @return bool Success.
     */
    public static function personId($check)
    {
        throw new NotImplementedException(__d('localized', '%s Not implemented yet.'));
    }
}
