<?php
declare(strict_types=1);

/**
 * Tunisia Localized Validation class test case
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Test\TestCase\Validation;

use Cake\Localized\Validation\TnValidation;
use Cake\TestSuite\TestCase;

/**
 * TnValidationTest
 */
class TnValidationTest extends TestCase
{
    /**
     * test the phone method of TnValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(TnValidation::phone('0021671000000'));
        $this->assertTrue(TnValidation::phone('+21671000000'));
        $this->assertTrue(TnValidation::phone('0021622000000'));
        $this->assertTrue(TnValidation::phone('0021698000000'));
        $this->assertTrue(TnValidation::phone('0021651000000'));
        $this->assertTrue(TnValidation::phone('+21640000000'));
        $this->assertTrue(TnValidation::phone('71000000'));
        $this->assertTrue(TnValidation::phone('70999999'));
        $this->assertTrue(TnValidation::phone('22000000'));
        $this->assertTrue(TnValidation::phone('98999999'));
        $this->assertTrue(TnValidation::phone('98999999'));
        $this->assertTrue(TnValidation::phone('41234567'));
        $this->assertFalse(TnValidation::phone('21671000000'));
        $this->assertFalse(TnValidation::phone('+00216'));
        $this->assertFalse(TnValidation::phone('0021398000000'));
        $this->assertFalse(TnValidation::phone('+21630000000'));
        $this->assertFalse(TnValidation::phone('71 000 000'));
        $this->assertFalse(TnValidation::phone('7100000'));
        $this->assertFalse(TnValidation::phone('710000000'));
        $this->assertFalse(TnValidation::phone('60000000'));
        $this->assertFalse(TnValidation::phone('9899999'));
        $this->assertFalse(TnValidation::phone('989999999'));
        $this->assertFalse(TnValidation::phone('004012345678'));
        $this->assertFalse(TnValidation::phone('abcdef'));
    }

    /**
     * test the postal method of TnValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(TnValidation::postal('1000'));
        $this->assertTrue(TnValidation::postal('4100'));
        $this->assertTrue(TnValidation::postal('6020'));
        $this->assertTrue(TnValidation::postal('8225'));
        $this->assertTrue(TnValidation::postal('9055'));
        $this->assertFalse(TnValidation::postal('0000'));
        $this->assertFalse(TnValidation::postal('4300'));
        $this->assertFalse(TnValidation::postal('6920'));
        $this->assertFalse(TnValidation::postal('82250'));
        $this->assertFalse(TnValidation::postal('901'));
        $this->assertFalse(TnValidation::postal('90 11'));
        $this->assertFalse(TnValidation::postal(''));
        $this->assertFalse(TnValidation::postal(' '));
        $this->assertFalse(TnValidation::postal('abcd'));
        $this->assertFalse(TnValidation::postal('1'));
        $this->assertFalse(TnValidation::postal('10'));
    }

    /**
     * test the personId method of TnValidation
     *
     * @return void
     */
    public function testPersonId()
    {
        $this->assertTrue(TnValidation::personId('12345678'));
        $this->assertTrue(TnValidation::personId('123456789'));
        $this->assertTrue(TnValidation::personId('00000000'));
        $this->assertTrue(TnValidation::personId('999999999'));
        $this->assertFalse(TnValidation::personId('1234567'));
        $this->assertFalse(TnValidation::personId('0123456789'));
        $this->assertFalse(TnValidation::personId('1234 56798'));
        $this->assertFalse(TnValidation::personId('01234 567989'));
        $this->assertFalse(TnValidation::personId('abcdefgh'));
    }
}
