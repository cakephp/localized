<?php
/**
 * Australian Localized Validation class test case
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
namespace Cake\Localized\Test\TestCase\Validation;

use Cake\Localized\Validation\AuValidation;
use Cake\TestSuite\TestCase;

/**
 * AuValidationTest
 *
 */
class AuValidationTest extends TestCase
{
    /**
     * test the postal method of AuValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(AuValidation::postal('2300'));
        $this->assertFalse(AuValidation::postal('02300'));
    }

    /**
     * Test the phone method of AuValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(AuValidation::phone('02 5551 5678')); // Standard areacode + PSTN service number.
        $this->assertTrue(AuValidation::phone('0011 61 2 5551 5678')); // Full international prefix + standard areacode + PSTN service number.
        $this->assertTrue(AuValidation::phone('+61 2 5551 5678')); // Breif international prefix + standard areacode + PSTN service number.
        $this->assertTrue(AuValidation::phone('1300 555 567')); // 1300 local call cost number
        $this->assertTrue(AuValidation::phone('0412 515 678')); // Standard mobile number.
        $this->assertTrue(AuValidation::phone('0412515678')); // Standard mobile number, no whitespace.
        $this->assertTrue(AuValidation::phone('+61 412 515 678')); // Breif international prefix + standard mobile number.
        $this->assertTrue(AuValidation::phone('13 12 51')); // 13 local call cost number
        $this->assertTrue(AuValidation::phone('1902 345 678')); // 190X premium rate number.
        $this->assertTrue(AuValidation::phone('(02) 5551 5678')); // Standard areacode + PSTN service number, w/ parentheses.
        $this->assertTrue(AuValidation::phone('0145 124 458')); // Standard satellite service number.
        $this->assertTrue(AuValidation::phone('1800 123 456')); // 1800 Freecall number.
        $this->assertTrue(AuValidation::phone('180 1234')); // 180 Freecall number.
        $this->assertTrue(AuValidation::phone('+61 4 12 515 678')); // Breif international prefix + standard mobile number (unusually spaced).
        $this->assertTrue(AuValidation::phone('12456')); // Telstra utility service numbers. (directory service etc).
        $this->assertTrue(AuValidation::phone('127 22123')); // Testing numbers
        $this->assertFalse(AuValidation::phone('1300 TSTCAS')); // 1300 local call cost number (alphabetic representation).
        $this->assertFalse(AuValidation::phone('0198 333 888')); // prefix reserved for dial-up internet services.
    }
}
