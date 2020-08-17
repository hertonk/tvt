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

use App\User;

Auth::routes();

Route::get('logout', function(){
  Auth::logout();
  return redirect('/');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');

//Projetos
Route::get('projects/create', 'ProjectController@create')->name('project.create');
Route::get('projects/list', 'ProjectController@list')->name('project.list');
Route::get('projects/dashboard/{id}', 'ProjectController@dashboard')->name('project.dashboard');
Route::post('projects', 'ProjectController@store')->name('project.store');
Route::get('projects/import/{id}', 'ProjectController@import')->name('project.import');

//Visualizar
Route::get('view/{id}', 'ViewController@index')->name('view.index');
Route::get('view/matrix/{project}/{req}', 'ViewController@matrix')->name('view.matrix');
Route::post('view/process', 'ViewController@process')->name('view.process');