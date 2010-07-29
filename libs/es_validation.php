<?php
/**
 * Spanish Localized Validation class. Handles localized validation for Spain
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
 * @subpackage    localized.libs
 * @since         Localized Plugin v 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * EsValidation
 *
 * @package       localized
 * @subpackage    localized.libs
 */
class EsValidation {

/**
 * Checks Postal Codes for Spain
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function postal($check) {
		$pattern = '/^(5[0-2]|[0-4][0-9])[0-9]{3}$/';
		return preg_match($pattern, $check);
	}

/**
 * Checks phone numbers for Spain
 *
 * @param string $check The value to check.
 * @return boolean
 * @access public
 */
	function phone($check) {
		$pattern = '/^\\+?(34[-. ]?)?\\(?(([689]{1})(([0-9]{2})\\)?[-. ]?|([0-9]{1})\\)?[-. ]?([0-9]{1}))|70\\)?[-. ]?([0-9]{1}))([0-9]{2})[-. ]?([0-9]{1})[-. ]?([0-9]{1})[-. ]?([0-9]{2})$/';
		return preg_match($pattern, $check);
	}
}
