<?php
/**
 * Belgian Localized Validation class test case
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::import('Lib', 'Localized.BeValidation');

/**
 * BeValidationTestCase
 *
 * @package       localization
 * @subpackage    localized.tests.cases.libs
 */
class BeValidationTestCase extends CakeTestCase {

/**
 * test the postal method of BeValidation
 *
 * @return void
 * @access public
 */
	function testPostal() {
		$this->assertTrue(BeValidation::postal('1804'));
		$this->assertFalse(BeValidation::postal('01804'));
		$this->assertTrue(BeValidation::postal('0612'));
	}

/**
 * test the ssn method of BeValidation
 *
 * @return void
 * @access public
 */
	function testSsn() {
		$this->assertTrue(BeValidation::ssn('72.02.02-900.81'));
		$this->assertTrue(BeValidation::ssn('93.05.18-223.61'));
		$this->assertTrue(BeValidation::ssn('00.01.25-567.77'));

		$this->assertTrue(BeValidation::ssn('72020290081', false));
		$this->assertTrue(BeValidation::ssn('93-05-18-223-61', false));
		$this->assertTrue(BeValidation::ssn('00 01 25 567 77', false));

		$this->assertFalse(BeValidation::ssn('72020290081'));
		$this->assertFalse(BeValidation::ssn('93.05.18-223.60'));
		$this->assertFalse(BeValidation::ssn('00.01.25-567.75'));

		$this->assertFalse(BeValidation::ssn('72020290080', false));
		$this->assertFalse(BeValidation::ssn('93-05-18-223-65', false));
		$this->assertFalse(BeValidation::ssn('00 01 25 567 78', false));
	}
}
