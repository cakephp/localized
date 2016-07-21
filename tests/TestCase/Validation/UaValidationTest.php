<?php
/**
 * Russian Localized Validation class test case
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @since         Localized Plugin v 1.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Test\TestCase\Validation;

use Cake\Localized\Validation\UaValidation;
use Cake\TestSuite\TestCase;

/**
 * UaValidationTest
 *
 */
class UaValidationTest extends TestCase
{
    /**
     * test the postal method of UaValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(UaValidation::postal('85111'));
        $this->assertTrue(UaValidation::postal('01996'));
        $this->assertTrue(UaValidation::postal('65000'));

        $this->assertFalse(UaValidation::postal('019962'));
        $this->assertFalse(UaValidation::postal('019961'));
        $this->assertFalse(UaValidation::postal('0199'));
    }

    /**
     * test phone method of UaValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(UaValidation::phone('+38-044-283-93-57'));
        $this->assertTrue(UaValidation::phone('(068)2839357'));
        $this->assertTrue(UaValidation::phone('+380442839357'));
        $this->assertFalse(UaValidation::phone('+38 (063)537-28-07'));
        $this->assertTrue(UaValidation::phone('8044223-95-26'));
        $this->assertTrue(UaValidation::phone('+380612839357'));
    }

    /**
     * test passport method of UaValidation
     *
     * @return void
     */
    public function testPassport()
    {
        $this->assertTrue(UaValidation::passport('КС845696'));
        $this->assertTrue(UaValidation::passport('МН655933'));

        $this->assertFalse(UaValidation::passport('МН 569933'));
        $this->assertFalse(UaValidation::passport('МН-569933'));
        $this->assertFalse(UaValidation::passport('кс569933'));
    }

    /**
     * test personId method of UaValidation
     *
     * @return void
     *
     * @covers UaValidation::personId
     */
    public function testPersonId()
    {
        $this->assertTrue(UaValidation::personId('1234567890'));

        $this->assertFalse(UaValidation::personId('12345678999'));
        $this->assertFalse(UaValidation::personId('112-233-445 96'));
    }

    /**
     * test IdCard method of UaValidation
     *
     * @return void
     *
     * @covers UaValidation::personId
     */
    public function testIdCard()
    {
        $this->assertTrue(UaValidation::idCard('19910824-00016'));

        $this->assertFalse(UaValidation::idCard('1991082400016'));
        $this->assertFalse(UaValidation::idCard('19910824-OO016'));
    }
}
