<?php

use Nette\Application\Routers\Route,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\SimpleRouter;


require __DIR__ . '/../vendor/Nette/loader.php';

// Configure application
$configurator = new Nette\Configurator;

// Enable Nette Debugger for error visualisation & logging
//$configurator->setDebugMode(TRUE);
$configurator->enableDebugger(__DIR__ . '/../log');

// Enable RobotLoader - this will load all classes automatically
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
	->addDirectory(__DIR__)
    ->addDirectory(__DIR__ . '/../vendor/others')
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/config.neon');
$container = $configurator->createContainer();

// Setup router using mod_rewrite detection
if (function_exists('apache_get_modules') && in_array('mod_rewrite', apache_get_modules())) {
	$router = $container->getService('router');
	$router[] = new Route('index.php', 'Front:Default:default', Route::ONE_WAY);
    $router[] = $adminRouter = new RouteList('Admin');
    $adminRouter[] = new Route('admin/<presenter>/<action>', 'Default:default');

	$router[] = $frontRouter = new RouteList('Front');
    $frontRouter[] = new Route('<action>', 'Default:default');
  	$frontRouter[] = new Route('projects/[<slug>]', 'Project:view');

} else {
	$container->addService('router', new SimpleRouter('Front:Default:default'));
}

return $container;
