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

// Auth Controller
Route::get('/login', 'authController@login')->name('login');
Route::post('/validate', 'authController@validateLogin')->name('login.validate');
Route::post('/logout', 'authController@logout')->name('logout');


Route::group(['middleware' => 'auth'], function(){
    // Dashboard Controller
    Route::GET('/', 'dashboardController@index')->name('dashboard');

    // Keluhan Controller
    Route::get('/keluhan', 'keluhanController@index')->name('keluhan.index');
    Route::get('/keluhan/create', 'keluhanController@create')->name('keluhan.create');
    Route::post('/keluhan/store', 'keluhanController@store')->name('keluhan.store');
    Route::get('/keluhan/edit/{id}', 'keluhanController@edit')->name('keluhan.edit');
    Route::post('/keluhan/update', 'keluhanController@update')->name('keluhan.update');
    Route::post('/keluhan/delete/{id}', 'keluhanController@delete')->name('keluhan.delete');
    Route::get('keluhan/{id}', 'keluhanController@myComplaint')->name('keluhan.saya');

    // User Controller
    Route::get('/user', 'userController@index')->name('user.index');
    Route::get('/user/create', 'userController@create')->name('user.create');
    Route::post('/user/store', 'userController@store')->name('user.store');
    Route::get('/user/edit/{id}', 'userController@edit')->name('user.edit');
    Route::post('/user/update', 'userController@update')->name('user.update');
    Route::post('/user/delete/{id}', 'userController@delete')->name('user.delete');

});