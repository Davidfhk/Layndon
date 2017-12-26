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
		return $this->view->render($response, 'index.twig');
	}

	public function login (Request $request, Response $response, $args)
	{
		return $this->view->render($response, 'login.twig');
	}

	public function check (Request $request, Response $response, $args)
	{
		$user = $this->model->checkLogin();

		if($user == 'admin')
		{
			return $response->withRedirect($this->route->pathFor('admin'));

		}
	}

	public function adminProfile (Request $request, Response $response, $args)
	{
		$films = $this->model->getFilms();
		return $this->view->render($response,'admin/profile.twig',['films'=>$films]);		
	}

	public function addFilm (Request $request, Response $response, $args)
	{
     	$name = $_POST['film'];
     	$this->model->setFilm($name);

     	return $response->withRedirect($this->route->pathFor('admin'));		
	}

	public function deleteFilm (Request $request, Response $response, $args)
	{
		$id = $args['id'];
		$this->model->deleteFilm($id);
		return $response->withRedirect($this->route->pathFor('admin'));
	}
}