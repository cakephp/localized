<?php
/**
 * BD Localized Validation class test case
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       Localized.Test.Case.Validation
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('BdValidation', 'Localized.Validation');

/**
 * BdValidationTest
 *
 * @package       Localized.Test.Case.Validation
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
/**
 * test the postal method of BdValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(BdValidation::mobile('+8801617738438'));
		$this->assertTrue(BdValidation::mobile('008801617738438'));
		$this->assertTrue(BdValidation::mobile('8801617738438'));
		$this->assertTrue(BdValidation::mobile('01617738438'));
		$this->assertTrue(BdValidation::mobile('1617738438'));
		$this->assertFalse(BdValidation::mobile('1217738438'));
	}
}
