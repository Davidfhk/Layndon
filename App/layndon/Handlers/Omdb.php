<?php

namespace App\layndon\Handlers;

class Omdb
{

	public function __construct(){}

	public function searchFilm ($filmName)
	{

		$title =  str_replace(" ", "+", $filmName);
		$film = "http://www.omdbapi.com/?t=". $title . "&apikey=21e37978";
		$JSONfilms = file_get_contents($film);
		$result = json_decode($JSONfilms,true);

		return $result;


		
	}


}