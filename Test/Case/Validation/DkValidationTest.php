<?php
/**
 * Danish Localized Validation class test case
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
App::uses('DkValidation', 'Localized.Validation');

/**
 * DkValidationTest
 *
 * @package       Localized.Test.Case.Validation
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
