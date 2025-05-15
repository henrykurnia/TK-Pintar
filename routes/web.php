<?php

use App\Http\Controllers\ValueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\ForgotPasswordController;



// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Lupa Password Routes
Route::get('/password/otp', [ForgotPasswordController::class, 'showOtpRequestForm'])->name('password.otp');
Route::post('/password/otp', [ForgotPasswordController::class, 'sendOtp']);
Route::get('/password/reset', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class, 'resetPassword']);

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

//gurulanding
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

// article
Route::prefix('artikel')->middleware(['auth'])->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
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

// Route untuk data siswa
Route::prefix('siswa')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('siswa.index');
    Route::get('/create', [StudentController::class, 'create'])->name('siswa.create');
    Route::get('/atur-kelas', [StudentController::class, 'editClass'])->name('siswa.atur_kelas');
    Route::post('/atur-kelas', [StudentController::class, 'updateClass'])->name('siswa.update_kelas');
});

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



Route::prefix('pengumuman')->middleware('auth')->group(function () {
    Route::get('/', [AnnouncementController::class, 'index'])->name('pengumuman.index');
    Route::get('/tambah', [AnnouncementController::class, 'create'])->name('pengumuman.create');
    Route::post('/', [AnnouncementController::class, 'store'])->name('pengumuman.store');
    Route::get('/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('pengumuman.edit');
    Route::put('/{announcement}', [AnnouncementController::class, 'update'])->name('pengumuman.update');
    Route::delete('/{announcement}', [AnnouncementController::class, 'destroy'])->name('pengumuman.destroy');
});

Route::prefix('hblajar')->middleware('auth')->group(function () {
    // Hasil Belajar Routes
    Route::get('/', [ValueController::class, 'index'])
        ->name('hasil-belajar.index');

    Route::get('/input/{student}', [ValueController::class, 'inputNilai'])
        ->name('hasil-belajar.input');

    Route::post('/simpan/{student}', [ValueController::class, 'simpanNilai'])
        ->name('hasil-belajar.simpan');
});

Route::prefix('pembayaran')->middleware('auth')->group(function () {
    // Pembayaran Routes
    Route::get('/', [PaymentController::class, 'index'])->name('pembayaran.index');
    Route::get('/input/{student}', [PaymentController::class, 'create'])->name('pembayaran.create');
    Route::post('/simpan/{student}', [PaymentController::class, 'store'])->name('pembayaran.store');
});

// Route::get('/add_pengumuman', function () {
//     return view('admin.tambah_pengumuman');
// });

// Route::get('/index_pengumuman', function () {
//     return view('admin.pengumuman');
// });

