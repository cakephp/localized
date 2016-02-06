<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Cake\Localized\Validation;

/**
 * ValidationInterface defining some common base validation methods.
 *
 */
interface ValidationInterface
{

    /**
     * Checks a phone number.
     *
     * @param string $string The value to check.
     * @return bool Success.
     */
    public static function phone($string);

    /**
     * Checks a postal code.
     *
     * @param string $string The value to check.
     * @return bool Success.
     */
    public static function postal($string);

    /**
     * Checks a country specific identification number.
     *
     * @param string $string The value to check.
     * @return bool Success.
     */
    public static function personId($string);
}
