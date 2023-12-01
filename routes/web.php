<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FrontCotroller;
use App\Http\Controllers\ProfileController;
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




// Route::prefix('/front')->name('front.')-> middleware('auth')-> group(function () {
//     Route::get('/', FrontCotroller::class)->  middleware('auth')-> name('index');
//     Route::view('login','front.auth.login');
//     Route::view('register','front.auth.register');
//     Route::view('forgetpassword','front.auth.forgetpassword');
    
// });
Route::prefix('/admin')->name('admin.')-> group(function () {
    Route::get('/', AdminController::class)->middleware('admin')->name('index');
    Route::view('login','admin.auth.login');
         Route::view('register','admin.auth.register');
         Route::view('forgetpassword','admin.auth.forgetpassword');
         require __DIR__.'/AdminAuth.php';
});





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

require __DIR__.'/auth.php';

