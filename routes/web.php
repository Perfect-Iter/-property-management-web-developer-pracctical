<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Models\Property;
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

Route::get('/', [App\Http\Controllers\PropertyController::class, 'index']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/listings', [App\Http\Controllers\PropertyController::class, 'index'])->middleware('authenticated');

Route::get('/listings/create', [App\Http\Controllers\PropertyController::class, 'create'])->middleware('authenticated');
Route::post('/listings/create', [App\Http\Controllers\PropertyController::class, 'store'])->name('listings.createListing');


Route::get('/listings/edit/{id}', 
    [App\Http\Controllers\PropertyController::class, 'edit'])->middleware('authenticated')->middleware('authenticated');


Route::post('/listings/edit/{id}', [App\Http\Controllers\PropertyController::class, 'update'])->name('listings.editListing');

Route::post('/listings/delete/{id}', [App\Http\Controllers\PropertyController::class, 'destroy'])->name('listings.deleteListing');

Route::get('/lease/create/{id}', [App\Http\Controllers\LeaseController::class, 'create'])->middleware('authenticated');

Route::post('/lease/create', [App\Http\Controllers\LeaseController::class, 'store'])->name('lease.addLease')->middleware('authenticated');

Route::post('/lease/approve/{id}', [App\Http\Controllers\LeaseController::class, 'approveLease'])->name('lease.approveLease')->middleware('authenticated');

Route::resources([
    'profile' => ProfileController::class,
]);