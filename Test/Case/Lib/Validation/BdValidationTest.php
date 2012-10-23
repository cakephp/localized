<?php
/**
 * BD Localized Validation class test case
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
 * @package       Localized.Test.Case.Lib
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('BdValidation', 'Localized.Lib');

/**
 * BdValidationTest
 *
 * @package       Localized.Test.Case.Lib
 */
class BdValidationTest extends CakeTestCase {

/**
 * test the postal method of BdValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(BdValidation::postal('1200'));
		$this->assertTrue(BdValidation::postal('3100'));
		$this->assertFalse(BdValidation::postal('111'));
		$this->assertFalse(BdValidation::postal('11123'));
	}
}
