<?php
/**
 * Latvian Localized Validation class test case
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

use Cake\Localized\Validation\LvValidation;
use Cake\TestSuite\TestCase;

/**
 * LvValidationTest
 *
 */
class LvValidationTest extends TestCase
{

    /**
     * Person id data provider
     *
     * @return array
     */
    public function personIdProvider()
    {
        return [
            ['030972-10200', true],
            ['030973-10200', false],
            ['131372-10200', false],
            ['', false],
        ];
    }

    /**
     * Test Latvian postal
     *
     * @dataProvider personIdProvider
     *
     * @param $item
     * @param $assert
     *
     * @return void
     */
    public function testPersonId($item, $assert)
    {
        $this->assertEquals($assert, LvValidation::personId($item));
    }
}
