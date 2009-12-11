<?php
/**
 * French Localized Validation class test case
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
App::import('Lib', 'Localized.FrValidation');

/**
 * FrValidationTestCase
 *
 * @package       localization
 * @subpackage    localized.tests.cases.libs
 */
class FrValidationTestCase extends CakeTestCase {

/**
 * test the phone method of FrValidation
 *
 * @return void
 * @access public
 */
	function testPhone() {
		$this->assertTrue(FrValidation::phone('04 76 96 12 32'));
		$this->assertFalse(FrValidation::phone('04 76 96 12 3'));
	}
}
?>