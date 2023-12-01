<?php

use App\Http\Controllers\Adminauth\AuthenticatedSessionController;
use App\Http\Controllers\Adminauth\ConfirmablePasswordController;
use App\Http\Controllers\Adminauth\EmailVerificationNotificationController;
use App\Http\Controllers\Adminauth\EmailVerificationPromptController;
use App\Http\Controllers\Adminauth\NewPasswordController;
use App\Http\Controllers\Adminauth\PasswordController;
use App\Http\Controllers\Adminauth\PasswordResetLinkController;
use App\Http\Controllers\Adminauth\RegisteredUserController;
use App\Http\Controllers\Adminauth\VerifyEmailController;
use App\Http\Controllers\resetpasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    // Route::get('loginn', [AuthenticatedSessionController::class, 'create'])
    //             ->name('loginn');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::view('forgot-passwordd','admin.auth.forgetpassword')->name('forget-pass');
Route::view('login','admin.auth.login')->name('loginview');
    // Route::get('forgot-passwordd', [PasswordResetLinkController::class, 'create'])
    //             ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    //             ->name('password.reset');
    // انا الي عملتة علشان الصور الصفحات الي انا عملة مرضياش تتعرض
    Route::get('reset-password/{token}', [resetpasswordController::class, 'create'])
                 ->name('password.reset');

// Route::view('reset-password/{token}','front.auth.resat-pass')->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('admin')->group(function () {
  

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
