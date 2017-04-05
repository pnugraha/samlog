<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::group(['middleware' => 'auth'], function() {
            Route::get('/', ['as' => '/', 'uses' => 'Back\HomeController@index']);
            Route::get('home', ['as' => 'home', 'uses' => 'Back\HomeController@index']);
            Route::get('auth/change_password', 'Auth\AuthController@getChangePassword');
            Route::post('auth/change_password', 'Auth\AuthController@postChangePassword');
            Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
            
            Route::get("company/index_trucking", ['as' => 'company.index_trucking', 'uses' => "Back\CompanyController@index_trucking"]);
            Route::get("company/index_shipping", ['as' => 'company.index_shipping', 'uses' => "Back\CompanyController@index_shipping"]);
            Route::get("company/index_dooring", ['as' => 'company.index_dooring', 'uses' => "Back\CompanyController@index_dooring"]);
            Route::resource("company", "Back\CompanyController");
            Route::resource("services", "Back\ServiceController");            
            Route::resource("additional_cost", "Back\AdditionalCostController");
            Route::get("additional_cost/{id}/index", ['as' => 'additional_cost.index', 'uses' => "Back\AdditionalCostController@index"]);
            Route::resource("service", "Back\ServiceController");
            Route::get("service/{id}/index", ['as' => 'service.index', 'uses' => "Back\ServiceController@index"]);
            Route::resource("user", "Back\UserController");
            Route::resource("order", "Back\OrderController");
            Route::resource("order_vendor", "Back\OrderVendorController");
            Route::get("order_vendor/{id}/index", ['as' => 'order_vendor.index', 'uses' => "Back\OrderVendorController@index"]);
            Route::resource("order_vendor_shipping", "Back\OrderVendorShippingController");
            Route::get("order_vendor_shipping/{id}/index", ['as' => 'order_vendor_shipping.index', 'uses' => "Back\OrderVendorShippingController@index"]);
            Route::resource("order_additional_cost", "Back\OrderAdditionalCostController");
            Route::get("order_additional_cost/{id}/index", ['as' => 'order_additional_cost.index', 'uses' => "Back\OrderAdditionalCostController@index"]);
        });