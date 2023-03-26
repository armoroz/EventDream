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

Route::get('/', 'App\Http\Controllers\homepageController@homepage', function () {
    return view('homepage');
})->name('homepage');

Route::get('/homepage', 'App\Http\Controllers\homepageController@homepage', function () {
    return view('homepage');
})->middleware(['auth'])->name('homepage');

require __DIR__.'/auth.php';


/* General Permissions */

Route::get('/logout','\App\Http\Controllers\Auth\AuthenticatedSessionController@destroy');
Route::post('login','App\Http\Controllers\Auth\AuthenticatedSessionController@store');
Route::get('/loggedInCustomer','App\Http\Controllers\customerController@getLoggedInCustomerDetails');

Route::resource('users', App\Http\Controllers\usersController::class);
Route::resource('roles', App\Http\Controllers\rolesController::class);
Route::resource('aboutus', App\Http\Controllers\aboutusController::class);
Route::resource('permissions', App\Http\Controllers\permissionsController::class);
Route::get('/users/assignroles/{id}', 'App\Http\Controllers\UsersController@assignRoles')->name('users.assignroles');
Route::patch('/users/updateroles/{id}', 'App\Http\Controllers\UsersController@updateRoles')->name("roles.rolesupdate");
Route::get('/roles/assignpermissions/{id}', 'App\Http\Controllers\RolesController@assignPermissions')->name('roles.assignpermissions');
Route::patch('/roles/updatepermissions/{id}', 'App\Http\Controllers\RolesController@updatePermissions')->name("roles.permissionsupdate");

/* Role Permissions */

/* System Admin Security */
/*
Route::group(['middleware' => ['role:System Admin']], function () {                      
Route::get('/products/create', 'App\Http\Controllers\productController@create')->name('products.create')->middleware('permission:Create Product');
Route::delete('/products/{product}', 'App\Http\Controllers\productController@destroy')->name('products.destroy')->middleware('permission:Delete Product');
Route::get('products/{product}', 'App\Http\Controllers\productController@show')->name('products.show');
Route::get('products/{product}/edit', 'App\Http\Controllers\productController@edit')->name('products.edit');
Route::post('products','App\Http\Controllers\productController@store')->name('products.store');
Route::patch('products/{product}/update  ','App\Http\Controllers\productController@update')->name('products.update');
});
*/

/* Warehouse Worker Security */
/*
Route::group(['middleware' => ['role:Warehouse Worker']], function () { 
Route::get('/products/create', 'App\Http\Controllers\productController@create')->name('products.create')->middleware('permission:Create Product');
Route::delete('/products/{product}', 'App\Http\Controllers\productController@destroy')->name('products.destroy')->middleware('permission:Delete Product');
Route::get('products/{product}', 'App\Http\Controllers\productController@show')->name('products.show');
Route::get('products/{product}/edit', 'App\Http\Controllers\productController@edit')->name('products.edit');
Route::post('products','App\Http\Controllers\productController@store')->name('products.store');
Route::patch('products/{product}/update','App\Http\Controllers\productController@update')->name('products.update');
//});
*/



/* Customers */
Route::resource('customers', App\Http\Controllers\customerController::class);

/* Events/Logs */
//Route::resource('events', App\Http\Controllers\eventController::class);
Route::post('events','App\Http\Controllers\eventController@store')->name('events.store');
Route::patch('events/{event}/update','App\Http\Controllers\eventController@update')->name('events.update');
Route::get('/events/create', 'App\Http\Controllers\eventController@create')->name('events.create');
Route::delete('/events/{event}', 'App\Http\Controllers\eventController@destroy')->name('events.destroy');
Route::get('events/checkout', 'App\Http\Controllers\eventController@checkout')->name('events.checkout');
Route::post('events/placeorder', 'App\Http\Controllers\eventController@placeorder')->name('events.placeorder');
Route::get('events/{event}/edit', 'App\Http\Controllers\eventController@edit')->name('events.edit');
Route::get('events', 'App\Http\Controllers\eventController@index')->name('events.index');
Route::get('events/{event}', 'App\Http\Controllers\eventController@show')->name('events.show');
Route::resource('eventproductlogs', App\Http\Controllers\eventproductlogController::class);

/* Calendar */
Route::get('/calendar/json','App\Http\Controllers\calendarController@json')->name('calendar.json'); 
Route::get('/calendar/venuejson/{venueid}','App\Http\Controllers\calendarController@venuejson')->name('calendar.venuejson'); 
Route::get('/calendar/vendisplay/{venueid}','App\Http\Controllers\calendarController@vendisplay')->name('calendar.vendisplay');

/* Bookings */
Route::resource('bookings', App\Http\Controllers\bookingController::class);

/* Products */
Route::get('/products/create', 'App\Http\Controllers\productController@create')->name('products.create');
Route::delete('/products/{product}', 'App\Http\Controllers\productController@destroy')->name('products.destroy');
Route::get('products/{product}/edit', 'App\Http\Controllers\productController@edit')->name('products.edit');
Route::get('products/displaygrid', 'App\Http\Controllers\productController@displaygrid')->name('products.displaygrid');
Route::get('products', 'App\Http\Controllers\productController@index')->name('products.index');
Route::get('products/{product}', 'App\Http\Controllers\productController@show')->name('products.show');
Route::get('products/additem/{id}', 'App\Http\Controllers\productController@additem')->name('products.additem');
Route::get('products/emptycart', 'App\Http\Controllers\productController@emptycart')->name('products.emptycart');
Route::get('products/custshow/{product}', 'App\Http\Controllers\productController@custshow')->name('products.custshow');
Route::post('products/all/search', 'App\Http\Controllers\productController@searchquery')->name('products.searchquery');
Route::post('/products/filter', [ProductController::class, 'filterProducts'])->name('products.filter');
Route::post('products','App\Http\Controllers\productController@store')->name('products.store');
Route::patch('products/{product}/update','App\Http\Controllers\productController@update')->name('products.update');

/* Venues/Ratings/Images */
Route::delete('/venues/{venue}', 'App\Http\Controllers\venueController@destroy')->name('venues.destroy');
Route::get('/venues/all/json', 'App\Http\Controllers\venueController@json')->name('venues.map.json');
Route::get('/venues/show/map', 'App\Http\Controllers\venueController@showmap')->name('venues.showmap');
Route::get('venues/displaygrid', 'App\Http\Controllers\venueController@displaygrid')->name('venues.displaygrid');
Route::get('venues/custshow/{venues}', 'App\Http\Controllers\venueController@custshow')->name('venues.custshow');
Route::get('venues', 'App\Http\Controllers\venueController@index')->name('venues.index');
Route::get('venues/additem/{id}', 'App\Http\Controllers\venueController@additem')->name('venues.additem');
Route::get('venues/emptycart', 'App\Http\Controllers\venueController@emptycart')->name('venues.emptycart');
Route::post('venues/all/search', 'App\Http\Controllers\venueController@searchquery')->name('venues.searchquery');
Route::get('/venues/create', 'App\Http\Controllers\venueController@create')->name('venues.create');
Route::get('venues/{venue}', 'App\Http\Controllers\venueController@show')->name('venues.show');
Route::get('venues/{venue}/edit', 'App\Http\Controllers\venueController@edit')->name('venues.edit');
Route::post('venues','App\Http\Controllers\venueController@store')->name('venues.store');
Route::patch('venues/{venue}/update  ','App\Http\Controllers\venueController@update')->name('venues.update');
Route::resource('venueratings', App\Http\Controllers\venueratingController::class);
Route::get('/venueratings/ratevenue/{venue}','App\Http\Controllers\venueratingController@ratevenue')->name('venueratings.ratevenue');
Route::post('/venues/filter', [VenueController::class, 'filterVenues'])->name('venues.filter');
Route::get('/venueratings/venue/{venue}','App\Http\Controllers\venueratingController@showvenueratings')->name('venueratings.showvenueratings');
Route::resource('venueimages', App\Http\Controllers\venueimagesController::class);
Route::get('venue/newimages/{venueid}', 'App\Http\Controllers\venueimagesController@create')->name('venue.newimages');

/* Menu Items */
Route::delete('/menuitems/{menuitem}', 'App\Http\Controllers\menuitemController@destroy')->name('menuitems.destroy');
Route::get('menuitems', 'App\Http\Controllers\menuitemController@index')->name('menuitems.index');
Route::get('menuitems/displaygrid', 'App\Http\Controllers\menuitemController@displaygrid')->name('menuitems.displaygrid');
Route::get('menuitems/custshow/{menuitem}', 'App\Http\Controllers\menuitemController@custshow')->name('menuitems.custshow');
Route::get('/menuitems/create', 'App\Http\Controllers\menuitemController@create')->name('menuitems.create');
Route::get('menuitems/{menuitem}', 'App\Http\Controllers\menuitemController@show')->name('menuitems.show');
Route::get('menuitems/{menuitem}/edit', 'App\Http\Controllers\menuitemController@edit')->name('menuitems.edit');
Route::patch('menuitems/{menuitem}/update  ','App\Http\Controllers\menuitemController@update')->name('menuitems.update');
Route::post('menuitems','App\Http\Controllers\menuitemController@store')->name('menuitems.store');
Route::post('menuitems/all/newstandardmenu','App\Http\Controllers\menuitemController@newstandardmenu')->name('menuitems.newstandardmenu');

/* Standard Menus/Logs/Ratings/Images */
Route::delete('/standardmenus/{standardmenu}', 'App\Http\Controllers\standardmenuController@destroy')->name('standardmenus.destroy');
Route::get('standardmenus', 'App\Http\Controllers\standardmenuController@index')->name('standardmenus.index');
Route::get('standardmenus/displaygrid', 'App\Http\Controllers\standardmenuController@displaygrid')->name('standardmenus.displaygrid');
Route::get('standardmenus/additem/{id}', 'App\Http\Controllers\standardmenuController@additem')->name('standardmenus.additem');
Route::get('standardmenus/emptycart', 'App\Http\Controllers\standardmenuController@emptycart')->name('standardmenus.emptycart');
Route::get('standardmenus/custshow/{standardmenu}', 'App\Http\Controllers\standardmenuController@custshow')->name('standardmenus.custshow');
Route::get('/standardmenus/create', 'App\Http\Controllers\standardmenuController@create')->name('standardmenus.create');
Route::get('standardmenus/{standardmenu}', 'App\Http\Controllers\standardmenuController@show')->name('standardmenus.show');
Route::get('standardmenus/{standardmenu}/edit', 'App\Http\Controllers\standardmenuController@edit')->name('standardmenus.edit');
Route::post('standardmenus','App\Http\Controllers\standardmenuController@store')->name('standardmenus.store');
Route::patch('standardmenus/{standardmenu}/update  ','App\Http\Controllers\standardmenuController@update')->name('standardmenus.update');
Route::post('standardmenus/all/search', 'App\Http\Controllers\standardmenuController@searchquery')->name('standardmenus.searchquery');
Route::get('/standardmenus/assignmenuitems/{id}', 'App\Http\Controllers\standardmenuController@assignMenuitems')->name('standardmenus.assignmenuitems');
Route::patch('/standardmenus/updatemenuitems/{id}', 'App\Http\Controllers\standardmenuController@updateMenuitems')->name("standardmenus.updatemenuitems");
Route::resource('standardmenulogs', App\Http\Controllers\standardmenulogController::class);
Route::get('standardmenulogs', 'App\Http\Controllers\standardmenulogController@index')->name('standardmenulogs.index');
Route::resource('standardmenuratings', App\Http\Controllers\standardmenuratingController::class);
Route::get('/standardmenuratings/ratestandardmenu/{standardmenu}','App\Http\Controllers\standardmenuratingController@ratestandardmenu')->name('standardmenuratings.ratestandardmenu');
Route::get('/standardmenuratings/standardmenu/{standardmenu}','App\Http\Controllers\standardmenuratingController@showstandardmenuratings')->name('standardmenuratings.showstandardmenuratings');
Route::resource('standardmenuimages', App\Http\Controllers\standardmenuimagesController::class);
Route::get('standardmenu/newimages/{standardmenuid}', 'App\Http\Controllers\standardmenuimagesController@create')->name('standardmenu.newimages');

/* Custom Menus/Logs */
//Route::resource('custommenus', App\Http\Controllers\custommenuController::class);
Route::get('custommenus', 'App\Http\Controllers\custommenuController@index')->name('custommenus.index');
Route::get('/custommenus/create', 'App\Http\Controllers\custommenuController@create')->name('custommenus.create');
Route::post('custommenus','App\Http\Controllers\custommenuController@store')->name('custommenus.store');
Route::get('custommenus/custshow/{custommenu}', 'App\Http\Controllers\custommenuController@custshow')->name('custommenus.custshow');
Route::get('custommenus/displaygrid', 'App\Http\Controllers\custommenuController@displaygrid')->name('custommenus.displaygrid');
Route::patch('custommenus/{custommenu}/update','App\Http\Controllers\custommenuController@update')->name('custommenus.update');
Route::delete('/custommenus/{custommenu}', 'App\Http\Controllers\custommenuController@destroy')->name('custommenus.destroy');
Route::get('custommenus/{custommenu}/edit', 'App\Http\Controllers\custommenuController@edit')->name('custommenus.edit');
Route::get('custommenus/{custommenu}', 'App\Http\Controllers\custommenuController@show')->name('custommenus.show');
Route::resource('custommenulogs', App\Http\Controllers\custommenulogController::class);
Route::get('custommenulogs', 'App\Http\Controllers\custommenulogController@index')->name('custommenulogs.index');

/* Menu Options */
Route::resource('menuoptions', App\Http\Controllers\menuoptionController::class);
Route::get('menuoptions', 'App\Http\Controllers\menuoptionController@index')->name('menuoptions.index');



