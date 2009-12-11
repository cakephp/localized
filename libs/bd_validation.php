<?php
/**
 * BD Localized Validation class. Handles localized validation for Bangladesh
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

/**
 * BdValidation
 *
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 */
class BdValidation {

/**
 * Checks zipcodes for Bangladesh
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function postal($check) {
		$pattern = '/^\d{4}$/';
		return preg_match($pattern, $check);
	}
}
?>