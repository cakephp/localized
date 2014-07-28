<?php
/**
 * French Localized Validation class test case
 *
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
App::uses('FrValidation', 'Localized.Validation');

/**
 * FrValidationTest
 *
 */
class FrValidationTest extends CakeTestCase {

/**
 * test the phone method of FrValidation
 *
 * @return void
 */
	public function testPhone() {
		$this->assertTrue(FrValidation::phone('04 76 96 12 32'));
		$this->assertFalse(FrValidation::phone('04 76 96 12 3'));
	}

/**
 * test the postal method of FrValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(FrValidation::postal('14000'));
		$this->assertTrue(FrValidation::postal('75001'));
		$this->assertTrue(FrValidation::postal('13200'));
		$this->assertTrue(FrValidation::postal('97500'));
		$this->assertFalse(FrValidation::postal('1400'));
		$this->assertFalse(FrValidation::postal('14 000'));
	}

/**
 * test the postal method of FrValidation
 *
 * @return void
 */
	public function testSsn() {
		$this->assertTrue(FrValidation::ssn('151024610204325'));
		$this->assertTrue(FrValidation::ssn('151022A00400150'));
		$this->assertTrue(FrValidation::ssn('151022B03300180'));
		$this->assertFalse(FrValidation::ssn('1510246102043'));
		$this->assertFalse(FrValidation::ssn('151024610204326'));
		$this->assertFalse(FrValidation::ssn('151022A10204326'));
		$this->assertFalse(FrValidation::ssn('151022B10204326'));
		$this->assertFalse(FrValidation::ssn('15102461020432'));
		$this->assertFalse(FrValidation::ssn('151024610204'));
		$this->assertFalse(FrValidation::ssn('151022C10204326'));
	}
}
