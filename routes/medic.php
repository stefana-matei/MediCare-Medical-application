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
    // Update
    Route::put('/account', [AccountController::class, 'update'])->name('medic.account.update');


    // Appointments
    Route::get('/appointments', [AppointmentController::class, 'list'])->name('medic.appointments.list');
    Route::get('/appointments/{id}/edit', [AppointmentController::class, 'updateView'])->name('medic.appointments.updateView');
    Route::put('/appointments/{id}', [AppointmentController::class, 'update'])->name('medic.appointments.update');
    // Refuse
    Route::put('/appointments/{id}/refuse', [AppointmentController::class, 'refuse'])->name('medic.appointments.refuse');
    Route::put('/appointments/{id}/accept', [AppointmentController::class, 'accept'])->name('medic.appointments.accept');

    // Add member
    Route::post('/memberships', [MembershipController::class, 'create'])->name('medic.memberships.create');

    // Patients
    // My Patients
    Route::get('/pacientii-mei', [MembershipController::class, 'list'])->name('medic.patients.list');

    Route::get('/istoric-consultatii/{membershipId}', [PatientController::class, 'history'])->name('medic.patients.history');

});



