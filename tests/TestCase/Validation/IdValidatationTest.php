<?php
/**
 * Indonesian Localized Validation class test case
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

use Cake\Localized\Validation\IdValidation;
use Cake\TestSuite\TestCase;

/**
 * Indonesian Validation Test Case
 */
class IdValidationTest extends TestCase
{
    /**
     * Test the mobile method of IdValidation
     *
     * @return void
     */
    public function testMobile()
    {
        $this->assertTrue(IdValidation::mobile('08125985608'));
        $this->assertFalse(IdValidation::mobile('8125985608'));
    }

    /**
     * Test the postal method of IdValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(IdValidation::postal('15000'));
        $this->assertFalse(IdValidation::postal('00091'));
    }
}
