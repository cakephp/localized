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
App::uses('GbValidation', 'Localized.Validation');

/**
 * Gb Localized Validation class test case
 *
 */
class GbValidationTest extends CakeTestCase {

/**
 * test the postal method of GbValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(GbValidation::postal('DT4 8PP'));
		$this->assertFalse(GbValidation::postal('DT4-8PP'));
	}
}
