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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/* General Permissions */

Route::get('/logout','\App\Http\Controllers\Auth\AuthenticatedSessionController@destroy');
Route::post('login','App\Http\Controllers\Auth\AuthenticatedSessionController@store');
Route::get('/loggedInCustomer','App\Http\Controllers\customerController@getLoggedInCustomerDetails');

Route::get('products/displaygrid', 'App\Http\Controllers\productController@displaygrid')->name('products.displaygrid');
Route::get('products', 'App\Http\Controllers\productController@index')->name('products.index');
Route::get('products/additem/{id}', 'App\Http\Controllers\productController@additem')->name('products.additem');
Route::get('products/emptycart', 'App\Http\Controllers\productController@emptycart')->name('products.emptycart');
Route::get('products/custshow/{product}', 'App\Http\Controllers\productController@custshow')->name('products.custshow');

Route::get('events/checkout', 'App\Http\Controllers\eventController@checkout')->name('events.checkout');
Route::resource('events', App\Http\Controllers\eventController::class);
Route::resource('eventproductlogs', App\Http\Controllers\eventproductlogController::class);
Route::post('events/placeorder', 'App\Http\Controllers\eventController@placeorder')->name('events.placeorder');

Route::resource('customers', App\Http\Controllers\customerController::class);
Route::resource('bookings', App\Http\Controllers\bookingController::class);
Route::get('/calendar/json','App\Http\Controllers\calendarController@json')->name('calendar.json'); 
Route::get('/calendar/venuejson/{venueid}','App\Http\Controllers\calendarController@venuejson')->name('calendar.venuejson'); 
Route::get('/calendar/vendisplay/{venueid}','App\Http\Controllers\calendarController@vendisplay')->name('calendar.vendisplay');

//Route::resource('venues', App\Http\Controllers\venueController::class);
Route::resource('venueratings', App\Http\Controllers\venueratingController::class);
Route::get('/venueratings/ratevenue/{venue}','App\Http\Controllers\venueratingController@ratevenue')->name('venueratings.ratevenue');
Route::get('/venueratings/venue/{venue}','App\Http\Controllers\venueratingController@showvenueratings')->name('venueratings.showvenueratings');
Route::get('/venues/all/json', 'App\Http\Controllers\venueController@json')->name('venues.map.json');
Route::get('/venues/show/map', 'App\Http\Controllers\venueController@showmap')->name('venues.showmap');
Route::get('venues/displaygrid', 'App\Http\Controllers\venueController@displaygrid')->name('venues.displaygrid');
Route::get('venues', 'App\Http\Controllers\venueController@index')->name('venues.index');
Route::get('venues/additem/{id}', 'App\Http\Controllers\venueController@additem')->name('venues.additem');
Route::get('venues/emptycart', 'App\Http\Controllers\venueController@emptycart')->name('venues.emptycart');

Route::get('/venues/create', 'App\Http\Controllers\venueController@create')->name('venues.create');
Route::delete('/venues/{venue}', 'App\Http\Controllers\venueController@destroy')->name('venues.destroy');
Route::get('venues/{venue}', 'App\Http\Controllers\venueController@show')->name('venues.show');
Route::get('venues/{venue}/edit', 'App\Http\Controllers\venueController@edit')->name('venues.edit');
Route::post('venues','App\Http\Controllers\venueController@store')->name('venues.store');
Route::patch('venues/{venue}/update  ','App\Http\Controllers\venueController@update')->name('venues.update');
Route::resource('venueimages', App\Http\Controllers\venueimagesController::class);
Route::get('venue/newimages/{venueid}', 'App\Http\Controllers\venueimagesController@create')->name('venue.newimages');
Route::post('venues/{venue}/update','App\Http\Controllers\venueController@update')->name('venues.update');
Route::get('venues/custshow/{venues}', 'App\Http\Controllers\venueController@custshow')->name('venues.custshow');

Route::resource('users', App\Http\Controllers\usersController::class);
Route::resource('roles', App\Http\Controllers\rolesController::class);
Route::resource('aboutus', App\Http\Controllers\aboutusController::class);
Route::resource('permissions', App\Http\Controllers\permissionsController::class);
Route::get('/users/assignroles/{id}', 'App\Http\Controllers\UsersController@assignRoles')->name('users.assignroles');
Route::patch('/users/updateroles/{id}', 'App\Http\Controllers\UsersController@updateRoles')->name("roles.rolesupdate");
Route::get('/roles/assignpermissions/{id}', 'App\Http\Controllers\RolesController@assignPermissions')->name('roles.assignpermissions');
Route::patch('/roles/updatepermissions/{id}', 'App\Http\Controllers\RolesController@updatePermissions')->name("roles.permissionsupdate");

/* System Admin Security */

//Route::group(['middleware' => ['role:System Admin']], function () {  
//Route::resource('products', App\Http\Controllers\productController::class);
//Route::get('products', 'App\Http\Controllers\productController@index');                     
Route::get('/products/create', 'App\Http\Controllers\productController@create')->name('products.create')/*->middleware('permission:Create Product')*/;
Route::delete('/products/{product}', 'App\Http\Controllers\productController@destroy')->name('products.destroy')/*->middleware('permission:Delete Product')*/;
Route::get('products/{product}', 'App\Http\Controllers\productController@show')->name('products.show');

Route::get('products/{product}/edit', 'App\Http\Controllers\productController@edit')->name('products.edit');
Route::post('products','App\Http\Controllers\productController@store')->name('products.store');
Route::patch('products/{product}/update  ','App\Http\Controllers\productController@update')->name('products.update');
//});

/* Warehouse Worker Security */

//Route::group(['middleware' => ['role:Warehouse Worker']], function () { 
Route::get('/products/create', 'App\Http\Controllers\productController@create')->name('products.create')/*->middleware('permission:Create Product')*/;
Route::delete('/products/{product}', 'App\Http\Controllers\productController@destroy')->name('products.destroy')/*->middleware('permission:Delete Product')*/;
Route::get('products/{product}', 'App\Http\Controllers\productController@show')->name('products.show');
Route::get('products/{product}/edit', 'App\Http\Controllers\productController@edit')->name('products.edit');
Route::post('products','App\Http\Controllers\productController@store')->name('products.store');
Route::post('products/{product}/update','App\Http\Controllers\productController@update')->name('products.update');
//});

Route::resource('menuitems', App\Http\Controllers\menuitemController::class);
Route::get('menuitems', 'App\Http\Controllers\menuitemController@index')->name('menuitems.index');

//Route::resource('standardmenus', App\Http\Controllers\standardmenuController::class);
Route::get('standardmenus', 'App\Http\Controllers\standardmenuController@index')->name('standardmenus.index');
Route::get('standardmenus/displaygrid', 'App\Http\Controllers\standardmenuController@displaygrid')->name('standardmenus.displaygrid');
Route::get('standardmenus/additem/{id}', 'App\Http\Controllers\standardmenuController@additem')->name('standardmenus.additem');
Route::get('standardmenus/emptycart', 'App\Http\Controllers\standardmenuController@emptycart')->name('standardmenus.emptycart');
Route::get('standardmenus/custshow/{standardmenu}', 'App\Http\Controllers\standardmenuController@custshow')->name('standardmenus.custshow');

Route::resource('standardmenulogs', App\Http\Controllers\standardmenulogController::class);
Route::get('standardmenulogs', 'App\Http\Controllers\standardmenulogController@index')->name('standardmenulogs.index');

Route::resource('custommenus', App\Http\Controllers\custommenuController::class);
Route::get('custommenus', 'App\Http\Controllers\custommenuController@index')->name('custommenus.index');

Route::resource('custommenulogs', App\Http\Controllers\custommenulogController::class);
Route::get('custommenulogs', 'App\Http\Controllers\custommenulogController@index')->name('custommenulogs.index');