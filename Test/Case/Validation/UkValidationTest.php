<?php
/**
 * UK Localized Validation class test case
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
App::uses('UkValidation', 'Localized.Validation');

/**
 * UkValidationTest
 *
 * @package       Localized.Test.Case.Validation
 */
class UkValidationTest extends CakeTestCase {

/**
 * test the phone method of UkValidation
 *
 * @return void
 */
	public function testPhone() {
		$this->assertTrue(UkValidation::phone('016977 3888'));
		$this->assertTrue(UkValidation::phone('017687 55555'));
		$this->assertTrue(UkValidation::phone('01750 62555'));
		$this->assertTrue(UkValidation::phone('0175 062 555'));
		$this->assertTrue(UkValidation::phone('0175 062555'));
		$this->assertTrue(UkValidation::phone('01884 777 888'));
		$this->assertTrue(UkValidation::phone('01884 777888'));
		$this->assertTrue(UkValidation::phone('0116 555 7788'));
		$this->assertTrue(UkValidation::phone('0191 777 8899'));
		$this->assertTrue(UkValidation::phone('020 3555 7788'));
		$this->assertTrue(UkValidation::phone('0203 555 7788'));
		$this->assertTrue(UkValidation::phone('02035 557 788'));
		$this->assertTrue(UkValidation::phone('020355 57788'));
		$this->assertTrue(UkValidation::phone('024 7555 8899'));
		$this->assertTrue(UkValidation::phone('074557 77888'));
		$this->assertTrue(UkValidation::phone('07555 777 888'));
		$this->assertTrue(UkValidation::phone('07555 777888'));
		$this->assertTrue(UkValidation::phone('0775 577 7888'));
		$this->assertTrue(UkValidation::phone('078 5577 7888'));

		$this->assertTrue(UkValidation::phone('+44 16977 3888'));
		$this->assertTrue(UkValidation::phone('+44 17687 55555'));
		$this->assertTrue(UkValidation::phone('+44 1750 62555'));
		$this->assertTrue(UkValidation::phone('+44 175 062 555'));
		$this->assertTrue(UkValidation::phone('+44 175 062555'));
		$this->assertTrue(UkValidation::phone('+44 1884 777 888'));
		$this->assertTrue(UkValidation::phone('+44 1884 777888'));
		$this->assertTrue(UkValidation::phone('+44 116 555 7788'));
		$this->assertTrue(UkValidation::phone('+44 191 777 8899'));
		$this->assertTrue(UkValidation::phone('+44 20 3555 7788'));
		$this->assertTrue(UkValidation::phone('+44 203 555 7788'));
		$this->assertTrue(UkValidation::phone('+44 2035 557 788'));
		$this->assertTrue(UkValidation::phone('+44 20355 57788'));
		$this->assertTrue(UkValidation::phone('+44 24 7555 8899'));
		$this->assertTrue(UkValidation::phone('+44 74557 77888'));
		$this->assertTrue(UkValidation::phone('+44 7555 777 888'));
		$this->assertTrue(UkValidation::phone('+44 7555 777888'));
		$this->assertTrue(UkValidation::phone('+44 775 577 7888'));
		$this->assertTrue(UkValidation::phone('+44 78 5577 7888'));

		$this->assertTrue(UkValidation::phone('(016977) 3888'));
		$this->assertTrue(UkValidation::phone('(017687) 55555'));
		$this->assertTrue(UkValidation::phone('(01750) 62555'));
		$this->assertTrue(UkValidation::phone('(0175) 062 555'));
		$this->assertTrue(UkValidation::phone('(0175) 062555'));
		$this->assertTrue(UkValidation::phone('(01884) 777 888'));
		$this->assertTrue(UkValidation::phone('(01884) 777888'));
		$this->assertTrue(UkValidation::phone('(0116) 555 7788'));
		$this->assertTrue(UkValidation::phone('(0191) 777 8899'));
		$this->assertTrue(UkValidation::phone('(020) 3555 7788'));
		$this->assertTrue(UkValidation::phone('(0203) 555 7788'));
		$this->assertTrue(UkValidation::phone('(02035) 557 788'));
		$this->assertTrue(UkValidation::phone('(020355) 57788'));
		$this->assertTrue(UkValidation::phone('(024) 7555 8899'));

		$this->assertTrue(UkValidation::phone('0300 555 8899'));
		$this->assertTrue(UkValidation::phone('0333 555 8899'));
		$this->assertTrue(UkValidation::phone('0345 555 8899'));
		$this->assertTrue(UkValidation::phone('0370 555 8899'));
		$this->assertTrue(UkValidation::phone('0500 777 888'));
		$this->assertTrue(UkValidation::phone('055 7555 8899'));
		$this->assertTrue(UkValidation::phone('056 7555 8899'));
		$this->assertTrue(UkValidation::phone('070 7555 8899'));
		$this->assertTrue(UkValidation::phone('076 7555 8899'));
		$this->assertTrue(UkValidation::phone('0800 777 888'));
		$this->assertTrue(UkValidation::phone('0800 555 8899'));
		$this->assertTrue(UkValidation::phone('0808 555 8899'));
		$this->assertTrue(UkValidation::phone('0844 555 8899'));
		$this->assertTrue(UkValidation::phone('0871 555 8899'));
		$this->assertTrue(UkValidation::phone('0903 555 8899'));
		$this->assertTrue(UkValidation::phone('0911 555 8899'));
		$this->assertTrue(UkValidation::phone('0982 555 8899'));

		$this->assertTrue(UkValidation::phone('(020) 3555 7788'));
		$this->assertTrue(UkValidation::phone('(020) 3555-7788'));
		$this->assertTrue(UkValidation::phone('020 3555 7788'));
		$this->assertTrue(UkValidation::phone('020-3555-7788'));
		$this->assertTrue(UkValidation::phone('+44 20 3555 7788'));
		$this->assertTrue(UkValidation::phone('+44-20-3555-7788'));
		$this->assertTrue(UkValidation::phone('00 44 20 3555 7788'));
		$this->assertTrue(UkValidation::phone('00-44-20-3555-7788'));
		$this->assertTrue(UkValidation::phone('011 44 20 3555 7788'));
		$this->assertTrue(UkValidation::phone('011-44-20-3555-7788'));
		$this->assertTrue(UkValidation::phone('20 3555 7788'));
		$this->assertTrue(UkValidation::phone('(20) 3555 7788'));
		$this->assertTrue(UkValidation::phone('(0) 20 3555 7788'));
		$this->assertTrue(UkValidation::phone('(0) (20) 3555 7788'));
		$this->assertTrue(UkValidation::phone('(+44) (20) 3555 7788'));
		$this->assertTrue(UkValidation::phone('(+44)-(20)-3555-7788'));
		$this->assertTrue(UkValidation::phone('(+44) 20 3555 7788'));
		$this->assertTrue(UkValidation::phone('(44) 20 3555 7788'));
		$this->assertTrue(UkValidation::phone('(+44) (0) (20) 3555 7788'));
		$this->assertTrue(UkValidation::phone('(+44)-(0)-(20)-3555-7788'));
		$this->assertTrue(UkValidation::phone('(+44) (0) 20 3555 7788'));
		$this->assertTrue(UkValidation::phone('(44) (0) 20 3555 7788'));
		$this->assertTrue(UkValidation::phone('(00) (44) (0) (20) 3555 7788'));
		$this->assertTrue(UkValidation::phone('(00) (+44) (0) (20) 3555 7788'));
		$this->assertTrue(UkValidation::phone('(00)-(+44)-(0)-(20)-3555-7788'));
		$this->assertTrue(UkValidation::phone('(011) (44) (0) (20) 3555 7788'));
		$this->assertTrue(UkValidation::phone('(011) (+44) (0) (20) 3555 7788'));
		$this->assertTrue(UkValidation::phone('(011)-(+44)-(0)-(20)-3555-7788'));

		$this->assertFalse(UkValidation::phone('++44 20 3555 7788'));
		$this->assertFalse(UkValidation::phone('044 20 3555 7788'));
		$this->assertFalse(UkValidation::phone('020755588'));
		$this->assertFalse(UkValidation::phone('020755588990'));
		$this->assertFalse(UkValidation::phone('04488998899'));
		$this->assertFalse(UkValidation::phone('06088998899'));
		$this->assertFalse(UkValidation::phone('020 X555 X788'));
		$this->assertFalse(UkValidation::phone('020:3555 7788'));
		$this->assertFalse(UkValidation::phone('020/3555 7788'));
		$this->assertFalse(UkValidation::phone('<020> 3555 7788'));
		$this->assertFalse(UkValidation::phone('[020] 3555 7788'));
		$this->assertFalse(UkValidation::phone('{020} 3555 7788'));
		$this->assertFalse(UkValidation::phone('020/3555 7788'));
		$this->assertFalse(UkValidation::phone('+33144556677'));
		$this->assertFalse(UkValidation::phone('0033144556677'));
	}

/**
 * test the postal method of UkValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(UkValidation::postal('DT4 8PP'));
		$this->assertFalse(UkValidation::postal('DT4-8PP'));
	}
}
