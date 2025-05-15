<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageUrlController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LearningOutcomeController;
use App\Http\Controllers\SupportCenterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FcmTokenController;

Route::post('/register-parent', [AuthController::class, 'registerParent']);
Route::post('/register-teacher', [AuthController::class, 'registerTeacher']);

Route::post('/forgot-password/check-email', [AuthController::class, 'checkEmail']);
Route::post('/forgot-password/verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('/forgot-password/resend-otp', [AuthController::class, 'checkEmail']);
Route::post('/forgot-password/new-password', [AuthController::class, 'setNewPassword']);

Route::group(['middleware' => 'api'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/check-token', [AuthController::class, 'checkToken']);
    // ... rute lainnya
});
Route::post('/logout', [AuthController::class, 'logout']);



Route::get('/articles', [ImageUrlController::class, 'getArticleImages']);



// Rute-rute yang memerlukan autentikasi
Route::middleware('auth:api')->group(function () {
    Route::get('user/{id}', [UserController::class, 'getUserById']);
    Route::post('save-fcm-token', [FcmTokenController::class, 'store']);
    Route::post('delete-fcm-token', [FcmTokenController::class, 'destroy']);
    Route::post('/send-notification', [NotificationController::class, 'send']);
    Route::post('/refresh-token', [AuthController::class, 'refresh']);
    Route::get('/my-student', [StudentController::class, 'MyStudents']);
    Route::get('/my-teacher', [TeacherController::class, 'myTeacher']);
    Route::get('/announcement', [AnnouncementController::class, 'studentAnnouncements']);
    Route::get('/announcement/all', [AnnouncementController::class, 'allAnnouncements']);
    Route::get('/teacher-staff', [TeacherController::class, 'teacherstaff']);
    Route::get('/detail-teacher/{id}', [TeacherController::class, 'getDetailTeacher']);
    Route::get('/schedule', [ScheduleController::class, 'getSchedule']);
    Route::get('/payment', [PaymentController::class, 'getPayment']);
    Route::get('/learning-outcomes', [LearningOutcomeController::class, 'getLearningOutcome']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/support-center', [SupportCenterController::class, 'help']);
    Route::put('/change-password', [UserController::class, 'changePassword']);
    Route::put('/student/profile', [StudentController::class, 'updateProfile']);
    Route::put('/teacher/profile', [TeacherController::class, 'updateProfile']);
});