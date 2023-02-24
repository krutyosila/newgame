<?php

use Illuminate\Support\Facades\Route;

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
//URL::forceScheme('https');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'App\Http\Controllers\HomeController@index']);
    Route::get('/p/{page}', ['as' => 'page', 'uses' => 'App\Http\Controllers\HomeController@page']);

    Route::get('/profile', ['as' => 'profile', 'uses' => 'App\Http\Controllers\Auth\ProfileController@index']);
    Route::group(['prefix' => 'bingo', 'as' => 'bingo.'], function () {
        Route::get('histories', ['as' => 'histories', 'uses' => 'App\Http\Controllers\BingoController@histories']);
        Route::get('{id}', ['as' => 'index', 'uses' => 'App\Http\Controllers\BingoController@index']);
    });

    Route::group(['as' => 'user.', 'middleware' => 'role:user'], function () {
        Route::get('home', ['as' => 'index', 'uses' => 'App\Http\Controllers\User\UserController@index']);
        Route::get('finance', ['as' => 'finance', 'uses' => 'App\Http\Controllers\User\UserController@finance']);
    });

    Route::group(['prefix' => 'back', 'as' => 'back.'], function () {
        Route::post('balance', ['as' => 'balance', 'uses' => 'App\Http\Controllers\BalanceController@do']);
        Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:admin'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'App\Http\Controllers\Admin\AdminController@index']);
            Route::get('finance', ['as' => 'finance', 'uses' => 'App\Http\Controllers\Admin\AdminController@finance']);
            Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
                Route::post('insert', ['as' => 'insert', 'uses' => 'App\Http\Controllers\Admin\CustomerController@insert']);
                Route::any('{id}', ['as' => 'view', 'uses' => 'App\Http\Controllers\Admin\CustomerController@view']);
            });
        });
        Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => 'role:customer'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'App\Http\Controllers\Customer\CustomerController@index']);
            Route::get('finance', ['as' => 'finance', 'uses' => 'App\Http\Controllers\Customer\CustomerController@finance']);
            Route::group(['prefix' => 'room', 'as' => 'room.'], function () {
                Route::get('', ['as' => 'index', 'uses' => 'App\Http\Controllers\Customer\BingoRoomController@index']);
                Route::any('{id}', ['as' => 'view', 'uses' => 'App\Http\Controllers\Customer\BingoRoomController@view']);
            });
            Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
                Route::post('insert', ['as' => 'insert', 'uses' => 'App\Http\Controllers\Customer\UserController@insert']);
                Route::any('{id}', ['as' => 'view', 'uses' => 'App\Http\Controllers\Customer\UserController@view']);
            });
        });
    });
});
Auth::routes();
