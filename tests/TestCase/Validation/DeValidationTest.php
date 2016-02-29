<?php

/**
 * German Localized Validation class test case
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

use Cake\Localized\Validation\DeValidation;
use Cake\TestSuite\TestCase;

/**
 * DeValidationTest
 *
 */
class DeValidationTest extends TestCase
{

    /**
     * test the phone method of DeValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(DeValidation::phone('0123456789'));
        $this->assertFalse(DeValidation::phone('sometext'));
    }

    /**
     * test the postal method of DeValidation
     * according to wikipedia, some combinations are reserved and therefore not valid
     * https://de.wikipedia.org/wiki/Liste_der_Postleitregionen_in_Deutschland#F.C3.BCnfstelliges_System_seit_1993
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(DeValidation::postal('51109'));
        // must have 5 digits
        $this->assertFalse(DeValidation::postal('1109'));
        $this->assertFalse(DeValidation::postal('051109'));
        $this->assertFalse(DeValidation::postal('00109'));
        $this->assertTrue(DeValidation::postal('01109'));
        $this->assertFalse(DeValidation::postal('05000'));
        $this->assertTrue(DeValidation::postal('06109'));
        $this->assertFalse(DeValidation::postal('43000'));
        $this->assertTrue(DeValidation::postal('44109'));
        $this->assertFalse(DeValidation::postal('62000'));
        $this->assertTrue(DeValidation::postal('63109'));
    }
}
