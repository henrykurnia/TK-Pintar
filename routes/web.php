<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ArticleController;


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

Route::prefix('guru')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('guru.index');
    Route::get('/tambah', [TeacherController::class, 'create'])->name('guru.create');
    Route::post('/tambah', [TeacherController::class, 'store'])->name('guru.store');
    Route::get('/{id}', [TeacherController::class, 'show'])->name('guru.show');
    Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('guru.edit');
    Route::put('/update/{id}', [TeacherController::class, 'update'])->name('guru.update');
    Route::delete('/delete/{id}', [TeacherController::class, 'destroy'])->name('guru.destroy');
});

Route::get('/guru-staff', [TeacherController::class, 'showOnLanding'])->name('landing.guru');

Route::prefix('artikel')->middleware(['auth'])->group(function () {
    // Articles Routes
    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

Route::get('/', function () {
    return view('landing.index');
});


Route::get('/berkas', function () {
    return view('landing.pendaftaran');
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

// Route::get('/guru', function () {
//     return view('admin.guru.guru');
// });

// Route::get('/tambahguru', function () {
//     return view('admin.guru.tambah_guru');
// });

// Route::get('/artikel', function () {
//     return view('admin.artikel');
// });

// Route::get('/tambahartikel', function () {
//     return view('admin.tambah_artikel');
// });

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

