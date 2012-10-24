<?php
/**
 * US Localized Validation class test case
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
App::uses('UsValidation', 'Localized.Validation');

/**
 * UsValidationTest
 *
 * @package       Localized.Test.Case.Validation
 */
class UsValidationTest extends CakeTestCase {

/**
 * test the phone method of UsValidation
 *
 * @return void
 */
	public function testPhone() {
		$this->assertTrue(UsValidation::phone('+1 702 425 5085'));
		$this->assertFalse(UsValidation::phone('teststring'));
		$this->assertFalse(UsValidation::phone('1-(33)-(333)-(4444)'));
		$this->assertFalse(UsValidation::phone('1-(33)-3333-4444'));
		$this->assertFalse(UsValidation::phone('1-(33)-33-4444'));
		$this->assertFalse(UsValidation::phone('1-(33)-3-44444'));
		$this->assertFalse(UsValidation::phone('1-(33)-3-444'));
		$this->assertFalse(UsValidation::phone('1-(33)-3-44'));

		$this->assertFalse(UsValidation::phone('(055) 999-9999'));
		$this->assertFalse(UsValidation::phone('(155) 999-9999'));
		$this->assertFalse(UsValidation::phone('(595) 999-9999'));
		$this->assertFalse(UsValidation::phone('(555) 099-9999'));
		$this->assertFalse(UsValidation::phone('(555) 199-9999'));

		$this->assertTrue(UsValidation::phone('1 (222) 333 4444'));
		$this->assertTrue(UsValidation::phone('+1 (222) 333 4444'));
		$this->assertTrue(UsValidation::phone('(222) 333 4444'));

		$this->assertTrue(UsValidation::phone('1-(333)-333-4444'));
		$this->assertTrue(UsValidation::phone('1.(333)-333-4444'));
		$this->assertTrue(UsValidation::phone('1.(333).333-4444'));
		$this->assertTrue(UsValidation::phone('1.(333).333.4444'));
		$this->assertTrue(UsValidation::phone('1-333-333-4444'));
		$this->assertFalse(UsValidation::phone('7002 425 5085'));
	}

/**
 * test the postal method of UsValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(UsValidation::postal('89104'));
		$this->assertFalse(UsValidation::postal('111'));
		$this->assertFalse(UsValidation::postal('1111'));
		$this->assertFalse(UsValidation::postal('130896'));
		$this->assertFalse(UsValidation::postal('13089-33333'));
		$this->assertFalse(UsValidation::postal('13089-333'));
		$this->assertFalse(UsValidation::postal('13A89-4333'));
		$this->assertTrue(UsValidation::postal('13089-3333'));
		$this->assertFalse(UsValidation::postal('NV 89104'));
	}

/**
 * test the ssn method of UsValidation
 *
 * @return void
 */
	public function testSsn() {
		$this->assertFalse(UsValidation::ssn('11-33-4333'));
		$this->assertFalse(UsValidation::ssn('113-3-4333'));
		$this->assertFalse(UsValidation::ssn('111-33-333'));
		$this->assertTrue(UsValidation::ssn('111-33-4333'));
	}
}
