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

use App\Http\Controllers\PlaceController;
use App\Http\Controllers\RecipeController;

Auth::routes();

Route::get ('/', 'IndexController@index');

Route::get ('/home', 'HomeController@index')->name('home');
Route::get ('/mypage', 'MypageController@index');
Route::get ('/group', 'GroupController@index');
Route::get ('/howto/group', 'HowtoController@group');
Route::get ('/howto/place', 'HowtoController@place');

Route::get ('/group/create', 'GroupController@create');
Route::post('/group/create', 'GroupController@store');

Route::get ('/group/member/{group}', 'MemberController@index');
Route::post('/group/member/join/{group}', 'MemberController@storejoin');
Route::post('/group/member/leave/{group}', 'MemberController@storeleave');

Route::get ('/place', 'PlaceController@index');

Route::get ('/place/create', 'PlaceController@create');
Route::post('/place/create', 'PlaceController@store');

Route::get ('/place/{id}', 'PlaceController@show');

Route::post('/group/leave/{id}', 'GroupController@leave');
Route::post('/place/leave/{id}', 'PlaceController@leave');

//Route::get('/images', 'ImageController@index'); //画像表示ページ
Route::get ('/image/form/{id}', 'ImageController@form'); //画像投稿フォーム
Route::post('/image/store/{id}', 'ImageController@store'); //画像保存
Route::post('/image/delete/{id}', 'ImageController@delete'); //画像削除

Route::get ('/option/form/{id}', 'OptionController@form'); //画像投稿フォーム
Route::post('/option/store/{id}', 'OptionController@store');
Route::get ('/option/update/{id}/{op}', 'OptionController@updateform');
Route::post('/option/update/{id}/{op}', 'OptionController@updatedtore');
Route::post('/option/delete/{id}', 'OptionController@delete');

Route::get ('recipe/create', 'RecipeController@create')->name('recipe.create');
Route::get ('recipe/{recipe}', 'RecipeController@show')->name('recipe.show');
Route::post('recipe', 'RecipeController@store')->name('recipe.store');

Route::get ('/admin', 'AdminController@index');
