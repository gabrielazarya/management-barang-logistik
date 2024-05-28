<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\RoleMiddleware;

// guest view
Route::get('/', [GuestController::class, 'index'])->name('guestDashboard');
Route::get('/tentang', [GuestController::class, 'tentang'])->name('guestTentang');

// admin view
Route::get('/informasi', [AdminController::class, 'informasi'])->name('informasi')->middleware(RoleMiddleware::class . ':admin');

// user view
Route::get('/ketersediaan', [UserController::class, 'ketersediaan'])->name('ketersediaan')->middleware(RoleMiddleware::class . ':user');


// Route::get('/', function() {
//     return view('welcome');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
