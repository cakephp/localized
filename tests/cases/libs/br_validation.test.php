<?php
/**
 * Brazillian Localized Validation class test case
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
 * @since         localized 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::import('Lib', 'Localized.BrValidation');

class BrValidationTest extends CakeTestCase {

/**
 * test the phone method of BrValidation
 *
 * @return void
 */
	function testPhone() {
		$this->assertFalse(BrValidation::phone('teststring'));
		$this->assertFalse(BrValidation::phone('1-(33)-(333)-(4444)'));
		$this->assertFalse(BrValidation::phone('1-(33)-3333-4444'));
		$this->assertFalse(BrValidation::phone('1-(33)-33-4444'));
		$this->assertFalse(BrValidation::phone('1-(33)-3-44444'));
		$this->assertFalse(BrValidation::phone('1-(33)-3-444'));
		$this->assertFalse(BrValidation::phone('1-(33)-3-44'));
		$this->assertFalse(BrValidation::phone('2345678'));
	
		$this->assertTrue(BrValidation::phone('55 (48) 2345 6789'));
		$this->assertTrue(BrValidation::phone('+55 (48) 2345 6789'));
		$this->assertTrue(BrValidation::phone('+55 (048) 2345 6789'));
		$this->assertTrue(BrValidation::phone('+55 (48) 2345-6789'));
		$this->assertTrue(BrValidation::phone('+55 (48) 2345.6789'));
		$this->assertTrue(BrValidation::phone('(48) 2345 6789'));
		$this->assertTrue(BrValidation::phone('2345-6789'));
		$this->assertTrue(BrValidation::phone('2345.6789'));
		$this->assertTrue(BrValidation::phone('23456789'));
	}

/**
 * test the postal method of BrValidation
 *
 * @return void
 */
	function testPostal() {
		$this->assertFalse(BrValidation::postal('111'));
		$this->assertFalse(BrValidation::postal('1111'));
		$this->assertFalse(BrValidation::postal('1234-123'));
		$this->assertFalse(BrValidation::postal('12345-12'));

		$this->assertTrue(BrValidation::postal('88000-123'));
		$this->assertTrue(BrValidation::postal('01234-123'));
		$this->assertTrue(BrValidation::postal('01234123'));
	}

/**
 * test the ssn method of BrValidation
 *
 * @return void
 */
	function testSsn() {
		$this->assertFalse(BrValidation::ssn('22692173811'));
		$this->assertFalse(BrValidation::ssn('50549727322'));
		$this->assertFalse(BrValidation::ssn('869.283.422-11'));
		$this->assertFalse(BrValidation::ssn('843.701.734-22'));

		$this->assertTrue(BrValidation::ssn('22692173813'));
		$this->assertTrue(BrValidation::ssn('50549727302'));
		$this->assertTrue(BrValidation::ssn('869.283.422-00'));
		$this->assertTrue(BrValidation::ssn('843.701.734-34'));
	}
}
?>