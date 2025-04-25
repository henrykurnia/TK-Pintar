<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;




// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected Routes (hanya untuk yang sudah login)
Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::get('/', function () {
    return view('landing.index');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/siswa', function () {
    return view('admin.siswa');
});

Route::get('/tambah', function () {
    return view('admin.tambah_siswa');
});

Route::get('/guru', function () {
    return view('admin.guru');
});

Route::get('/tambahguru', function () {
    return view('admin.tambah_guru');
});

Route::get('/artikel', function () {
    return view('admin.artikel');
});

Route::get('/tambahartikel', function () {
    return view('admin.tambah_artikel');
});

// Route::get('/login', function () {
//     return view('landing.login');
// });

Route::get('/profile', function () {
    return view('admin.profile');
});

// guru
Route::get('/siswa_guru', function () {
    return view('guru.siswa');
});

Route::get('/pengumuman', function () {
    return view('guru.pengumuman');
});

