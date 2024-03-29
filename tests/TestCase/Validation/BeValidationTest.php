<?php
declare(strict_types=1);

/**
 * Belgian Localized Validation class test case
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

use Cake\Localized\Validation\BeValidation;
use Cake\TestSuite\TestCase;

/**
 * BeValidationTest
 */
class BeValidationTest extends TestCase
{
    /**
     * test the postal method of BeValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(BeValidation::postal('1804'));
        $this->assertFalse(BeValidation::postal('01804'));
    }
}
