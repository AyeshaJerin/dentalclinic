<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\BackendController;
use  App\Http\Controllers\DoctorController;
use  App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PrescriptionMedicineController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('welcome',[FrontendController::class,'welcome'])->name ('welcome');
Route::get('doctors',[FrontendController::class,'doctors'])->name ('doctors');
Route::get('application',[FrontendController::class,'application'])->name ('application');




Route::resource('doctor', DoctorController::class);
Route::resource('patient', PatientController::class);
Route::resource('service', ServiceController::class);
Route::resource('doctorSchedule', DoctorScheduleController::class);
Route::resource('appointment', AppointmentController::class);
Route::resource('prescription', PrescriptionController::class);
Route::resource('prescriptionMedicine', PrescriptionMedicineController::class);
Route::resource('payment', PaymentController::class);

Auth::routes();
Route::middleware('auth:web')->group(function () {

    Route::get('dashboard',[BackendController::class,'index'])->name('dashboard');

    Route::get('home', [HomeController::class, 'index'])->name('home');
});
