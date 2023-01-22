<?php

use App\Http\Controllers\Medic\AccountController;
use App\Http\Controllers\Medic\AppointmentController;
use App\Http\Controllers\Medic\DashboardController;
use App\Http\Controllers\Medic\MembershipController;
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
    Route::get('/appointments', [AppointmentController::class, 'list'])->name('medic.appointments.list');
    // Refuse
    Route::put('/appointments/refuse/{id}', [AppointmentController::class, 'refuse'])->name('medic.appointments.refuse');
    Route::put('/appointments/accept/{id}', [AppointmentController::class, 'accept'])->name('medic.appointments.accept');

    // Add member
    Route::post('/memberships', [MembershipController::class, 'create'])->name('medic.memberships.create');

    // Patients
    // My Patients
    Route::get('/pacientii-mei', [MembershipController::class, 'list'])->name('medic.patients.list');

    Route::get('/istoric-consultatii/{membershipId}', [PatientController::class, 'history'])->name('medic.patients.history');

});



