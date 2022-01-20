<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\DOMPDFController;
use App\Http\Controllers\LogistikController;

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
    return redirect()->route('login');
})->middleware(['auth'])->name('dashboard');

// LOGISTIK
Route::group(['middleware' => ['auth', 'logistik'], 'prefix' => 'logistik'], function () {
    Route::get('/index', [LogistikController::class, 'index'])->name('logistik-index'); // INDEX

    // LOAN
    Route::get('/loan/show', [LogistikController::class, 'show_loans'])->name('logistik-show-loans'); // READ ALL (TABLE)
    Route::get('/loan/detail/{id}', [LogistikController::class, 'detail_loan'])->name('logistik-detail-loan'); // SHOW SINGLE (FORM)
    Route::post('/loan/detail/{id}', [LogistikController::class, 'set_item_loan_code'])->name('logistik-set-code'); // SET ITEM LOAN CODE & LOAN APPROVAL (BOOLEAN)
    Route::get('/loan/set_approval/{id}/{approval}', [LogistikController::class, 'approve_loan'])->name('logistik-approve-loan'); // SET LOAN APPROVAL (BOOLEAN)
    Route::get('/loan/delete/{id}', [LogistikController::class, 'delete_loan'])->name('logistik-delete-loan'); // DELETE SINGLE LOAN

    // ITEMS
    Route::get('/item/show', [LogistikController::class, 'show_items'])->name('logistik-show-items'); // READ ALL (TABLE)
    Route::get('/item/create', [LogistikController::class, 'create_item'])->name('logistik-create-item'); // CREATE NEW ITEM (FORM)
    Route::post('/item/create', [LogistikController::class, 'store_item'])->name('logistik-store-item'); // POST CREATE ITEM
    Route::get('/item/detail/{id}', [LogistikController::class, 'detail_item'])->name('logistik-detail-item'); // SHOW SINGLE (FORM)
    Route::post('/item/detail/{id}', [LogistikController::class, 'save_item'])->name('logistik-save-item'); // POST REQUEST EDIT ITEM
    Route::get('/item/delete/{id}', [LogistikController::class, 'delete_item'])->name('logistik-delete-item'); // DELETE SINGLE ITEM
});

// DIVISI
Route::group(['middleware' => ['auth', 'divisi'], 'prefix' => 'divisi'], function () {
    Route::get('/index', [DivisiController::class, 'index'])->name('divisi-index'); // INDEX

    // LOAN
    Route::get('/loan/show', [DivisiController::class, 'show_loans'])->name('divisi-show-loans'); // READ ALL (TABLE)
    Route::get('/loan/create', [DivisiController::class, 'create_loan'])->name('divisi-create-loan'); // CREATE SINGLE LOAN (FORM)
    Route::post('/loan/create', [DivisiController::class, 'store_loan'])->name('divisi-store-loan'); // POST CREATE LOAN
    Route::get('/loan/detail/{id}', [DivisiController::class, 'detail_loan'])->name('divisi-detail-loan'); // SHOW SINGLE (EDIT FORM)
    Route::post('/loan/detail/{id}', [DivisiController::class, 'save_loan'])->name('divisi-save-loan'); // POST REQUEST EDIT LOAN
    Route::get('/loan/delete/{id}', [DivisiController::class, 'delete_loan'])->name('divisi-delete-loan'); // DELETE SINGLE LOAN
});

// SUPER ACTIVITY USES SUPERCONTROLLER
Route::group(['middleware' => ['auth', 'super'], 'prefix' => 'super'], function () {
    Route::get('/index', [SuperController::class, 'index'])->name('super-index');

    Route::get('/show/user/{id}', [SuperController::class, 'show_user'])->name('super-show-user');

    Route::post('/edit/user/{id}', [SuperController::class, 'edit_user'])->name('super-edit-user');
    Route::post('/save/user', [SuperController::class, 'save_user'])->name('super-save-user');

    Route::get('/edit/user/password/{id}', [SuperController::class, 'edit_user_password'])->name('super-edit-user-password');
    Route::post('/save/user/password/{id}', [SuperController::class, 'save_user_password'])->name('super-save-user-password');

    Route::get('/delete/user/{id}', [SuperController::class, 'delete_user'])->name('super-delete-user');
});

// PDF EXPORT 
Route::group(['middleware' => ['auth']], function () {
    Route::get('/pdf/create/{id}', [DOMPDFController::class, 'createPDF'])->name('create-pdf');
    Route::get('/pdf/test/{id}', [DOMPDFController::class, 'test_pdf'])->name('test-pdf');
    Route::get('/pdf/show/{id}', [DOMPDFController::class, 'show_pdf'])->name('show-pdf');
});

require __DIR__ . '/auth.php';
