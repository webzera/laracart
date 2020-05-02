<?php

$namespace = 'Webzera\Laracart\HTTP\Controllers';

Route::group(['middleware' => ['web'], 'namespace' => $namespace, 'prefix' => 'cart'], function(){
	
	Route::get('/addtocart/{product}', 'CartController@add')->name('cart::add');
	Route::get('/cart', 'CartController@index')->name('cart::index');
	Route::get('/cart/update/{id}', 'CartController@update')->name('cart::update');
	Route::get('/cart/delete/{id}', 'CartController@delete')->name('cart::delete');
	
});