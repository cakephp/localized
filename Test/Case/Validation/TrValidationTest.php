<?php
/**
 * Turkey Localized Validation class test case
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
App::uses('TrValidation', 'Localized.Validation');

/**
 * TrValidationTest
 *
 */
class TrValidationTest extends CakeTestCase {

/**
 * test the postal method of TrValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(TrValidation::postal('02300'));
		$this->assertFalse(TrValidation::postal('2300'));
		$this->assertFalse(TrValidation::postal('230000'));
	}
}
