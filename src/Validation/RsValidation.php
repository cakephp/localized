<?php
declare(strict_types=1);

/**
 * Serbian Localized Validation class. Handles localized validation for Serbia.
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

use Cake\Network\Exception\NotImplementedException;

/**
 * RsValidation
 *
 */
class RsValidation extends LocalizedValidation
{
    /**
     * Checks a postal code (Poštanski broj) for Serbia.
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
     * Checks Unique Master Citizen Numbers (JMBG) for Serbia.
     *
     * @param string $check The value to check.
     * @return bool Success.
     * @link http://en.wikipedia.org/wiki/Unique_Master_Citizen_Number
     */
    public static function personId($check): bool
    {
        if (!preg_match('/^\d{13}$/', $check)) {
            return false;
        }

        [$a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m] = str_split(strval($check));
        $checksum = 11 - ( 7 * ($a + $g) + 6 * ($b + $h) + 5 * ($c + $i) + 4 * ($d + $j) + 3 * ($e + $k) + 2 * ($f + $l) ) % 11;

        return $checksum == $m;
    }

    /**
     * Checks an address code (Adresni kod) for Serbia.
     *
     * @param string $check The value to check.
     * @return bool Success.
     */
    public static function addressCode(string $check): bool
    {
        $pattern = '/^\d{6}$/';

        return (bool)preg_match($pattern, $check);
    }

    // @codingStandardsIgnoreStart

    /**
     * Checks an address code (Adresni kod) for Serbia.
     *
     * @param string $check The value to check.
     * @return bool Success.
     * @deprecated Use addressCode() instead.
     */
    public static function address_code(string $check): bool
    {
        return static::addressCode($check);
    }

    /**
     * Checks a postal code for Denmark.
     *
     * @param string $check The value to check.
     * @return bool Success
     * @deprecated Use postal() instead.
     */
    public static function postal_number(string $check): bool
    {
        return static::postal($check);
    }

    // @codingStandardsIgnoreEnd

    /**
     * Checks Unique Master Citizen Numbers (JMBG) for Serbia.
     *
     * @param string $check The value to check.
     * @return bool Success.
     * @link http://en.wikipedia.org/wiki/Unique_Master_Citizen_Number
     * @deprecated Use personId() instead.
     */
    public static function jmbg(string $check): bool
    {
        return static::personId($check);
    }

    /**
     * Checks a phone number.
     *
     * @param string $check The value to check.
     * @throws \Cake\Network\Exception\NotImplementedException Exception
     * @return bool Success.
     */
    public static function phone(string $check): bool
    {
        throw new NotImplementedException(__d('localized', '%s Not implemented yet.'));
    }
}
