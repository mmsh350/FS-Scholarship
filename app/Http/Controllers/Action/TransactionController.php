<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
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
        if(Auth::user()->gender == '' || Auth::user()->dob == '')
        {
               return view('profile.edit');
        }
        else
        {  
                 
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
            return view('transactions');
     }   
    
}
   
      
}
