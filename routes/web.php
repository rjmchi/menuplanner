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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('guests', App\Http\Controllers\GuestController::class);
Route::resource('items', App\Http\Controllers\ItemController::class);
Route::resource('dishes', App\Http\Controllers\DishController::class);
Route::resource('events', App\Http\Controllers\EventController::class);

Route::get('/sendinvite/{event}/{guest}', [App\Http\Controllers\HomeController::class, 'sendInvite'])->name('sendinvite');

Route::get('/guest/{id}', [App\Http\Controllers\InviteController::class, 'guest'])->name('guest.invite');

