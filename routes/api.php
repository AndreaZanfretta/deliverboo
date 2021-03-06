<?php

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('/search/{slug}', 'Api\TypeController@show');
Route::get('/menu', 'Api\UserController@index');
Route::get('/', 'Api\TypeController@index');
/* Route::get('/{slug}', 'Api\TypeController@show'); */
Route::get('/menu/{slug}', 'Api\UserController@show');


