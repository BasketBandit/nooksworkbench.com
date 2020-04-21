<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DefaultController@index');
Route::get('/browse/{name}', 'DefaultController@browse');
Route::get('/recipe/{name}','DefaultController@recipe');
Route::get('/material/{name}', 'DefaultController@material');
Route::get('/category/{name}', 'DefaultController@category');
Route::get('/size/{name}', 'DefaultController@size');
Route::get('/tag/{name}', 'DefaultController@tag');
Route::get('/source/{name}', 'DefaultController@source');
Route::get('/customisable/{name}', 'DefaultController@customisable');

Route::get('/img/i/inventory/{filename}', function($filename) {
    return response(file_get_contents('./img/i/inventory/Leaf.png'))->header('Content-Type','image/png');
});
Route::get('/img/i/grid/{filename}', function($filename) {
    return response(file_get_contents('./img/i/grid/na.png'))->header('Content-Type','image/png');
});

/*Route::get('/recipes', 'DefaultController@recipes');
Route::get('/recipes/{id}', 'DefaultController@recipe')->where('id', '[0-9]+');*/


