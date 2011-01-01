<?php
/**
 * Iran Localized Validation class test case
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::import('Lib', 'Localized.IrValidation');

/**
 * IrValidationTestCase
 *
 * @package       localization
 * @subpackage    localized.tests.cases.libs
 */
class IrValidationTestCase extends CakeTestCase {

/**
 * test the phone method of IrValidation
 *
 * @return void
 * @access public
 */
	function testPhone() {
		$this->assertTrue(IrValidation::phone('982133334444'));
		$this->assertTrue(IrValidation::phone('00982133334444'));
		$this->assertTrue(IrValidation::phone('+982133334444'));
		$this->assertTrue(IrValidation::phone('+98 2133334444'));
		$this->assertTrue(IrValidation::phone('+98 21 33334444'));
		$this->assertTrue(IrValidation::phone('+98-21-33334444'));
		$this->assertTrue(IrValidation::phone('(+98) (21) (33334444)'));
		$this->assertTrue(IrValidation::phone('02133334444'));
		$this->assertTrue(IrValidation::phone('021 33334444'));
		$this->assertTrue(IrValidation::phone('021 33334444'));
		$this->assertTrue(IrValidation::phone('(021) (118)'));
		$this->assertTrue(IrValidation::phone('0411 3334444'));
		$this->assertTrue(IrValidation::phone('(0411) (3334444)'));

		$this->assertFalse(IrValidation::phone('teststring'));
		$this->assertFalse(IrValidation::phone('992133334444'));
		$this->assertFalse(IrValidation::phone('+992133334444'));
		$this->assertFalse(IrValidation::phone('00992133334444'));
		$this->assertFalse(IrValidation::phone('000982133334444'));
		$this->assertFalse(IrValidation::phone('+00982133334444'));
		$this->assertFalse(IrValidation::phone('+0982133334444'));
		$this->assertFalse(IrValidation::phone('+98/21/33334444'));
		$this->assertFalse(IrValidation::phone('+02133334444'));
		$this->assertFalse(IrValidation::phone('021 22'));
	}

/**
 * test the postal method of IrValidation
 *
 * @return void
 * @access public
 */
	function testPostal() {
		$this->assertTrue(IrValidation::postal('1234567890'));
                
		$this->assertFalse(IrValidation::postal('teststring'));
		$this->assertFalse(IrValidation::postal('123456789'));
	}

/**
 * test the ssn method of IrValidation
 *
 * @return void
 * @access public
 */
	function testSsn() {
		$this->assertTrue(IrValidation::ssn('9876543210'));
		$this->assertTrue(IrValidation::ssn('1234567891'));
		$this->assertTrue(IrValidation::ssn('0324354657'));

		$this->assertFalse(IrValidation::ssn('1234567890'));
		$this->assertFalse(IrValidation::ssn('3333333333'));
		$this->assertFalse(IrValidation::ssn('0324354654'));
		$this->assertFalse(IrValidation::ssn('12345'));
	}
}
