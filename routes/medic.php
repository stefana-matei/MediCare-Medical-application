<?php

use App\Http\Controllers\Medic\AccountController;
use App\Http\Controllers\Medic\DashboardController;
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

});



