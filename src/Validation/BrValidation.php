<?php
declare(strict_types=1);

/**
 * Brazillian Localized Validation class. Handles localized validation for Brazil.
 *
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
 * BrValidation
 */
class BrValidation extends LocalizedValidation
{
    /**
     * Define locale to be used by that localized
     * validation set
     *
     * @var string
     */
    protected static string $validationLocale = 'pt_BR';

    /**
     * Checks a phone number for Brazil.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function phone(string $check): bool
    {
        return (bool)preg_match('/^(\+?\d{1,3}? ?)?(\(0?\d{2}\) ?)?9?\d{4}[-. ]?\d{4}$/', $check);
    }

    /**
     * Checks a postal code (CEP) for Brazil.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal(string $check): bool
    {
        return (bool)preg_match('/^\d{5}-?\d{3}$/', $check);
    }

    /**
     * Checks SSN for Brazil.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId(string $check): bool
    {
        return BrValidation::cpf($check) || BrValidation::cnpj($check);
    }

    /**
     * Checks CPF for Brazil.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function cpf(string $check): bool
    {
        $check = trim(strval($check));

        // sometimes the user submits a masked CNPJ
        if (preg_match('/^\d\d\d.\d\d\d.\d\d\d\-\d\d/', $check)) {
            $check = str_replace(['-', '.', '/'], '', $check);
        } elseif (!ctype_digit($check)) {
            return false;
        }

        if (strlen($check) !== 11) {
            return false;
        }

        // repeated values are invalid, but algorithms fails to check it
        for ($i = 0; $i < 10; $i++) {
            if (str_repeat(strval($i), 11) === $check) {
                return false;
            }
        }

        $dv = substr($check, -2);
        for ($pos = 9; $pos <= 10; $pos++) {
            $sum = 0;
            $position = $pos + 1;
            for ($i = 0; $i <= $pos - 1; $i++, $position--) {
                $sum += (int)(int)$check[$i] * $position;
            }
            $div = $sum % 11;
            (int)$check[$pos] = $div < 2 ? 0 : 11 - $div;
        }
        $dvRight = (int)(int)$check[9] * 10 + (int)(int)$check[10];

        return $dvRight == $dv;
    }

    /**
     * Checks CNPJ for Brazil.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function cnpj(string $check): bool
    {
        $check = trim($check);
        // sometimes the user submits a masked CNPJ
        if (preg_match('/^\d\d.\d\d\d.\d\d\d\/\d\d\d\d\-\d\d/', $check)) {
            $check = str_replace(['-', '.', '/'], '', $check);
        } elseif (!ctype_digit($check)) {
            return false;
        }

        if (strlen($check) !== 14) {
            return false;
        }
        $firstSum = ((int)$check[0] * 5) + ((int)$check[1] * 4) + ((int)$check[2] * 3) + ((int)$check[3] * 2) +
            ((int)$check[4] * 9) + ((int)$check[5] * 8) + ((int)$check[6] * 7) + ((int)$check[7] * 6) +
            ((int)$check[8] * 5) + ((int)$check[9] * 4) + ((int)$check[10] * 3) + ((int)$check[11] * 2);

        $firstVerificationDigit = $firstSum % 11 < 2 ? 0 : 11 - ($firstSum % 11);

        $secondSum = ((int)$check[0] * 6) + ((int)$check[1] * 5) + ((int)$check[2] * 4) + ((int)$check[3] * 3) +
            ((int)$check[4] * 2) + ((int)$check[5] * 9) + ((int)$check[6] * 8) + ((int)$check[7] * 7) +
            ((int)$check[8] * 6) + ((int)$check[9] * 5) + ((int)$check[10] * 4) + ((int)$check[11] * 3) +
            ((int)$check[12] * 2);

        $secondVerificationDigit = $secondSum % 11 < 2 ? 0 : 11 - ($secondSum % 11);

        return ((int)$check[12] == $firstVerificationDigit) && ((int)$check[13] == $secondVerificationDigit);
    }

    /**
     * Checks for license driver for Brazil
     *
     * @param string $cnh License driver number
     * @return bool
     */
    public static function cnh(string $cnh): bool
    {
        $check = preg_replace('/[^\d]/', '', $cnh);
        if (!$check || strlen($check) !== 11) {
            return false;
        }

        // Check for repeated values
        for ($i = 0; $i < 10; $i++) {
            if (str_repeat(strval($i), 11) === $check) {
                return false;
            }
        }
        // Calculate the number
        for ($i = 0, $j = 9, $v = 0; $i < 9; ++$i, --$j) {
            $v += (int)$check[$i] * $j;
        }

        $dsc = 0;
        // Calculate first digit
        $dv1 = $v % 11;
        if ($dv1 >= 10) {
            $dv1 = 0;
            $dsc = 2;
        }

        for ($i = 0, $j = 1, $v = 0; $i < 9; ++$i, ++$j) {
            $v += (int)$check[$i] * $j;
        }

        // Calculate second digit
        $x = $v % 11;
        $dv2 = $x >= 10 ? 0 : $x - $dsc;

        return $dv1 . $dv2 === substr($check, -2);
    }

    /**
     * Checks for National Health Card emitted from S.U.S in Brazil
     *
     * @param string $cns National Heath Card Number
     * @return bool
     */
    public static function cns(string $cns): bool
    {
        $cns = preg_replace('/[^0-9]/', '', $cns);

        if (preg_match('/[1-2]\\d{10}00[0-1]\\d/', $cns) || preg_match('/[7-9]\\d{14}/', $cns)) {
            $len = strlen($cns);
            $soma = 0;
            for ($i = 0; $i < $len; $i++) {
                $soma += (int)$cns[$i] * (15 - $i);
            }

            return $soma % 11 === 0;
        }

        return false;
    }
}
