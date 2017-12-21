<?php

$app->group('/layndon', function (){

	$this->get('', function($request, $response, $args){
    	return $this->view->render($response, 'index.twig');
	});

	$this->get('/login', function($request, $response, $args){
	    return $this->view->render($response, 'login.twig');
	})->setName('login');

	$this->group('/admin', function (){

		$this->get('', function($request,$response, $args){
			return $this->view->render($response, 'admin/profile.twig');
		})->setName('admin');
	});
});








