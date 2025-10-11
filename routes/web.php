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

use App\Http\Controllers\Doctor\DoctorAuthController;
use App\Http\Controllers\Doctor\DoctorAppointmentController;

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
Route::post('appointment_store',[FrontendController::class,'appointment_store'])->name ('appointment_store');
Route::get('appointment_ticket',[FrontendController::class,'appointment_ticket'])->name ('appointment_ticket');
// AJAX availability check for admin/create page
Route::post('appointment/check-availability', [AppointmentController::class, 'checkAvailability'])->name('appointment.check_availability');
// AJAX route to fetch doctor schedules
Route::get('doctor/{id}/schedules', [FrontendController::class, 'doctorSchedules'])->name('doctor.schedules');




Route::resource('doctor', DoctorController::class);
Route::resource('patient', PatientController::class);
Route::resource('service', ServiceController::class);
Route::resource('doctorSchedule', DoctorScheduleController::class);
Route::resource('appointment', AppointmentController::class);
Route::resource('prescription', PrescriptionController::class);
Route::resource('prescriptionMedicine', PrescriptionMedicineController::class);
Route::resource('payment', PaymentController::class);





Route::get('doctor_panel/login',[DoctorAuthController::class,'login'])->name ('doctor_panel.login');
Route::post('doctor_panel/login',[DoctorAuthController::class,'checkLogin'])->name ('doctor_panel.login');
Route::get('doctor_panel/logout',[DoctorAuthController::class,'logout'])->name ('doctor_panel.logout');



Route::middleware('auth:doctor')->group(function () {

    Route::get('doctor_panel/dashboard',[DoctorAuthController::class,'dashboard'])->name('doctor_panel.dashboard');

    Route::resource('doctor_panel/prescription', DoctorAuthController::class);

    Route::resource('doctor_panel/appointment', DoctorAppointmentController::class,['as'=>'doctor_panel']);


    // Route::get('home', [HomeController::class, 'index'])->name('home');
});





Auth::routes();
Route::middleware('auth:web')->group(function () {

    Route::get('dashboard',[BackendController::class,'index'])->name('dashboard');

    Route::get('home', [HomeController::class, 'index'])->name('home');
});
