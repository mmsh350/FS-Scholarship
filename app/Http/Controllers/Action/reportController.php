<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Models\App_Notification;
use App\Models\Application;
use App\Models\Approval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class reportController extends Controller
{
    public function show(Request $request){

        $loginUserId =  Auth::user()->id;
        

        if(Auth::user()->gender == '' || Auth::user()->dob == '')
        {
               return view('profile.edit');
        }
        else
        {  
            if(Auth::user()->role == 'admin')
           {
                    $notifycount =0;
                    $notifications =0;

                    

                    $notifications = App_Notification::all()->where('user_id', $loginUserId)
                    ->sortByDesc('id')
                    ->where('status', 'unread')
                    ->take(3);
                
                    $notifycount = App_Notification::all()
                                                ->where('user_id', $loginUserId)
                                                ->where('status', 'unread')
                                                ->count();
                                              
                                                return view('admin.reports')  
                                                ->with(compact('notifications'))
                                                ->with(compact('notifycount'));

            }else{

                    Auth::logout();
                    return view('error') ;
                }
        }
}

public function getRevenue(Request $request){


    $request->validate([
        'date_from' => 'required','date',
        'date_to' => 'required|date|after_or_equal:date_from'        
      ]);


    $checkdate = str_replace('/', '-', $request->date_from);
    $date_from = date('Y-m-d', strtotime($checkdate));

    $checkdate2 = str_replace('/', '-', $request->date_to);
    $date_to = date('Y-m-d', strtotime($checkdate2));

     $total = 0; $interest = 0; $fee=0; 

   $interest =  DB::table('approvals')
    ->whereBetween('disbursed_date', [$date_from, $date_to])
    ->selectRaw('sum(disbursed_interest) as interest')
    ->first(); 

    $upfront =  DB::table('applications')
     ->where('pay_status', 'Paid')
     ->whereBetween('created_at', [$date_from, $date_to])
    ->selectRaw('sum(initial_fee) as fee')->first(); 

    if(!empty( $interest))
       $interest = $interest->interest;

   if(!empty( $upfront))
       $fee = $upfront->fee;


     $total = $interest +  $fee;

    $data = array( "interest" =>   number_format($interest,2), 
                    "fee" =>   number_format($fee,2),
                    "total" =>   number_format($total,2), );

    return response()->json($data);


   

}
}
