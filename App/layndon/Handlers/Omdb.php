<?php

namespace App\layndon\Handlers;

class Omdb
{

	public function __construct(){}

	public function searchFilm ($filmName)
	{

		$title =  str_replace(" ", "+", $filmName);
		$film = "http://www.omdbapi.com/?t=". $title . "&apikey=d6b0fef7";
		$JSONfilms = file_get_contents($film);
		$result = json_decode($JSONfilms,true);

		return $result;


		
	}


}