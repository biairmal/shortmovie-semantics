<?php

namespace App\Http\Controllers;

use Illuminate\http\Request;
use App\Models\Sparql;

class DataController extends Controller
{

    function search(Request $request)
    {
        $sparql = new Sparql();
        $search = $request->search;
        
        $byId = $sparql->getMovies('id', $search);
        $byGenre = $sparql->getMovies('genre', $search);
        $byTitle = $sparql->getMovies('title', $search);
        $byYear = $sparql->getMovies('firstBroadcast', $search);
        $byDirector = $sparql->getMovies('director', $search);
        $byActor = $sparql->getMovies('actor', $search);

        dd($byId,$byGenre,$byTitle,$byYear,$byDirector,$byActor);

        return view('searchresult',compact("byId", "byGenre", "byTitle", "byYear", "byDirector", "byActor"));
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
