<?php
/**
 * Latvian Localized Validation class. Handles localized validation for Latvia.
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
 * LvValidation
 *
 */
class LvValidation extends LocalizedValidation
{

    /**
     * Checks a postal code for Latvia.
     *
     * @param string $check The value to check.
     *
     * @throws NotImplementedException Exception
     * @return bool Success.
     */
    public static function postal($check)
    {
        throw new NotImplementedException(__d('localized', '%s Not implemented yet.'));
    }

    /**
     * Checks a phone number for Latvia.
     *
     * @param string $check The value to check.
     *
     * @throws NotImplementedException Exception
     * @return bool Success.
     */
    public static function phone($check)
    {
        throw new NotImplementedException(__d('localized', '%s Not implemented yet.'));
    }

    /**
     * Checks a country specific identification number.
     *
     * @param string $check The value to check.
     *
     * @return bool Success.
     */
    public static function personId($check)
    {
        $check = trim(str_replace('-', '', $check));

        $pattern = '/^[0-9]{6}[0-9A-Z]{5}$/';
        if (!(bool)preg_match($pattern, $check)) {
            return false;
        }

        $date = \DateTime::createFromFormat('dmy', substr($check, 0, 6));
        if ($date === false) {
            return false;
        }

        $counter = 0;
        $map = [0 => 1, 1 => 6, 2 => 3, 3 => 7, 4 => 9, 5 => 10, 6 => 5, 7 => 8, 8 => 4, 9 => 2];
        foreach ($map as $index => $multiplier) {
            $counter += (int)$check[$index] * $multiplier;
        }

        if ($counter === false) {
            return false;
        }

        return (1101 - $counter) % 11 === (int)$check[10];
    }
}
