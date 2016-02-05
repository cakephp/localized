<?php
/**
 * US Localized Validation class test case
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

use Cake\Localized\Validation\UsValidation;
use Cake\TestSuite\TestCase;

/**
 * UsValidationTest
 *
 */
class UsValidationTest extends TestCase
{
    /**
     * test the phone method of UsValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(UsValidation::phone('+1 702 425 5085'));
        $this->assertFalse(UsValidation::phone('teststring'));
        $this->assertFalse(UsValidation::phone('1-(33)-(333)-(4444)'));
        $this->assertFalse(UsValidation::phone('1-(33)-3333-4444'));
        $this->assertFalse(UsValidation::phone('1-(33)-33-4444'));
        $this->assertFalse(UsValidation::phone('1-(33)-3-44444'));
        $this->assertFalse(UsValidation::phone('1-(33)-3-444'));
        $this->assertFalse(UsValidation::phone('1-(33)-3-44'));

        $this->assertFalse(UsValidation::phone('(055) 999-9999'));
        $this->assertFalse(UsValidation::phone('(155) 999-9999'));
        $this->assertFalse(UsValidation::phone('(595) 999-9999'));
        $this->assertFalse(UsValidation::phone('(213) 099-9999'));
        $this->assertFalse(UsValidation::phone('(213) 199-9999'));

        // invalid area-codes
        $this->assertFalse(UsValidation::phone('1-(511)-999-9999'));
        $this->assertFalse(UsValidation::phone('1-(379)-999-9999'));
        $this->assertFalse(UsValidation::phone('1-(962)-999-9999'));
        $this->assertFalse(UsValidation::phone('1-(295)-999-9999'));
        $this->assertFalse(UsValidation::phone('1-(555)-999-9999'));

        // invalid exhange
        $this->assertFalse(UsValidation::phone('1-(222)-511-9999'));

        // invalid phone number
        $this->assertFalse(UsValidation::phone('1-(222)-555-0199'));
        $this->assertFalse(UsValidation::phone('1-(222)-555-0122'));

        // valid phone numbers
        $this->assertTrue(UsValidation::phone('1-(369)-333-4444'));
        $this->assertTrue(UsValidation::phone('1-(973)-333-4444'));
        $this->assertTrue(UsValidation::phone('1-(313)-555-9999'));
        $this->assertTrue(UsValidation::phone('1-(222)-555-0299'));

        $this->assertTrue(UsValidation::phone('1 (222) 333 4444'));
        $this->assertTrue(UsValidation::phone('+1 (222) 333 4444'));
        $this->assertTrue(UsValidation::phone('(222) 333 4444'));

        $this->assertTrue(UsValidation::phone('1-(333)-333-4444'));
        $this->assertTrue(UsValidation::phone('1.(333)-333-4444'));
        $this->assertTrue(UsValidation::phone('1.(333).333-4444'));
        $this->assertTrue(UsValidation::phone('1.(333).333.4444'));
        $this->assertTrue(UsValidation::phone('1-333-333-4444'));
        $this->assertFalse(UsValidation::phone('7002 425 5085'));
    }

    /**
     * test the postal method of UsValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(UsValidation::postal('89104'));
        $this->assertFalse(UsValidation::postal('111'));
        $this->assertFalse(UsValidation::postal('1111'));
        $this->assertFalse(UsValidation::postal('130896'));
        $this->assertFalse(UsValidation::postal('13089-33333'));
        $this->assertFalse(UsValidation::postal('13089-333'));
        $this->assertFalse(UsValidation::postal('13A89-4333'));
        $this->assertTrue(UsValidation::postal('13089-3333'));
        $this->assertFalse(UsValidation::postal('NV 89104'));
    }

    /**
     * test the ssn method of UsValidation
     *
     * @return void
     */
    public function testSsn()
    {
        $this->assertFalse(UsValidation::personId('11-33-4333'));
        $this->assertFalse(UsValidation::personId('113-3-4333'));
        $this->assertFalse(UsValidation::personId('111-33-333'));
        $this->assertTrue(UsValidation::personId('111-33-4333'));
    }
}
