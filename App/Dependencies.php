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
		$c['QueriesFilmsHandler'],
		$c['OmdbHandler']
	);
};

$container['LayndonController'] = function ($c){
	return new \App\layndon\LayndonController(
		$c['LayndonModel'],
		$c['router'],
		$c['view']
	);
};

$container['QueriesFilmsHandler'] = function ($c){
	return new \App\layndon\Handlers\QueriesFilms(
		$c['db']
	);
};

$container['view'] = function ($c){
	$view = new \Slim\Views\Twig(__DIR__ . '/layndon/templates/',[
		'cache' => false]);

	$view->addExtension(new \Slim\Views\TwigExtension(

		$c['router'],
		$c['request']->getUri()
	));

	return $view;
};

/* HANDLERS */

$container['OmdbHandler'] = function ($c){
	return new \App\layndon\Handlers\Omdb;
};

