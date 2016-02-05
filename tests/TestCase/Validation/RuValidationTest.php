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

use Cake\Localized\Validation\RuValidation;
use Cake\TestSuite\TestCase;

/**
 * RuValidationTest
 *
 */
class RuValidationTest extends TestCase
{
    /**
     * test the postal method of RuValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(RuValidation::postal('101135'));
        $this->assertTrue(RuValidation::postal('693000'));

        $this->assertFalse(RuValidation::postal('100123'));
        $this->assertFalse(RuValidation::postal('200321'));
    }

    /**
     * test phone method of RuValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(RuValidation::phone('+7 (342) 1234567'));
        $this->assertTrue(RuValidation::phone('+7 (41144) 1234'));
    }

    /**
     * test address method of RuValidation
     *
     * @return void
     */
    public function testAddress()
    {
        $this->assertTrue(RuValidation::address1('Московский пр., д. 100'));
        $this->assertTrue(RuValidation::address1('Moskovskiy ave., bld. 100'));

        $this->assertFalse(RuValidation::address1('I would not tell'));
    }

    /**
     * test passport method of RuValidation
     *
     * @return void
     */
    public function testPassport()
    {
        $this->assertTrue(RuValidation::passport('1234 123456'));

        $this->assertFalse(RuValidation::passport('1234 1234567'));
        $this->assertFalse(RuValidation::passport('1234123456'));
        $this->assertFalse(RuValidation::passport('1234 1x3456'));
    }
    /**
     * test vatin method of RuValidation
     *
     * @return void
     */
    public function testVatin()
    {
        $this->assertTrue(RuValidation::vatin('7710140679'));
        $this->assertTrue(RuValidation::vatin('772807592828'));

        $this->assertFalse(RuValidation::vatin('12345'));

        // invalid checksums
        $this->assertFalse(RuValidation::vatin('7710140670'));
        $this->assertFalse(RuValidation::vatin('772807592837'));
    }

    /**
     * test snils method of RuValidation
     *
     * @return void
     *
     * @covers RuValidation::personId
     * @covers RuValidation::snils
     */
    public function testSnils()
    {
        $this->assertTrue(RuValidation::snils('112-233-445 95'));
        $this->assertTrue(RuValidation::snils('032-032-952 00'));

        $this->assertFalse(RuValidation::snils('03203295200'));

        // invalid checksum
        $this->assertFalse(RuValidation::snils('112-233-445 96'));
    }
}
