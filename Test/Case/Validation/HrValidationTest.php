<?php
/**
 * Slovak Localized Validation class test case
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
App::uses('HrValidation', 'Localized.Validation');

/**
 * HrValidationTest
 *
 */
class HrValidationTest extends CakeTestCase {

/**
 * test the postal method of HrValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(HrValidation::postal('25616'));
		$this->assertFalse(HrValidation::postal('0989'));
	}
}
