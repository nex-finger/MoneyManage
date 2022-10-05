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

Route::get('/', 'IndexController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index');
Route::get('/mypage', 'MypageController@index');
Route::get('/group', 'GroupController@index');

Route::get('/group/create', 'GroupController@create');
Route::post('/group/create', 'GroupController@store');

Route::get('/group/member/{group}', 'MemberController@index');

Route::get('/place', 'PlaceController@index');
Route::get('/place/{id}', 'PlaceController@show');

Route::get('/place/create', 'PlaceController@create');
Route::post('/place/create', 'PlaceController@store');

Route::get('recipe/create', [RecipeController::class, 'create'])->name('recipe.create');
Route::get('recipe/{recipe}', [RecipeController::class, 'show'])->name('recipe.show');
Route::post('recipe', [RecipeController::class, 'store'])->name('recipe.store');
