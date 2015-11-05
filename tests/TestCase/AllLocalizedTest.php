<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         Localized Plugin v 0.3
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * AllLocalizedTests class
 *
 * This test group will run all tests.
 *
 */
class AllLocalizedTests extends PHPUnit_Framework_TestSuite {

/**
 * Suite define the tests for this suite
 *
 * @return void
 */
	public static function suite() {
		$suite = new CakeTestSuite('All Tests');
		$suite->addTestDirectoryRecursive(CakePlugin::path('Localized') . 'Test' . DS . 'Case' . DS);

		return $suite;
	}
}
