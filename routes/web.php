<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;



// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected Routes (hanya untuk yang sudah login)
Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::post('/admin/hero/upload', [AdminController::class, 'uploadHero'])->name('admin.hero.upload');
    Route::delete('/admin/hero/{id}', [AdminController::class, 'deleteHero'])->name('admin.hero.delete');
    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

//

Route::prefix('guru')->middleware(['auth'])->group(function () {
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

Route::middleware('auth')->group(function () {
    // Student routes
    Route::prefix('siswa')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('siswa.index');  // Changed from '/siswa' to '/'
        Route::get('/tambah', [StudentController::class, 'create'])->name('siswa.create');
        Route::post('/tambah', [StudentController::class, 'store'])->name('siswa.store');
        Route::get('/{student}', [StudentController::class, 'show'])->name('siswa.show');
        Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('siswa.edit');
        Route::put('/{student}', [StudentController::class, 'update'])->name('siswa.update');
        Route::delete('/{student}', [StudentController::class, 'destroy'])->name('siswa.destroy');
    });

    // Other routes...
});

Route::get('/artikel/{id}', [ArticleController::class, 'showArticleDetail'])->name('landing.article.detail');

Route::get('/', [LandingController::class, 'index'])->name('landing.home');

// Route detail artikel
Route::get('/artikel/{id}', [LandingController::class, 'showArticle'])
    ->name('landing.article.detail');

Route::get('/berkas', function () {
    return view('landing.pendaftaran');
});



// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });

// Route::get('/siswa', function () {
//     return view('admin.siswa.index');
// });

// Route::get('/tambah', function () {
//     return view('admin.siswa.tambah_siswa');
// });

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

// Route::get('/user', function () {
//     return view('admin.user');
// });

Route::prefix('admin')->middleware('auth')->group(function () {
    // ... other admin routes

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('admin.profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');
});

// guru
Route::get('/siswa_guru', function () {
    return view('guru.siswa');
});

Route::get('/tambah_pengumuman', function () {
    return view('guru.pengumuman');
});

Route::get('/pengumuman', function () {
    return view('guru.index');
});

