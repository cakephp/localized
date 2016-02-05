<?php
/**
 * Mexican Localized Validation class. Handles localized validation for Mexico.
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
 * MxValidation
 *
 */
class MxValidation extends LocalizedValidation
{
    /**
     * Checks a phone number for Mexico.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        $pattern = '/^(\d{8}|\d{10}|\d{13}|((\d{2}[-,\s]){4}\d{2})|\(\d{3}\)\d{3}-\d{4}|\(\d{2}\)\d{4}-\d{4}|\d{3}[-,\s]\d{2}[-,\s]\d{8})$/i';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a postal code for Mexico.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/^\d{5}$/i';
        return (bool)preg_match($pattern, $check);
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
