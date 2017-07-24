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

Route::group(['middleware' => 'admin_guest'], function() {
  Route::get('/admin_home', 'AdminAuth\LoginController@init');

  Route::get('admin_register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('admin_register', 'AdminAuth\RegisterController@register');
  Route::get('admin_login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('admin_login', 'AdminAuth\LoginController@login');

  Route::get('admin_password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::post('admin_password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::get('admin_password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
  Route::post('admin_password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('Inicio', 'HomeController@home');

  Route::get('viewarticles', 'Article\ArticlesController@viewmain');
  Route::get('addarticle', 'Article\ArticlesController@addarticle');
  Route::post('savearticle', 'Article\ArticlesController@savearticle');
  Route::get('editarticle/{id}', 'Article\ArticlesController@editarticle');
  Route::post('updatearticle/{id}', 'Article\ArticlesController@updatearticle');
  Route::get('deletearticle/{id}', 'Article\ArticlesController@deletearticle');
  Route::get('/pdfarticles','Article\ArticlesController@pdf');

  Route::get('/viewcategory','Category\CategoriesController@viewcategory');
  Route::get('addcategory', 'Category\CategoriesController@addcategory');
  Route::post('savecategory', 'Category\CategoriesController@savecategory');
  Route::get('editcategory/{id}', 'Category\CategoriesController@editcategory');
  Route::post('updatecategory/{id}', 'Category\CategoriesController@updatecategory');
  Route::get('deletecategory/{id}', 'Category\CategoriesController@deletecategory');
  Route::get('/pdfcategories','Category\CategoriesController@pdf');

  Route::get('/addarticles/{id}', 'Category\CategoriesController@addarticles');
  Route::get('/deleteartcat/{ida}/{idc}', 'Category\CategoriesController@deleteartcat');
  Route::get('/addartcat/{ida}/{idc}','Category\CategoriesController@addartcat');
  Route::get('/pdfcatart/{id}','Category\CategoriesController@pdfcatart');

  Route::get('/viewinventory','Inventory\InventoryController@viewinventory');
  Route::get('addinventory', 'Inventory\InventoryController@addinventory');
  Route::post('saveinventory', 'Inventory\InventoryController@saveinventory');
  Route::get('/pdfinventory', 'Inventory\InventoryController@pdf');
  Route::get('/totalarticles','Inventory\InventoryController@totalarticles');

  Route::get('viewartcat/{id}', 'Category\CategoriesController@viewartcat');
});

Route::group(['middleware' => 'admin_auth'], function() {
  Route::post('admin_logout', 'AdminAuth\LoginController@logout');
  Route::get('/admin_home', 'AdminAuth\LoginController@init');

  Route::get('viewarticles', 'Article\ArticlesController@viewmain');
  Route::get('addarticle', 'Article\ArticlesController@addarticle');
  Route::post('savearticle', 'Article\ArticlesController@savearticle');
  Route::get('editarticle/{id}', 'Article\ArticlesController@editarticle');
  Route::post('updatearticle/{id}', 'Article\ArticlesController@updatearticle');
  Route::get('deletearticle/{id}', 'Article\ArticlesController@deletearticle');
  Route::get('/pdfarticles', 'Article\ArticlesController@pdf');

  Route::get('/viewcategories','Category\CategoriesController@viewcategory');
  Route::get('addcategory', 'Category\CategoriesController@addcategory');
  Route::post('savecategory', 'Category\CategoriesController@savecategory');
  Route::get('editcategory/{id}', 'Category\CategoriesController@editcategory');
  Route::post('updatecategory/{id}', 'Category\CategoriesController@updatecategory');
  Route::get('deletecategory/{id}', 'Category\CategoriesController@deletecategory');
  Route::get('/pdfcategories','Category\CategoriesController@pdf');

  Route::get('/addarticles/{id}', 'Category\CategoriesController@addarticles');
  Route::get('/deleteartcat/{ida}/{idc}', 'Category\CategoriesController@deleteartcat');
  Route::get('/addartcat/{ida}/{idc}','Category\CategoriesController@addartcat');
  Route::get('/pdfcatart/{id}','Category\CategoriesController@pdfcatart');

  Route::get('/viewinventory','Inventory\InventoryController@viewinventory');
  Route::get('addinventory', 'Inventory\InventoryController@addinventory');
  Route::post('saveinventory', 'Inventory\InventoryController@saveinventory');
  Route::get('/pdfinventory', 'Inventory\InventoryController@pdf');
  Route::get('/totalarticles','Inventory\InventoryController@totalarticles');

  Route::get('viewartcat/{id}', 'Category\CategoriesController@viewartcat');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
