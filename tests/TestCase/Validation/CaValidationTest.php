<?php
/**
 * Canadian Localized Validation class test case
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

use Cake\Localized\Validation\CaValidation;
use Cake\TestSuite\TestCase;

/**
 * CaValidationTest
 *
 */
class CaValidationTest extends TestCase
{
    /**
     * test the postal method of CaValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(CaValidation::postal('L4W 1S2'));
        $this->assertFalse(CaValidation::postal('LI4 SOC'));
    }
}
