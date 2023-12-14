<?php

namespace App\Http\Controllers\Action;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Wallet;
use App\Models\Application;
use App\Models\School;
use App\Models\User;
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

           
            //Check if role is applicant
            if(Auth::user()->role == 'applicant')
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


            //Staff Role actions
            } else if(Auth::user()->role == 'staff') {
                 
                //Retrieve users state
                $state_id = Auth::user()->state_id;
             

                //Get Application Count Details
                $school_count = 0;
                $agent_count = 0;
                $app_count = 0;
                $verify_count = 0;
                
                $school_count = School::all()
                                ->where('state_id', $state_id)->count();

                $agent_count = User::all()
                                 ->where('state_id', $state_id)
                                // ->where('registrar_id', $loginUserId)
                                 ->where('role', 'agent')->count();
                                
                $verify_count = Application::all()
                                ->where('location_id', $state_id)
                                ->where('app_verify', '1')
                               // ->where('app_status', 'Open')
                                ->where('verify_id',  $loginUserId)->count();

                $reject_count = Application::all()
                                ->where('location_id', $state_id)
                                ->where('app_verify', '0')
                                //->where('status', 'Rejected')
                               // ->where('app_status', 'Close')
                                ->where('verify_id',  $loginUserId)->count();

                $pending_app_count = Application::all()
                                ->where('location_id', $state_id)
                                //->where('status', 'Pending')
                                ->where('verify_id', '')
                                ->where('app_verify', '0')
                                ->count();

                $app_total_count = Application::all()
                                ->where('location_id', $state_id)
                                ->count();

                

                return view('staff.dashboard')
                        ->with(compact('app_total_count'))
                        ->with(compact('pending_app_count'))
                        ->with(compact('verify_count'))
                        ->with(compact('agent_count'))
                        ->with(compact('reject_count'))
                        ->with(compact('school_count'));
            }else
                return 404;
        }
    }   
                   
    
   
      

}
