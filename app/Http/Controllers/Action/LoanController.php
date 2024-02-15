<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Mail\repayCompletionMail;
use App\Mail\repayMail;
use App\Models\App_Notification;
use App\Models\Application;
use App\Models\Approval;
use App\Models\Repayment;
use App\Models\State;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class LoanController extends Controller
{
    public function show(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $stateId =  Auth::user()->state_id;
       
        $active =Auth::user()->is_active;
        //Check if user has been disabled
        if($active !="1")
        {
           Auth::logout();
               return view('error') ;
        }
        
        if(Auth::user()->gender == '' || Auth::user()->dob == '')
        {
               return view('profile.edit');
        }
        else
        { 

            //Check if role is applicant
            if(Auth::user()->role == 'applicant')
            {
                    $approve_amount = 0;
                    $paid_amount = 0;
                    $notifycount =0;
                    $repayments =0;

                    $notifications = App_Notification::all()->where('user_id', $loginUserId)
                    ->sortByDesc('id')
                    ->take(3);

                    $notifycount = App_Notification::all()
                                                ->where('user_id', $loginUserId)
                                                ->where('status', 'unread')
                                                ->count();

                     $appdetails = Application::select('id','approved_amount','total_paid')
                     ->where('user_id', $loginUserId)
                     ->where('disbursed', '1')->limit(1)->orderBy('id', 'DESC')->first();
 
                  

                     if($appdetails != null){
 
                        $approvalRec = Approval::select('status')->where('app_id', $appdetails->id)->first();
                        
                        if($approvalRec != null){

                            if($approvalRec->status == 'Ongoing'){
                                
                                // if($appdetails->approved_amount == $appdetails->total_paid )
                                // {
                                //      //do nothing 
                                // }
                                //else{
                                    $approve_amount=$appdetails->approved_amount;
                                    $paid_amount = $appdetails->total_paid;
                                    //$repayments = Repayment::all()->where('app_id',$appdetails->id )->take(12);

                                    $repayments= Repayment::orderByRaw("FIELD(status,'Pending') desc")
                                    ->where('app_id',$appdetails->id )
                                    ->take(12)
                                    ->get();
                                  
                            /// }

                            }

                        }

                      }

                 
                    
                    return view('loan')
                            ->with(compact('repayments'))
                            ->with(compact('notifications'))
                            ->with(compact('notifycount'))
                            ->with(compact('approve_amount'))
                            ->with(compact('paid_amount'));
            
            } 
            else if(Auth::user()->role == 'agent'){

                 //Fetch State Name
                 $getName = State::select('stateName')
                 ->where('id', $stateId)->first();
                  $stateName =  $getName->stateName;

               
                  $notifycount = 0;
                  $notifications = 0;
  
  
                  $notifications = App_Notification::all()->where('user_id', $loginUserId)
                  ->sortByDesc('id')
                  ->take(3);
  
                  $notifycount = App_Notification::all()
                                              ->where('user_id', $loginUserId)
                                              ->where('status', 'unread')
                                              ->count();
  
                  if ($request->ajax()) {
                      
                      $data = DB::table('applications')->select(
                               'applications.id',
                               'applications.created_at',
                               'applications.names',
                               'applications.approved_amount',
                               'applications.total_paid', 
                              )
                    ->leftJoin('approvals', 'applications.id', '=', 'approvals.app_id')
                    ->where('approvals.status','Ongoing' )
                     //  ->where('status','Approved' )
                       ->where('applications.user_id',$loginUserId );
                      // ->where('disbursed','1' );
  
                      return Datatables($data)
  
                      ->editColumn('approved_amount', function ($row) {
                        
                         return    "&#8358;".number_format($row->approved_amount ,2);
                         
                            })->escapeColumns('approved_amount')

                            ->editColumn('balance', function ($row) {
                                    $bal = $row->approved_amount - $row->total_paid ;
                               
                                    return  "&#8358;".number_format( $bal);
                        
                                   
                                      })->escapeColumns('balance')
  
                      ->editColumn('created_at', function ($row) {
                          
                          return  date("M j, Y", strtotime($row->created_at) );
                            })                            
                             
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                              
                          // Button Customizations
                          $btn = "
                              <a 
                              class='btn btn-pill btn-dark btn-air-primary btn-xs'
                               data-bs-toggle='modal' data-bs-target='.repayModal' data-id=$row->id>
                               <i class='icofont icofont-pay'> </i> Pay </a>";
                          return $btn;
                      }) ->rawColumns(['action']) 
                      ->make(true);  
                  
                  }
                    
                  return view('agent.loan') 
                  ->with(compact('notifications'))
                  ->with(compact('stateName'))
                  ->with(compact('notifycount'));
                
                
            }
            else{
                Auth::logout();
                return view('error') ;
            }
            
        }
    }

    public function  repayment(Request $request)
    {
        $loan_id = $request->input('loanid');

         $userrid = ''; $payerid=null;
         $loginUserId = Auth::user()->id;//login user
      
         //get requested user Wallet Balance information
         $wallet = Wallet::where('userid', $loginUserId)->first();
       
         //get requested a Repayment Information
         $RepayDetails = Repayment::where('id', $loan_id)->first();
          
         //Application Details
         $appDetails = Application::where('id', $RepayDetails->app_id)->first();
          
         //check if wallet balance is sufficient
         if($wallet->balance < $RepayDetails->repayment_amount ){

            return response()->json([
                "message"=> "Error",
                "errors"=>array("Wallet Balance"=> "Sorry you do not have enough wallet balance to perform this Transaction")
            ], 422);


         }else
         {
               //Generate random reference number 
               //Convert to function later
                $referenno = "";
                srand((double) microtime() * 1000000);
                $data = "123456123456789071234567890890";
                $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz"; // if you need alphabatic also

                for ($i = 0; $i < 12; $i++) {
                        $referenno .= substr($data, (rand() % (strlen($data))), 1);}

                
                $availbal = $wallet->balance -  $RepayDetails->repayment_amount;
               
                //Update Wallet
                $affected = Wallet::where('userid', $loginUserId)
                            ->update(['balance' =>$availbal]);

                $payer_name = Auth::user()->first_name.' '. Auth::user()->last_name;
                $payer_email = auth()->user()->email;
                $payer_phone = auth()->user()->phone_number;

                $role = Auth::user()->role;

                if($role == 'applicant')
                {
                   $userrid = Auth::user()->id;//login user
                  
                } else if($role == 'agent'){
                    $userrid = Auth::user()->id;//login user
                }
                else
                {
                   $userrid = $appDetails->user_id;//login user
                   $payerid = Auth::user()->id;
                }
                 
                
                //update transaction history
                $user = Transaction::create([
                    'userid' => $userrid,
                    'payerid' => $payerid,
                    'payer_name' =>  $payer_name,
                    'payer_email' => $payer_email,
                    'payer_phone' => $payer_phone,
                    'referenceId' => strtoupper($referenno),
                    'service_type' => '4',
                    'service_description' => "Monthly Loan Repayment",  
                    'amount' => $RepayDetails->repayment_amount ,
                    'type' => 'minnus',
                    'gateway' => 'Wallet',
                    'status' => 'Approved',
                ]);

                $newbalance =  $appDetails->total_paid + $RepayDetails->repayment_amount;

               //Mark Application has paid
               $affected = Application::where('id', $RepayDetails->app_id)
                            ->update(['total_paid' =>$newbalance,]);

                //Mark Repayment has paid
                $affected = Repayment::where('id', $loan_id)
                ->update(['status' =>'Paid']);

                if( $newbalance == $appDetails->approved_amount)
                {
                    //Mark Loan Approval has Completed
                    $affected = Approval::where('app_id', $appDetails->id)
                    ->update(['status' =>'Completed']);

                    //Send completion mail
                     //update notification history
                     App_Notification::create([
                        'user_id' =>  $appDetails->user_id,
                        'message_title' => 'Loan Repayment Completion',
                        'messages' => "Congratulations are in order! You've successfully completed the repayment of your loan." ,
                    ]);

                    //Send Mail
                    $appdata=[
                       'Name' => ucwords(strtolower($appDetails->names)),
                    ];
           
                    try {
                            //Send mail to User
                            $send = Mail::to($appDetails->email)->send(new repayCompletionMail($appdata));
                         } catch (TransportExceptionInterface $e) {
                           return response()->json([
                             "message"=> "Email Failed",
                             "errors"=>array("Email Not Sent"=> "Sorry Error sending Mail, check your Mail Settings")
                         ], 422);
                      }
                  
                }else
                {
                     //Send rpayment mail
                     //update notification history
                     App_Notification::create([
                        'user_id' =>  $appDetails->user_id,
                        'message_title' => 'Monthly Loan Repayment',
                        'messages' => 'Your monthly loan repayment of '. 
                        number_format($RepayDetails->repayment_amount,2).
                        ' Was Recieved.' ,
                    ]);

                    //Send Mail
                    $appdata=[
                       'Name' => ucwords(strtolower($appDetails->names)),
                       'messages' => 'Your monthly loan repayment of '. 
                       number_format($RepayDetails->repayment_amount,2).
                       ' Was Recieved.' ,
                    ];
           
                    try {
                            //Send mail to User
                            $send = Mail::to($appDetails->email)->send(new repayMail($appdata));
                         } catch (TransportExceptionInterface $e) {
                           return response()->json([
                             "messages"=> "Email Failed",
                             "errors"=>array("Email Not Sent"=> "Sorry Error sending Mail, check your Mail Settings")
                         ], 422);
                      }
                }


         }
                  
    }

    public function completed(Request $request){
        $loginUserId = Auth::user()->id;
        if ($request->ajax()) {
                      
            $data = Application::select(
                     'applications.id',
                     'applications.created_at',
                     'applications.names',
                     'applications.approved_amount',
                    )
          ->leftJoin('approvals', 'applications.id', '=', 'approvals.app_id')
          ->where('approvals.status','Completed' )
           //  ->where('status','Approved' )
             ->where('applications.user_id',$loginUserId );
            // ->where('disbursed','1' );

            return Datatables($data)

            ->editColumn('approved_amount', function ($row) {
              
               return   "&#8358;".number_format($row->approved_amount ,2) ;
               
                  })->escapeColumns('approved_amount')

                  ->editColumn('status', function ($row) {
                      
              return   "<span class='badge badge-success txt-light'>Paid</span>";
              
                     
                        })->escapeColumns('status')

                 

            ->editColumn('created_at', function ($row) {
                
                return  date("M j, Y", strtotime($row->created_at) );
                  })                            
                   
              ->addIndexColumn()
              ->addColumn('action', function($row){
                    
                // Button Customizations
                $btn = "";
                return $btn;
            }) ->rawColumns(['action']) 
            ->make(true);  
        
        }
          
        return view('agent.loan') ;

    }
}
