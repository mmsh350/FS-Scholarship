<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Action\WalletController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Action\DashboardController;

 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
Route::get('/',  [DashboardController::class, 'show'])->middleware(['auth','verified'])->name('dashboard');


    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profileUpdate', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/wallet', [WalletController::class, 'show'])->name('wallet');
    Route::post('/verifyPayments', [WalletController::class, 'verifyIndividual'])->name('verify');
});

Route::get('/application', [ProfileController::class, 'edit'])->name('application');
Route::get('/loan', [ProfileController::class, 'edit'])->name('loan');

Route::get('/transaction', [ProfileController::class, 'edit'])->name('transactions');

require __DIR__.'/auth.php';
