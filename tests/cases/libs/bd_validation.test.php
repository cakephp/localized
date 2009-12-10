<?php
/**
 * BD Localized Validation class test case
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
 * @since         localized 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::import('Lib', 'Localized.BdValidation');

class BdValidationTestCase extends CakeTestCase {

/**
 * test the postal method of BdValidation
 *
 * @return void
 */
	function testPostal() {
		$this->assertTrue(BdValidation::postal('1200'));
		$this->assertTrue(BdValidation::postal('3100'));
		$this->assertFalse(BdValidation::postal('111'));
		$this->assertFalse(BdValidation::postal('11123'));
	}
}
?>