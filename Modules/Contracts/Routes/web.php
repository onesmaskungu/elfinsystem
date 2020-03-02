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
 //Route::get('/users', 'ContractsController@getUsers');
   
// Route::prefix('kwema')->group(function() {
//     Route::get('/', 'ContractsController@index');
//     Route::get('/test', 'ContractsController@test');
    
// });
Route::prefix('contracts')->group(function() {
	//middle ware authtication
    Route::get('/', 'ContractsController@index');
    Route::get('/login', 'ContractsController@login');
    Route::get('/getUsers', 'ContractsController@getUsers');
    Route::post('/saveUsers', 'ContractsController@saveUsers');
    Route::delete('/users', 'ContractsController@deleteUsers');

    Route::get('/listUsers', 'ContractsController@listUsers');

    
});
Route::group(['middleware' => 'cors','prefix' => 'ct'], function() {

	Route::get('/getUsers', 'ContractsController@getUsers');
});

