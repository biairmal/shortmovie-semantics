<?php

use App\Http\Controllers\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Yang dulu pernah ada...
// Route::get('/movies', [DataController::class, 'getAllMovies']);
// Route::get('/movies/{id}', [DataController::class, 'getMovie']);
// Route::get('/movies/{title?}&{genre?}&{director?}', [DataController::class, 'findMovies']);