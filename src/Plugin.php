<?php
declare(strict_types=1);

/**
 * Localized Plugin class.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link http://cakephp.org
 * @since Localized Plugin v 0.1
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Localized;

use Cake\Core\BasePlugin;

class Plugin extends BasePlugin
{
    /**
     * Plugin name.
     *
     * @var string
     */
    protected $name = 'Localized';

    /**
     * @var bool
     */
    protected $routesEnabled = false;

    /**
     * @var bool
     */
    protected $bootstrapEnabled = false;
    /**
     * @var bool
     */
    protected $consoleEnabled = false;

    /**
     * @var bool
     */
    protected $middlewareEnabled = false;
}
