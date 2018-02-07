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

Route::get('/',[
	'as' => 'home',
	'uses' => 'ScrappingController@getIndex'
]);

Route::post('/add','WishListController@store');

Route::get('wishlist','WishListController@show');

Route::post('wishlist/{id}/{prod}','WishListController@destroy');

Auth::routes();
