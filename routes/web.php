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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('clients')->group(function () {

    Route::get('','ClientController@index')->name('client.index');

    // vieno kliento pridejimas
    Route::get('create', 'ClientController@create')->name('client.create');
    Route::post('store', 'ClientController@store')->name('client.store');

    // keleto klientu pridejimas
    Route::get('createClients', 'ClientController@createClients')->name('client.createClients');
    Route::post('storeClients', 'ClientController@storeClients')->name('client.storeClients');

    // klientu pridejimas su Java Scriptu
    Route::get('createJS', 'ClientController@createJS')->name('client.createJS');
    Route::post('storeJS', 'ClientController@storeJS')->name('client.storeJS');


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
