<?php
/**
 * Spanish Localized Validation class. Handles localized validation for Spain.
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
 * EsValidation
 *
 */
class EsValidation extends LocalizedValidation
{
    /**
     * Checks a postal code for Spain.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/^(5[0-2]|[0-4][0-9])[0-9]{3}$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a phone number for Spain.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        $pattern = '/^\\+?(34[-. ]?)?\\(?(([689]{1})(([0-9]{2})\\)?[-. ]?|([0-9]{1})\\)?[-. ]?([0-9]{1}))|70\\)?[-. ]?([0-9]{1}))([0-9]{2})[-. ]?([0-9]{1})[-. ]?([0-9]{1})[-. ]?([0-9]{2})$/';
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
