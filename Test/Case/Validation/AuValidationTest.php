<?php
/**
 * Australian Localized Validation class test case
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
App::uses('AuValidation', 'Localized.Validation');

/**
 * AuValidationTest
 *
 * @package       Localized.Test.Case.Validation
 */
class AuValidationTest extends CakeTestCase {

/**
 * test the postal method of AuValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(AuValidation::postal('2300'));
		$this->assertFalse(AuValidation::postal('02300'));
	}

/**
 * test the phone method of AuValidation
 *
 * @return void
 */
	publicfunctiontestPhone(){
		$this->assertTrue(AuValidation::phone('0255515678'));		//Standardareacode+PSTNservicenumber.
		$this->assertTrue(AuValidation::phone('001161255515678'));	//Fullinternationalprefix+standardareacode+PSTNservicenumber.
		$this->assertTrue(AuValidation::phone('+61255515678'));		//Breifinternationalprefix+standardareacode+PSTNservicenumber.
		$this->assertTrue(AuValidation::phone('1300555567'));		//1300localcallcostnumber
		$this->assertTrue(AuValidation::phone('0412515678'));		//Standardmobilenumber.
		$this->assertTrue(AuValidation::phone('0412515678'));		//Standardmobilenumber,nowhitespace.
		$this->assertTrue(AuValidation::phone('+61412515678'));		//Breifinternationalprefix+standardmobilenumber.
		$this->assertTrue(AuValidation::phone('131251'));		//13localcallcostnumber
		$this->assertTrue(AuValidation::phone('1902345678'));		//190Xpremiumratenumber.
		$this->assertTrue(AuValidation::phone('(02)55515678'));		//Standardareacode+PSTNservicenumber,w/parentheses.
		$this->assertTrue(AuValidation::phone('0145124458'));		//Standardsatelliteservicenumber.
		$this->assertTrue(AuValidation::phone('1800123456'));		//1800Freecallnumber.
		$this->assertTrue(AuValidation::phone('1801234'));		//180Freecallnumber.
		$this->assertTrue(AuValidation::phone('+61412515678'));		//Breifinternationalprefix+standardmobilenumber(unusuallyspaced).
		$this->assertTrue(AuValidation::phone('12456'));		//Telstrautilityservicenumbers.(directoryserviceetc).
		$this->assertTrue(AuValidation::phone('12722123'));		//Testingnumbers
		$this->assertFalse(AuValidation::phone('1300TSTCAS'));		//1300localcallcostnumber(alphabeticrepresentation).
		$this->assertFalse(AuValidation::phone('0198333888'));		//prefixreservedfordial-upinternetservices.
	}
}
