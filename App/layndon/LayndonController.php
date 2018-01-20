<?php

namespace App\layndon;


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\layndon\LayndonModel as Model;

class LayndonController
{
	private $model;
	private $route;
	private $view;

    public function __construct(Model $model,$route,$view/*,array  $settings*/)
    {

		$this->model = $model;
		$this->route = $route;
		$this->view = $view;
	
	}

	public function home (Request $request, Response $response, $args)
	{
		session_destroy();
		$films = $this->model->getFilms();
		return $this->view->render($response, 'list-films.twig',['films'=>$films]);
	}

	public function login (Request $request, Response $response, $args)
	{
		return $this->view->render($response,'login.twig');
	}

	public function check (Request $request, Response $response, $args)
	{
		$user = $this->model->checkLogin();
		$_SESSION['login'] = $user;
		if($_SESSION['login'] == 'admin')
		{
			return $response->withRedirect($this->route->pathFor('admin'));
		}else{
			return $response->withRedirect($this->route->pathFor('login'));	
		}
	}

	public function adminProfile (Request $request, Response $response, $args)
	{
		if($_SESSION['login'] == 'admin')
		{
			$films = $this->model->getFilms();
			return $this->view->render($response,'admin/profile.twig',['films'=>$films]);				
		}else{
			return $response->withRedirect($this->route->pathFor('login'));
		}
	
	}

	public function addFilm (Request $request, Response $response, $args)
	{
     	$name = $_POST['film'];
     	$date = $_POST['date-film'];
     	$this->model->setFilm($name,$date);

     	return $response->withRedirect($this->route->pathFor('admin'));		
	}

	public function deleteFilm (Request $request, Response $response, $args)
	{
		$id = $args['id'];
		$this->model->deleteFilm($id);
		// return $response->withRedirect($this->route->pathFor('admin'));
	}

	public function detailsFilm (Request $request, Response $response, $args)
	{
		$id = $args['id'];
		$film = $this->model->detailsFilm($id);
		// die(var_dump($film));
		return $this->view->render($response,'film.twig',['film'=>$film]);
	}
}