<?php

$app->group('/layndon', function (){

	$this->get('', 'LayndonController:home')->setName('home');

	$this->group('/login', function (){

		$this->get('', 'LayndonController:login')->setName('login');
		$this->post('', 'LayndonController:check')->setName('check');
	});

	$this->group('/admin', function (){

		$this->get('', 'LayndonController:adminProfile')->setName('admin');
		$this->post('', 'LayndonController:addFilm')->setName('add-film');
		$this->get('/{id}', 'LayndonController:deleteFilm')->setName('delete-film');
	});
});







