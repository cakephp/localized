<?php
/**
 * Indian Localized Validation class test case
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

use Cake\Localized\Validation\InValidation;
use Cake\TestSuite\TestCase;

/**
 * Indian Validation Test Case
 */
class InValidationTest extends TestCase
{
    /**
     * Test the phone method of InValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(InValidation::phone('8125985608'));
        $this->assertTrue(InValidation::phone('08125985608'));
        $this->assertTrue(InValidation::phone('0 8125985608'));
        $this->assertTrue(InValidation::phone('0-8125985608'));
        $this->assertTrue(InValidation::phone('+918125985608'));
        $this->assertTrue(InValidation::phone('+91 8125985608'));
        $this->assertTrue(InValidation::phone('91 8125985608'));
        $this->assertTrue(InValidation::phone('9125985608'));

        $this->assertTrue(InValidation::phone('7893332322'));
        $this->assertTrue(InValidation::phone('07893332322'));
        $this->assertTrue(InValidation::phone('0-7893332322'));
        $this->assertTrue(InValidation::phone('+917893332322'));
        $this->assertTrue(InValidation::phone('+91 7893332322'));
        $this->assertTrue(InValidation::phone('91 7893332322'));
        $this->assertTrue(InValidation::phone('917893332322'));

        $this->assertTrue(InValidation::phone('9247826533'));
        $this->assertTrue(InValidation::phone('09247826533'));
        $this->assertTrue(InValidation::phone('0-9247826533'));
        $this->assertTrue(InValidation::phone('+919247826533'));
        $this->assertTrue(InValidation::phone('+91 9247826533'));
        $this->assertTrue(InValidation::phone('91 9247826533'));
        $this->assertTrue(InValidation::phone('919247826533'));

        $this->assertTrue(InValidation::phone('0405010207'));
        $this->assertTrue(InValidation::phone('91405010207'));
        $this->assertTrue(InValidation::phone('+91405010207'));

        $this->assertFalse(InValidation::phone('test'));
        $this->assertFalse(InValidation::phone('91-(33)-(333)-(4444)'));
        $this->assertFalse(InValidation::phone('91-(33)-3333-4444'));
        $this->assertFalse(InValidation::phone('91-(33)-33-4444'));
        $this->assertFalse(InValidation::phone('91-(33)-3-44444'));
        $this->assertFalse(InValidation::phone('91-(33)-3-444'));
        $this->assertFalse(InValidation::phone('91-(33)-3-44'));

        $this->assertFalse(InValidation::phone('(055) 999-9999'));
        $this->assertFalse(InValidation::phone('(155) 999-9999'));
        $this->assertFalse(InValidation::phone('(595) 999-9999'));
        $this->assertFalse(InValidation::phone('(213) 099-9999'));
        $this->assertFalse(InValidation::phone('(213) 199-9999'));

        // invalid area-codes
        $this->assertFalse(InValidation::phone('91-(511)-999-9999'));
        $this->assertFalse(InValidation::phone('91-(379)-999-9999'));
        $this->assertFalse(InValidation::phone('91-(962)-999-9999'));
        $this->assertFalse(InValidation::phone('91-(295)-999-9999'));
        $this->assertFalse(InValidation::phone('91-(555)-999-9999'));

        // invalid exhange
        $this->assertFalse(InValidation::phone('91-(222)-511-9999'));

        // invalid phone number
        $this->assertFalse(InValidation::phone('91-(222)-555-0199'));
        $this->assertFalse(InValidation::phone('91-(222)-555-0122'));
    }

    /**
     * Test the postal method of InValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(InValidation::postal('500091'));
        $this->assertTrue(InValidation::postal('500 091'));

        $this->assertFalse(InValidation::postal('50009 1'));
        $this->assertFalse(InValidation::postal('test'));
        $this->assertFalse(InValidation::postal('1234567'));
    }
}
