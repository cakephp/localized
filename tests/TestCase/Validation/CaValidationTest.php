<?php
/**
 * Canadian Localized Validation class test case
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

use Cake\Localized\Validation\CaValidation;
use Cake\TestSuite\TestCase;

/**
 * CaValidationTest
 *
 */
class CaValidationTest extends TestCase
{
    /**
     * test the phone method of CaValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(CaValidation::phone('+1 702 425 5085'));
        $this->assertFalse(CaValidation::phone('teststring'));
        $this->assertFalse(CaValidation::phone('1-(33)-(333)-(4444)'));
        $this->assertFalse(CaValidation::phone('1-(33)-3333-4444'));
        $this->assertFalse(CaValidation::phone('1-(33)-33-4444'));
        $this->assertFalse(CaValidation::phone('1-(33)-3-44444'));
        $this->assertFalse(CaValidation::phone('1-(33)-3-444'));
        $this->assertFalse(CaValidation::phone('1-(33)-3-44'));

        $this->assertFalse(CaValidation::phone('(055) 999-9999'));
        $this->assertFalse(CaValidation::phone('(155) 999-9999'));
        $this->assertFalse(CaValidation::phone('(595) 999-9999'));
        $this->assertFalse(CaValidation::phone('(213) 099-9999'));
        $this->assertFalse(CaValidation::phone('(213) 199-9999'));

        // invalid area-codes
        $this->assertFalse(CaValidation::phone('1-(511)-999-9999'));
        $this->assertFalse(CaValidation::phone('1-(379)-999-9999'));
        $this->assertFalse(CaValidation::phone('1-(962)-999-9999'));
        $this->assertFalse(CaValidation::phone('1-(295)-999-9999'));
        $this->assertFalse(CaValidation::phone('1-(222)-248-9999'));
        $this->assertFalse(CaValidation::phone('1 555 999-9999'));

        // invalid exhange
        $this->assertFalse(CaValidation::phone('1-(705)-511-9999'));

        // fictitious phone numbers
        $this->assertFalse(CaValidation::phone('1-(705)-555-0199'));
        $this->assertFalse(CaValidation::phone('1-(705)-555-0122'));

        // valid phone numbers
        $this->assertTrue(CaValidation::phone('1-(369)-333-4444'));
        $this->assertTrue(CaValidation::phone('1-(973)-333-4444'));
        $this->assertTrue(CaValidation::phone('1-(313)-555-9999'));
        $this->assertTrue(CaValidation::phone('1-(705)-555-0299'));

        $this->assertTrue(CaValidation::phone('1 (705) 333 4444'));
        $this->assertTrue(CaValidation::phone('+1 (705) 333 4444'));
        $this->assertTrue(CaValidation::phone('(705) 333 4444'));

        $this->assertTrue(CaValidation::phone('1-(333)-333-4444'));
        $this->assertTrue(CaValidation::phone('1.(333)-333-4444'));
        $this->assertTrue(CaValidation::phone('1.(333).333-4444'));
        $this->assertTrue(CaValidation::phone('1.(333).333.4444'));
        $this->assertTrue(CaValidation::phone('1-333-333-4444'));
        $this->assertFalse(CaValidation::phone('7002 425 5085'));
        $this->assertTrue(CaValidation::phone('1 (705) 248 3242'));
        $this->assertFalse(CaValidation::phone('1 %705# 248 3242'));
    }

    /**
     * test the postal method of CaValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(CaValidation::postal('L4W 1S2'));
        $this->assertFalse(CaValidation::postal('LI4 SOC'));
    }
}
