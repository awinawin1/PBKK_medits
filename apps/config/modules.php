<?php

return array(
    'dashboard' => [
        'namespace' => 'Phalcon\Init\Dashboard',
        'webControllerNamespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'apiControllerNamespace' => 'Phalcon\Init\Dashboard\Controllers\Api',
        'className' => 'Phalcon\Init\Dashboard\Module',
        'path' => APP_PATH . '/modules/dashboard/Module.php',
        'defaultRouting' => false,
        'defaultController' => 'dashboard',
        'defaultAction' => 'index'
    ],

    'auth' => [
        'namespace' => 'Phalcon\Init\Auth',
        'webControllerNamespace' => 'Phalcon\Init\Auth\Controllers\Web',
        'apiControllerNamespace' => 'Phalcon\Init\Auth\Controllers\Api',
        'className' => 'Phalcon\Init\Auth\Module',
        'path' => APP_PATH . '/modules/auth/Module.php',
        'defaultRouting' => false,
        'defaultController' => 'auth',
        'defaultAction' => 'index'
    ],

    'dokter' => [
        'namespace' => 'Phalcon\Init\Dokter',
        'webControllerNamespace' => 'Phalcon\Init\Dokter\Controllers\Web',
        'apiControllerNamespace' => 'Phalcon\Init\Dokter\Controllers\Api',
        'className' => 'Phalcon\Init\Dokter\Module',
        'path' => APP_PATH . '/modules/dokter/Module.php',
        'defaultRouting' => false,
        'defaultController' => 'dokter',
        'defaultAction' => 'index'
    ],

    'janji' => [
        'namespace' => 'Phalcon\Init\Janji',
        'webControllerNamespace' => 'Phalcon\Init\Janji\Controllers\Web',
        'apiControllerNamespace' => 'Phalcon\Init\Janji\Controllers\Api',
        'className' => 'Phalcon\Init\Janji\Module',
        'path' => APP_PATH . '/modules/janji/Module.php',
        'defaultRouting' => false,
        'defaultController' => 'janji',
        'defaultAction' => 'index'
    ],

    'apoteker' => [
        'namespace' => 'Phalcon\Init\Apoteker',
        'webControllerNamespace' => 'Phalcon\Init\Apoteker\Controllers\Web',
        'apiControllerNamespace' => 'Phalcon\Init\Apoteker\Controllers\Api',
        'className' => 'Phalcon\Init\Apoteker\Module',
        'path' => APP_PATH . '/modules/apoteker/Module.php',
        'defaultRouting' => false,
        'defaultController' => 'apoteker',
        'defaultAction' => 'index'
    ],

);