<?php
/**
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

/**
 * US Localized Validation class. Handles localized validation for The United States
 *
 */
class UsValidation extends LocalizedValidation
{
    /**
     * Checks a phone number for The United States
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        $pattern = '/^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?!\(?(555))(?:\(\s*([2-9][0-9]{2})\s*\)';
        $pattern .= '|([2-9][0-9]{2}))\s*(?:[.-]\s*)?)';
        $pattern .= '(?!(555(?:\s*(?:[.|\-|\s]\s*))(01([0-9][0-9])|1212)))';
        $pattern .= '(?!(555(01([0-9][0-9])|1212)))';
        $pattern .= '([2-9]1[02-9]|[2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)';
        $pattern .= '?([0-9]{4})';
        $pattern .= '(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a postal code for The United States
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/\\A\\b[0-9]{5}(?:-[0-9]{4})?\\b\\z/i';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a social security number for The United States
     *
     * @param string $check The value to check.
     * @return bool Success
     */
    public static function personId($check)
    {
        $pattern = '/\\A\\b[0-9]{3}-[0-9]{2}-[0-9]{4}\\b\\z/i';

        return (bool)preg_match($pattern, $check);
    }
}
