<?php
/**
 * Iran Localized Validation class test case
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::import('Lib', 'Localized.IrValidation');

/**
 * UsValidationTestCase
 *
 * @package       localization
 * @subpackage    localized.tests.cases.libs
 */
class IrValidationTestCase extends CakeTestCase {

/**
 * test the phone method of UsValidation
 *
 * @return void
 * @access public
 */
	function testPhone() {
		$this->assertTrue(UsValidation::phone('982133334444'));
		$this->assertTrue(UsValidation::phone('00982133334444'));
		$this->assertTrue(UsValidation::phone('+982133334444'));
		$this->assertTrue(UsValidation::phone('+98 2133334444'));
		$this->assertTrue(UsValidation::phone('+98 21 33334444'));
		$this->assertTrue(UsValidation::phone('+98-21-33334444'));
		$this->assertTrue(UsValidation::phone('(+98) (21) (33334444)'));
		$this->assertTrue(UsValidation::phone('02133334444'));
		$this->assertTrue(UsValidation::phone('021 33334444'));
		$this->assertTrue(UsValidation::phone('021 33334444'));
		$this->assertTrue(UsValidation::phone('(021) (118)'));
		$this->assertTrue(UsValidation::phone('0411 3334444'));
		$this->assertTrue(UsValidation::phone('(0411) (3334444)'));

                $this->assertFalse(UsValidation::phone('teststring'));
		$this->assertFalse(UsValidation::phone('992133334444'));
		$this->assertFalse(UsValidation::phone('+992133334444'));
		$this->assertFalse(UsValidation::phone('00992133334444'));
		$this->assertFalse(UsValidation::phone('000982133334444'));
		$this->assertFalse(UsValidation::phone('+00982133334444'));
		$this->assertFalse(UsValidation::phone('+0982133334444'));
		$this->assertFalse(UsValidation::phone('+98/21/33334444'));
		$this->assertFalse(UsValidation::phone('+02133334444'));
		$this->assertFalse(UsValidation::phone('021 22'));
	}

/**
 * test the postal method of UsValidation
 *
 * @return void
 * @access public
 */
	function testPostal() {
		$this->assertTrue(UsValidation::postal('1234567890'));
                
		$this->assertFalse(UsValidation::postal('teststring'));
		$this->assertFalse(UsValidation::postal('123456789'));
	}

/**
 * test the ssn method of UsValidation
 *
 * @return void
 * @access public
 */
	function testSsn() {
		$this->assertTrue(UsValidation::ssn('111-33-4333'));
		$this->assertTrue(UsValidation::ssn('111-33-4333'));
		$this->assertTrue(UsValidation::ssn('111-33-4333'));

                $this->assertFalse(UsValidation::ssn('111-33-333'));
                $this->assertFalse(UsValidation::ssn('111-33-333'));
                $this->assertFalse(UsValidation::ssn('111-33-333'));
	}
}
