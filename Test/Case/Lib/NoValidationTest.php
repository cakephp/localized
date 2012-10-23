<?php
/**
 * Norwegian Localized Validation class test case
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
 * @package       Localized.Test.Case.Lib
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('NoValidation', 'Localized.Lib');

/**
 * NoValidationTest
 *
 * @package       Localized.Test.Case.Lib
 */
class NoValidationTest extends CakeTestCase {

/**
 * test the phone method of NoValidation
 *
 * @return void
 */
	public function testPhone() {
		$this->assertTrue(NoValidation::phone('12345678'));
		$this->assertTrue(NoValidation::phone('12 34 56 78'));
		$this->assertTrue(NoValidation::phone('123 45 678'));
		$this->assertFalse(NoValidation::phone('1234567'));
		$this->assertFalse(NoValidation::phone('1234567489'));
	}

/**
 * test the postal method of NoValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(NoValidation::postal('0123'));
		$this->assertFalse(NoValidation::postal('90210'));
	}

/**
 * test the ssn method of NoValidation
 *
 * @return void
 */
	public function testSsn() {
		$this->assertTrue(NoValidation::ssn('12345678901'));
		$this->assertTrue(NoValidation::ssn('123456 78901'));
		$this->assertFalse(NoValidation::ssn('1234567890'));
		$this->assertFalse(NoValidation::ssn('123456 7890'));
	}
}
