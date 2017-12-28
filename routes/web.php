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








Route::middleware(['auth'])->group(function(){
        //Porfile route
        Route::prefix('profile')->group(function () {
            Route::get('/modify',"ProfileController@modifyPage")->name('modifyProfile');
            Route::post('/modify/{data}',"ProfileController@modifyProfile");
            Route::post('/logout',"ProfileController@logoutUser")->name('logout');

            Route::get('/devis',"ProfileController@devisPage")->name('devis');
            
        });

        
        //Mission route
        Route::prefix('missions')->group(function () {
            Route::post('/demandeDevis' ,"MissionController@demandeDevis")->name('demandeDevis');
            Route::get('/ajouter',"MissionController@addMissionPage")->name('addMission');
            Route::post('/ajouter',"MissionController@addMission");
        });

        

});


//Route mission
Route::prefix('missions')->group(function () {
    Route::get('/',"MissionController@index")->name('mission');
    Route::get('/-{id}' ,"MissionController@singleMissionPage")->name('singleMission');
});

//Users Route
        Route::prefix('users')->group(function () {
            Route::get('/',"userController@index")->name('users');
            Route::get('/{id}',"ProfileController@index")->name('userProfile');
        });


//Route profile user
Route::prefix('profile')->group(function () {
    Route::get('/{id?}',"ProfileController@index")->name('profile');
});