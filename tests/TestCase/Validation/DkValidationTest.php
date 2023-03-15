<?php
declare(strict_types=1);

/**
 * Danish Localized Validation class test case
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

use Cake\Localized\Validation\DkValidation;
use Cake\TestSuite\TestCase;

/**
 * DkValidationTest
 */
class DkValidationTest extends TestCase
{
    /**
     * test the ssn method of DkValidation
     *
     * @return void
     */
    public function testSsn()
    {
        $this->assertTrue(DkValidation::personId('111111-3334'));
        $this->assertFalse(DkValidation::personId('111111-333'));
    }

    /**
     * test the postal method of DkValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertTrue(DkValidation::postal('4444'));
        $this->assertFalse(DkValidation::postal('333'));
        $this->assertFalse(DkValidation::postal('55555'));
    }

    /**
     * test the phone method of DkValidation
     *
     * @return void
     */
    public function testPhone()
    {
        $this->assertTrue(DkValidation::phone('88888888'));
        $this->assertFalse(DkValidation::phone('7777777'));
        $this->assertFalse(DkValidation::phone('999999999'));
    }
}
