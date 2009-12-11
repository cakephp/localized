<?php
/**
 * Spanish Localized Validation class test case
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
 * @subpackage    localized.tests.cases.libs
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::import('Lib', 'Localized.EsValidation');

/**
 * EsValidationTestCase
 *
 * @package       localization
 * @subpackage    localized.tests.cases.libs
 */
class EsValidationTestCase extends CakeTestCase {

/**
 * test the phone method of EsValidation
 *
 * @return void
 * @access public
 */
	function testPhone() {
		$this->assertTrue(EsValidation::phone('924227227'));
		$this->assertTrue(EsValidation::phone('924.227.227'));
		$this->assertTrue(EsValidation::phone('924-227-227'));
		$this->assertTrue(EsValidation::phone('924-22-72-27'));
		$this->assertTrue(EsValidation::phone('924 22 72 27'));
		$this->assertTrue(EsValidation::phone('924227227'));
		$this->assertTrue(EsValidation::phone('624227227'));
		$this->assertTrue(EsValidation::phone('924-227227'));
		$this->assertTrue(EsValidation::phone('827-227227'));
		$this->assertTrue(EsValidation::phone('91-2227227'));
		$this->assertFalse(EsValidation::phone('127227227'));
		$this->assertFalse(EsValidation::phone('813 4567'));
	}
}
?>