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
require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
});


Route::resource('customers', App\Http\Controllers\customerController::class);
Route::resource('calendar/display', App\Http\Controllers\calendarController::class);

//Route::resource('products', App\Http\Controllers\productController::class);

Route::get('products/displaygrid', 'App\Http\Controllers\productController@displaygrid')->name('products.displaygrid');
/*Route::resource('employees', App\Http\Controllers\employeeController::class);*/

Route::get('products/additem/{id}', 'App\Http\Controllers\productController@additem')->name('products.additem');

Route::get('products/emptycart', 'App\Http\Controllers\productController@emptycart')->name('products.emptycart');

Route::get('events/checkout', 'App\Http\Controllers\eventController@checkout')->name('events.checkout');

Route::resource('events', App\Http\Controllers\eventController::class);


Route::resource('eventproductlogs', App\Http\Controllers\eventproductlogController::class);

Route::post('events/placeorder', 'App\Http\Controllers\eventController@placeorder')->name('events.placeorder');
