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

Route::get('/', function(){
    return redirect('/tasks');
});

Route::get('/tasks', 'Taskcontroller@index');

Route::post('/tasks', 'Taskcontroller@store');

Route::delete('/tasks/{id}', 'Taskcontroller`destroy');

\URL::forceSchema('https');