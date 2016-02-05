<?php
/**
 * Taiwan Localized Validation class test case
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

use Cake\Localized\Validation\TwValidation;
use Cake\TestSuite\TestCase;

/**
 * TwValidationTest
 *
 */
class TwValidationTest extends TestCase
{
    /**
     * test the phone method of TwValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(TwValidation::phone('+886277388066'));
        $this->assertTrue(TwValidation::phone('02-7738-8066'));
        $this->assertTrue(TwValidation::phone('02 7738 8066'));
        $this->assertTrue(TwValidation::phone('(02)7738-8066'));
        $this->assertTrue(TwValidation::phone('049-289-5371'));
        $this->assertTrue(TwValidation::phone('+886.49.289-5371'));
        $this->assertTrue(TwValidation::phone('+886-826-66056'));
        $this->assertTrue(TwValidation::phone('0800-080090'));
        $this->assertTrue(TwValidation::phone('0936-000-777'));
        $this->assertTrue(TwValidation::phone('0968-080785'));
    }

    /**
     * test the postal method of TwValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(TwValidation::postal('235'));
        $this->assertTrue(TwValidation::postal('615'));
        $this->assertTrue(TwValidation::postal('10075'));
        $this->assertTrue(TwValidation::postal('71074'));
        $this->assertFalse(TwValidation::postal('085'));
    }

    /**
     * test the nicn method of TwValidation
     *
     * @return void
     */
    public function testNicn()
    {
        $this->assertTrue(TwValidation::nicn('Y100000001'));
        $this->assertTrue(TwValidation::nicn('K164729166'));
        $this->assertTrue(TwValidation::nicn('U267825932'));
        $this->assertTrue(TwValidation::nicn('O257854301'));
        $this->assertTrue(TwValidation::nicn('Q175232776'));
    }

    /**
     * test the ubn method of TwValidation
     *
     * @return void
     */
    public function testUbn()
    {
        $this->assertTrue(TwValidation::ubn('30185757'));
        $this->assertTrue(TwValidation::ubn('28816624'));
        $this->assertTrue(TwValidation::ubn('29030783'));
        $this->assertTrue(TwValidation::ubn('70385540'));
        $this->assertTrue(TwValidation::ubn('70402724'));
        $this->assertTrue(TwValidation::ubn('70417228'));
        $this->assertTrue(TwValidation::ubn('70425493'));
        $this->assertTrue(TwValidation::ubn('70428512'));
        $this->assertTrue(TwValidation::ubn('80284937'));
        $this->assertTrue(TwValidation::ubn('80288005'));
        $this->assertTrue(TwValidation::ubn('80309347'));
        $this->assertTrue(TwValidation::ubn('84824416'));
        $this->assertTrue(TwValidation::ubn('84877118'));
        $this->assertTrue(TwValidation::ubn('29048329'));
        $this->assertTrue(TwValidation::ubn('29059535'));
        $this->assertTrue(TwValidation::ubn('70433803'));
        $this->assertTrue(TwValidation::ubn('70445786'));
        $this->assertTrue(TwValidation::ubn('70460815'));
    }
}
