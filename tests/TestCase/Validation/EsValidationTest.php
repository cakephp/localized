<?php
/**
 * Spanish Localized Validation class test case
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

use Cake\Localized\Validation\EsValidation;
use Cake\TestSuite\TestCase;

/**
 * EsValidationTest
 *
 */
class EsValidationTest extends TestCase
{
    /**
     * test the postal method of EsValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(EsValidation::postal('02300'));
        $this->assertFalse(EsValidation::postal('2300'));
        $this->assertFalse(EsValidation::postal('230000'));
    }

    /**
     * test the phone method of EsValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(EsValidation::phone('924227227'));
        $this->assertTrue(EsValidation::phone('924.227.227'));
        $this->assertTrue(EsValidation::phone('924-227-227'));
        $this->assertTrue(EsValidation::phone('924-22-72-27'));
        $this->assertTrue(EsValidation::phone('924 22 72 27'));
        $this->assertTrue(EsValidation::phone('924227227'));
        $this->assertTrue(EsValidation::phone('624227227'));
        $this->assertTrue(EsValidation::phone('924-227227'));
        $this->assertTrue(EsValidation::phone('827-227227'));
        $this->assertTrue(EsValidation::phone('91-2227227'));
        $this->assertTrue(EsValidation::phone('721233223'));
        $this->assertFalse(EsValidation::phone('127227227'));
        $this->assertFalse(EsValidation::phone('813 4567'));
        $this->assertFalse(EsValidation::phone('(666) 232 323'));
    }

    /**
     * test the personId method of EsValidation
     *
     * @return void
     */
    public function testPersonId()
    {
        $this->assertTrue(EsValidation::personId('32050031Z'));
        $this->assertTrue(EsValidation::personId('X2546874S'));
        $this->assertTrue(EsValidation::personId('K1254868A'));

        $this->assertFalse(EsValidation::personId('23232323'));
    }

    /**
     * Test the dni validation.
     *
     * @return void
     */
    public function testDni()
    {
        $this->assertTrue(EsValidation::dni('32050031Z'));
        $this->assertTrue(EsValidation::dni('03654968S'));
        $this->assertTrue(EsValidation::dni('00000014Z'));
        $this->assertTrue(EsValidation::dni('14Z'));
        $this->assertFalse(EsValidation::dni('145'));
        $this->assertFalse(EsValidation::dni('21856874H'));
    }

    /**
     * Test the nie validation.
     *
     * @return void
     */
    public function testNie()
    {
        $this->assertTrue(EsValidation::nie('X2546874S'));
        $this->assertTrue(EsValidation::nie('Y2332323E'));
        $this->assertTrue(EsValidation::nie('Z2548769Y'));
        $this->assertFalse(EsValidation::nie('35489765Y'));
        $this->assertFalse(EsValidation::nie('123456'));
    }

    /**
     * Test the nif validation.
     *
     * @return void
     */
    public function testNif()
    {
        $this->assertTrue(EsValidation::nif('K1254868A'));
        $this->assertTrue(EsValidation::nif('K3548762H'));
        $this->assertTrue(EsValidation::nif('L5876542A'));
        $this->assertFalse(EsValidation::nif('X5876542A'));
        $this->assertFalse(EsValidation::nif('Z2548769Y'));
        $this->assertFalse(EsValidation::nif('32050031Z'));
    }
}
