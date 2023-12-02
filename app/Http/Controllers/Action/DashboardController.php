<?php

namespace App\Http\Controllers\Action;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Wallet;
use App\Models\Application;
class DashboardController extends Controller
{
    public function show(Request $request)
    {    
         $loginUserId = Auth::user()->id;

         if(Auth::user()->gender == '' || Auth::user()->dob == '')
         {
                return view('profile.edit');
         }
         else
         {

            //Get Application Count Details
            $approve_count = 0;
            $reject_count = 0;
            $submit_count = 0;
             
            $approve_count = Application::all()
                            ->where('user_id', $loginUserId)
                            ->where('status', 'Approved')->count();

            $reject_count = Application::all()
                            ->where('user_id', $loginUserId)
                            ->where('status', 'Rejected')->count();

            $submit_count = Application::all()
                            ->where('user_id', $loginUserId)->count();

            //Check if role is applicant
            if(Auth::user()->role == 'applicant')
            {
                 
                     if (Wallet::where('userid', $loginUserId)->exists()) {
                          
                          //get requested user Wallet Balance information
                          $wallet = Wallet::where('userid', $loginUserId)->first();   
                          if( $wallet == null)
                          {
                                      //Defauls values
                                      $deposit =0;
                                      $balance = 0;
                          }
                          else
                          {
                              $balance = $wallet->balance;
                              $deposit = $wallet->deposit;
                          }
                             return view('dashboard')
                             ->with(compact('balance'))
                             ->with(compact('approve_count'))
                             ->with(compact('reject_count'))
                             ->with(compact('submit_count'));
          
                            
                      
                    }else{
                         $balance = 0;
                         return view('dashboard')
                         ->with(compact('balance'))
                         ->with(compact('approve_count'))
                         ->with(compact('reject_count'))
                         ->with(compact('submit_count'));
                     }
            } else if(Auth::user()->role == 'agent') {

            }else
                return 404;
        }
    }   
                   
    
   
      

}
