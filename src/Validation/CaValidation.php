<?php
/**
 * Canadian Localized Validation class. Handles localized validation for Canada.
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
 * CaValidation
 *
 */
class CaValidation extends LocalizedValidation
{
    /**
     * Checks a postal code for Canada.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/\\A\\b[ABCEGHJKLMNPRSTVXY][0-9][A-Z] [0-9][A-Z][0-9]\\b\\z/i';

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
        $pattern = '/^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|3[02-689][0-9]|9[02-57-9][0-9]|[246-8][02-46-8][02-46-9])\s*\)';
        $pattern .= '|(55[0-46-9]|5[0-46-9][5]|[0-46-9]55|[2-9]1[02-9]|[2-9][02-8]1|[2-46-9][02-46-8][02-46-9]))\s*(?:[.-]\s*)?)';
        $pattern .= '(?!(555(?:\s*(?:[.|\-|\s]\s*))(01([0-9][0-9])|1212)))';
        $pattern .= '(?!(555(01([0-9][0-9])|1212)))';
        $pattern .= '([2-9]1[02-9]|[2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)';
        $pattern .= '?([0-9]{4})';
        $pattern .= '(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/';

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
        throw new NotImplementedException(__d('localized', '%s Not implemented yet.'));
    }
}
