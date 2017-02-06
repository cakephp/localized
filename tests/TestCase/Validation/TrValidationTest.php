<?php
/**
 * Turkey Localized Validation class test case
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

use Cake\Localized\Validation\TrValidation;
use Cake\TestSuite\TestCase;

/**
 * TrValidationTest
 *
 */
class TrValidationTest extends TestCase
{
    /**
     * test the postal method of TrValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(TrValidation::postal('02300'));
        $this->assertTrue(TrValidation::postal('01000'));
        $this->assertTrue(TrValidation::postal('81999'));
        $this->assertFalse(TrValidation::postal('2300'));
        $this->assertFalse(TrValidation::postal('230000'));
        $this->assertFalse(TrValidation::postal('00000'));
        $this->assertFalse(TrValidation::postal('82000'));
    }

    /**
     * test the personId method of TrValidation
     *
     * @return void
     */
    public function testPersonId()
    {
        //random identification numbers generated here: http://www.simlict.com/tcno.html
        $this->assertTrue(TrValidation::personId('15315680458'));
        $this->assertTrue(TrValidation::personId('49972028292'));
        $this->assertTrue(TrValidation::personId('31216166938'));
        $this->assertFalse(TrValidation::personId('31216166930'));
        $this->assertFalse(TrValidation::personId('01216166930'));
        $this->assertFalse(TrValidation::personId('31216166931'));
    }
}
