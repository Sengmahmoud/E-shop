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
//Route::get('/categ','CategoriesController@show');

Route::get('/','ProductController@show');

Route::get('home/{usid}','CategoriesController@showauth');
Route::get('category/{category}','CategoriesController@onecategory');

Route::get('productstore/{category}','ProductController@show');
Route::get('{category}/{prod_id}','ProductController@prod_show');
Route::post('home/{category}/{id}/store','CommentsController@store');
Route::post('productstore/{category}/add','ProductController@store');
Route::get('productstore/{prod_id}/delete','ProductController@delete');
//Route::get('cartview/{usid}','CartController@show_cart');
Route::get('cartview/{usid}/{id}','CartController@show');
Route::any('cartview/{usid}/{id}/add','CartController@store');
Route::get('cartview/{usid}/{id}/{prod}/delete','CartController@delete');
Route::post('cartview/{usid}/{cartid}/pay','CartController@pay');
Route::get('cartview','CartController@showinmast');
//Route::get('homepage','LapController@show');
//Route::any('homepage/search','LapController@search');
//++++++++++++++++++++++++++++++Admin++++++++++++++++++++++++++++
Route::get('/adminIndex',
	['uses'=>'AdminPanelController@index',
      'as'=>'admin.AdminPanelControl',
      'middleware'=>'roles',
  	   'roles'=>['Admin']
  		]);
Route::get('productsIndex',
  ['uses'=>'ProductController@index',
      'as'=>'admin.products.index',
      'middleware'=>'roles',
       'roles'=>['Admin']
      ]);
Route::get('productsIndex/{id}/show',
  ['uses'=>'ProductController@prodshowadmin',
      'as'=>'admin.products.show',
      'middleware'=>'roles',
       'roles'=>['Admin']
      ]);
Route::get('productsIndex/{product}/edit',
  ['uses'=>'ProductController@upform',
      'as'=>'admin.products.edit',
      'middleware'=>'roles',
       'roles'=>['Admin']
      ]);
Route::post('productsIndex/{product}/update',
  ['uses'=>'ProductController@update',
      'as'=>'admin.products.edit',
      'middleware'=>'roles',
       'roles'=>['Admin']
      ]);
Route::get('/createview',
  ['uses'=>'ProductController@showcreate',
      'as'=>'admin.products.create',
      'middleware'=>'roles',
       'roles'=>['Admin']
      ]);
Route::post('/create',
  ['uses'=>'ProductController@store',
      'as'=>'admin.products.create',
      'middleware'=>'roles',
       'roles'=>['Admin']
      ]);
Route::get('/members',
	['uses'=>'AdminPanelController@users',
      'as'=>'admin.users',
      'middleware'=>'roles',
  	   'roles'=>['Admin']
  		]);
Route::post('/members/add-role',
	['uses'=>'AdminPanelController@addrole',
      'as'=>'admin.users',
      'middleware'=>'roles',
  	   'roles'=>['Admin']
  		]);

Route::get('admin',
	['uses'=>'CategoriesController@cat_show',
      'as'=>'admin.categories.allcats_addnew',
      'middleware'=>'roles',
  	   'roles'=>['Admin','editor']
  		]);


Route::get('admin/categorystore/addform','CategoriesController@addform');
Route::post('admin/categorystore/add','CategoriesController@store');
Route::get('admin/categorystore/{id}/delete','CategoriesController@delete');
Route::get('admin/categorystore/{id}/deleteAll','CategoriesController@deleteAll');
Route::get('admin/categorystore/{id}/upform','CategoriesController@upform');
Route::post('admin/categorystore/{id}/update','CategoriesController@update');

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
