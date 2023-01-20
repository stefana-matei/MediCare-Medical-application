<?php

use App\Http\Controllers\Medic\AccountController;
use App\Http\Controllers\Medic\AppointmentController;
use App\Http\Controllers\Medic\DashboardController;
use App\Http\Controllers\Medic\PatientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Medic Routes
|--------------------------------------------------------------------------
*/

Route::prefix('medic')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('medic.dashboard');

    // Account
    // UpdateView
    Route::get('/account/edit', [AccountController::class, 'updateView'])->name('medic.updateView');

    // Appointments
    // List
    Route::get('/appointments', [AppointmentController::class, 'list'])->name('medic.appointments.list');
    // Create
//    Route::post('/appointments', [AppointmentController::class, 'create'])->name('appointments.create');
    // CreateView
//    Route::get('/appointments/create', [AppointmentController::class, 'createView'])->name('appointments.createView');
    // Get
//    Route::get('/appointments/{id}', [AppointmentController::class, 'get'])->name('appointments.get');
    // Delete
//    Route::delete('/appointments/{id}', [AppointmentController::class, 'delete'])->name('appointments.delete');

    // Patients
    // My Patients
    Route::get('/pacientii-mei', [PatientController::class, 'myPatients'])->name('patients.myPatients');

    Route::get('/istoric-consultatii/{membershipId}', [PatientController::class, 'history'])->name('patients.history');

});



