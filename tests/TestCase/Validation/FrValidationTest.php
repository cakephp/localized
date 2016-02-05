<?php
/**
 * French Localized Validation class test case
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

use Cake\Localized\Validation\FrValidation;
use Cake\TestSuite\TestCase;

/**
 * FrValidationTest
 *
 */
class FrValidationTest extends TestCase
{
    /**
     * test the phone method of FrValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(FrValidation::phone('04 76 96 12 32'));
        $this->assertTrue(FrValidation::phone('07-76-96-12-32'));
        $this->assertTrue(FrValidation::phone('08.76.96.12.32'));
        $this->assertTrue(FrValidation::phone('0876961232'));
        $this->assertTrue(FrValidation::phone('09 76 96 12 32'));
        $this->assertFalse(FrValidation::phone('04 76 96 12 3'));
        $this->assertFalse(FrValidation::phone('04 76 96 12 33 '));
        $this->assertFalse(FrValidation::phone('047696123323'));
        $this->assertFalse(FrValidation::phone('07 43 90 33'));
    }

    /**
     * test the postal method of FrValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(FrValidation::postal('01001'));
        $this->assertTrue(FrValidation::postal('14000'));
        $this->assertTrue(FrValidation::postal('75001'));
        $this->assertTrue(FrValidation::postal('13200'));
        $this->assertTrue(FrValidation::postal('97500'));
        $this->assertTrue(FrValidation::postal('99138'));
        $this->assertFalse(FrValidation::postal('1400'));
        $this->assertFalse(FrValidation::postal('14 000'));
        $this->assertFalse(FrValidation::postal('00000'));
        $this->assertFalse(FrValidation::postal('01000'));
        $this->assertFalse(FrValidation::postal('99139'));
    }

    /**
     * test the postal method of FrValidation
     *
     * @return void
     */
    public function testSsn()
    {
        $this->assertTrue(FrValidation::personId('151024610204325'));
        $this->assertTrue(FrValidation::personId('151022A00400150'));
        $this->assertTrue(FrValidation::personId('151022B03300180'));
        $this->assertFalse(FrValidation::personId('1510246102043'));
        $this->assertFalse(FrValidation::personId('151024610204326'));
        $this->assertFalse(FrValidation::personId('151022A10204326'));
        $this->assertFalse(FrValidation::personId('151022B10204326'));
        $this->assertFalse(FrValidation::personId('15102461020432'));
        $this->assertFalse(FrValidation::personId('151024610204'));
        $this->assertFalse(FrValidation::personId('151022C10204326'));
    }
}
