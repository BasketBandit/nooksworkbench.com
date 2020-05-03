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

/*
|--------------------------------------------------------------------------
| Default Recipe
|--------------------------------------------------------------------------
 */

Route::get('/', 'DefaultRecipeController@index');
Route::get('/browse/{name}', 'DefaultRecipeController@browse');
Route::get('/recipe/{name}','DefaultRecipeController@recipe');
Route::get('/material/{name}', 'DefaultRecipeController@material');
Route::get('/category/{name}', 'DefaultRecipeController@category');
Route::get('/size/{name}', 'DefaultRecipeController@size');
Route::get('/tag/{name}', 'DefaultRecipeController@tag');
Route::get('/source/{name}', 'DefaultRecipeController@source');
Route::get('/customisable/{name}', 'DefaultRecipeController@customisable');

/*
|--------------------------------------------------------------------------
| MyBench Recipe
|--------------------------------------------------------------------------
 */

Auth::routes();
Route::get('/mybench', 'MyBenchRecipeController@index');
Route::get('/mybench/browse/{name}', 'MyBenchRecipeController@browse');
Route::get('/mybench/recipe/{name}','MyBenchRecipeController@recipe');
Route::get('/mybench/material/{name}', 'MyBenchRecipeController@material');
Route::get('/mybench/category/{name}', 'MyBenchRecipeController@category');
Route::get('/mybench/size/{name}', 'MyBenchRecipeController@size');
Route::get('/mybench/tag/{name}', 'MyBenchRecipeController@tag');
Route::get('/mybench/source/{name}', 'MyBenchRecipeController@source');
Route::get('/mybench/customisable/{name}', 'MyBenchRecipeController@customisable');

Route::get('/mybench/settings', function () {
    return view('mybench_settings');
});

/*
|--------------------------------------------------------------------------
| MyBench Account
|--------------------------------------------------------------------------
 */

Route::post('/addrecipe/{id}','MyBenchAccountController@addRecipe');
Route::post('/removerecipe/{id}','MyBenchAccountController@removeRecipe');
Route::post('/hideunlocked/{val}', 'MyBenchAccountController@hideUnlocked');

Route::get('/mybench/settings/deleteaccount', 'MyBenchAccountController@deleteAccount')->name('deleteAccount');

/*
|--------------------------------------------------------------------------
| Missing Content
|--------------------------------------------------------------------------
 */

Route::get('/i/inventory/{filename}', function($filename) {
    return response(file_get_contents('./i/inventory/Leaf.png'))->header('Content-Type','image/png');
});
Route::get('/i/grid/{filename}', function($filename) {
    return response(file_get_contents('./i/inventory/Leaf.png'))->header('Content-Type','image/png');
});

/*
|--------------------------------------------------------------------------
| Legal
|--------------------------------------------------------------------------
 */

Route::get('/terms-of-service', function () {
    return view('legal/tos');
});
Route::get('/privacy-policy', function () {
    return view('legal/pp');
});
Route::get('/cookie-policy', function () {
    return view('legal/cp');
});



