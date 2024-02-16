<?php

namespace App\Http\Controllers\Action;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\App_Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Wallet;
use App\Models\Application;
use App\Models\Approval;
use App\Models\School;
use App\Models\State;
use App\Models\Transaction;
use App\Models\User;
class DashboardController extends Controller
{
    public function show(Request $request)
    {    
         $loginUserId = Auth::user()->id;
         $active =Auth::user()->is_active;

         //Check if user has been disabled
         if($active !="1")
         {
            Auth::logout();
                return view('error') ;
         }
         //Check if profile is upto date
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
                    $notifycount =0;
                    
                    $notifications = App_Notification::all()->where('user_id', $loginUserId)
                    ->sortByDesc('id')
                    ->where('status', 'unread')
                    ->take(3);

                    $notifycount = App_Notification::all()
                                                ->where('user_id', $loginUserId)
                                                ->where('status', 'unread')
                                                ->count();

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
                             ->with(compact('notifications'))
                             ->with(compact('notifycount'))
                             ->with(compact('submit_count'));
          
                            
                      
                    }else{
                         $balance = 0;
                         return view('dashboard')
                         ->with(compact('balance'))
                         ->with(compact('approve_count'))
                         ->with(compact('reject_count'))
                         ->with(compact('notifications'))
                         ->with(compact('notifycount'))
                         ->with(compact('submit_count'));
                     }


            //Staff Role actions
            } else if(Auth::user()->role == 'staff') {
                 
                //Retrieve users state
                $state_id = Auth::user()->state_id;

                $notifycount =0;
                $notifications = 0;
                    
                $notifications = App_Notification::all()->where('user_id', $loginUserId)
                ->sortByDesc('id')
                ->where('status', 'unread')
                ->take(3);

                $notifycount = App_Notification::all()
                                            ->where('user_id', $loginUserId)
                                            ->where('status', 'unread')
                                            ->count();
             
                 //Fetch State Name
                 $getName = State::select('stateName')
                 ->where('id', $state_id)->first();
                  $stateName =  $getName->stateName;
                  

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
                        ->with(compact('notifications'))
                        ->with(compact('notifycount'))
                        ->with(compact('stateName'))
                        ->with(compact('school_count'));
            }
            else if(Auth::user()->role == 'admin') {
                 
                
                $notifycount =0;
                $notifications = 0;
                    
                $notifications = App_Notification::all()->where('user_id', $loginUserId)
                ->sortByDesc('id')
                ->where('status', 'unread')
                ->take(3);

                $notifycount = App_Notification::all()
                                            ->where('user_id', $loginUserId)
                                            ->where('status', 'unread')
                                            ->count();
             
                
                //Get Application Count Details
                $school_count = 0;
                $agent_count = 0;
                $app_count = 0;
                $verify_count = 0;
                

                //School Count
                $school_count = School::all()->count();

                //Active and inactive school count
                $school_count_active = School::where('is_active',1)->count();
                $school_count_inactive = School::where('is_active',0)->count();
                
                //Agent Count
                $agent_count = User::all()->where('role', 'agent')->count();

                //Staff Count
                $staff_count = User::all()->where('role', 'staff')->count();

                //Applicant Count
                $applicant_count = User::all()->where('role', 'applicant')->count();

                //Total Applications
                $app_total_count = Application::all()->count();
                
                //Pending verification
                $verify_count = Application::all()
                                ->where('app_verify', '1')->count();

                //Pending approval
                $pending_approval_count = Application::all()
                                ->where('status', 'Pending')
                                ->where('app_verify', '1')
                                ->count();

                //Pending approval
                $pending_verify_count = Application::all()
                                ->where('status', 'Pending')
                                ->where('verify_id', '')
                                ->where('app_verify', '0')
                                ->count();


                //Rejected
                $reject_count = Application::all()
                                ->where('status', 'Rejected')->count();

            

                 //Approval count
                $app_approve_count = Application::all()->where('status','Approved')->count();
                
                $interest = Approval::all()->sum('disbursed_interest');

                $disbursed_amt = Approval::where('disbursed_interest', '!=','0')->sum('disbursed_amount');

                $disbursed_schl = Application::where('category', 'Scholarship')
                ->where('disbursed','1')->sum('approved_amount');

                $wallet_bal = Wallet::all()->sum('balance');

                $upfront  = Application::where('pay_status', 'Paid')->sum('initial_fee');

                $repay  = Application::where('disbursed', '1')->sum('total_paid');

                  //Fetch Transactions
                 
                $transactions =  Transaction::all()->sortByDesc('id')->take(5);
                
                return view('admin.dashboard')
                        ->with(compact('transactions'))
                        ->with(compact('app_total_count'))
                        ->with(compact('app_approve_count'))
                        ->with(compact('verify_count'))
                        ->with(compact('pending_approval_count'))
                        ->with(compact('pending_verify_count'))
                        ->with(compact('agent_count'))
                        ->with(compact('reject_count'))
                        ->with(compact('notifications'))
                        ->with(compact('notifycount'))
                        ->with(compact('interest'))
                        ->with(compact('disbursed_amt'))
                        ->with(compact('wallet_bal'))
                        ->with(compact('upfront'))
                        ->with(compact('repay'))
                        ->with(compact('disbursed_schl'))
                        ->with(compact('staff_count'))
                        ->with(compact('applicant_count'))
                        ->with(compact('school_count'))
                        ->with(compact('school_count_inactive'))
                        ->with(compact('school_count_active') );
            }
            else if(Auth::user()->role == 'agent'){

                $registrar =  Auth::user()->registrar_id;
                //Retrieve users state
                $state_id = Auth::user()->state_id;

                //Fetch State Name
                 $getName = State::select('stateName')
                 ->where('id', $state_id)->first();
                  $stateName =  $getName->stateName;


                //Get Application Count Details
                $approve_count = 0;
                $reject_count = 0;
                $submit_count = 0;
                $notifycount =0;
                $school_count = 0;

                $notifications = App_Notification::all()->where('user_id', $loginUserId)
                ->sortByDesc('id')
                ->where('status', 'unread')
                ->take(3);

                $notifycount = App_Notification::all()
                                            ->where('user_id', $loginUserId)
                                            ->where('status', 'unread')
                                            ->count();
                
                 //get assigned staff
                 $staffinfo = User::where('id', $registrar)->first();
                 $staffName =   $staffinfo->first_name." ". $staffinfo->last_name;
                 $staffNo =   $staffinfo->phone_number;


                 $school_count = School::all()
                                            ->where('state_id', $state_id)->count();

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
                         return view('agent.dashboard')
                         ->with(compact('balance'))
                         ->with(compact('approve_count'))
                         ->with(compact('reject_count'))
                         ->with(compact('notifications'))
                         ->with(compact('notifycount'))
                         ->with(compact('school_count'))
                         ->with(compact('stateName'))
                         ->with(compact('staffName'))
                         ->with(compact('staffNo'))
                         ->with(compact('submit_count'));
      
                  
                }else{
                     $balance = 0;
                     return view('agent.dashboard')
                     ->with(compact('balance'))
                     ->with(compact('approve_count'))
                     ->with(compact('reject_count'))
                     ->with(compact('notifications'))
                     ->with(compact('notifycount'))
                     ->with(compact('school_count'))
                     ->with(compact('stateName'))
                     ->with(compact('staffName'))
                     ->with(compact('staffNo'))
                     ->with(compact('submit_count'));
                 }

            }
            else{
                Auth::logout();
                return view('error') ;
            }
                
        }
    }   
                   
    
   
      

}
