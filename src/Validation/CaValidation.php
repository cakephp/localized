<?php
/**
 * Canadian Localized Validation class. Handles localized validation for Canada.
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
 * CaValidation
 *
 */
class CaValidation extends LocalizedValidation
{
    /**
     * Checks a postal code for Canada.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/\\A\\b[ABCEGHJKLMNPRSTVXY][0-9][A-Z] [0-9][A-Z][0-9]\\b\\z/i';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a phone number.
     *
     * @param string $check The value to check.
     * @throws NotImplementedException Exception
     * @return bool Success.
     */
    public static function phone($check)
    {
        $invalid_num = new InvalidNumberRule();

        $invalid_num->add(null, 're[0-9]11', null, null);
        $invalid_num->add(null, null, 're[0-9]11', null);
        $invalid_num->add(null, 're[01][0-9][0-9]', null, null);
        $invalid_num->add(null, null, 're[01][0-9][0-9]', null);
        $invalid_num->add(null, null, 555, 'ra0100-0199');

        // Unassigned area codes (incomplete)
        $invalid_num->add(null, 'ra221-223', null, null);
        $invalid_num->add(null, '230', null, null);
        $invalid_num->add(null, 'ra232-233', null, null);
        $invalid_num->add(null, '235', null, null);
        $invalid_num->add(null, 'ra237-238', null, null);
        $invalid_num->add(null, '241', null, null);
        $invalid_num->add(null, 'ra243-245', null, null);
        $invalid_num->add(null, '247', null, null);
        $invalid_num->add(null, '255', null, null);
        $invalid_num->add(null, 'ra257-259', null, null);
        $invalid_num->add(null, '261', null, null);
        $invalid_num->add(null, '263', null, null);
        $invalid_num->add(null, 'ra265-266', null, null);
        $invalid_num->add(null, '271', null, null);
        $invalid_num->add(null, '273', null, null);
        $invalid_num->add(null, '275', null, null);
        $invalid_num->add(null, 'ra277-280', null, null);
        $invalid_num->add(null, '282', null, null);
        $invalid_num->add(null, 'ra285-288', null, null);
        $invalid_num->add(null, 'ra290-300', null, null);
        $invalid_num->add(null, 'ra370-379', null, null);
        $invalid_num->add(null, '555', null, null);
        $invalid_num->add(null, '595', null, null);
        $invalid_num->add(null, '962', null, null);

        // Basic phone number pattern matching
        $pattern =  '/^(?:(?<country_code>\+?1\s*(?:[.-]\s*)?)?';
        $pattern .= '(?<area_code>\(\s*([0-9][0-9][0-9])\s*\)|([0-9][0-9][0-9]))\s*(?:[.-]\s*)?)';
        $pattern .= '(?<coe_code>[0-9][0-9][0-9])\s*(?:[.-]\s*)';
        $pattern .= '?(?<subscriber_code>[0-9]{4})';
        $pattern .= '(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/';

        $passed_simple = (bool)preg_match($pattern, $check, $captured);

        $is_valid = false;

        if ($passed_simple) {
            $is_valid = $invalid_num->isNumberValid($captured['country_code'], $captured['area_code'], $captured['coe_code'], $captured['subscriber_code']);
        }

        return $is_valid;
    }

    /**
     * Checks a country specific identification number.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function personId($check)
    {
        throw new NotImplementedException(__d('localized', '%s Not implemented yet.'));
    }
}

class InvalidNumberRule
{
    private $number_rules = [];

    public function add($country_code=null, $area_code=null, $coe_code=null, $subscriber_code=null) {
        $number_rule = [
            'country_code' => $country_code,
            'area_code' => $area_code,
            'coe_code' => $coe_code,
            'subscriber_code' => $subscriber_code,
        ];

        array_push($this->number_rules, $number_rule);
    }

    public function isNumberValid($country_code=null, $area_code=null, $coe_code=null, $subscriber_code=null) {
        $phone_num_components = [
            'country_code' => $country_code,
            'area_code' => $area_code,
            'coe_code' => $coe_code,
            'subscriber_code' => $subscriber_code
        ];

        $chars_to_remove = ['+', '-', '.', '(', ')'];

        foreach ($this->number_rules as $number_rule) {
            $break = false;
            $is_valid = [
                'country_code' => true,
                'area_code' => true,
                'coe_code' => true,
                'subscriber_code' => true 
                ];

            $false_counts = 0;
            foreach ($number_rule as $number_rule_component) {
                if ($number_rule_component != null) {
                    $false_counts++;
                }
            }

            foreach ($phone_num_components as $code_name => $code_value) {
                $search_code = substr($number_rule[$code_name], 0, 2);
                $code_value = str_replace($chars_to_remove, '', $code_value);

                // Check for a search code then remove it if it exists.
                if ($search_code == 're' || $search_code == 'ra') {
                    $number_rule[$code_name] = substr($number_rule[$code_name], 2);
                }
                
                if ($number_rule[$code_name] != null) {
                    // Search code is a regex.
                    if ($search_code == 're') {

                        if ((bool)preg_match('/^'.$number_rule[$code_name].'$/', $code_value)) {
                            $is_valid[$code_name] = false;
                            $break = true;
                        } 
                    // Search code is a range.
                    } else if ($search_code == 'ra') {
                        list($start, $end) = explode('-', $number_rule[$code_name]);
                        for ($i = $start; $i <= $end; $i+=1) {
                            if ($i == $code_value) {
                                $is_valid[$code_name] = false;
                                $break = true;
                            }
                        }
                    // No search code. Just a number.
                    } else {
                        if ($number_rule[$code_name] == $code_value) {
                            $is_valid[$code_name] = false;
                            $break = true;
                        }
                    }
                }

            }
            if ($break) {
                break;
            }
        }

        $num_of_falses = 0;
        foreach ($is_valid as $is_valid_component) {
            if ($is_valid_component == false) {
                $num_of_falses++;
            }
        }

        if ($num_of_falses == $false_counts) {
            return false;
        } else {
            return true;
        }
    }
}

