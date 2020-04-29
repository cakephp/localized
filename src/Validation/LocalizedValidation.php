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
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

use Cake\I18n\Date;
use Cake\I18n\I18n;
use Cake\I18n\Number;

/**
 * Localized Validation base class.
 */
abstract class LocalizedValidation implements ValidationInterface
{
    /**
     * Define locale to be used by that localized
     * validation set
     *
     * @var string
     */
    protected static $_validationLocale = 'en_US';

    /**
     * Checks a date string, from language specific format.
     *
     * @param string $string The value to check.
     * @return bool Success.
     */
    public static function date(string $string): bool
    {
        $currentLocale = I18n::getLocale();
        $needChange = ($currentLocale !== static::$_validationLocale);
        if ($needChange) {
            I18n::setLocale(static::$_validationLocale);
        }

        $isValid = Date::parseDate($string) !== null;

        if ($needChange) {
            I18n::setLocale($currentLocale);
        }

        return $isValid;
    }

    /**
     * Checks a date and time string, from language specific format.
     *
     * @param string $string The value to check.
     * @return bool Success.
     */
    public static function dateTime(string $string): bool
    {
        return Date::parseDateTime($string) !== null;
    }

    /**
     * Checks a decimal number, from language specific format.
     *
     * @param string $string The value to check.
     * @return bool Success.
     */
    public static function decimal(string $string): bool
    {
        return Number::parseFloat($string) !== false;
    }
}
