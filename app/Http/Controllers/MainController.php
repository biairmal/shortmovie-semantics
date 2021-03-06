<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController;

class MainController extends Controller
{
    public function index()
    {
        $data = new DataController();

        $dataAll = $data->getAllMovies();
        return view('landing', compact('dataAll'));
    }

    public function category($genre)
    {
        $data = new DataController();

        $category = $data->getByGenre($genre);
        return view('gridresult', compact('category', 'genre'));
    }

    public function search(Request $request)
    {
        $data = new DataController();

        $varsearch = $request->search;
        $search = $data->search($varsearch);
        return view('searchresult', compact('search', 'varsearch'));

        // $array = explode(" ", $varsearch);
        // if (count($array) == 1) {
        //     $search = $data->search($varsearch);
        //     return view('searchresult', compact('search', 'varsearch'));
        // } else if (count($array) > 1) {
        //     $searchMulti = array();
        //     foreach ($array as $arr) {
        //         array_push($searchMulti, $data->search($arr));
        //     }
        //     dd($searchMulti);
        //     return view('searchresult', compact('searchMulti', 'varsearch'));
        // }
    }

    public function advancedSearch(Request $request)
    {
        $data = new DataController();

        $search = $data->advancedSearch($request);
        $varsearch = "hasil";
        return view('searchresult', compact('search', 'varsearch'));
    }

    public function getSingleMovie($id)
    {
        $data = new DataController();

        $movie = $data->getMovie($id);
        $new_link = 'https://youtube.com/embed' . parse_url($movie[0]->youtubeLink, PHP_URL_PATH);
        $sameGenre = $data->getByGenre($movie[0]->genre);

        return view('player', compact('movie', 'new_link','sameGenre'));
    }
}
