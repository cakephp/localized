<?php
/**
 * Italian Localized Validation class test case
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
App::uses('ItValidation', 'Localized.Validation');

/**
 * ItValidationTest
 *
 * @package       Localized.Test.Case.Validation
 */
class ItValidationTest extends CakeTestCase {

/**
 * test the phone method of ItValidation
 *
 * @return void
 */
	public function testPhone() {
		$this->assertTrue(ItValidation::phone('347/1233456'));
		$this->assertFalse(ItValidation::phone('02+343536'));
	}

/**
 * test the postal method of ItValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(ItValidation::postal('10096'));
		$this->assertFalse(ItValidation::postal('1046'));
	}

/**
 * test the Codice Fiscale for Italy
 *
 * @return void
 */
	public function testCf() {
		$this->assertTrue(ItValidation::cf('JLTRSS68A41Z114A'));
		$this->assertTrue(ItValidation::cf('RSSMRA50A01F205R'));
		$this->assertTrue(ItValidation::cf('TRVMRA30T31L736B'));
		$this->assertTrue(ItValidation::cf('spsNTN55a01F839q'));

		$this->assertFalse(ItValidation::cf('MSSRNL30T31L736B'));
		$this->assertFalse(ItValidation::cf('spsNTN55a01F839r'));
		$this->assertFalse(ItValidation::cf('JLTRSSG8A41Z114A'));
		$this->assertFalse(ItValidation::cf('Fail'));
	}
}
