<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SendReqController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::view('payment', 'products.payment')
    ->middleware(['auth', 'verified'])
    ->name('payment');
Route::view('donation', 'products.donation')
    ->middleware(['auth', 'verified'])
    ->name('donation');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::middleware('auth')->group(function () {
    Route::resource('animals', AnimalController::class);
    Route::resource('products', ProductController::class)->only(['index']);
});

Route::resource('sendrequest', SendReqController::class)
    ->only(['index','create','store'])
    ->middleware(['auth']);

require __DIR__.'/auth.php';
