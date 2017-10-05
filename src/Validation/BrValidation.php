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
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function cnpj($check)
    {
        $check = trim($check);
        // sometimes the user submits a masked CNPJ
        if (preg_match('/^\d\d.\d\d\d.\d\d\d\/\d\d\d\d\-\d\d/', $check)) {
            $check = str_replace(['-', '.', '/'], '', $check);
        } elseif (!ctype_digit($check)) {
            return false;
        }

        if (strlen($check) != 14) {
            return false;
        }
        $firstSum = ($check[0] * 5) + ($check[1] * 4) + ($check[2] * 3) + ($check[3] * 2) +
            ($check[4] * 9) + ($check[5] * 8) + ($check[6] * 7) + ($check[7] * 6) +
            ($check[8] * 5) + ($check[9] * 4) + ($check[10] * 3) + ($check[11] * 2);

        $firstVerificationDigit = ($firstSum % 11) < 2 ? 0 : 11 - ($firstSum % 11);

        $secondSum = ($check[0] * 6) + ($check[1] * 5) + ($check[2] * 4) + ($check[3] * 3) +
            ($check[4] * 2) + ($check[5] * 9) + ($check[6] * 8) + ($check[7] * 7) +
            ($check[8] * 6) + ($check[9] * 5) + ($check[10] * 4) + ($check[11] * 3) +
            ($check[12] * 2);

        $secondVerificationDigit = ($secondSum % 11) < 2 ? 0 : 11 - ($secondSum % 11);

        return ($check[12] == $firstVerificationDigit) && ($check[13] == $secondVerificationDigit);
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
    
    /**
     * Checks for National Health Card emitted from S.U.S in Brazil
     *
     * @param string|int $cns National Heath Card Number
     * @return bool
     */
    public static function cns($cns)
    {
        if (!is_numeric($cns) && !is_string($cns)) {
		    return false;
	    }
	
        $cns = preg_replace('/[^0-9]/', '', $cns);

        if (preg_match("/[1-2]\\d{10}00[0-1]\\d/", $cns) || preg_match("/[7-9]\\d{14}/", $cns)) {
            $len = strlen($cns);
            $soma = 0;
            for ($i = 0; $i < $len; $i++) {
                $soma += $cns[$i] * (15 - $i);
            }

            return $soma % 11 === 0;
        }

        return false;
    }
}
