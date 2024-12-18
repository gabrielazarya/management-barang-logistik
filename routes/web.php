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
Route::get('/tambah', [AdminController::class, 'tambah'])->name('tambah')->middleware(RoleMiddleware::class . ':admin');
Route::post('/tambah', [AdminController::class, 'tambahData'])->name('tambahData')->middleware(RoleMiddleware::class . ':admin');
Route::get('/konfirmasi', [AdminController::class, 'konfirmasi'])->name('konfirmasi')->middleware(RoleMiddleware::class . ':admin');
Route::get('/riwayat', [AdminController::class, 'riwayat'])->name('adminRiwayat')->middleware(RoleMiddleware::class . ':admin');

Route::patch('/konfirmasi/{id}/confirm', [AdminController::class, 'confirmBorrowing'])->name('confirmBorrowing')->middleware(RoleMiddleware::class . ':admin');
Route::patch('/konfirmasi/{id}/reject', [AdminController::class, 'rejectBorrowing'])->name('rejectBorrowing')->middleware(RoleMiddleware::class . ':admin');

Route::get('/barang/{id}/edit', [AdminController::class, 'editData'])->name('editData')->middleware(RoleMiddleware::class . ':admin');
Route::put('/barang/{id}', [AdminController::class, 'updateData'])->name('updateData')->middleware(RoleMiddleware::class . ':admin');
Route::delete('/barang/{id}', [AdminController::class, 'deleteData'])->name('deleteData')->middleware(RoleMiddleware::class . ':admin');

// user view
Route::get('/ketersediaan', [UserController::class, 'ketersediaan'])->name('ketersediaan')->middleware(RoleMiddleware::class . ':user');
Route::get('/pinjam', [UserController::class, 'pinjam'])->name('pinjam')->middleware(RoleMiddleware::class . ':user');
Route::post('/pinjam', [UserController::class, 'prosesPinjam'])->name('prosesPinjam')->middleware(RoleMiddleware::class . ':user');
Route::get('/riwayat-peminjaman', [UserController::class, 'riwayat'])->name('userRiwayat')->middleware(RoleMiddleware::class . ':user');
Route::get('/cetak-peminjaman/{id_pinjam}', [UserController::class, 'cetakPDF'])->name('cetakPeminjaman')->middleware(RoleMiddleware::class . ':user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
