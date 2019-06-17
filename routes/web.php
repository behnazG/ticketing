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
Route::get('/ticket/sent', 'TicketController@sent');
Route::get('/ticket/inbox', 'TicketController@inbox');
Route::get('/ticket/compose', 'TicketController@compose');
////////////////////////////////////////////////////////////
Route::resource('/users', 'UserController');
Route::resource('/categories', 'CategoryController');
Route::resource('/organizationCharts', 'OrganizationChartController');
Route::resource('/hotels', 'HotelController');
