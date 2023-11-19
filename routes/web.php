<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
 

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
 
Route::get('/', function () {

    if(Auth::user()->role == 'applicant')
    {
            if(Auth::user()->gender == '' || Auth::user()->dob == '')
                     return view('profile.edit');
            else
                     return view('dashboard'); 
    }
    else if(Auth::user()->role == 'agent'){

    }
    else
    return 404;
        

   
})->middleware(['auth','verified'])->name('dashboard');


    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profileUpdate', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/application', [ProfileController::class, 'edit'])->name('application');
Route::get('/loan', [ProfileController::class, 'edit'])->name('loan');
Route::get('/wallet', [ProfileController::class, 'edit'])->name('wallet');
Route::get('/transaction', [ProfileController::class, 'edit'])->name('transactions');

require __DIR__.'/auth.php';
