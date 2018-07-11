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

Route::get('home','CategoriesController@show');
Route::get('home/{category}','CategoriesController@onecategory');
Route::get('categorystore','CategoriesController@cat_show');
Route::post('categorystore/add','CategoriesController@store');
Route::get('categorystore/{id}/delete','CategoriesController@delete');
Route::get('categorystore/{id}/upform','CategoriesController@upform');
Route::post('categorystore/{id}/update','CategoriesController@update');
Route::get('productstore/{category}','ProductController@show');
Route::get('home/{category}/{prod_id}','ProductController@prod_show');
Route::post('home/{category}/{id}/store','CommentsController@store');
Route::post('productstore/{category}/add','ProductController@store');
Route::get('productstore/{prod_id}/delete','ProductController@delete');
Route::get('cartview','CartController@show');
Route::any('cartview/add','CartController@store');
Route::get('cartview/{id}/delete','CartController@delete');

//Route::get('homepage','LapController@show');
//Route::any('homepage/search','LapController@search');


//Route::get('/home', 'HomeController@index')->name('home');
