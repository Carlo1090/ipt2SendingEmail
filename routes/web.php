<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarEmailController;
use App\Http\Controllers\AnnouncementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Cars
|--------------------------------------------------------------------------
*/
Route::resource('cars', CarController::class);

// Send car email
Route::post('/cars/{car}/email', [CarEmailController::class, 'send'])
    ->name('cars.email');

/*
|--------------------------------------------------------------------------
| Customers
|--------------------------------------------------------------------------
*/
Route::resource('customers', CustomerController::class);

/*
|--------------------------------------------------------------------------
| Announcements (PUBLIC – NO LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/
Route::resource('announcements', AnnouncementController::class);

// Send announcement email
Route::post(
    '/announcements/{announcement}/send',
    [AnnouncementController::class, 'sendEmail']
)->name('announcements.send');

/*
|--------------------------------------------------------------------------
| Dashboard (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
