<?php
/**
 * CN Localized Validation class. Handles localized validation for The Peoples Republic of China (mainland)
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

/**
 * CnValidation
 *
 */
class CnValidation extends LocalizedValidation
{
    /**
     * Checks phone numbers for The Peoples Republic of China (mainland)
     *
     * It is not a strict rule and should cover almost all legal phone numbers.
     * Some (obviously) illegal phone numbers will pass this test, especially cellphone.
     * Since it will be a hard task to maintain a small cellphone prefix "database",
     * just make it simple for now.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        // optional nation prefix
        $pattern = '/^(((0086)|(\+86))-?)?(';
        // 1XXXXXXXXXX cellphone
        $pattern .= '(1\d{10})';
        // XXX(X)-XXXXXXX(X)(-...) house phone
        $pattern .= '|(\d{3,4}-\d{7,8}(-\d{1,6})?)';
        $pattern .= ')$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a postal code for The Peoples Republic of China (mainland)
     *
     * In fact the national standard allows to omit the final two digits if they are both 0,
     * but few people write postal number in this way nowadays.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/^[0-9]{6}$/';
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks national identify number for The Peoples Republic of China (mainland).
     *
     * Compliant with GB11643-1999 national standard.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId($check)
    {
        if (strlen($check) !== 18) {
            return false;
        }
        $sum = 0;
        $weight = 1;
        for ($i = 16; $i >= 0; $i--) {
            $weight = ($weight * 2) % 11;
            $a = (int)$check[$i];
            if ($a < 0 || $a > 9) {
                return false;
            }
            $sum += $a * $weight;
        }
        if (strtolower($check[17]) === 'x') {
            $checksum = 10;
        } else {
            $checksum = (int)$check[17];
            if ($checksum < 0 || $checksum > 9) {
                return false;
            }
        }
        return ($checksum === (12 - ($sum % 11)) % 11);
    }
}
