<?php
App::uses('CzValidation', 'Localized.Validation');
App::uses('MxValidation', 'Localized.Validation');

class LocalizedModelValidationTest extends CakeTestCase {

/**
 * LocalizedModelValidationTest::testLocalizedValidation()
 *
 * @return void
 */
	public function testLocalizedValidation() {
		$value = '1234';
		$result = Validation::postal($value, null, 'cz');
		$this->assertFalse($result);

		$value = '12345';
		$result = Validation::postal($value, null, 'cz');
		$this->assertTrue($result);
	}

/**
 * LocalizedModelValidationTest::testLocalizedValidation()
 *
 * @return void
 */
	public function testLocalizedValidationOnValidate() {
		$this->Post = ClassRegistry::init('LocalizedPost');
		$data = array(
			'postal' => '1234',
		);
		$this->Post->create();
		$this->Post->set($data);
		$result = $this->Post->validates();
		$this->assertFalse($result);

		$data = array(
			'postal' => '12345',
		);
		$this->Post->create();
		$this->Post->set($data);
		$result = $this->Post->validates();
		$this->assertTrue($result);
	}

}

class LocalizedPost extends CakeTestModel {

	public $useTable = false;

	public $validate = array(
		'postal' => array(
			'valid' => array(
				'rule' => array('postal', null, 'mx'),
				'message' => 'Must be valid mexico postal code'
			)
		)
	);

}
