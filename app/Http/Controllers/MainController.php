<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController;

class MainController extends Controller
{
    public function index(){
        $data = new DataController();

        $dataAll = $data->getAllMovies();
        return view('landing',compact('dataAll'));
    }

    public function category($genre){
        $data = new DataController();

        $category = $data->getByGenre($genre);
        return view('gridresult',compact('category'));
    }

    public function getSingleMovie($id){
        $data = new DataController();

        $movie = $data->getMovie($id);
        $new_link = 'https://youtube.com/embed'.parse_url($movie[0]->youtubeLink, PHP_URL_PATH);

        return view('player',compact('movie','new_link'));
    }
}