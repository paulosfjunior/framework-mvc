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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// get -> Retornar um dado ou alguma visualização
// post -> salvar um dado
// put -> atualizar um dado
// delete -> excluir um data

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/areas', 'AreaController@index');
// Route::get('/areas/create', 'AreaController@create');
// Route::post('/areas/store', 'AreaController@store');

// Route::resource('areas', 'AreaController')
//     ->only('index', 'edit', 'destroy', 'update', 'store');

// Route::resource('areas', 'AreaController')
//     ->except('show');

Route::resource('areas', 'AreaController')
    ->except('show');

Route::resource('estudos', 'StudyController')
    ->except('show');
