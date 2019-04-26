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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::group(['prefix' => 'login'], function() {
        Route::get('/' , 'LoginController@getLogin')->name('admin.login.getLogin');
        Route::post('/' , 'LoginController@postLogin')->name('admin.login.postLogin');
    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', function() {
        return view('admin.admin');
    });
    Route::get('logout', 'LoginController@logout')->name('admin.logout');

    Route::group(['prefix' => 'category'], function() {
        Route::get('/', 'CategoryController@index')->name('admin.category.index');
        Route::post('/create', 'CategoryController@postcreate')->name('admin.category.postCreate');

        Route::get('/update/{id}', 'CategoryController@getUpdate')->name('admin.category.getUpdate');
        Route::post('/update/{id}', 'CategoryController@postUpdate')->name('admin.category.postUpdate');

        Route::get('/delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
    });

    Route::group(['prefix' => 'brand'], function() {
        Route::get('/', 'BrandController@index')->name('admin.brand.index');
        Route::post('/create', 'BrandController@postcreate')->name('admin.brand.postCreate');

        Route::get('/update/{id}', 'BrandController@getUpdate')->name('admin.brand.getUpdate');
        Route::post('/update/{id}', 'BrandController@postUpdate')->name('admin.brand.postUpdate');

        Route::get('/delete/{id}', 'BrandController@delete')->name('admin.brand.delete');
    });
});