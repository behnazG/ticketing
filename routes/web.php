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
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/tickets/sent', 'TicketController@sent');
Route::get('/tickets/inbox', 'TicketController@inbox');
Route::get('/tickets/compose', 'TicketController@compose');
Route::post('/tickets','TicketController@store');
////////////////////////////////////////////////////////////
Route::resource('/categories', 'CategoryController');
Route::resource('/organizationCharts', 'OrganizationChartController');
Route::resource('/hotels', 'HotelController');
////////////////////////////////////////////////////////
Route::post('users','UserController@store');
Route::get('users/create','UserController@create');
Route::put('users/{user}','UserController@update');
Route::delete('users/{user}','UserController@destroy');
Route::get('users/{user}/edit','UserController@edit');
Route::get('users/{is_staff}','UserController@index');
Route::get('users/{user}','UserController@show');
///////////////////////////////////////////////
Route::get('authorises/{user}/authorise','UserAuthoriseController@authorise');
Route::put('authorises/{user}','UserAuthoriseController@store');