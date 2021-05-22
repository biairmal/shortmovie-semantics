<?php


namespace App\Http\Controllers;

use Illuminate\http\Request;
use App\Models\Sparql;

class DataController extends Controller
{

    // get all movies
    function getMovies(Request $request)
    {
        $sparql = new Sparql();
        $search = $request->search;
        
        $byId = $sparql->getMovies('id', $search);
        $byGenre = $sparql->getMovies('genre', $search);
        $byTitle = $sparql->getMovies('title', $search);
        $byYear = $sparql->getMovies('firstBroadcast', $search);
        $byDirector = $sparql->getMovies('director', $search);
        $byActor = $sparql->getMovies('actor', $search);
        
        $result = compact("byId", "byGenre", "byTitle", "byYear", "byDirector", "byActor");
        return $result;
    }
}
