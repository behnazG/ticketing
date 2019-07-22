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

Auth::routes();
///////////////////////////////////////////////////////////////////////////////////
Route::get('/', 'HomeController@index')->middleware('auth');
Route::get('/refreshTopMenuTicket', 'HomeController@refresh_top_menu_ticket');
Route::get('/refreshTopMenuNotify', 'HomeController@refresh_top_menu_notify');
Route::get('/home', 'HomeController@index')->middleware('auth');
Route::get('/tickets/sent', 'TicketController@sent')->middleware('auth');
Route::get('/tickets/inbox', 'TicketController@inbox')->middleware('auth');
Route::get('/tickets/inbox/{status}', 'TicketController@inbox')->middleware('auth');
Route::post('/tickets/search', 'TicketController@search');
Route::post('/tickets/advancedSearch', 'TicketController@advanced_search');
Route::get('/tickets/search/{type}/{search}', 'TicketController@search_all');
Route::get('/tickets/compose', 'TicketController@compose')->middleware('auth');
Route::post('/tickets', 'TicketController@store')->middleware('auth');
Route::get('/tickets', 'TicketController@inbox')->middleware('auth');
Route::get('/tickets/{ticket_id}', 'TicketController@show')->middleware('auth');
Route::put('/tickets/{ticket}', 'TicketController@update')->middleware('auth');
Route::put('/tickets/changeStatus/{ticket}', 'TicketController@change_status')->middleware('auth');
Route::put('/tickets/replay/{ticket}', 'TicketController@replay')->middleware('auth');
Route::put('/tickets/reffral/{ticket}', 'TicketController@reffral')->middleware('auth');
Route::get('/tickets/startWorkTime/{ticket_id}', 'TicketController@start_work_time');
Route::get('/tickets/endWorkTime/{ticket_id}', 'TicketController@end_work_time');
Route::put('/tickets/setTimes/{ticket}', 'TicketController@set_times')->middleware('auth');
Route::get('/changeLanguage/{lang}', 'HomeController@set_locale')->middleware('auth');
/////////////////////////////////////////////////////////////
Route::get('/print/{ticket_id}/tickets', 'TicketController@print_tickets')->middleware('auth');
////////////////////////////////////////////////////////////
Route::resource('/categories', 'CategoryController')->middleware('auth');
Route::resource('/organizationCharts', 'OrganizationChartController')->middleware('auth');
Route::resource('/hotels', 'HotelController')->middleware('auth');
////////////////////////////////////////////////////////
Route::post('users', 'UserController@store')->middleware('auth')->middleware('custome_auth');
Route::get('users/create', 'UserController@create')->middleware('auth')->middleware('custome_auth');
Route::put('users/{user}', 'UserController@update')->middleware('auth')->middleware('custome_auth');
Route::delete('users/{user}', 'UserController@destroy')->middleware('auth')->middleware('custome_auth');
Route::get('users/{user}/edit', 'UserController@edit')->middleware('auth')->middleware('custome_auth');
Route::get('users/{is_staff}', 'UserController@index')->middleware('auth')->middleware('custome_auth');
Route::get('users/{user}', 'UserController@show')->middleware('auth')->middleware('custome_auth');
///////////////////////////////////////////////
Route::get('authorises/{user}/authorise', 'UserAuthoriseController@authorise')->middleware('auth');
Route::put('authorises/{user}', 'UserAuthoriseController@store')->middleware('auth');
////////////////////////////////
Route::get('/mail', function () {
    return view('mail');
});
//////////////////////////////////////////////