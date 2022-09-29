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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index');
Route::get('/mypage', 'MypageController@index');
Route::get('/group', 'GroupController@index');
Route::get('/group/create', 'GroupController@create');

Route::post('/group/create', 'GroupController@store');
