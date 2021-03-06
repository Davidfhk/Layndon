<?php

$app->group('/layndon', function (){

	$this->get('', 'LayndonController:home')->setName('home');
	$this->get('/', 'LayndonController:logOut')->setName('log-out');
        $this->get('/films', 'LayndonController:films')->setName('films');
        $this->get('/film/{id}','LayndonController:detailsFilm')->setName('details-film');
        $this->get('/contact','LayndonController:contact')->setName('contact');

	$this->group('/admin', function (){

		$this->get('', 'LayndonController:login')->setName('login');
		$this->post('', 'LayndonController:check')->setName('check');

		$this->group('/dashboard',function (){
			$this->get('', 'LayndonController:adminProfile')->setName('admin');
			$this->post('', 'LayndonController:addFilm')->setName('add-film');
			$this->delete('/delete/{id}', 'LayndonController:deleteFilm')->setName('delete-film');
			$this->put('/edit/{id}', 'LayndonController:editFilm')->setName('edit-film');
		});
	});
        

});






