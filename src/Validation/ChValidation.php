<?php
/**
 * Swiss Localized Validation class. Handles localized validation for Switzerland.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

use Cake\Network\Exception\NotImplementedException;

/**
 * ChValidation
 *
 */
class ChValidation extends LocalizedValidation
{
    /**
     * Checks a postal code for Switzerland & Liechtenstein
     *
     * @param string $check The value to check.
     * @return bool Success.
     *
     * @link https://en.wikipedia.org/wiki/Postal_codes_in_Switzerland_and_Liechtenstein
     */
    public static function postal($check)
    {
        $pattern = '/^[1-9][0-9]{3}$/';

        return (bool)preg_match($pattern, $check);
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
