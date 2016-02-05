<?php
/**
 * Serbian Localized Validation class test case
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

use Cake\Localized\Validation\RsValidation;
use Cake\TestSuite\TestCase;

/**
 * RsValidationTest
 *
 */
class RsValidationTest extends TestCase
{
    /**
     * test the jmbg method of RsValidation
     *
     * @return void
     */
    public function testPersonId()
    {
        $this->assertTrue(RsValidation::personId('1707017170007'));
        $this->assertFalse(RsValidation::personId('1707017170008'));
        $this->assertFalse(RsValidation::personId('170701717000'));
        $this->assertFalse(RsValidation::personId('A707017170007'));
    }

    /**
     * test the postal_number method of RsValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(RsValidation::postal('11090'));
        $this->assertFalse(RsValidation::postal('111000'));
        $this->assertFalse(RsValidation::postal('A1100'));
    }

    /**
     * test the address_code method of RsValidation
     *
     * @return void
     */
    public function testAddressCode()
    {
        $this->assertTrue(RsValidation::addressCode('122407'));
        $this->assertFalse(RsValidation::addressCode('11090'));
        $this->assertFalse(RsValidation::addressCode('A11090'));
    }
}
