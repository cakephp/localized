<?php
/**
 * BD Localized Validation class test case
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
App::uses('BdValidation', 'Localized.Validation');

/**
 * BdValidationTest
 *
 */
class BdValidationTest extends CakeTestCase {

/**
 * test the postal method of BdValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(BdValidation::postal('1200'));
		$this->assertTrue(BdValidation::postal('3100'));
		$this->assertFalse(BdValidation::postal('111'));
		$this->assertFalse(BdValidation::postal('11123'));
	}
}
