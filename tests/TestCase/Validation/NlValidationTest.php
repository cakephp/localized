<?php
/**
 * Dutch Localized Validation class test case
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

use Cake\Localized\Validation\NlValidation;
use Cake\TestSuite\TestCase;

/**
 * NlValidationTest
 *
 */
class NlValidationTest extends TestCase
{
    /**
     * test the phone method of NlValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(NlValidation::phone('020-5045100'));
        $this->assertTrue(NlValidation::phone('0572-212121'));
        $this->assertTrue(NlValidation::phone('0205045100'));
        $this->assertTrue(NlValidation::phone('0572212121'));
        $this->assertTrue(NlValidation::phone('0653123456'));
        $this->assertTrue(NlValidation::phone('06-53123456'));
        $this->assertFalse(NlValidation::phone('020-50451009'));
    }

    /**
     * test the postal method of NlValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(NlValidation::postal('1620AB'));
        $this->assertTrue(NlValidation::postal('1620 AB'));
        $this->assertTrue(NlValidation::postal('5020FZ'));
        $this->assertTrue(NlValidation::postal('5020 FZ'));
        $this->assertFalse(NlValidation::postal('5020-FZ'));
        $this->assertFalse(NlValidation::postal('5020'));
        $this->assertFalse(NlValidation::postal('0110 AS'));
        $this->assertFalse(NlValidation::postal('50222FZ'));
    }

    /**
     * test the ssn method of NlValidation
     *
     * @return void
     */
    public function testSsn()
    {
        $this->assertTrue(NlValidation::personId('187821321'));
        $this->assertTrue(NlValidation::personId('502222314'));
        $this->assertFalse(NlValidation::personId('18782132'));
        $this->assertFalse(NlValidation::personId('50222FZ'));
    }
}
