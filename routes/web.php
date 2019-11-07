<?php

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

Route::get('/', function () {

	$pages = \App\Page::all();

	$logo = \App\Logo::orderBy('created_at', 'desc')->first();
	$sfondo = \App\Sfondo::orderBy('created_at', 'desc')->first();

    return view('welcome', ['pages' => $pages, 'logo' => $logo, 'sfondo' => $sfondo]);
    
});

//Auth::routes(['register' => false]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'PagesController@index');

Route::get('/new', 'PagesController@create');

Route::get('/logo', 'LogoController@index');

Route::post('/logo', 'LogoController@store');

Route::get('/sfondo', 'SfondoController@index');

Route::post('/sfondo', 'SfondoController@store');

//Route::get('/{page}', 'PagesController@show');
Route::get('{param}', 'PagesController@show');

//Route::get('/{page}/edit', 'PagesController@edit');
Route::get('/{param}/edit', 'PagesController@edit');

Route::patch('/{page}', 'PagesController@update');

Route::post('/admin', 'PagesController@store');

Route::delete('/{page}', 'PagesController@destroy');