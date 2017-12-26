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


//Home
Route::get('/',"HomeController@index");
Auth::routes();




//Porfile route
Route::prefix('profile')->group(function () {
    Route::get('/',"ProfileController@index");
    Route::get('/modify',"ProfileController@modifyPage")->name('modifyProfile');
    Route::post('/modify/{data}',"ProfileController@modifyProfile");
    Route::post('/logout',"ProfileController@logoutUser")->name('logout');
});

