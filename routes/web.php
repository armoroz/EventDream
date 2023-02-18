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
//require __DIR__ ."/auth.php";

Route::resource('customers', App\Http\Controllers\customerController::class);
Route::resource('calendar/display', App\Http\Controllers\calendarController::class);

//Route::resource('products', App\Http\Controllers\productController::class);

Route::get('products/displaygrid', 'App\Http\Controllers\productController@displaygrid')->name('products.displaygrid');
Route::get('products', 'App\Http\Controllers\productController@index')->name('products.index');
/*Route::resource('employees', App\Http\Controllers\employeeController::class);*/

Route::get('products/additem/{id}', 'App\Http\Controllers\productController@additem')->name('products.additem');

Route::get('products/emptycart', 'App\Http\Controllers\productController@emptycart')->name('products.emptycart');

Route::get('events/checkout', 'App\Http\Controllers\eventController@checkout')->name('events.checkout');

Route::resource('events', App\Http\Controllers\eventController::class);

Route::resource('eventproductlogs', App\Http\Controllers\eventproductlogController::class);

Route::post('events/placeorder', 'App\Http\Controllers\eventController@placeorder')->name('events.placeorder');

Route::resource('bookings', App\Http\Controllers\bookingController::class);

//Route::get('/home','App\Http\Controllers\customerController@index')->name('home');
//Route::get('logout','App\Http\Controllers\Auth\LoginController@logout')->name('logout');
//Auth::routes();
Route::get('/logout','\App\Http\Controllers\Auth\AuthenticatedSessionController@destroy');

Route::post('login','App\Http\Controllers\Auth\AuthenticatedSessionController@store');

Route::get('/loggedInCustomer','App\Http\Controllers\customerController@getLoggedInCustomerDetails');


Route::resource('users', App\Http\Controllers\usersController::class);


Route::resource('roles', App\Http\Controllers\rolesController::class);

Route::get('/users/assignroles/{id}', 'App\Http\Controllers\UsersController@assignRoles')->name('users.assignroles');
Route::patch('/users/updateroles/{id}', 'App\Http\Controllers\UsersController@updateRoles')->name("roles.rolesupdate");

Route::resource('roles', App\Http\Controllers\rolesController::class);
Route::resource('permissions', App\Http\Controllers\permissionsController::class);

Route::get('/roles/assignpermissions/{id}', 'App\Http\Controllers\RolesController@assignPermissions')->name('roles.assignpermissions');
Route::patch('/roles/updatepermissions/{id}', 'App\Http\Controllers\RolesController@updatePermissions')->name("roles.permissionsupdate");

//Route::get('products', 'App\Http\Controllers\productController@index');

Route::group(['middleware' => ['role:System Admin']], function () {                           
Route::get('/products/create', 'App\Http\Controllers\productController@create')->name('products.create')->middleware('permission:Create Product');
Route::delete('/products/{product}', 'App\Http\Controllers\productController@destroy')->name('products.destroy')->middleware('permission:Delete Product');
Route::get('products/{product}', 'App\Http\Controllers\productController@show')->name('products.show');
Route::get('products/{product}/edit', 'App\Http\Controllers\productController@edit')->name('products.edit');
Route::post('products','App\Http\Controllers\productController@store')->name('products.store');
});

Route::group(['middleware' => ['role:Warehouse Worker']], function () { 
Route::get('/products/create', 'App\Http\Controllers\productController@create')->name('products.create')->middleware('permission:Create Product');
Route::delete('/products/{product}', 'App\Http\Controllers\productController@destroy')->name('products.destroy')->middleware('permission:Delete Product');
Route::get('products/{product}', 'App\Http\Controllers\productController@show')->name('products.show');
Route::get('products/{product}/edit', 'App\Http\Controllers\productController@edit')->name('products.edit');
Route::post('products','App\Http\Controllers\productController@store')->name('products.store');
Route::post('products/{product}/update','App\Http\Controllers\productController@update')->name('products.update');
});

Route::resource('venues', App\Http\Controllers\venueController::class);


Route::resource('venueratings', App\Http\Controllers\venueratingController::class);

Route::get('/venueratings/ratevenue/{venue}','App\Http\Controllers\venueratingController@ratevenue')->name('venueratings.ratevenue');

Route::get('/venueratings/venue/{venue}','App\Http\Controllers\venueratingController@showvenueratings')->name('venueratings.showvenueratings');

Route::get('/venues/all/json', 'App\Http\Controllers\venueController@json')->name(' venues.map.json ');
