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
