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






Route::group(['middleware' => ['web']], function(){


    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/addproduct', 'ProductController@index');
    Route::post('/addproduct', 'ProductController@store');
    Route::get('/', 'ProductController@showAllProducts');
    Route::get('/SingleProduct/{id?}/{name?}','ProductController@showingproduct');
    Route::get('/edit/{id?}','ProductController@productediting');
    Route::patch('/user/update/product/{id?}','ProductController@updatingproduct')->middleware('auth');
    Route::get('/delete/{id?}','ProductController@deletingproduct')->middleware('auth');

});
