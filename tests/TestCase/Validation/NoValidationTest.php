<?php
/**
 * Norwegian Localized Validation class test case
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

use Cake\Localized\Validation\NoValidation;
use Cake\TestSuite\TestCase;

/**
 * NoValidationTest
 *
 */
class NoValidationTest extends TestCase
{
    /**
     * test the dob method of NoValidation
     *
     * @return void
     */
    public function testDob()
    {
        // Examples from https://no.wikipedia.org/wiki/Dato
        $this->assertTrue(NoValidation::dob('10.8.1962'));
        $this->assertTrue(NoValidation::dob('10.08.1962'));
        $this->assertTrue(NoValidation::dob('10.8.62'));
        $this->assertTrue(NoValidation::dob('10.08.62'));
        $this->assertTrue(NoValidation::dob('02.08.1965'));
        $this->assertTrue(NoValidation::dob('2.8.1965'));
        $this->assertTrue(NoValidation::dob('02.08.65'));
        $this->assertTrue(NoValidation::dob('2.8.65'));
        $this->assertFalse(NoValidation::dob('10/8/1962'));
        $this->assertFalse(NoValidation::dob('10.24.1962'));
    }

    /**
     * test the phone method of NoValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(NoValidation::phone('12345678'));
        $this->assertTrue(NoValidation::phone('12 34 56 78'));
        $this->assertTrue(NoValidation::phone('123 45 678'));
        $this->assertFalse(NoValidation::phone('1234567'));
        $this->assertFalse(NoValidation::phone('1234567489'));
    }

    /**
     * test the postal method of NoValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(NoValidation::postal('0123'));
        $this->assertFalse(NoValidation::postal('90210'));
    }

    /**
     * test the ssn method of NoValidation
     *
     * @return void
     */
    public function testSsn()
    {
        $this->assertTrue(NoValidation::personId('12345678901'));
        $this->assertTrue(NoValidation::personId('123456 78901'));
        $this->assertFalse(NoValidation::personId('1234567890'));
        $this->assertFalse(NoValidation::personId('123456 7890'));
    }
}
