<?php
/**
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

use Cake\Localized\Validation\GbValidation;
use Cake\TestSuite\TestCase;

/**
 * Gb Localized Validation class test case
 *
 */
class GbValidationTest extends TestCase
{
    /**
     * test the postal method of GbValidation
     *
     * @return void
     */
    public function testPostal()
    {
        $this->assertFalse(GbValidation::postal('DT4-8PP'));
        $this->assertTrue(GbValidation::postal('sp110qn'));
        $this->assertTrue(GbValidation::postal('SP110QN'));
        $this->assertTrue(GbValidation::postal('DT4 8PP'));
        $this->assertTrue(GbValidation::postal('W1A 1AA'));
        $this->assertTrue(GbValidation::postal('W12 7TQ'));
        $this->assertTrue(GbValidation::postal('SW1A 0AA'));
        $this->assertTrue(GbValidation::postal('W1J 7NT'));
        $this->assertTrue(GbValidation::postal('EC1A 1BB'));
        $this->assertTrue(GbValidation::postal('W1A 0AX'));
        $this->assertTrue(GbValidation::postal('M1 1AE'));
        $this->assertTrue(GbValidation::postal('B33 8TH'));
        $this->assertTrue(GbValidation::postal('CR2 6XH'));
        $this->assertTrue(GbValidation::postal('XM45HQ'));
        $this->assertFalse(GbValidation::postal('SAN TA1'));
    }
}
