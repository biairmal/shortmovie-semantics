<?php

namespace App\Http\Controllers;

use App\Models\Sparql;

class DataController extends Controller
{

    function search($search)
    {
        $sparql = new Sparql();
        
        $byId = $sparql->getMovies('id', $search);
        $Genre = $sparql->getMovies('genre', $search);
        $Title = $sparql->getMovies('title', $search);
        $Year = $sparql->getMovies('firstBroadcast', $search);
        $Director = $sparql->getMovies('director', $search);
        $Actor = $sparql->getMovies('actor', $search);

        return compact("Genre", "Title", "Year", "Director", "Actor");
    }

    function getAllMovies(){
        $sparql = new Sparql();

        return $sparql->getMovies('all');
    }

    function getMovie($id){
        $sparql = new Sparql();

        return $sparql->getMovies('id', $id);
    }

    function getByGenre($genre){
        $sparql = new Sparql();

        return $sparql->getMovies('genre', $genre);
    }
}
