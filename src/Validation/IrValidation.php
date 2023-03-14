<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link https://cakephp.org
 * @since Localized Plugin v 0.1
 * @license https://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

/**
 * Iranian Localized Validation class. Handles localized validation for Iran.
 */
class IrValidation extends LocalizedValidation
{
    /**
     * Define locale to be used by that localized
     * validation set
     *
     * @var string
     */
    protected static string $validationLocale = 'fa_IR';

    /**
     * Checks for Persian/Farsi characters and number an zero width non-joiner space.
     * Also accepts latin numbers preventing potential problem until PHP becomes fully unicode compatible.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function alphaNumeric(string $check): bool
    {
        $pattern = '/[^\x{0600}-\x{06FF}\x{FB50}-\x{FDFD}\x{FE70}-\x{FEFF}\x{0750}-\x{077F}0-9\s\x{200C}]+/u';

        return !preg_match($pattern, $check);
    }

    /**
     * Checks for Persian/Farsi digits only and won't accept Arabic and Latin digits.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function numeric(string $check): bool
    {
        $pattern = '/[^\x{06F0}-\x{06F9}\x]+/u';

        return !preg_match($pattern, $check);
    }

    /**
     * Validation of Iran credit card numbers.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function cc(string $check): bool
    {
        $pattern = '/\d{4}-?\d{4}-?\d{4}-?\d{4}$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a phone number for Iran.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone(string $check): bool
    {
        $pattern = '/^[- .\(\)]?((98)|(\+98)|(0098)|0){1}[- .\(\)]{0,3}[1-9]{1}\d{1,}[- .\(\)]*\d{3,8}[- .\(\)]?$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks mobile numbers for Iran.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function mobile(string $check): bool
    {
        $pattern = '/^[- .\(\)]?((98)|(\+98)|(0098)|0){1}[- .\(\)]{0,3}((90)|(91)|(92)|(93)){1}\d{8}$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a postal code for Iran.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal(string $check): bool
    {
        $pattern = '/^\d{10}$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a social security number for Iran.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId(string $check): bool
    {
        $pattern = '/^\d{10}$/';
        if (!preg_match($pattern, $check)) {
            return false;
        }
        $sum = 0;
        $equivalent = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += substr($check, $i, 1) * (10 - $i);
            if (substr($check, 1, 1) === substr($check, $i, 1)) {
                $equivalent++;
            }
        }
        if ($equivalent === 10) {
            return false;
        }
        $remaining = $sum % 11;
        if ($remaining <= 1) {
            return (bool)($remaining == substr($check, 9, 1));
        }

        return (bool)(substr($check, 9, 1) == 11 - $remaining);
    }
}
