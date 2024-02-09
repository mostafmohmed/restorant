<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\Catagoryp;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\front\FrontendCategoryController;
use App\Http\Controllers\front\FrontendMenuController;
use App\Http\Controllers\front\FrontendReservationController;
use App\Http\Controllers\front\WelcomeController;
use App\Http\Controllers\FrontCotroller;
use App\Http\Controllers\MassageController;
use App\Http\Controllers\menuecontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\querycontroller;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/query', [querycontroller::class, 'index']);


Route::prefix('/front')-> middleware('auth')-> group(function () {
    
    Route::get('/', FrontCotroller::class)->  middleware('auth')-> name('index');
    Route::view('login','front.auth.login');
    Route::view('register','front.auth.register');
    Route::view('forgetpassword','front.auth.forgetpassword');
    Route::get('massage',MassageController::class)->name('massage');








    
    Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
    Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
    Route::get('/reservation/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
    Route::post('/reservation/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
    Route::get('/reservation/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
    Route::post('/reservation/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
    Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');









    // Route::get('menue',menuecontroller::class)->name('massage');
    
 });
 
//  Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//        //  'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function(){ 
       


        
//     });
 
 
    Route::get('/table',function(){
        return view('admin.table.index');
     });
     Route::get('/revertion',function(){
        return view('admin.Reservation.index');
     });
   
    
Route::prefix('/admin')->name('admin.')-> group(function () {
    Route::get('/', AdminController::class)->middleware('admin')->name('index');
    // Route::get('/menue',function(){
    //     return view('admin.menues.index');
    //  });
     Route::get('/menue',[MenuController::class,'index']);
     Route::post('/menuecreate',[MenuController::class,'store']);
     Route::get('/menueedite{id}',[MenuController::class,'edit']);
     Route::get('/menueshow{id}',[MenuController::class,'show'])->name('menueshow');
     Route::post('/menueupdate',[MenuController::class,'update']);
     Route::delete('/delete-menue{id}',[MenuController::class,'destroy']);
     /////////////////////////////////
     Route::get('/table',[TableController::class,'index']);
     Route::post('/tablecreate',[TableController::class,'store']);
     Route::get('/tableedite{id}',[TableController::class,'edit']);
     Route::post('/tableupdate',[TableController::class,'update']);
     Route::delete('/delete-table{id}',[TableController::class,'delett']);





     Route::get('/reservations',[ReservationController::class,'index']);
     Route::post('/reservationscreate',[ReservationController::class,'store']);
     Route::get('/reservationsedite{id}',[ReservationController::class,'edit']);
     Route::post('/reupdate',[ReservationController::class,'update'])->name('rev');
     Route::delete('/delete-reservation{id}',[ReservationController::class,'delett']);






     
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

