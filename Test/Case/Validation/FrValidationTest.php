<?php
/**
 * French Localized Validation class test case
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
App::uses('FrValidation', 'Localized.Validation');

/**
 * FrValidationTest
 *
 * @package       Localized.Test.Case.Validation
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
 * test the ssn method of FrValidation
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

/**
 * test the dateFormat method of FrValidation
 *
 * @return void
 */
	public function testDateFormat() {
		$this->assertTrue(FrValidation::dateFormat('28/02/2000'));
		$this->assertTrue(FrValidation::dateFormat('31/01/2012'));
		$this->assertTrue(FrValidation::dateFormat('31/12/2012'));
		$this->assertFalse(FrValidation::dateFormat('01/13/2000'));
		$this->assertFalse(FrValidation::dateFormat('31/02/2000'));
		$this->assertFalse(FrValidation::dateFormat('30/01/10 000'));
		$this->assertFalse(FrValidation::dateFormat('30.01.2000'));
		$this->assertFalse(FrValidation::dateFormat('2012-12-02'));
		$this->assertFalse(FrValidation::dateFormat('2012/01/12'));
		$this->assertFalse(FrValidation::dateFormat('01-12-2012'));
	}
}
