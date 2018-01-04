<?php

namespace App;

require("../vendor/autoload.php");

session_start();

$configuration = [
	'settings' => [
		'displayErrorDetails' => true
	]
];

$app = new \Slim\App($configuration);

$container = $app->getContainer();

require '../App/Dependencies.php';
require '../App/Routes.php';

$app->run();