<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('Home');
});


// Define routes for trips
Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create');
Route::post('/trips/store', [TripController::class, 'store'])->name('trips.store');

// Define routes for tickets
Route::get('/tickets/purchase', [TicketController::class, 'purchaseForm'])->name('tickets.purchaseForm');
Route::post('/tickets/purchase', [TicketController::class, 'purchase'])->name('tickets.purchase');


// Example: Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
