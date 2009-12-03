<?php
/**
 * Belgian Localized Validation class test case
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
App::import('Lib', 'Localized.BeValidation');

class BeValidationTestCase extends CakeTestCase {
/**
 * test the postal method of BeValidation
 *
 * @return void
 */
	function testPostal() {
		$this->assertTrue(BeValidation::postal('1804'));
		$this->assertFalse(BeValidation::postal('01804'));
	}
}