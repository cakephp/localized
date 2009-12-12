<?php
/**
 * Taiwan Localized Validation class test case
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
App::import('Lib', 'Localized.TwValidation');

/**
 * TwValidationTestCase
 *
 * @package       localization
 * @subpackage    localized.tests.cases.libs
 */
class TwValidationTestCase extends CakeTestCase {

/**
 * test the phone method of TwValidation
 *
 * @return void
 * @access public
 */
	function testPhone() {
		$this->assertTrue(TwValidation::phone('+886277388066'));
		$this->assertTrue(TwValidation::phone('02-7738-8066'));
		$this->assertTrue(TwValidation::phone('02 7738 8066'));
		$this->assertTrue(TwValidation::phone('(02)7738-8066'));
		$this->assertTrue(TwValidation::phone('049-289-5371'));
		$this->assertTrue(TwValidation::phone('+886.49.289-5371'));
		$this->assertTrue(TwValidation::phone('+886-826-66056'));
		$this->assertTrue(TwValidation::phone('0800-080090'));
		$this->assertTrue(TwValidation::phone('0936-000-777'));
		$this->assertTrue(TwValidation::phone('0968-080785'));
	}

/**
 * test the postal method of TwValidation
 *
 * @return void
 * @access public
 */
	function testPostal() {
		$this->assertTrue(TwValidation::postal('235'));
		$this->assertTrue(TwValidation::postal('615'));
		$this->assertTrue(TwValidation::postal('10075'));
		$this->assertTrue(TwValidation::postal('71074'));
		$this->assertFalse(TwValidation::postal('085'));
	}

/**
 * test the nicn method of TwValidation
 *
 * @return void
 * @access public
 */
	function testNicn() {
		$this->assertTrue(TwValidation::nicn('Y100000001'));
		$this->assertTrue(TwValidation::nicn('K164729166'));
		$this->assertTrue(TwValidation::nicn('U267825932'));
		$this->assertTrue(TwValidation::nicn('O257854301'));
		$this->assertTrue(TwValidation::nicn('Q175232776'));
	}
}
?>