<?php
/**
 * German Localized Validation class test case
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
App::uses('DeValidation', 'Localized.Validation');

/**
 * DeValidationTest
 *
 */
class DeValidationTest extends CakeTestCase {

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
