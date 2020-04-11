<?php
declare(strict_types=1);

/**
 * Finnish Localized Validation class. Handles localized validation for Finland.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link http://cakephp.org
 * @since Localized Plugin v 0.1
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Validation;

use Cake\Http\Exception\NotImplementedException;

/**
 * FiValidation
 */
class FiValidation extends LocalizedValidation
{
    /**
     * Checks a postal code for Finland.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function postal(string $check): bool
    {
        $pattern = '/^\d{5}$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a phone number for Finland.
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
     * @return bool Success.
     */
    public static function personId(string $check): bool
    {
        $pattern = '/^\d{6}[-+A][0-9A-Z]{4}$/';
        if (!(bool)preg_match($pattern, strval($check))) {
            return false;
        }

        $date = \DateTime::createFromFormat('dmy', substr($check, 0, 6));
        if ($date === false) {
            return false;
        }

        $list = array_merge(range(0, 9), range('A', 'Y'));
        foreach ($list as $key => $item) {
            if (in_array($item, ['G', 'I', 'O', 'Q'], true)) {
                unset($list[$key]);
            }
            $list[$key] = (string)$item;
        }
        $list = array_values($list);

        return $check[strlen($check) - 1] === $list[(int)(substr($check, 0, 6) . substr($check, 7, 3)) % 31];
    }

    /**
     * Checks a country specific business identification number.
     *
     * @param string $check The value to check.
     * @return bool Success
     */
    public static function businessId(string $check): bool
    {
        $businessId = trim($check);

        if (strpos($businessId, '-')) {
            if (strpos($businessId, '-') !== 7) {
                return false;
            }
            if (substr_count($businessId, '-') > 1) {
                return false;
            }
        }
        $businessId = str_replace('-', '', $businessId);

        if (strlen($businessId) !== 8) {
            return false;
        }
        if (!is_numeric($businessId)) {
            return false;
        }

        $checkResult = (int)$businessId[strlen($businessId) - 1];
        $weights = [7, 9, 10, 5, 8, 4, 2];
        $n = 0;

        foreach (str_split(substr($businessId, 0, 7)) as $k => $y) {
            $n += $weights[$k] * $y;
        }

        $match = $n % 11 === 0 ? 0 : 11 - $n % 11;
        if ($match === 10) {
            return false;
        }

        return $match === $checkResult;
    }

    /**
     * Checks country specific creditor reference number
     *
     * @param string $check The value to check.
     * @return bool Success
     */
    public static function creditorReference(string $check): bool
    {
        if (preg_match('/^RF\d{8,}$/', $check) === false) {
            return false;
        }

        $base = substr($check, 4, strlen($check) - 5);
        $checksum = substr($check, -1, 1);

        if (preg_match('/^\d{3,18}$/', $base) === false) {
            return false;
        }

        if ((int)$checksum !== static::calculateReferenceNumberChecksum($base)) {
            return false;
        }

        return true;
    }

    /**
     * Checks country specific reference number
     *
     * @param string $check The value to check.
     * @return bool Success
     */
    public static function referenceNumber(string $check): bool
    {
        if (preg_match('/^\d{4,19}$/', $check) === false) {
            return false;
        }

        $base = substr($check, 0, -1);
        $pureBase = ltrim($base, '0');
        $checksum = substr($check, -1, 1);

        if ((int)$checksum !== static::calculateReferenceNumberChecksum($pureBase)) {
            return false;
        }

        return true;
    }

    /**
     * @param string $base Reference number base
     * @return int
     */
    public static function calculateReferenceNumberChecksum(string $base): int
    {
        $pattern = [7, 3, 1];
        $nodes = array_reverse(str_split($base, 1));

        $i = 0;
        $result = 0;
        foreach ($nodes as $node) {
            if ($i >= 3) {
                $i = 0;
            }
            $multiplier = $pattern[$i];
            $result += $multiplier * $node;
            $i++;
        }

        $lastItems = str_split(strval($result), 1);
        $checksum = 10 - end($lastItems);

        if ($checksum >= 10) {
            $checksum = 0;
        }

        return $checksum;
    }
}
