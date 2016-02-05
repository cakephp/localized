<?php
/**
 * CN Localized Validation class test case
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

use Cake\Localized\Validation\CnValidation;
use Cake\TestSuite\TestCase;

/**
 * CnValidationTest
 *
 */
class CnValidationTest extends TestCase
{
    /**
     * test the phone method of CnValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(CnValidation::phone('+86-010-27738066'));
        $this->assertTrue(CnValidation::phone('13901005000'));
        $this->assertTrue(CnValidation::phone('008613901005000'));
        $this->assertTrue(CnValidation::phone('+8613901005000'));
        $this->assertTrue(CnValidation::phone('010-1234567'));
        $this->assertTrue(CnValidation::phone('0591-88888888'));
        $this->assertTrue(CnValidation::phone('010-12345678-123'));
        $this->assertFalse(CnValidation::phone('123123'));
        $this->assertFalse(CnValidation::phone('123123123xx'));
        $this->assertFalse(CnValidation::phone('0591-110'));
        $this->assertFalse(CnValidation::phone('1234567'));
    }

    /**
     * test the postal method of CnValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(CnValidation::postal('350000'));
        $this->assertTrue(CnValidation::postal('123456'));
        $this->assertFalse(CnValidation::postal('10075'));
        $this->assertFalse(CnValidation::postal('10x'));
        $this->assertFalse(CnValidation::postal('0851234'));
    }

    /**
     * test the personId method of CnValidation
     *
     * @return void
     */
    public function testPersonId()
    {
        $this->assertTrue(CnValidation::personId('361181198507131951'));
        $this->assertTrue(CnValidation::personId('361181197902271319'));
        $this->assertTrue(CnValidation::personId('36118119780214411X'));
        $this->assertTrue(CnValidation::personId('632321198701161557'));
        $this->assertFalse(CnValidation::personId('123'));
        $this->assertFalse(CnValidation::personId('1632321198701161557'));
        $this->assertFalse(CnValidation::personId('X12312412412431233'));
        $this->assertFalse(CnValidation::personId('361181198507131952'));
        $this->assertFalse(CnValidation::personId('36118119790227131X'));
        $this->assertFalse(CnValidation::personId('361181197802144119'));
    }
}
