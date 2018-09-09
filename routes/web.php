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

use App\Http\Middleware\RestrictStatus;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth','account']],function(){
    Route::get('/item','ItemController@index');
    Route::get('/item/create','ItemController@create');
    Route::post('/item/store','ItemController@store');
    Route::get('/item/edit/{id}','ItemController@edit');
    Route::patch('/item/update/{id}','ItemController@update');
    Route::delete('/item/delete/{id}','ItemController@delete');


    Route::resource('/location','LocationController');
    Route::resource('/category','CategoryController');
    Route::resource('/user','UserController');
    Route::get('/home', 'HomeController@index')->name('home');
});




Auth::routes();

