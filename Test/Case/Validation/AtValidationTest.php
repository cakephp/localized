<?php
/**
 * Austrian Localized Validation class test case
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
App::uses('AtValidation', 'Localized.Validation');

/**
 * AtValidationTest
 *
 */
class AtValidationTest extends CakeTestCase {

/**
 * test the postal method of AtValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(AtValidation::postal('5110'));
		$this->assertFalse(AtValidation::postal('05110'));
	}

/**
 * test not implemented method
 *
 * @expectedException NotImplementedException
 */
	public function testPhone() {
		AtValidation::phone('05110');
	}

}
