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
        $this->assertFalse(EsValidation::phone('127227227'));
        $this->assertFalse(EsValidation::phone('813 4567'));
    }
}
