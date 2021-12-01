<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('dashboard');
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
    Route::get('/item/show', [LogistikController::class, 'show_items'])->name('logistik-items'); // READ ALL (TABLE)
    Route::get('/item/create', [LogistikController::class, 'create_item'])->name('logistik-create-item'); // CREATE NEW ITEM (FORM)
    Route::get('/item/detail/{id}', [LogistikController::class, 'detail_item'])->name('logistik-detail-item'); // SHOW SINGLE (FORM)
    Route::post('/item/detail/{id}', [LogistikController::class, 'save_item'])->name('logistik-save-item'); // POST REQUEST EDIT ITEM
    Route::get('/item/delete/{id}', [LogistikController::class, 'delete_item'])->name('logistik-delete-item'); // DELETE SINGLE ITEM
});

// PDF EXPORT 
Route::group(['middleware' => ['auth']], function () {
    Route::get('/pdf/view/{id}', [UserController::class, 'test_DOMPDF'])->name('test-DOMPDF');
    Route::get('/pdf/show/{id}', [DOMPDFController::class, 'show_pdf'])->name('show-pdf');
});

require __DIR__ . '/auth.php';
