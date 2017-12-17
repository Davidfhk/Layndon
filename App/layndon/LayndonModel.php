<?php

namespace App\layndon;

class LayndonModel
{
	private $queries;

	public function __construct ($queries)
	{
		$this->queries = $queries;
	}

	public function setFilm ($film)
	{
		$this->queries->setFilm($film);
	}

	public function getFilms ()
	{
		$this->queries->getFilms();
	}
}