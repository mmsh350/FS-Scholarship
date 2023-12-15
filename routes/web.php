<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Action\WalletController;
use App\Http\Controllers\Action\DashboardController;
use App\Http\Controllers\Action\ApplicationController;
use App\Http\Controllers\Action\TransactionController;
use App\Http\Controllers\Action\AgentController;

use App\Http\Controllers\Action\StateController;
use App\Http\Controllers\Action\LgaController;
use App\Http\Controllers\Action\CountriesController;
use App\Http\Controllers\Action\SchoolController;
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
 

    Route::middleware(['auth','verified'])->group(function () {

    //Applicant Dashboard
    Route::get('/',  [DashboardController::class, 'show'])->name('dashboard');

    //Profile Routes  (General) 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profileUpdate', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Wallet Routes (Applicant)
    Route::get('/wallet', [WalletController::class, 'show'])->name('wallet');
    Route::post('/verifyPayments', [WalletController::class, 'verify'])->name('verify');

    //Application Routes
    Route::get('/application', [ApplicationController::class, 'show'])->name('application');
    Route::post('/app-handler', [ApplicationController::class, 'store'])->name('app-handler');
    Route::post('/make-payment', [ApplicationController::class, 'initialFee'])->name('make-payment');

    //Transaction Histories
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');

    //Staff Routes
    Route::get('staff-applications', [ApplicationController::class, 'show'])->name('staff.applications');
    Route::get('staff-applications-verify', [ApplicationController::class, 'verifiedlist'])->name('staff.applications-verify');
    Route::get('get-application', [ApplicationController::class, 'getApplicationDetails'])->name('get-application');
    
    Route::post('verify', [ApplicationController::class, 'verifyApp'])->name('verify-app');
    
    //Staff => Agents
    Route::get('agents', [AgentController::class, 'index'])->name('staff.agents');
    Route::post('add-agent', [AgentController::class, 'save'])->name('agent.list');

    Route::get('staff/schools', [ApplicationController::class, 'show'])->name('staff.schools');

    //Utility Routes
    Route::post('get-state', [StateController::class, 'fetchState']);
    Route::post('get-lga', [LgaController::class, 'fetchLgas']);
    Route::post('get-countries', [CountriesController::class, 'fetchCountry']);
    Route::post('get-schools', [SchoolController::class, 'fetchSchools']);


    Route::get('/loan', [ProfileController::class, 'edit'])->name('loan');

    
});




// Route::get('/emails', function(){
//     return view('emails.newAgent');
// });



require __DIR__.'/auth.php';
