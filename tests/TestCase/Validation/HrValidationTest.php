<?php
/**
 * Slovak Localized Validation class test case
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Test\TestCase\Validation;

use Cake\Localized\Validation\HrValidation;
use Cake\TestSuite\TestCase;

/**
 * HrValidationTest
 *
 */
class HrValidationTest extends TestCase
{
    /**
     * test the postal method of HrValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(HrValidation::postal('25616'));
        $this->assertFalse(HrValidation::postal('0989'));
    }
}
