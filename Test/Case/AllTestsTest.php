<?php
/**
 * AllTests file
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
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Localized.Test.Case
 * @since         Localized Plugin v 0.3
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * AllTests class
 *
 * This test group will run all tests.
 *
 * @package       Localized.Test.Case
 */
class AllTests extends PHPUnit_Framework_TestSuite {

/**
 * Suite define the tests for this suite
 *
 * @return void
 */
	public static function suite() {
		$suite = new CakeTestSuite('All Tests');
		$suite->addTestDirectoryRecursive(App::pluginPath('Localized') . 'Test' . DS . 'Case' . DS);

		return $suite;
	}
}
