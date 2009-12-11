<?php
/**
 * Belgian Localized Validation class. Handles localized validation for Belgium
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
 * BeValidation
 *
 * @package       localized
 * @subpackage    localized.tests.cases.libs
 */
class BeValidation {

/**
 * Checks zipcodes for Belgium
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function postal($check) {
		$pattern = '/^[1-9]{1}[0-9]{3}$/i';
		return preg_match($pattern, $check);
	}
}
?>