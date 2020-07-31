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
    return view('welcome');
});

# /tasksにリダイレクトさせる
Route::get('/', function(){
    return redirect('/tasks');
});

#　TaskControllerのindexメソッドを呼び出している
Route::get('/tasks', 'TaskController@index');

# TaskControllerのstoreメソッドを呼び出している
Route::post('/tasks', 'TaskController@store');

# destroyメソッドを呼び出している
Route::delete('/tasks/{id}', 'TaskController@destroy');


\URL::forceScheme('https');