<?php

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/memberships', ['App\Http\Controllers\MembershipController', 'list']);
Route::get('/memberships/{id}', ['App\Http\Controllers\MembershipController', 'membershipsToId']);
//Route::delete('/memberships/{id}', ['App\Http\Controllers\MembershipController', 'delete']);

// rute get pentru celelalte
Route::get('/visits', ['App\Http\Controllers\VisitController', 'list']);

Route::get('/record', ['App\Http\Controllers\RecordController', 'list']);



