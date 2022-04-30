<?php

use App\Http\Controllers\MembershipController;
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


// CreateView
Route::get('/memberships/create', [MembershipController::class, 'createView'])->name('memberships.createView');
// Create
Route::post('/memberships', [MembershipController::class, 'create'])->name('memberships.create');
// Get
Route::get('/memberships/{id}', [MembershipController::class, 'get'])->name('memberships.get');
// List
Route::get('/memberships', [MembershipController::class, 'list'])->name('memberships.list');
// Update
//Route::put('/memberships/{id}', [MembershipController::class, 'update'])->name('memberships.update');
// UpdateView
//Route::get('/memberships/{id}/edit', [MembershipController::class, 'updateView'])->name('memberships.updateView');
// Delete
Route::delete('/memberships/{id}', [MembershipController::class, 'delete'])->name('memberships.delete');


// rute get pentru celelalte
Route::get('/visits', ['App\Http\Controllers\VisitController', 'list']);

Route::get('/record', ['App\Http\Controllers\RecordController', 'list']);



