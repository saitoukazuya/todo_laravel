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

// Route::get('/', function () {
//     return view('welcome');
// });

//  topページへ
Route::get('/', function () {
    return view('/top');
});


//  /tasksにリダイレクトさせる
// Route::get('/tasks', function(){
//     return redirect('/tasks');
// });

// 　TaskControllerのindexメソッドを呼び出している
Route::get('/tasks', 'TaskController@index')->name('tasks');

Route::middleware(['auth'])->group(function () {  
    
    //  TaskControllerのstoreメソッドを呼び出している
    Route::post('/tasks', 'TaskController@store');
    
    //  destroyメソッドを呼び出している
    Route::delete('/tasks/{id}', 'TaskController@destroy');
    
    Route::get('/edit/{id}', 'TaskController@edit');

});

Route::get('/tasks/{id}', 'TaskController@show');

\URL::forceScheme('https');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/edit/{id}', 'TaskController@update');

Route::get('/search', 'TaskController@index');
