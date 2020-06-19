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

use App\Http\Controllers\TemporadasController;

Route::get('/series', 'SeriesController@index')
->name('listar_tarefas');
Route::get('/series/criar','SeriesController@create')
->name('criar_tarefa');
Route::post('/series/criar','SeriesController@store');
Route::delete('/series/{id}','SeriesController@destroy');
Route::get('/',function(){  return view('welcome'); });
Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome');
