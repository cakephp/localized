<?php
/**
 * Finnish Localized Validation class test case
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

use Cake\Localized\Validation\FiValidation;
use Cake\TestSuite\TestCase;

/**
 * FiValidationTest
 *
 */
class FiValidationTest extends TestCase
{

    /**
     * Person id data provider
     *
     * @return array
     */
    public function personIdProvider()
    {
        return [
            ['120553-128K', true],
            ['010100+991D', true],
            ['010100-9857', true],
            ['010100A929D', true],
            ['010100+991B', false],
            ['010100-9856', false],
            ['010100A929B', false],
            [null, false],
            ['', false],
        ];
    }

    /**
     * Postal data provider
     * @return array
     */
    public function postalProvider()
    {
        return [
            ['00000', true],
            ['000000', false],
            ['99999', true],
            ['9999A', false],
            ['1234', false],
        ];
    }

    /**
     * Test Finnish person id
     *
     * @return void
     * @dataProvider personIdProvider
     */
    public function testPersonId($item, $assert)
    {
        $this->assertEquals($assert, FiValidation::personId($item));
    }

    /**
     * Test Finnish postal
     *
     * @return void
     * @dataProvider postalProvider
     */
    public function testPostal($item, $assert)
    {
        $this->assertEquals($assert, FiValidation::postal($item));
    }
}
