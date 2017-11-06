<?php
/**
 * Brazillian Localized Validation class. Handles localized validation for Brazil.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright    Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link         http://cakephp.org
 * @since        Localized Plugin v 0.1
 * @license      http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

/**
 * BrValidation
 *
 */
class BrValidation extends LocalizedValidation
{
    /**
     * Checks a phone number for Brazil.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone($check)
    {
        return (bool)preg_match('/^(\+?\d{1,3}? ?)?(\(0?\d{2}\) ?)?9?\d{4}[-. ]?\d{4}$/', $check);
    }

    /**
     * Checks a postal code (CEP) for Brazil.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        return (bool)preg_match('/^[0-9]{5}-?[0-9]{3}$/', $check);
    }

    /**
     * Checks SSN for Brazil.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId($check)
    {
        return BrValidation::cpf($check) || BrValidation::cnpj($check);
    }

    /**
     * Checks CPF for Brazil.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function cpf($check)
    {
        $check = trim($check);

        // sometimes the user submits a masked CNPJ
        if (preg_match('/^\d\d\d.\d\d\d.\d\d\d\-\d\d/', $check)) {
            $check = str_replace(['-', '.', '/'], '', $check);
        } elseif (!ctype_digit($check)) {
            return false;
        }

        if (strlen($check) != 11) {
            return false;
        }

        // repeated values are invalid, but algorithms fails to check it
        for ($i = 0; $i < 10; $i++) {
            if (str_repeat($i, 11) === $check) {
                return false;
            }
        }

        $dv = substr($check, -2);
        for ($pos = 9; $pos <= 10; $pos++) {
            $sum = 0;
            $position = $pos + 1;
            for ($i = 0; $i <= $pos - 1; $i++, $position--) {
                $sum += $check[$i] * $position;
            }
            $div = $sum % 11;
            if ($div < 2) {
                $check[$pos] = 0;
            } else {
                $check[$pos] = 11 - $div;
            }
        }
        $dvRight = $check[9] * 10 + $check[10];

        return ($dvRight == $dv);
    }

    /**
     * Checks CNPJ for Brazil.
     * Used code from https://github.com/Respect/Validation/blob/master/library/Rules/Cnpj.php
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function cnpj($check)
    {
        if (!is_scalar($check)) {
            return false;
        }

        $cleanInput = preg_replace('/\D/', '', $check);
        $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        if ($cleanInput < 1) {
            return false;
        }
        if (mb_strlen($cleanInput) != 14) {
            return false;
        }
        $n = 0;
        for ($i = 0; $i < 12; $i++) {
            $n += $cleanInput[$i] * $b[$i + 1];
        }
        if ($cleanInput[12] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        $n = 0;
        for ($i = 0; $i <= 12; $i++) {
            $n += $cleanInput[$i] * $b[$i];
        }
        if ($cleanInput[13] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        return true;
    }

    /**
     * Checks for license driver for Brazil
     *
     * @param string $cnh License driver number
     * @return bool
     */
    public static function cnh($cnh)
    {
        if (!is_numeric($cnh) && !is_string($cnh)) {
            return false;
        }
        $check = preg_replace('/[^\d]/', '', $cnh);

        if (strlen($check) !== 11) {
            return false;
        }
        // Check for repeated values
        for ($i = 0; $i < 10; $i++) {
            if (str_repeat($i, 11) === $check) {
                return false;
            }
        }
        // Calculate the number
        for ($i = 0, $j = 9, $v = 0; $i < 9; ++$i, --$j) {
            $v += $check[$i] * $j;
        }

        $dsc = 0;
        // Calculate first digit
        $dv1 = $v % 11;
        if ($dv1 >= 10) {
            $dv1 = 0;
            $dsc = 2;
        }

        for ($i = 0, $j = 1, $v = 0; $i < 9; ++$i, ++$j) {
            $v += $check[$i] * $j;
        }

        // Calculate second digit
        $x = $v % 11;
        $dv2 = ($x >= 10) ? 0 : $x - $dsc;

        return ($dv1 . $dv2) === substr($check, -2);
    }
}
