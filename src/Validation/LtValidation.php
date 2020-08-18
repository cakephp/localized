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
 * @since localized 0.1
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

/**
 * LT Localized Validation class. Handles localized validation for the Lithuanian language
 */
class LtValidation extends LocalizedValidation
{
    /**
     * Checks a phone number for the Lithuania.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone(string $check): bool
    {
        $pattern = '/^(([\+]?370)|(8))[\s-]?\(?\d{2,3}\)?[\s-]?(\d{2}[\s-]?){2}?\d{1,2}$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a postal code for the Lithuania.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal(string $check): bool
    {
        $pattern = '/^(lt)?[\s-]?[\d]{5}$/i';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a social security number for the Lithuania.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId(string $check): bool
    {
        $pattern = '/^([a-z]{2})[\s-]?[\d]{7}$/i';

        return (bool)preg_match($pattern, $check);
    }
}
