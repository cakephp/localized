<?php
declare(strict_types=1);

/**
 * Indonesian Localized Validation class test case
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
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
