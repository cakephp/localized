<?php
declare(strict_types=1);

use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Localized\LocalizedPlugin;

$findRoot = function ($root) {
    do {
        $lastRoot = $root;
        $root = dirname($root);
        if (is_dir($root . '/vendor/cakephp/cakephp')) {
            return $root;
        }
    } while ($root !== $lastRoot);

    throw new Exception('Cannot find the root of the application, unable to run tests');
};
$root = $findRoot(__FILE__);
unset($findRoot);

chdir($root);
if (file_exists($root . '/config/bootstrap.php')) {
    require $root . '/config/bootstrap.php';

    return;
}

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

Configure::write('debug', true);

require $root . '/vendor/cakephp/cakephp/tests/bootstrap.php';
require $root . '/vendor/cakephp/cakephp/src/functions.php';

Plugin::getCollection()->add(new LocalizedPlugin([
    'path' => dirname(dirname(__FILE__)) . DS,
    'routes' => false,
]));
