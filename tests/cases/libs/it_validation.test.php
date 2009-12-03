<?php
/**
 * Italian Localized Validation class test case
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
App::import('Lib', 'Localized.ItValidation');

class ItValidationTestCase extends CakeTestCase {
/**
 * test the phone method of ItValidation
 *
 * @return void
 */
	function testPhone() {
		$this->assertTrue(ItValidation::phone('347/1233456'));
		$this->assertFalse(ItValidation::phone('02+343536'));
	}

/**
 * test the postal method of ItValidation
 *
 * @return void
 */
	function testPostal() {
		$this->assertTrue(ItValidation::postal('10096'));
		$this->assertFalse(ItValidation::postal('1046'));
	}
}