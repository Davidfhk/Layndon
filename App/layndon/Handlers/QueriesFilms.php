<?php

namespace App\layndon\Handlers;

class QueriesFilms
{
	private $db;

	public function __construct ($db)
	{
		$this->db = $db;
	}

	public function setFilm ($film)
	{
		$this->db->table('films')
			->insert([
				'title' => $film['Title'],
				'year'	=> $film['Year'],
				'runtime' => $film['Runtime'],
				'genre'	=> $film['Genre'],
				'director' => $film['Director'],
				'actors' => $film['Actors'],
				'language' => $film['Language'],
				'country' => $film['Country'],
				'awards' => $film['Awards'],
				'plot' => $film['Plot'],
				'image' => $film['Poster']
			]);
	}

	public function getFilms ()
	{
		$films = $this->db->table('films')
				->select('*')
	           	->get()
	           	->map(function ($item, $key) {
	                  return (array) $item;
	              })
            	  ->all();
        return $films;

	}

	public function deleteFilm ($id)
	{
		$this->db->table('films')
			->where('id_film','=',$id)
			->delete();
	}
}