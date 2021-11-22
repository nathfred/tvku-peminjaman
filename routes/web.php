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
    return redirect()->route('login');
})->name('root-login');;

Route::get('/home', [UserController::class, 'home'])->name('home');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/back', [UserController::class, 'back'])->name('back-button');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// LOGISTIK
Route::group(['middleware' => ['auth', 'logistik'], 'prefix' => 'logistik'], function () {
    Route::get('/index', [DirectorController::class, 'index'])->name('logistik-index'); // INDEX

    // READ
    Route::get('/assignment/show', [DirectorController::class, 'show_assignments'])->name('director-show-assignments'); // ALL (TABLE)
    Route::get('/assignment/detail/{type}/{id}', [DirectorController::class, 'detail_assignment'])->name('director-detail-assignment'); // SINGLE (FORM)
    Route::post('/assignment/detail/{type}/{id}', [DirectorController::class, 'save_assignment'])->name('director-save-assignment'); // POST REQUEST SET PRIORITY AND APPROVAL

    // PRIORITY
    Route::get('/assignment/priority/{id}/{priority}', [DirectorController::class, 'priority_assignment'])->name('director-priority-assignment'); // SET ASSIGNMENT PRIORITY (BIASA/PENTING/SANGAT)

    // APPROVE
    Route::get('/assignment/approve/{id}/{approve}', [DirectorController::class, 'approve_assignment'])->name('director-approve-assignment'); // SET ASSIGNMENT APPROVAL (BOOLEAN)
});

require __DIR__ . '/auth.php';
