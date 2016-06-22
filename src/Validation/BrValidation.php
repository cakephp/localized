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
    public static function cpf($cpf){
        // Check if it's not empty
        if(empty($cpf)) {
            return false;
        }
    
        // avoid mask, format number with zeros
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
         
        $invalid_cpfs = array('00000000000',
            '11111111111',
            '22222222222', 
            '33333333333', 
            '44444444444', 
            '55555555555', 
            '66666666666', 
            '77777777777', 
            '88888888888', 
            '99999999999');

        // Check number size, it pass:
        if (strlen($cpf) != 11){
            return false;
        }else if(in_array($cpf, $invalid_cpfs)) {
            return false;
         // Calculate check digits:
         } else {
            $d = 0;

            for ($t = 9; $t < 11; $t++) { 
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                
                $d = ((10 * $d) % 11) % 10;

                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            //What if go to this, this is true:
            return true;
        }
    }

    /**
     * Checks CNPJ for Brazil.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function cnpj($check){
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
}
