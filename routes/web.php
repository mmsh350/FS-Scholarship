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
use App\Http\Controllers\Action\LoanController;
use App\Http\Controllers\Action\SchoolController;
use App\Http\Controllers\Action\UserController;
use App\Http\Controllers\AppNotificationController;

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
    Route::get('admin-error')->name('admin.error');
    //General  Dashboard
    Route::get('/',  [DashboardController::class, 'show'])->name('dashboard');
    
    Route::get('users',  [UserController::class, 'show'])->name('admin.users');
    Route::get('admin-applications', [ApplicationController::class, 'show'])->name('admin.applications');
    Route::get('admin-activities', [ApplicationController::class, 'show'])->name('admin.activities');
    Route::get('admin-schools', [ApplicationController::class, 'show'])->name('admin.schools');
   
    Route::get('get-users', [UserController::class, 'getUserDetails'])->name('get-users');
    Route::post('verifyEmail', [UserController::class, 'verifyEmail'])->name('verifyEmail');
    Route::post('activateUser', [UserController::class, 'enableDisableUser'])->name('activateUser');
    Route::post('updateUser', [UserController::class, 'updateUser'])->name('updateUser');
    Route::post('createUser', [UserController::class, 'save'])->name('createUser');


     
    Route::get('admin-applications-verify', [ApplicationController::class, 'approvedlist'])->name('admin.applications-verify');
    Route::get('get-application-data', [ApplicationController::class, 'getApplicationData'])->name('get-application-data');
    Route::post('repay-data', [ApplicationController::class, 'repaylist'])->name('repay-data');
    Route::get('approval-data', [ApplicationController::class, 'approvalData'])->name('approval-data');
    Route::post('disburse', [ApplicationController::class, 'disburse'])->name('disburse');


    Route::post('send-reminder', [ApplicationController::class, 'reminder'])->name('send-reminder');
   
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
    Route::post('/reject-offer', [ApplicationController::class, 'rejectOffer'])->name('reject-offer');


    Route::post('/read', [AppNotificationController::class, 'read'])->name('read');

    //Transaction Histories
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');

    //Staff Routes
    Route::get('staff-applications', [ApplicationController::class, 'show'])->name('staff.applications');
    Route::get('staff-applications-verify', [ApplicationController::class, 'verifiedlist'])->name('staff.applications-verify');
    Route::get('get-application', [ApplicationController::class, 'getApplicationDetails'])->name('get-application');
    Route::get('get-agentProfile', [AgentController::class, 'getAgentDetails'])->name('get-agentDetails');
    Route::get('staff-schools', [ApplicationController::class, 'show'])->name('staff.schools');
    
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


    Route::get('/loan', [LoanController::class, 'show'])->name('loan');
    Route::post('/make-repayment', [LoanController::class, 'repayment'])->name('make-repayment');

    
});




// Route::get('/emails', function(){
//     return view('emails.newAgent');
// });



require __DIR__.'/auth.php';
