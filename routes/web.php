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

  Route::get('user', 'Users\UserController@viewmain');
  Route::get('customer', 'Customers\CustomerController@viewmain');
  Route::get('report', 'Reports\ReportController@viewmain');
  Route::get('admin', 'Users\UserController@viewadmin');

  Route::post('save_user', 'Users\UserController@saveuser');
  Route::post('update_user/{id}', 'Users\UserController@updateuser');
  Route::get('delete_user/{id}', 'Users\UserController@deleteuser');

  Route::post('save_customer', 'Customers\CustomerController@savecustomer');
  Route::post('update_customer/{id}', 'Customers\CustomerController@updatecustomer');
  Route::get('delete_customer/{id}', 'Customers\CustomerController@deletecustomer');

});

  Route::group(['middleware' => 'admin_auth'], function() {
  Route::post('admin_logout', 'AdminAuth\LoginController@logout');
  Route::get('/admin_home', 'AdminAuth\LoginController@init');
  
  Route::get('user', 'Users\UserController@viewmain');
  Route::get('customer', 'Customers\CustomerController@viewmain');
  Route::get('report', 'Reports\ReportController@viewmain');
  Route::get('admin', 'Users\UserController@viewadmin');  

  Route::post('save_user', 'Users\UserController@saveuser');
  Route::post('update_user/{id}', 'Users\UserController@updateuser');
  Route::get('delete_user/{id}', 'Users\UserController@deleteuser');

  Route::post('save_customer', 'Customers\CustomerController@savecustomer');
  Route::post('update_customer/{id}', 'Customers\CustomerController@updatecustomer');
  Route::get('delete_customer/{id}', 'Customers\CustomerController@deletecustomer');
});
