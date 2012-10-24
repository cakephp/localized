<?php
/**
 * Portuguese Localized Validation class test case
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
App::uses('PtValidation', 'Localized.Validation');

/**
 * PtValidationTest
 *
 * @package       Localized.Test.Case.Validation
 */
class PtValidationTest extends CakeTestCase {

/**
 * test the postal method of PtValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertFalse(PtValidation::postal('111'));
		$this->assertFalse(PtValidation::postal('1111'));
		$this->assertFalse(PtValidation::postal('130896'));
		$this->assertFalse(PtValidation::postal('13089-33333'));
		$this->assertFalse(PtValidation::postal('1000 333'));
		$this->assertFalse(PtValidation::postal('0000 333'));
		$this->assertFalse(PtValidation::postal('13A89-4333'));
		$this->assertTrue(PtValidation::postal('1389-333'));
	}
}
