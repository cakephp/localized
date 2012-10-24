<?php
/**
 * Mexican Localized Validation class test case
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
App::uses('MxValidation', 'Localized.Validation');

/**
 * Mexican Validation Test Case
 *
 * @package       Localized.Test.Case.Validation
 */
class MxValidationTest extends CakeTestCase {

/**
 * test the phone method of MxValidation
 *
 * @return void
 */
	public function testPhone() {
		$this->assertTrue(MxValidation::phone('1122334455'));
		$this->assertTrue(MxValidation::phone('11 22 33 44 55'));
		$this->assertTrue(MxValidation::phone('11-22-33-44-55'));
		$this->assertTrue(MxValidation::phone('22334455'));
		$this->assertTrue(MxValidation::phone('(112)233-4455'));
		$this->assertTrue(MxValidation::phone('(11)2233-4455'));

		$this->assertFalse(MxValidation::phone('112233445566'));
		$this->assertFalse(MxValidation::phone('22 33 44 55'));
		$this->assertFalse(MxValidation::phone('11-22-33-44-552'));
		$this->assertFalse(MxValidation::phone('122334455'));
		$this->assertFalse(MxValidation::phone('(112)2233-4455'));
		$this->assertFalse(MxValidation::phone('(111)2233-4455'));
	}

/**
 * test the postal method of MxValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(MxValidation::postal('98000'));
		$this->assertFalse(MxValidation::postal('1046'));
	}
}
