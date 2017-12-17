<?php
/**
 * DEPENDENCIES OF THE APP MUST BE INYECTED HERE
 *
 * DEPENDENCY CONTAINER: $container
 *
 * @autor David Ignacio Martos <davidignacio.martos@madisonmk.com>
 * @version 2.0.0
 */
$container['ServiceSettings'] = require __DIR__ . "/layndon/config/dev/settings.php";

$container['db'] = function ($c){
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($c['ServiceSettings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$container['LayndonModel'] = function ($c){
	return new \App\layndon\LayndonModel(
		$c['ConsultFilmsHandler']
	)
};

$container['LayndonController'] = function ($c){
	return new \App\layndon\LayndonController(
		$c['LayndonController']
	)
};

$container['ConsultFilmsHandler'] = function ($c){
	return new \App\layndon\Handlers\ConsultFilmsHandler(
		$c['db']
	);
};

$container['view'] = function ($c){
	$view = new \Slim\Views\Twig(__DIR__ . '/layndon/templates/admin/',[
		'cache' => false]);

	$view->addExtension(new \Slim\Views\TwigExtension(

		$c['router'],
		$c['request']->getUri()
	));

	return $view;
};
