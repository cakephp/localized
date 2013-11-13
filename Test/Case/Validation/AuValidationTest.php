<?php
/**
 * Australian Localized Validation class test case
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
App::uses('AuValidation', 'Localized.Validation');

/**
 * AuValidationTest
 *
 * @package       Localized.Test.Case.Validation
 */
class AuValidationTest extends CakeTestCase {

/**
 * test the postal method of AuValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(AuValidation::postal('2300'));
		$this->assertFalse(AuValidation::postal('02300'));
	}
}

/**
 * test the phone method of AuValidation
 *
 * @return void
 */
	public function testPhone() {
		$this->assertTrue(AuValidation::phone('02 5551 5678'));
		$this->assertTrue(AuValidation::phone('+61 2 5551 5678'));
		$this->assertTrue(AuValidation::phone('1300 555 567'));
		$this->assertTrue(AuValidation::phone('0412 515 678'));
		$this->assertTrue(AuValidation::phone('0412515678'));
		$this->assertTrue(AuValidation::phone('+61 412 515 678'));
		$this->assertTrue(AuValidation::phone('13 12 51'));
		$this->assertTrue(AuValidation::phone('1902 345 678'));
		$this->assertFalse(AuValidation::phone('(02) 5551 5678'));
		$this->assertFalse(AuValidation::phone('1300 TSTCAS'));
		$this->assertFalse(AuValidation::phone('+61 4 12 515 678'));
	}
}
