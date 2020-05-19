<?php

$di['router'] = function() use ($defaultModule, $modules, $di, $config) {

	$router = new \Phalcon\Mvc\Router(false);
	$router->clear();


	/**
	 * Default Routing
	 */
	$router->add('/', [
	    'namespace' => $modules[$defaultModule]['webControllerNamespace'],
		'module' => $defaultModule,
	    'controller' => isset($modules[$defaultModule]['defaultController']) ? $modules[$defaultModule]['defaultController'] : 'index',
		'action' => isset($modules[$defaultModule]['defaultAction']) ? $modules[$defaultModule]['defaultAction'] : 'index'
	]);



	// $router->addGet('/', [
	//     'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
	// 	'module' => 'dashboard',
	//     'controller' => 'dashboard',
	//     'action' => 'dashboard'
	// ]);

	$router->addGet('/', [
	    'namespace' => 'Phalcon\Init\Auth\Controllers\Web',
		'module' => 'auth',
	    'controller' => 'auth',
	    'action' => 'home'
	]);

	$router->addGet('/dashboard', [
	    'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
		'module' => 'dashboard',
	    'controller' => 'dashboard',
	    'action' => 'dashboard'
	]);

	$router->addGet('/login', [
	    'namespace' => 'Phalcon\Init\Auth\Controllers\Web',
		'module' => 'auth',
	    'controller' => 'auth',
	    'action' => 'login'
	]);

	$router->addGet('/logout', [
	    'namespace' => 'Phalcon\Init\Auth\Controllers\Web',
		'module' => 'auth',
	    'controller' => 'auth',
	    'action' => 'logout'
	]);

	$router->addPost('/login', [
	    'namespace' => 'Phalcon\Init\Auth\Controllers\Web',
		'module' => 'auth',
	    'controller' => 'auth',
	    'action' => 'postLogin'
	]);

	$router->addGet('/register', [
	    'namespace' => 'Phalcon\Init\Auth\Controllers\Web',
		'module' => 'auth',
	    'controller' => 'auth',
	    'action' => 'register'
	]);

	$router->addPost('/register', [
	    'namespace' => 'Phalcon\Init\Auth\Controllers\Web',
		'module' => 'auth',
	    'controller' => 'auth',
	    'action' => 'postRegister'
	]);

	$router->addGet('/data-dokter', [
	    'namespace' => 'Phalcon\Init\Dokter\Controllers\Web',
		'module' => 'dokter',
	    'controller' => 'dokter',
	    'action' => 'dataDokter'
	]);

	$router->addPost('/tambah_dokter', [
	    'namespace' => 'Phalcon\Init\Dokter\Controllers\Web',
		'module' => 'dokter',
	    'controller' => 'dokter',
	    'action' => 'addDokter'
	]);

	$router->addGet('/jadwal-dokter', [
	    'namespace' => 'Phalcon\Init\Dokter\Controllers\Web',
		'module' => 'dokter',
	    'controller' => 'dokter',
	    'action' => 'jadwal'
	]);

	$router->addPost('/jadwal-dokter/add', [
	    'namespace' => 'Phalcon\Init\Dokter\Controllers\Web',
		'module' => 'dokter',
	    'controller' => 'dokter',
	    'action' => 'addJadwal'
	]);

	$router->addGet('/janji', [
	    'namespace' => 'Phalcon\Init\Janji\Controllers\Web',
		'module' => 'janji',
	    'controller' => 'janji',
	    'action' => 'show'
	]);

	$router->addPost('/janji/add', [
	    'namespace' => 'Phalcon\Init\Janji\Controllers\Web',
		'module' => 'janji',
	    'controller' => 'janji',
	    'action' => 'addJanji'
	]);

	$router->addGet('/janji/delete/:params', [
	    'namespace' => 'Phalcon\Init\Janji\Controllers\Web',
		'module' => 'janji',
	    'controller' => 'janji',
		'action' => 'delete',
		'id' => 1
	]);

	$router->addPost('/janji/status', [
	    'namespace' => 'Phalcon\Init\Janji\Controllers\Web',
		'module' => 'janji',
	    'controller' => 'janji',
		'action' => 'update'
	]);

	$router->addGet('/janji/janji_dokter', [
	    'namespace' => 'Phalcon\Init\Janji\Controllers\Web',
		'module' => 'janji',
	    'controller' => 'janji',
		'action' => 'janjiDokter'
	]);

	$router->addPost('/janji/update', [
	    'namespace' => 'Phalcon\Init\Janji\Controllers\Web',
		'module' => 'janji',
	    'controller' => 'janji',
		'action' => 'update'
	]);
	
	$router->addGet('/data-apoteker', [
	    'namespace' => 'Phalcon\Init\Apoteker\Controllers\Web',
		'module' => 'apoteker',
	    'controller' => 'apoteker',
	    'action' => 'dataApoteker'
	]);

	$router->addPost('/tambah_apoteker', [
	    'namespace' => 'Phalcon\Init\Apoteker\Controllers\Web',
		'module' => 'apoteker',
	    'controller' => 'apoteker',
	    'action' => 'addApoteker'
	]);

	$router->addGet('/janji/janji_dokter/detail', [
	    'namespace' => 'Phalcon\Init\Janji\Controllers\Web',
		'module' => 'janji',
	    'controller' => 'janji',
		'action' => 'detail'
	]);

	$router->addGet('/janji/janji_dokter/detail/:params', [
	    'namespace' => 'Phalcon\Init\Janji\Controllers\Web',
		'module' => 'janji',
	    'controller' => 'janji',
		'action' => 'addDetail',
		'id' => 1
	]);

	$router->addPost('/janji/janji_dokter/add-detail', [
	    'namespace' => 'Phalcon\Init\Janji\Controllers\Web',
		'module' => 'janji',
	    'controller' => 'janji',
	    'action' => 'addDetailPost'
	]);

	// /**
	//  * Not Found Routing
	//  */
	// $router->notFound(
	// 	[
	// 		'namespace' => 'Phalcon\Init\Common\Controllers',
	// 		'controller' => 'base',
	// 		'action'     => 'route404',
	// 	]
	// );

	
    $router->removeExtraSlashes(true);
    
	return $router;
};