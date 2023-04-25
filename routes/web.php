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
Route::post('stripe/checkout','App\Http\Controllers\stripeController@checkout')->name('stripe.checkout');

Route::resource('users', App\Http\Controllers\usersController::class);
Route::resource('roles', App\Http\Controllers\rolesController::class);
Route::resource('aboutus', App\Http\Controllers\aboutusController::class);
Route::resource('permissions', App\Http\Controllers\permissionsController::class);
Route::get('/users/assignroles/{id}', 'App\Http\Controllers\usersController@assignRoles')->name('users.assignroles');
Route::patch('/users/updateroles/{id}', 'App\Http\Controllers\usersController@updateRoles')->name("roles.rolesupdate");
Route::get('/roles/assignpermissions/{id}', 'App\Http\Controllers\rolesController@assignPermissions')->name('roles.assignpermissions');
Route::patch('/roles/updatepermissions/{id}', 'App\Http\Controllers\rolesController@updatePermissions')->name("roles.permissionsupdate");

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
Route::get('customer/custedit/{id}', 'App\Http\Controllers\customerController@custedit')->name('customers.custedit');
Route::patch('customer/custupdate/{customer}', 'App\Http\Controllers\customerController@custupdate')->name('customers.custupdate');
Route::get('customer/custshow/{id}', 'App\Http\Controllers\customerController@custshow')->name('customers.custshow');


/* Events/Logs */
Route::resource('events', App\Http\Controllers\eventController::class);
Route::post('events/venstore', 'App\Http\Controllers\eventController@venstore')->name('events.venstore');
Route::post('events/store', 'App\Http\Controllers\eventController@store')->name('events.store');
Route::get('events/all/checkout', 'App\Http\Controllers\eventController@checkout')->name('events.checkout');
Route::get('events/eventcheckout/{event}', 'App\Http\Controllers\eventController@eventcheckout')->name('events.eventcheckout');
Route::post('events/all/placeorder', 'App\Http\Controllers\eventController@placeorder')->name('events.placeorder');
Route::post('events/eventplaceorder/{event}', 'App\Http\Controllers\eventController@eventplaceorder')->name('events.eventplaceorder');
Route::get('events/custindex/{id}', 'App\Http\Controllers\eventController@custindex')->name('events.custindex');
Route::get('event/custshow/{id}', 'App\Http\Controllers\eventController@custshow')->name('events.custshow');
Route::get('events/all/orderplaced', 'App\Http\Controllers\eventController@orderplaced')->name('events.orderplaced');
Route::resource('eventproductlogs', App\Http\Controllers\eventproductlogController::class);

/* Calendar */
Route::get('/calendar/venuejson/{venueid}','App\Http\Controllers\calendarController@venuejson')->name('calendar.venuejson'); 
Route::get('/calendar/vendisplay/{venueid}','App\Http\Controllers\calendarController@vendisplay')->name('calendar.vendisplay');
Route::get('/calendar/all/json','App\Http\Controllers\calendarController@json')->name('calendar.json');
Route::get('/calendar/all/display','App\Http\Controllers\calendarController@display')->name('calendar.display');

/* Bookings */
Route::resource('bookings', App\Http\Controllers\bookingController::class);

/* Products */
Route::resource('products', App\Http\Controllers\productController::class);
Route::get('products/all/displaygrid', 'App\Http\Controllers\productController@displaygrid')->name('products.displaygrid');
Route::get('products/eventdisplaygrid/{event}', 'App\Http\Controllers\productController@eventdisplaygrid')->name('products.eventdisplaygrid');
Route::get('products/additem/{id}', 'App\Http\Controllers\productController@additem')->name('products.additem');
Route::get('products/all/emptycart', 'App\Http\Controllers\productController@emptycart')->name('products.emptycart');
Route::get('products/custshow/{product}', 'App\Http\Controllers\productController@custshow')->name('products.custshow');
Route::post('products/all/search', 'App\Http\Controllers\productController@searchquery')->name('products.searchquery');
Route::post('products/all/filter', 'App\Http\Controllers\productController@filterProducts')->name('products.filterproducts');

/* Venues/Ratings/Images */
Route::resource('venues', App\Http\Controllers\venueController::class);
Route::get('/venues/all/json', 'App\Http\Controllers\venueController@json')->name('venues.map.json');
Route::get('/venues/show/map', 'App\Http\Controllers\venueController@showmap')->name('venues.showmap');
Route::get('venues/all/displaygrid', 'App\Http\Controllers\venueController@displaygrid')->name('venues.displaygrid');
Route::get('venues/custshow/{venue}', 'App\Http\Controllers\venueController@custshow')->name('venues.custshow');
Route::post('venues/all/search', 'App\Http\Controllers\venueController@searchquery')->name('venues.searchquery');
Route::post('/venues/all/filter', 'App\Http\Controllers\venueController@filterVenues')->name('venues.filtervenues');
Route::get('venues/additem/{id}', 'App\Http\Controllers\venueController@additem')->name('venues.additem');
Route::get('venues/all/emptycart', 'App\Http\Controllers\venueController@emptycart')->name('venues.emptycart');
Route::resource('venueratings', App\Http\Controllers\venueratingController::class);
Route::get('/venueratings/ratevenue/{venue}','App\Http\Controllers\venueratingController@ratevenue')->name('venueratings.ratevenue');
Route::get('/venueratings/venue/{venue}','App\Http\Controllers\venueratingController@showvenueratings')->name('venueratings.showvenueratings');
Route::resource('venueimages', App\Http\Controllers\venueimagesController::class);
Route::get('venue/newimages/{venueid}', 'App\Http\Controllers\venueimagesController@create')->name('venue.newimages');

/* Menu Items */
Route::resource('menuitems', App\Http\Controllers\menuitemController::class);
Route::get('menuitems/all/displaygrid', 'App\Http\Controllers\menuitemController@displaygrid')->name('menuitems.displaygrid');
Route::get('menuitems/custshow/{menuitem}', 'App\Http\Controllers\menuitemController@custshow')->name('menuitems.custshow');
Route::post('menuitems/all/newstandardmenu','App\Http\Controllers\menuitemController@newstandardmenu')->name('menuitems.newstandardmenu');

/* Standard Menus/Logs/Ratings/Images */
Route::resource('standardmenus', App\Http\Controllers\standardmenuController::class);
Route::get('standardmenus/all/displaygrid', 'App\Http\Controllers\standardmenuController@displaygrid')->name('standardmenus.displaygrid');
Route::get('standardmenus/additem/{id}', 'App\Http\Controllers\standardmenuController@additem')->name('standardmenus.additem');
Route::get('standardmenus/all/emptycart', 'App\Http\Controllers\standardmenuController@emptycart')->name('standardmenus.emptycart');
Route::get('standardmenus/custshow/{standardmenu}', 'App\Http\Controllers\standardmenuController@custshow')->name('standardmenus.custshow');
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
Route::resource('custommenus', App\Http\Controllers\custommenuController::class);
Route::get('custommenus/custshow/{custommenu}', 'App\Http\Controllers\custommenuController@custshow')->name('custommenus.custshow');
Route::get('custommenus/all/displaygrid', 'App\Http\Controllers\custommenuController@displaygrid')->name('custommenus.displaygrid');
Route::get('custommenus/additem/{id}', 'App\Http\Controllers\custommenuController@additem')->name('custommenus.additem');
Route::get('custommenus/all/emptycart', 'App\Http\Controllers\custommenuController@emptycart')->name('custommenus.emptycart');
Route::get('/custommenus/assignmenuitems/{id}', 'App\Http\Controllers\custommenuController@assignMenuitems')->name('custommenus.assignmenuitems');
Route::patch('/custommenus/updatemenuitems/{id}', 'App\Http\Controllers\custommenuController@updateMenuitems')->name("custommenus.updatemenuitems");

Route::resource('custommenulogs', App\Http\Controllers\custommenulogController::class);

/* Menu Options */
Route::resource('menuoptions', App\Http\Controllers\menuoptionController::class);