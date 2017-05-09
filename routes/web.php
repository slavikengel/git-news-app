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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->resource('news','NewsController');

Route::group(['middleware' => 'moderator'], function (){
    Route::get('news/create',['uses'=> 'NewsController@create']);
    Route::get('news/edit/{id}', ['uses'=>'NewsController@edit']);
    Route::put('news/update/{id}',['uses'=>'NewsController@update']);
    Route::post('news/store', ['uses'=>'NewsController@store']);
});

Route::get('/news/destroy/{id}', ['uses'=>'NewsController@destroy', 'middleware'=>'admin']);
