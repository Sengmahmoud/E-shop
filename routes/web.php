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

/*Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/','CategoriesController@show');

Route::get('home/{usid}','CategoriesController@showauth');
Route::get('home/{usid}/{category}','CategoriesController@onecategory');
Route::get('categorystore','CategoriesController@cat_show');
Route::post('categorystore/add','CategoriesController@store');
Route::get('categorystore/{id}/delete','CategoriesController@delete');
Route::get('categorystore/{id}/deleteAll','CategoriesController@deleteAll');
Route::get('categorystore/{id}/upform','CategoriesController@upform');
Route::post('categorystore/{id}/update','CategoriesController@update');
Route::get('productstore/{category}','ProductController@show');
Route::get('{category}/{prod_id}','ProductController@prod_show');
Route::post('home/{category}/{id}/store','CommentsController@store');
Route::post('productstore/{category}/add','ProductController@store');
Route::get('productstore/{prod_id}/delete','ProductController@delete');
Route::get('cartview/{usid}','CartController@show_cart');
Route::get('cartview/{usid}/{id}','CartController@show');
Route::any('cartview/{usid}/{id}/add','CartController@store');
Route::get('cartview/{usid}/{id}/{prod}/delete','CartController@delete');
Route::post('cartview/{usid}/{cartid}/pay','CartController@pay');
Route::get('cartview','CartController@showinmast');
//Route::get('homepage','LapController@show');
//Route::any('homepage/search','LapController@search');


//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
