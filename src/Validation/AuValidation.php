<?php
/**
 * Australian Localised Validation class. Handles localised validation for Australia.
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
 * AuValidation
 *
 */
class AuValidation extends LocalizedValidation
{
    /**
     * Checks a postal code for Australia.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/^[0-9]{4}$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks phone numbers for Australia.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        $normalized = preg_replace('/(\s+|-|\(|\))/', '', preg_replace('/0011\s?61/', '+61', $check)); //remove spaces, parentheses and hyphens, convert full intl prefix.
        $pattern = '/^(((0|\+61)[2378])(\d){8}|((0|\+61)[45](\d){2}|1300|1800|190[02])(\d){6}|(\+61)?180(\d){4}|(\+61)?13\d{4}|(\+61)?12[2-8](\d){1,7}|(\+61|0)14[12357](\d){6})$/';
        return (bool)preg_match($pattern, $normalized);
    }

    /**
     * Checks an identification number.
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
