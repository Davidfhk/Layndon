<?php

namespace App\layndon\Handlers;

class QueriesFilms
{
	private $db;

	public function __construct ($db)
	{
		$this->db = $db;
	}

	public function setFilm (array $film)
	{
		$this->db->table('layndon-v2.films AS film')
			->insert([
				'film.title' => $film['Title'],
				'film.year'	=> $film['Year'],
				'film.runtime' => $film['Runtime'],
				'film.genre'	=> $film['Genre'],
				'film.director' => $film['Director'],
				'film.actors' => $film['Actors'],
				'film.language' => $film['Language'],
				'film.country' => $film['Country'],
				'film.awards' => $film['Awards'],
				'film.plot' => $film['Plot'],
				'film.image' => $film['image']
			]);
	}

	public function getFilms ()
	{
		$films = $this->db->table('layndon-v2.films AS film')
				->select('*')
	           	->get()
	            
	            ->map(function ($item, $key) {
	                return (array) $item;
	            })
            	->all();
        return $films;
	}
}