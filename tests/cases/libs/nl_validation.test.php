<?php
/**
 * Dutch Localized Validation class test case
 * *
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
App::import('Lib', 'Localized.NlValidation');

class NlValidationTestCase extends CakeTestCase {
/**
 * test the phone method of NlValidation
 *
 * @return void
 */
	function testPhone() {
		$this->assertTrue(NlValidation::phone('020-5045100'));
		$this->assertTrue(NlValidation::phone('0572-212121'));
		$this->assertTrue(NlValidation::phone('0205045100'));
		$this->assertTrue(NlValidation::phone('0572212121'));
		$this->assertTrue(NlValidation::phone('0653123456'));
		$this->assertTrue(NlValidation::phone('06-53123456'));
		$this->assertFalse(NlValidation::phone('020-50451009'));
	}

/**
 * test the postal method of NlValidation
 *
 * @return void
 */
	function testPostal() {
		$this->assertTrue(NlValidation::postal('1620AB'));
		$this->assertTrue(NlValidation::postal('1620 AB'));
		$this->assertTrue(NlValidation::postal('5020FZ'));
		$this->assertTrue(NlValidation::postal('5020 FZ'));
		$this->assertFalse(NlValidation::postal('5020-FZ'));
		$this->assertFalse(NlValidation::postal('5020'));
		$this->assertFalse(NlValidation::postal('0110 AS'));
		$this->assertFalse(NlValidation::postal('50222FZ'));
	}

/**
 * test the ssn method of NlValidation
 *
 * @return void
 */
	function testSsn() {
		$this->assertTrue(NlValidation::ssn('187821321'));
		$this->assertTrue(NlValidation::ssn('502222314'));
		$this->assertFalse(NlValidation::ssn('18782132'));
		$this->assertFalse(NlValidation::ssn('50222FZ'));
	}
}