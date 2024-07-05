<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Appointment;
use App\Http\Controllers\Doctor;


//Patient Routes
Route::get('/', [PatientController::class, 'index'])->name('patient-login');
Route::get('/register', [PatientController::class, 'register'])->name('patient-register');
Route::post('/register', [PatientController::class, 'save_register'])->name('patient.save');
Route::post('/', [PatientController::class, 'login'])->name('login');

//Appoinment Routes
Route::get('/dashboard', [Appointment::class, 'index'])->name('dashboard');
Route::post('/book-appointment', [Appointment::class, 'saveAppointment'])->name('appointment.book');

//Doctor
Route::get('/doctor-login',[Doctor::class,'index'])->name('Doctor-login');
Route::post('/doctor-login',[Doctor::class,'login'])->name('Dr-login');
Route::get('/doctor-Dashboard',[Doctor::class,'dashboard'])->name('Doctor-dashboard');
Route::get('/appointments', [Appointment::class, 'showAppointments'])->name('appointments.index');
Route::post('/appointments/reject/{id}', [Appointment::class, 'reject'])->name('appointments.reject');
Route::get('/appointments/{id}/edit', [Appointment::class, 'edit'])->name('appointments.edit');
Route::put('/appointments/{id}', [Appointment::class, 'update'])->name('appointments.update');
Route::post('/logout', [Appointment::class, 'logout'])->name('logout');
Route::get('/appointments/by-date/{date?}', [Appointment::class, 'showAppointmentsByDate'])->name('appointments.by-date');




