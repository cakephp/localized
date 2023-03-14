<?php
declare(strict_types=1);

/**
 * ID Localized Validation class. Handles localized validation for Indonesia.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2005-2009, Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link https://cakephp.org
 * @since Localized Plugin v 0.1
 * @license https://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

use Cake\Http\Exception\NotImplementedException;

/**
 * IdValidation
 */
class IdValidation extends LocalizedValidation
{
    /**
     * Define locale to be used by that localized
     * validation set
     *
     * @var string
     */
    protected static string $validationLocale = 'id_ID';

    /**
     * Checks a postal code for Indonesia.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal(string $check): bool
    {
        $pattern = '/[1-9]\d{4}/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Basic Check for Valid Mobile Mumbers for Indonesia.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function mobile(string $check): bool
    {
        $pattern = '/(^0|^62|\+62)(8\d{8,10})$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a phone number.
     *
     * @param string $check The value to check.
     * @throws \Cake\Http\Exception\NotImplementedException Exception
     * @return bool Success.
     */
    public static function phone(string $check): bool
    {
        throw new NotImplementedException(__d('localized', '%s Not implemented yet.'));
    }

    /**
     * Checks a country specific identification number.
     *
     * @param string $check The value to check.
     * @throws \Cake\Http\Exception\NotImplementedException Exception
     * @return bool Success.
     */
    public static function personId(string $check): bool
    {
        throw new NotImplementedException(__d('localized', '%s Not implemented yet.'));
    }
}
