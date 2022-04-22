<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link http://cakephp.org
 * @since Localized Plugin v 0.1
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

/**
 * US Localized Validation class. Handles localized validation for The United States
 */
class UsValidation extends LocalizedValidation
{
    /**
     * Define locale to be used by that localized
     * validation set
     *
     * @var string
     */
    protected static $validationLocale = 'en_US';

    /**
     * Checks a phone number for The United States
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone(string $check): bool
    {
        $pattern = '/^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?!\(?(555))(?:\(\s*([2-9]\d{2})\s*\)';
        $pattern .= '|([2-9][0-9]{2}))\s*(?:[.-]\s*)?)';
        $pattern .= '(?!(555(?:\s*(?:[.|\-|\s]\s*))(01([0-9][0-9])|1212)))';
        $pattern .= '(?!(555(01([0-9][0-9])|1212)))';
        $pattern .= '([2-9]1[01-9]|[2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)';
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
    public static function postal(string $check): bool
    {
        $pattern = '/\A\b\d{5}(?:-\d{4})?\b\z/i';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a social security number for The United States
     *
     * @param string $check The value to check.
     * @return bool Success
     */
    public static function personId(string $check): bool
    {
        $pattern = '/\A\b\d{3}-\d{2}-\d{4}\b\z/i';

        return (bool)preg_match($pattern, $check);
    }
}
