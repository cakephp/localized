<?php
/**
 * Danish Localized Validation class test case
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org
 * @since         Localized Plugin v 0.1
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
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
