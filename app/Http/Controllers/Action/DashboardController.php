<?php

namespace App\Http\Controllers\Action;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function show(Request $request)
    {    
         $loginUserId = Auth::user()->id;
         
        if(Auth::user()->role == 'applicant')
        {
            if(Auth::user()->gender == '' || Auth::user()->dob == '')
            {
                return view('profile.edit');
            }else
            {
                 if (DB::table('wallets')->where('userid', '=', $loginUserId)->exists()) {
                      
                      //get requested user Wallet Balance information
                      $user = DB::table('wallets')->find($loginUserId);
                      $balance = $user->balance;
                      return view('dashboard',compact('balance')); 
                        
                 }else
                 {
                     $balance = 0;
                     return view('dashboard',compact('balance')); 
                 }
    
        }            
    }
    else if(Auth::user()->role == 'agent'){

    }
    else
    return 404;
      
    }
}
