<?php
/**
 * BD Localized Validation class test case
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized\Test\TestCase\Validation;

use Cake\Localized\Validation\BdValidation;
use Cake\TestSuite\TestCase;

/**
 * BdValidationTest
 *
 */
class BdValidationTest extends TestCase
{
    /**
     * test the postal method of BdValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(BdValidation::postal('1200'));
        $this->assertTrue(BdValidation::postal('3100'));
        $this->assertFalse(BdValidation::postal('111'));
        $this->assertFalse(BdValidation::postal('11123'));
    }
}
