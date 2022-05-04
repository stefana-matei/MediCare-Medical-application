<?php

use App\Http\Controllers\MembershipController;
use App\Http\Controllers\VisitController;
use App\Services\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    if (Auth::user()->isMedic()) {
        return view('authenticated.medic.dashboard');
    } else {
        return view('authenticated.patient.dashboard');
    }

})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// membership
// CreateView
Route::get('/memberships/create', [MembershipController::class, 'createView'])->name('memberships.createView');
// Create
Route::post('/memberships', [MembershipController::class, 'create'])->name('memberships.create');
// Get
Route::get('/memberships/{id}', [MembershipController::class, 'get'])->name('memberships.get');
// List
Route::get('/memberships', [MembershipController::class, 'list'])->name('memberships.list');
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



