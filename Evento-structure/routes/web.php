<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
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


Route::middleware(['auth' , 'admin'])->group(function () {
    Route::get('/dashboard' , [PagesController::class , 'admin_index'])->name('dashboard');
    Route::get('/access' , [UserController::class , 'access'])->name('access');
    Route::resource('categorys',CategoryController::class);
    Route::resource('eve' , EvenementController::class);
});


Route::middleware(['auth' , 'organisateur'])->group(function () {
    Route::get('/organisateur' , [PagesController::class , 'organisateur_index'])->name('organisateur');
    Route::resource('events' , EvenementController::class);
    Route::post('/methodchanger' , [EvenementController::class , 'methodchanger'])->name('methodchanger');
    Route::resource('Les-reservations' , ReservationController::class);
    Route::post('/Les-reservations/statuschanger' , [ReservationController::class , 'statuschanger'])->name('status');
});


Route::middleware(['auth' , 'user'])->group(function () {
    Route::get('/' , [PagesController::class , 'index'])->name('home');
    Route::get('/event/{event}' , [PagesController::class , 'page'])->name('page');
    Route::resource('reservation' , ReservationController::class);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
