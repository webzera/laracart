<?php

$namespace = 'Webzera\Larcart\HTTP\Controllers';

Route::group(['namespace' => $namespace, 'prefix' => 'cart'], function(){
	
	Route::get('/addtocart/{product}', 'CartController@add')->name('cart.add');
	Route::get('/', 'CartController@index')->name('cart.index');
	Route::get('/update/{id}', 'CartController@update')->name('cart.update');
	Route::get('/delete/{id}', 'CartController@delete')->name('cart.delete');
	
});