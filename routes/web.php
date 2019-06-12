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
    return redirect()->route('login');
});

// settings profile
Route::get('/settings','HomeController@get_settings')->name('settings');
Route::post('/settings/save','HomeController@save_settings')->name('settings.save');
// end settings section

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('pieces', 'PieceController');

Route::resource('equipements', 'EquipementController');

Route::resource('pannes', 'PanneController');

// GESTION DES ENTRETIENS
Route::resource('entretiens', 'EntretienController');
Route::get('calendar', 'EntretienController@calendar')->name('calendar');

Route::resource('defaillances', 'DefaillanceController'); 

Route::resource('interventions', 'InterventionController');

Route::resource('users', 'UserController');

// ajax calls 

Route::get('pieces/prix/{id}', 'PieceController@prix')->name('price');

Route::get('/mttr', 'HomeController@mttr')->name('mttr');
Route::get('/mtbf', 'HomeController@mtbf')->name('mtbf');