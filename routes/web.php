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

Route::resource('/admin/organizations', \App\Http\Controllers\OrganizationController::class);
Route::get('/admin/air-duct-cleaning',
    [\App\Http\Controllers\AirDuctCleaningController::class,'index'])->name('air-duct-cleaning.index');
Route::get('/admin/air-duct-cleaning/create',
    [\App\Http\Controllers\AirDuctCleaningController::class,'create'])->name('air-duct-cleaning.create');
Route::post('/admin/air-duct-cleaning/store',
    [\App\Http\Controllers\AirDuctCleaningController::class,'store'])->name('air-duct-cleaning.store');

Route::get('/admin/air-duct-cleaning/check-date-timeslot',
    [\App\Http\Controllers\AirDuctCleaningController::class,'check_date_timeslot'])
    ->name('air-duct-cleaning.check_date_timeslot');
