<?php

use App\Http\Controllers\Patient\AccountController;
use App\Http\Controllers\Patient\AppointmentController;
use App\Http\Controllers\Patient\DashboardController;
use App\Http\Controllers\Patient\MedicController;
use App\Http\Controllers\Patient\MembershipController;
use App\Http\Controllers\Patient\RecordController;
use App\Http\Controllers\Patient\ServiceController;
use App\Http\Controllers\Patient\VisitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Patient Routes
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Account
// UpdateView
Route::get('/account/edit', [AccountController::class, 'updateView'])->name('account.updateView');
// Update
Route::put('/account', [AccountController::class, 'update'])->name('account.update');
// UpdateAvatar
Route::put('/account/avatar', [AccountController::class, 'updateAvatar'])->name('account.updateAvatar');
// UpdatePassword
Route::put('/account/password', [AccountController::class, 'updatePassword'])->name('account.updatePassword');


// Membership
// CreateView
Route::get('/memberships/create', [MembershipController::class, 'createView'])->name('memberships.createView');
// Create
Route::post('/memberships', [MembershipController::class, 'create'])->name('memberships.create');
// Get
Route::get('/memberships/{id}', [MembershipController::class, 'get'])->name('memberships.get');
// List
//Route::get('/memberships', [MembershipController::class, 'list'])->name('memberships.list');
// Update
Route::put('/memberships/{id}', [MembershipController::class, 'update'])->name('memberships.update');
// UpdateView
Route::get('/memberships/{id}/edit', [MembershipController::class, 'updateView'])->name('memberships.updateView');
// Delete
Route::delete('/memberships/{id}', [MembershipController::class, 'delete'])->name('memberships.delete');

// Visits
// CreateView
Route::get('/visits/create', [VisitController::class, 'createView'])->name('visits.createView');
// Create
Route::post('/visits', [VisitController::class, 'create'])->name('visits.create');
// Get
Route::get('/visits/{id}', [VisitController::class, 'get'])->name('visits.get');
// List
Route::get('/visits', [VisitController::class, 'list'])->name('visits.list');
// Update
Route::put('/visits/{id}', [VisitController::class, 'update'])->name('visits.update');
// UpdateView
Route::get('/visits/{id}/edit', [VisitController::class, 'updateView'])->name('visits.updateView');
// Delete
Route::delete('/visits/{id}', [VisitController::class, 'delete'])->name('visits.delete');


//Appointments
//List
Route::get('/appointments', [AppointmentController::class, 'list'])->name('appointments.list');
// Create
Route::post('/appointments', [AppointmentController::class, 'create'])->name('appointments.create');
// CreateView
Route::get('/appointments/create', [AppointmentController::class, 'createView'])->name('appointments.createView');
// Get
Route::get('/appointments/{id}', [AppointmentController::class, 'get'])->name('appointments.get');
// Delete
Route::delete('/appointments/{id}', [AppointmentController::class, 'delete'])->name('appointments.delete');


// Record
// Get
Route::get('/visits/{visit_id}/record', [RecordController::class, 'get'])->name('visits.record.get');
// CreateView
Route::get('/visits/{visit_id}/record/create', [RecordController::class, 'createView'])->name('visits.record.createView');
// Create
Route::post('/visits/{visit_id}/record', [RecordController::class, 'create'])->name('visits.record.create');
// Delete
Route::delete('/visits/{visit_id}/record', [RecordController::class, 'delete'])->name('visits.record.delete');
// Upload
Route::post('/visits/{visit_id}/record/upload', [RecordController::class, 'uploadFile'])->name('visits.record.uploadFile');


// Medics
// Get
Route::get('/medici/{id}', [MedicController::class, 'get'])->name('medics.get');
// List
Route::get('/medici', [MedicController::class, 'list'])->name('medics.list');
// My Medics
Route::get('/medicii-mei', [MedicController::class, 'myMedics'])->name('medics.myMedics');


// Services
// List
Route::get('/services', [ServiceController::class, 'list'])->name('services.list');



