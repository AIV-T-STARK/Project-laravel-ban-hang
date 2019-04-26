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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'CheckLogIn'], function() {
    Route::get('/', function() {
        return view('admin.admin');
    });
    Route::get('logout', 'LoginController@logout')->name('admin.logout');

    Route::group(['prefix' => 'category'], function() {
        Route::get('/', 'CategoryController@index')->name('admin.category.index');
        Route::post('/create', 'CategoryController@postCreate')->name('admin.category.postCreate');

        Route::get('/update/{id}', 'CategoryController@getUpdate')->name('admin.category.getUpdate');
        Route::post('/update/{id}', 'CategoryController@postUpdate')->name('admin.category.postUpdate');

        Route::get('/delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
    });

    Route::group(['prefix' => 'brand'], function() {
        Route::get('/', 'BrandController@index')->name('admin.brand.index');
        Route::post('/create', 'BrandController@postCreate')->name('admin.brand.postCreate');

        Route::get('/update/{id}', 'BrandController@getUpdate')->name('admin.brand.getUpdate');
        Route::post('/update/{id}', 'BrandController@postUpdate')->name('admin.brand.postUpdate');

        Route::get('/delete/{id}', 'BrandController@delete')->name('admin.brand.delete');
    });

    Route::group(['prefix' => 'product'], function() {
        Route::get('/', 'ProductController@index')->name('admin.product.index');

        Route::get('/create', 'ProductController@getCreate')->name('admin.product.getCreate');
        Route::post('/create', 'ProductController@postCreate')->name('admin.product.postCreate');

        Route::get('/update/{id}', 'ProductController@getUpdate')->name('admin.product.getUpdate');
        Route::post('/update/{id}', 'ProductController@postUpdate')->name('admin.product.postUpdate');

        Route::get('/delete/{id}', 'ProductController@delete')->name('admin.product.delete');

        Route::get('/active/{id}', 'ProductController@getActive')->name('admin.product.getActive');


        Route::get('/ajax/{id}', 'ProductController@chaneCategoryAnhBrand')->name('admin.product.ajax');
    });
});