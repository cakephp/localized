<?php
/**
 * Polish Localized Validation class test case
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

use Cake\Localized\Validation\PlValidation;
use Cake\TestSuite\TestCase;

/**
 * PlValidationTest
 *
 */
class PlValidationTest extends TestCase
{
    /**
     * test the postal method of PlValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(PlValidation::postal('63-400'));
        $this->assertFalse(PlValidation::postal('63400'));
        $this->assertFalse(PlValidation::postal('634-00'));
    }

    /**
     * test the nip method of PlValidation
     *
     * @return void
     */
    public function testNip()
    {
        $this->assertTrue(PlValidation::nip('768-000-24-66'));
        $this->assertTrue(PlValidation::nip('768-00-02-466'));
        $this->assertTrue(PlValidation::nip('7680002466'));
        $this->assertFalse(PlValidation::nip('768-000-24-65'));
        $this->assertFalse(PlValidation::nip('769-000-24-66'));
        $this->assertFalse(PlValidation::nip('7680002566'));
    }

    /**
     * Test the pesel method of PlValidation
     *
     * @return void
     */
    public function testPesel()
    {
        $this->assertTrue(PlValidation::pesel('49040501580'));
        $this->assertFalse(PlValidation::pesel('49040501680'));
        $this->assertFalse(PlValidation::pesel('49040501581'));
    }

    /**
     * Test the regon method of PlValidation
     *
     * @return void
     */
    public function testRegon()
    {
        $this->assertTrue(PlValidation::regon('590096454'));
        $this->assertFalse(PlValidation::regon('590096453'));
        $this->assertFalse(PlValidation::regon('591096454'));
        $this->assertFalse(PlValidation::regon('12345678'));
        $this->assertFalse(PlValidation::regon('123456789012345'));
        $this->assertFalse(PlValidation::regon('1234567890'));
        $this->assertFalse(PlValidation::regon('12345678901'));
        $this->assertFalse(PlValidation::regon('123456789012'));
        $this->assertFalse(PlValidation::regon('1234567890123'));
        $this->assertFalse(PlValidation::regon('12345678a'));
        $this->assertFalse(PlValidation::regon('123456786'));
        $this->assertFalse(PlValidation::regon('12345678512346'));
        $this->assertTrue(PlValidation::regon('123456785'));
        $this->assertTrue(PlValidation::regon('12345678512347'));
        $this->assertTrue(PlValidation::regon('251890090'));
        $this->assertTrue(PlValidation::regon('55678259078290'));
    }

    /**
     * test the phone method of PlValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(PlValidation::phone('123456789'));
        $this->assertTrue(PlValidation::phone('+48123456789'));
        $this->assertTrue(PlValidation::phone('048123456789'));
        $this->assertFalse(PlValidation::phone('123 45 678'));
        $this->assertFalse(PlValidation::phone('1234567'));
        $this->assertFalse(PlValidation::phone('12345674890'));
    }
}
