<?php
/**
 * Iran Localized Validation class test case
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
App::uses('IrValidation', 'Localized.Validation');

/**
 * IrValidationTest
 *
 * @package       Localized.Test.Case.Validation
 */
class IrValidationTest extends CakeTestCase {

/**
 * test the alphaNumeric method of IrValidation
 *
 * @return void
 */
	public function testAlphaNumeric() {
		$this->assertTrue(IrValidation::alphaNumeric('آزمایش ۱۲۳۴۵۶۷۸۹۰'));
		$this->assertTrue(IrValidation::alphaNumeric('آزمایش 1234567890'));
		$this->assertTrue(IrValidation::alphaNumeric('هِمّت بُلَند دار کِه مَردانِ روزگار  اَز همّتِ بُلَند به جایی رسیده‌اَند'));
		$this->assertTrue(IrValidation::alphaNumeric('﷼'));

		$this->assertFalse(IrValidation::alphaNumeric('teststring'));
		$this->assertFalse(IrValidation::alphaNumeric('test1234567890'));
		$this->assertFalse(IrValidation::alphaNumeric('test آزمایش'));
	}

/**
 * test the numeric method of IrValidation
 *
 * @return void
 */
	public function testNumeric() {
		$this->assertTrue(IrValidation::numeric('۱۲۳۴۵۶۷۸۹۰'));

		$this->assertFalse(IrValidation::numeric('teststring'));
		$this->assertFalse(IrValidation::numeric('1234567890'));
		$this->assertFalse(IrValidation::numeric('١٢٣٤٥٦٧٨٩٠'));
	}

/**
 * test the cc method of IrValidation
 *
 * @return void
 */
	public function testCc() {
		$this->assertTrue(IrValidation::cc('1111222233334444'));
		$this->assertTrue(IrValidation::cc('1111-2222-3333-4444'));

		$this->assertFalse(IrValidation::cc('teststring'));
		$this->assertFalse(IrValidation::cc('1111'));
		$this->assertFalse(IrValidation::cc('1111 2222 3333 4444'));
		$this->assertFalse(IrValidation::cc('111-122-223-333-444-4'));
	}

/**
 * test the phone method of IrValidation
 *
 * @return void
 */
	public function testPhone() {
		$this->assertTrue(IrValidation::phone('982133334444'));
		$this->assertTrue(IrValidation::phone('00982133334444'));
		$this->assertTrue(IrValidation::phone('+982133334444'));
		$this->assertTrue(IrValidation::phone('+98 2133334444'));
		$this->assertTrue(IrValidation::phone('+98 21 33334444'));
		$this->assertTrue(IrValidation::phone('+98-21-33334444'));
		$this->assertTrue(IrValidation::phone('(+98) (21) (33334444)'));
		$this->assertTrue(IrValidation::phone('02133334444'));
		$this->assertTrue(IrValidation::phone('021 33334444'));
		$this->assertTrue(IrValidation::phone('021 33334444'));
		$this->assertTrue(IrValidation::phone('(021) (118)'));
		$this->assertTrue(IrValidation::phone('0411 3334444'));
		$this->assertTrue(IrValidation::phone('(0411) (3334444)'));

		$this->assertFalse(IrValidation::phone('teststring'));
		$this->assertFalse(IrValidation::phone('992133334444'));
		$this->assertFalse(IrValidation::phone('+992133334444'));
		$this->assertFalse(IrValidation::phone('00992133334444'));
		$this->assertFalse(IrValidation::phone('000982133334444'));
		$this->assertFalse(IrValidation::phone('+00982133334444'));
		$this->assertFalse(IrValidation::phone('+0982133334444'));
		$this->assertFalse(IrValidation::phone('+98/21/33334444'));
		$this->assertFalse(IrValidation::phone('+02133334444'));
		$this->assertFalse(IrValidation::phone('021 22'));
	}

/**
 * test the mobile method of IrValidation
 *
 * @return void
 */
	public function testMobile() {
		$this->assertTrue(IrValidation::mobile('989123334444'));
		$this->assertTrue(IrValidation::mobile('00989353334444'));
		$this->assertTrue(IrValidation::mobile('+989363334444'));
		$this->assertTrue(IrValidation::mobile('+98 9373334444'));
		$this->assertTrue(IrValidation::mobile('(+98) 9383334444'));
		$this->assertTrue(IrValidation::mobile('+98-9323334444'));

		$this->assertFalse(IrValidation::mobile('teststring'));
		$this->assertFalse(IrValidation::mobile('999123334444'));
		$this->assertFalse(IrValidation::mobile('+999353334444'));
		$this->assertFalse(IrValidation::mobile('00999363334444'));
		$this->assertFalse(IrValidation::mobile('000989373334444'));
		$this->assertFalse(IrValidation::mobile('+00989383334444'));
		$this->assertFalse(IrValidation::mobile('+0989323334444'));
	}

/**
 * test the postal method of IrValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(IrValidation::postal('1234567890'));

		$this->assertFalse(IrValidation::postal('teststring'));
		$this->assertFalse(IrValidation::postal('123456789'));
	}

/**
 * test the ssn method of IrValidation
 *
 * @return void
 */
	public function testSsn() {
		$this->assertTrue(IrValidation::ssn('9876543210'));
		$this->assertTrue(IrValidation::ssn('1234567891'));
		$this->assertTrue(IrValidation::ssn('0324354657'));

		$this->assertFalse(IrValidation::ssn('1234567890'));
		//$this->assertFalse(IrValidation::ssn('3333333333'));
		$this->assertFalse(IrValidation::ssn('0324354654'));
		$this->assertFalse(IrValidation::ssn('12345'));
	}
}
