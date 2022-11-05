<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\TestimonyController;
use App\Http\Controllers\Frontend\CancelController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\CancellationController;
use App\Http\Controllers\Frontend\AppointmentFrontendController;



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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FrontendController::class, 'index']);
Route::get('/services', [FrontendController::class, 'viewServices']);
Route::get('/contact', [FrontendController::class, 'viewContacts']);
Route::get('/about', [FrontendController::class, 'viewAbout']);
Route::get('set-appointment', [AppointmentFrontendController::class, 'index']);
Route::get('cancel-appointment', [CancelController::class, 'index']);
Route::view('/appointment-success', 'appointment-success')->name('appointment.success');
Route::view('/cancelled-appointment', 'cancelled-appointment')->name('cancelled.appointment');
Route::view('/cancelled-failed', 'failed')->name('cancelled.failed');
//Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function (){
    Route::get('dashboard', [DashboardController::class, 'index']);

    //Appointment Routes
    Route::get('appointments', [AppointmentController::class, 'index']);

    //services
    Route::get('/services', [ ServiceController::class, 'index']);
    Route::get('/testimonies', [ TestimonyController::class, 'index']);

    //Promotions
    Route::get('/promotions', [PromotionController::class, 'index']);

    //Cancellations
    Route::get('/cancellations', [CancellationController::class, 'index']);

    //Web Setting
    Route::get('/web-settings', [SettingController::class, 'index']);
    Route::post('/web-settings', [SettingController::class, 'store']);


});
