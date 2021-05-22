<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('landing');
    }

    public function grid(){
        return view('gridresult');
    }

    public function player(){
        return view('player');
    }
}