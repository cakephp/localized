<?php
/**
 * German Localized Validation class test case
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
App::import('Lib', 'Localized.DeValidation');

/**
 * DeValidationTestCase
 *
 * @package       localization
 * @subpackage    localized.tests.cases.libs
 */
class DeValidationTestCase extends CakeTestCase {

/**
 * test the postal method of DeValidation
 *
 * @return void
 * @access public
 */
	function testPostal() {
		$this->assertTrue(DeValidation::postal('51109'));
		$this->assertFalse(DeValidation::postal('051109'));
	}
}
?>