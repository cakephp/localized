<?php
/**
 * Swiss Localized Validation class test case
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
App::uses('ChValidation', 'Localized.Validation');

/**
 * ChValidationTest
 *
 */
class ChValidationTest extends CakeTestCase {

/**
 * test the postal method of ChValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(ChValidation::postal('5112'));
		$this->assertFalse(ChValidation::postal('05112'));
	}

}
