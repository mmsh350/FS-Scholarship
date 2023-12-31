<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Models\App_Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    //Return view
    public function index(Request $request)
    {
         $login_id =  Auth::user()->id;
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

              $notifycount =0;
              $notifications =0;
              $notifications = App_Notification::all()->where('user_id', $login_id)
              ->sortByDesc('id')
              ->take(3);

              $notifycount = App_Notification::all()
                                          ->where('user_id', $login_id)
                                          ->where('status', 'unread')
                                          ->count();
                 
        if ($request->ajax()) {
            
            $data = DB::table('transactions')
            ->select( 
                     'transactions.id',
                     'transactions.created_at',
                     'transactions.referenceId',
                     'transactions.gateway',
                     'transactions.service_description',                    
                     'transactions.amount',
                     'transactions.type' , 
                     'users.role')
            ->leftJoin('users', 'transactions.payerid', '=', 'users.id')
             ->where('transactions.userid',$login_id )->get();
            return Datatables($data)
                    ->addIndexColumn()
                    ->addColumn('paidby', function($row){
                     $paidby = $row->role;
                    if(empty($paidby) || $paidby == null)
                          $paidby = "self";
                     else
                            $paidby = $row->role;
                 return $paidby;
                 
        })->rawColumns(['paidby'])
              ->editColumn('amount', function ($row) {
                     return  "&#8358;".number_format($row->amount ,2);
               })->escapeColumns('amount')->make(true);

            }
            return view('transactions')
            ->with(compact('notifications'))
            ->with(compact('notifycount'));
     }   
    
}
   
      
}
