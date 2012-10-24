<?php
/**
 * Serbian Localized Validation class test case
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
App::uses('RsValidation', 'Localized.Validation');

/**
 * RsValidationTest
 *
 * @package       Localized.Test.Case.Validation
 */
class RsValidationTest extends CakeTestCase {

/**
 * test the jmbg method of RsValidation
 *
 * @return void
 */
	public function testJMBG() {
		$this->assertTrue(RsValidation::jmbg('1707017170007'));
		$this->assertFalse(RsValidation::jmbg('1707017170008'));
		$this->assertFalse(RsValidation::jmbg('170701717000'));
		$this->assertFalse(RsValidation::jmbg('A707017170007'));
	}

/**
 * test the postal_number method of RsValidation
 *
 * @return void
 */
	public function testPostalNumber() {
		$this->assertTrue(RsValidation::postal_number('11090'));
		$this->assertFalse(RsValidation::postal_number('111000'));
		$this->assertFalse(RsValidation::postal_number('A1100'));
	}

/**
 * test the address_code method of RsValidation
 *
 * @return void
 */
	public function testAddressCode() {
		$this->assertTrue(RsValidation::address_code('122407'));
		$this->assertFalse(RsValidation::address_code('11090'));
		$this->assertFalse(RsValidation::address_code('A11090'));
	}
}
