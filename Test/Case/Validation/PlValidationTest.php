<?php
/**
 * Polish Localized Validation class test case
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
App::uses('PlValidation', 'Localized.Validation');

/**
 * PlValidationTest
 *
 * @package       Localized.Test.Case.Validation
 */
class PlValidationTest extends CakeTestCase {

/**
 * test the postal method of PlValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(PlValidation::postal('63-400'));
		$this->assertFalse(PlValidation::postal('63400'));
		$this->assertFalse(PlValidation::postal('634-00'));
	}

/**
 * test the ssn method of PlValidation
 *
 * @return void
 */
	public function testSsn() {
		$this->assertTrue(PlValidation::ssn('768-000-24-66'));
		$this->assertTrue(PlValidation::ssn('768-00-02-466'));
		$this->assertTrue(PlValidation::ssn('7680002466'));
		$this->assertFalse(PlValidation::ssn('768-000-24-65'));
		$this->assertFalse(PlValidation::ssn('769-000-24-66'));
		$this->assertFalse(PlValidation::ssn('7680002566'));
	}

/**
 * Test the pesel method of PlValidation
 *
 * @return void
 */
	public function testPesel() {
		$this->assertTrue(PlValidation::pesel('49040501580'));
		$this->assertFalse(PlValidation::pesel('49040501680'));
		$this->assertFalse(PlValidation::pesel('49040501581'));
	}

/**
 * Test the regon method of PlValidation
 *
 * @return void
 */
	public function testRegon() {
		$this->assertTrue(PlValidation::regon('590096454'));
		$this->assertFalse(PlValidation::regon('590096453'));
		$this->assertFalse(PlValidation::regon('591096454'));
	}
}
