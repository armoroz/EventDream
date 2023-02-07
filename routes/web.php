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


Route::resource('customers', App\Http\Controllers\customerController::class);
Route::resource('calendar/display', App\Http\Controllers\calendarController::class);

Route::resource('products', App\Http\Controllers\productController::class);
Route::resource('employees', App\Http\Controllers\employeeController::class);



