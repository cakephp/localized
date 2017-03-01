<?php
/**
 * Finnish Localized Validation class. Handles localized validation for Finland.
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
 * FiValidation
 *
 */
class FiValidation extends LocalizedValidation
{

    /**
     * Checks a postal code for Finland.
     *
     * @param string $check The value to check.
     *
     * @return bool Success.
     */
    public static function postal($check)
    {
        $pattern = '/^[0-9]{5}$/';

        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks a phone number for Finland.
     *
     * @param string $check The value to check.
     *
     * @throws NotImplementedException Exception
     * @return bool Success.
     */
    public static function phone($check)
    {
        throw new NotImplementedException(__d('localized', '%s Not implemented yet.'));
    }

    /**
     * Checks a country specific identification number.
     *
     * @param string $check The value to check.
     *
     * @return bool Success.
     */
    public static function personId($check)
    {
        $pattern = '/^[0-9]{6}[-+A][0-9A-Z]{4}$/';
        if (!(bool)preg_match($pattern, $check)) {
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

        return $check[strlen($check) - 1] === $list[intval(substr($check, 0, 6) . substr($check, 7, 3)) % 31];
    }
}
