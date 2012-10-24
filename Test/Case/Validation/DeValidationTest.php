<?php
/**
 * German Localized Validation class test case
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
App::uses('DeValidation', 'Localized.Validation');

/**
 * DeValidationTest
 *
 * @package       Localized.Test.Case.Validation
 */
class DeValidationTest extends CakeTestCase {

/**
 * test the postal method of DeValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(DeValidation::postal('51109'));
		$this->assertFalse(DeValidation::postal('051109'));
	}
}
