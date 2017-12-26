<?php

namespace App\layndon;

class LayndonModel
{
	private $queries;
	private $omdb;

	public function __construct ($queries, $omdb)
	{
		$this->queries = $queries;
		$this->omdb = $omdb;
	}

	public function checkLogin ()
	{
		if($_POST['email'] == 'admin@admin.com' && $_POST['pass'] == '1234')
		{
			return 'admin';
		}
	}

	public function setFilm ($name)
	{
		$film = $this->omdb->searchFilm($name);
		
		$this->queries->setFilm($film);

	}

	public function getFilms ()
	{
		return $this->queries->getFilms();
	}

	public function deleteFilm ($id)
	{
		$this->queries->deleteFilm($id);
	}
}