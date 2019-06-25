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
Route::get('/tickets/sent', 'TicketController@sent')->middleware('auth');
Route::get('/tickets/inbox', 'TicketController@inbox')->middleware('auth');
Route::get('/tickets/compose', 'TicketController@compose')->middleware('auth');
Route::post('/tickets','TicketController@store')->middleware('auth');
Route::get('/tickets','TicketController@inbox')->middleware('auth');
Route::get('/tickets/{ticket_id}','TicketController@show')->middleware('auth');
////////////////////////////////////////////////////////////
Route::resource('/categories', 'CategoryController')->middleware('auth');
Route::resource('/organizationCharts', 'OrganizationChartController')->middleware('auth');
Route::resource('/hotels', 'HotelController')->middleware('auth');
////////////////////////////////////////////////////////
Route::post('users','UserController@store')->middleware('auth');
Route::get('users/create','UserController@create')->middleware('auth');
Route::put('users/{user}','UserController@update')->middleware('auth');
Route::delete('users/{user}','UserController@destroy')->middleware('auth');
Route::get('users/{user}/edit','UserController@edit')->middleware('auth');
Route::get('users/{is_staff}','UserController@index')->middleware('auth');
Route::get('users/{user}','UserController@show')->middleware('auth');
///////////////////////////////////////////////
Route::get('authorises/{user}/authorise','UserAuthoriseController@authorise')->middleware('auth');
Route::put('authorises/{user}','UserAuthoriseController@store')->middleware('auth');