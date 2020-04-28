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
    return response(file_get_contents('./img/i/inventory/Leaf.png'))->header('Content-Type','image/png');
});

Route::get('/terms-of-service', function () {
    return view('tos');
});

Route::get('/privacy-policy', function () {
    return view('pp');
});

Auth::routes();
Route::get('/mybench', 'MyBenchController@index')->name('mybench');
Route::get('/mybench/browse/{name}', 'MyBenchController@browse');
Route::get('/mybench/recipe/{name}','MyBenchController@recipe');
Route::get('/mybench/material/{name}', 'MyBenchController@material');
Route::get('/mybench/category/{name}', 'MyBenchController@category');
Route::get('/mybench/size/{name}', 'MyBenchController@size');
Route::get('/mybench/tag/{name}', 'MyBenchController@tag');
Route::get('/mybench/source/{name}', 'MyBenchController@source');
Route::get('/mybench/customisable/{name}', 'MyBenchController@customisable');
