<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\TruckDriverController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\GRRegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/login', function () {
//     return view('auth.login');
// });
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

// Route::get('/truck', function () {
//     return view('admin.truck.index');
// });
Route::get('/truck/create', function () {
    return view('admin.truck.create');
});
// Route::get('/driver', function () {
//     return view('admin.driver.index');
// });
Route::get('/driver/create', function () {
    return view('admin.driver.create');
});

Auth::routes();
//common controller
Route::get('/truck_no_search/{truck_no?}', [CommonController::class, 'truck_no_search'])->name('truck_no_search');

// admin login controller
Route::get('/', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
Route::get('/forgot-password', [AdminAuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/admin/forgot-password', [AdminAuthController::class, 'postForgetPasswordMail'])->name('forgotPassword');
Route::post('/checklogin', [AdminAuthController::class, 'postLogin'])->name('checklogin');
Route::get('logout', [AdminAuthController::class, 'logout'])->name('adminLogout');
Route::get('reset-password/{token}', [AdminAuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [AdminAuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
// end admin login controllr
Route::group(['prefix' => 'truck' ], function () {
    Route::get('/', [TruckController::class, 'index'])->name('admin.truck.index');
    Route::get('/create', [TruckController::class, 'create'])->name('admin.truck.create');
    Route::Post('/store', [TruckController::class, 'store'])->name('truck.store');
});
Route::group(['prefix' => 'driver' ], function () {
    Route::get('/', [TruckDriverController::class, 'index'])->name('admin.driver.index');
    Route::Post('/store', [TruckDriverController::class, 'store'])->name('driver.store');
    Route::get('/edit/{id?}', [TruckDriverController::class, 'edit'])->name('admin.driver.edit');
    Route::get('/delete_driver', [TruckDriverController::class, 'destroy'])->name('delete_driver');
    Route::post('/driver-status/{id?}', [TruckDriverController::class, 'updateStatus'])->name('admin.driver.driver-statuss');
    Route::get('/show/{id?}', [TruckDriverController::class, 'show'])->name('admin.driver.show');
});
Route::group(['prefix' => 'gr-register' ], function () {
    Route::match(['GET','POST'],'/listing', [GRRegistrationController::class, 'index'])->name('admin.gr-register.index');
    Route::match(['GET','POST'],'/store', [GRRegistrationController::class, 'store'])->name('admin.gr-register.store');
    Route::match(['GET','POST'],'/edit/{id}', [GRRegistrationController::class, 'edit'])->name('admin.gr-register.edit');
    Route::match(['GET','POST'],'/view/{id}', [GRRegistrationController::class, 'view'])->name('admin.gr-register.view');
    Route::post('find-hultone-according-to-quantity',[GRRegistrationController::class,'findHultoneAccordingToQuantity'])->name('admin.gr-register.findHultoneAccordingToQuantity');


    Route::match(['GET','POST'],'/hul-ton', [GRRegistrationController::class, 'hulTone'])->name('admin.gr-register.hulTone');
    Route::match(['GET','POST'],'/store-hul-tone', [GRRegistrationController::class, 'storeHulTone'])->name('admin.gr-register.storeHulTone');
    Route::post('check-exist-hul-tone', [GRRegistrationController::class, 'checkExistsHulTone'])->name('admin.gr-register.checkExistsHulTone');
    Route::post('check-tone-serial-number', [GRRegistrationController::class, 'checkToneSerialNumber'])->name('admin.gr-register.checkToneSerialNumber');
    Route::match(['GET','POST'],'/edit-hul-tone/{id?}', [GRRegistrationController::class, 'editHulTone'])->name('admin.gr-register.editHulTone');
    Route::post('delete-hul-tone',[GRRegistrationController::class,'deleteHulTone'])->name('admin.gr-register.deleteHulTone');

    Route::match(['GET','POST'],'/claim-penalty', [GRRegistrationController::class, 'claimPenalty'])->name('admin.gr-register.claimPenalty');
    
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
