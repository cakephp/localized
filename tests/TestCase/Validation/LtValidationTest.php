<?php
/**
 * LT Localized Validation class test case
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

use Cake\Localized\Validation\LtValidation;
use Cake\TestSuite\TestCase;

/**
 * LtValidationTest
 *
 */
class LtValidationTest extends TestCase
{
    /**
     * test the phone method of LtValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(LtValidation::phone('+370 671 51221'));
        $this->assertTrue(LtValidation::phone('370 814 52222'));
        $this->assertTrue(LtValidation::phone('+370 (37) 85 85 96'));
        $this->assertTrue(LtValidation::phone('+370 69 44 44 96'));
        $this->assertTrue(LtValidation::phone('37052512288'));
        $this->assertTrue(LtValidation::phone('+37067151221'));
        $this->assertTrue(LtValidation::phone('+370-671-51221'));
        $this->assertTrue(LtValidation::phone('+370-881 51220'));

        $this->assertFalse(LtValidation::phone('+37069k62145'));
        $this->assertFalse(LtValidation::phone('+360 671 52222'));
        $this->assertFalse(LtValidation::phone('+370 8415 235555'));
        $this->assertFalse(LtValidation::phone('-37066666666'));
        $this->assertFalse(LtValidation::phone('+370 1 1523 44'));
        $this->assertFalse(LtValidation::phone('370 22 11 11 12 11'));
        $this->assertFalse(LtValidation::phone('+370 - 671-52222'));
        $this->assertFalse(LtValidation::phone('+370?671.52222'));

        $this->assertTrue(LtValidation::phone('8 (25) 25 21 22'));
        $this->assertTrue(LtValidation::phone('867252128'));
        $this->assertTrue(LtValidation::phone('8-716-76145'));
        $this->assertTrue(LtValidation::phone('8-(37)-74-66-99'));

        $this->assertFalse(LtValidation::phone('+8 25 25 25 14'));
        $this->assertFalse(LtValidation::phone('5 671 86523'));
        $this->assertFalse(LtValidation::phone('8-962-5555'));
        $this->assertFalse(LtValidation::phone('32155o55555'));
        $this->assertFalse(LtValidation::phone('5-625-86666'));
    }

    /**
     * test the postal method of LtValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(LtValidation::postal('89104'));
        $this->assertTrue(LtValidation::postal('LT-13089'));
        $this->assertTrue(LtValidation::postal('lt-13022'));
        $this->assertTrue(LtValidation::postal('Lt 13047'));
        $this->assertFalse(LtValidation::postal('111'));
        $this->assertFalse(LtValidation::postal('1111'));
        $this->assertFalse(LtValidation::postal('130896'));
        $this->assertFalse(LtValidation::postal('13089-333'));
        $this->assertFalse(LtValidation::postal('lu-55621'));
        $this->assertFalse(LtValidation::postal('LY-52147'));
        $this->assertFalse(LtValidation::postal('Nv 52125'));
    }

    /**
     * test the ssn method of LtValidation
     *
     * @return void
     */
    public function testSsn()
    {
        $this->assertTrue(LtValidation::personId('SK 4321425'));
        $this->assertTrue(LtValidation::personId('SP 4321475'));
        $this->assertTrue(LtValidation::personId('NS-4321425'));
        $this->assertTrue(LtValidation::personId('zc 4321425'));
        $this->assertFalse(LtValidation::personId('a 4525214'));
        $this->assertFalse(LtValidation::personId('bfd 4521455'));
        $this->assertFalse(LtValidation::personId('111-4555115'));
        $this->assertFalse(LtValidation::personId('11-1421455'));
    }
}
