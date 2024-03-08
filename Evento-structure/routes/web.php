<?php

use App\Http\Controllers\AdminController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:client'])->group(function () {
    // //page admin dashboard 
    Route::get('/client/index', [ClientController::class, 'index']);
    // Route::post('/events/update-status/{id}', [AdminController::class, 'updateStatus'])->name('events.updateStatus');
    // Route::get('/admin/UserManager', [UserManagerController::class, 'index'])->name('admin.UserManager');
    // Route::post('/users/updateStatus/{id}', [UserManagerController::class, 'updateStatus'])->name('users.updateStatus');


});
Route::middleware(['auth','role:admin'])->group(function () {
    // //page admin dashboard 
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    // Route::post('/events/update-status/{id}', [AdminController::class, 'updateStatus'])->name('events.updateStatus');
    // Route::get('/admin/UserManager', [UserManagerController::class, 'index'])->name('admin.UserManager');
    // Route::post('/users/updateStatus/{id}', [UserManagerController::class, 'updateStatus'])->name('users.updateStatus');


});
Route::middleware(['auth','role:organizer'])->group(function () {
    // //page admin dashboard 
    Route::get('/organizer/dashboard', [OrganizerController::class, 'index']);
    // Route::post('/events/update-status/{id}', [AdminController::class, 'updateStatus'])->name('events.updateStatus');
    // Route::get('/admin/UserManager', [UserManagerController::class, 'index'])->name('admin.UserManager');
    // Route::post('/users/updateStatus/{id}', [UserManagerController::class, 'updateStatus'])->name('users.updateStatus');


});

require __DIR__.'/auth.php';
