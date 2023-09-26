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

// Route::get('/', [OrganizationController::class, 'index']);

Route::resource('organizations', OrganizationController::class);

Route::resource('locations', LocationController::class);
Route::get('/locations/create/{organization_id}', 'LocationController@create')->name('locations.create');

Route::resource('devices', DeviceController::class);
Route::get('/devices/create/{location_id}', 'DeviceController@create')->name('devices.create');
