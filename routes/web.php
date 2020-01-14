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

//use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::resources([
        'user' => 'UserController',
        'moto' => 'moto\MotoController',
        'travel' => 'moto\TravelController',
        'location' => 'moto\LocationController',
        'map' => 'moto\MapController',
    ]);
    Route::post('/position', 'moto\TravelController@map')->name('travel.map');
    Route::get('/confirm/{id}', 'moto\TravelController@confirm')->name('travel.confirm');
    Route::patch('/cancel/{id}', 'moto\TravelController@cancel')->name('travel.cancel');
    Route::get('/report', 'HomeController@report')->name('home.report');
    Route::get('/confirmed', 'UserController@confirmed')->name('user.confirmed');
    Route::get('map', 'moto\MapController@index')->name('map.index');
});
