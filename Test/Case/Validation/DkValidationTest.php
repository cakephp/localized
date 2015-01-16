<?php
/**
 * Danish Localized Validation class test case
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('DkValidation', 'Localized.Validation');

/**
 * DkValidationTest
 *
 */
class DkValidationTest extends CakeTestCase {

/**
 * test the ssn method of DkValidation
 *
 * @return void
 */
	public function testSsn() {
		$this->assertTrue(DkValidation::ssn('111111-3334'));
		$this->assertFalse(DkValidation::ssn('111111-333'));
	}
}
