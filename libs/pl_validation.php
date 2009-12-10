<?php
/**
 * Polish Localized Validation class. Handles localized validation for Poland
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
 * @since         localized 0.1
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class PlValidation {

/**
 * Check zipcodes for Poland
 *
 * @param string $check Value to check
 * @return boolean
 */
	function postal($check) {
		$pattern = '/^[0-9]{2}-[0-9]{3}$/D';
		return preg_match($pattern, $check);
	}
}
?>