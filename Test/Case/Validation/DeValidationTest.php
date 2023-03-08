<?php
/**
 * German Localized Validation class test case
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
App::uses('DeValidation', 'Localized.Validation');

/**
 * DeValidationTest
 *
 */
class DeValidationTest extends CakeTestCase {

/**
 * test the phone method of DeValidation
 *
 * @return void
 */
	public function testPhone() {
		$this->assertTrue(DeValidation::phone('0123456789'));
		$this->assertFalse(DeValidation::phone('sometext'));
	}

/**
 * test the postal method of DeValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(DeValidation::postal('51109'));
		$this->assertFalse(DeValidation::postal('051109'));
	}
}
