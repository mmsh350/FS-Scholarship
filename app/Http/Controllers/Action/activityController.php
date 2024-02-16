<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Models\App_Notification;
use App\Models\Application;
use App\Models\School;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class activityController extends Controller
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
                // 
                if ($request->ajax()) {

                    $app_count = 0;
                    $app_approve = 0;
                    $app_reject = 0;

                    $data = DB::table('users')->select(
                    DB::raw('CONCAT(first_name, " ", middle_name, " ", last_name ) AS full_name'),
                            'users.id',
                            'users.phone_number',
                            )                                
                    ->where('users.role', 'staff')->get();
                    return Datatables($data)

                    ->editColumn('appcount', function ($row) {
                        $count="";
                        $count = Application::all()->where('verify_id',$row->id)->count();
                            return  '<center>
                            <span class="badge rounded-circle badge-p-space border  border-info text-dark f-14">'. $count.'</span></center>';
                        })->escapeColumns('is_active')
                    ->editColumn('approveCount', function ($row) 
                        {
                            $count="";
                            $count = Application::all()->where('verify_id',$row->id)
                                                    ->where('app_verify',1)
                                                    ->count();
                            return  '<center>
                            <span class="badge rounded-circle badge-p-space border  border-success text-dark f-14">'. $count.'</span></center>';
                            })->escapeColumns('is_active')
                    ->editColumn('rejectCount', function ($row) 
                        {
                            $count="";
                            $count = Application::all()->where('verify_id',$row->id)
                                                        ->where('app_verify',0)
                                                        ->count();
                            return '<center>
                            <span class="badge rounded-circle badge-p-space border  border-danger text-dark f-14">'. $count.'</span></center>';
                            })->escapeColumns('is_active')
                        
                    ->addIndexColumn()->make(true);

                    }
                return view('admin.activities')  
                        ->with(compact('notifications'))
                        ->with(compact('notifycount'));


                    }  
                    else{

                        
                    }
                
                }
    }

    public function agent(Request $request){
         // 
         if ($request->ajax()) {

            $app_count = 0;
            $app_approve = 0;
            $app_reject = 0;

            $data = DB::table('users')->select(
            DB::raw('CONCAT(first_name, " ", middle_name, " ", last_name ) AS full_name'),
                    'users.id',
                    'users.phone_number',
                    )                                
            ->where('users.role', 'agent')->get();
            return Datatables($data)

            ->editColumn('appcount', function ($row) {
                $count="";
                $count = Application::all()->where('user_id',$row->id)->count();
                    return  '<center>
                    <span class="badge rounded-circle badge-p-space border  border-info text-dark f-14">'. $count.'</span></center>';
                })->escapeColumns('appcount')
            ->editColumn('approveCount', function ($row) 
                {
                    $count="";
                    $count = Application::all()->where('status','Approved')
                                            ->where('user_id',$row->id)
                                            ->count();
                    return  '<center>
                    <span class="badge rounded-circle badge-p-space border  border-success text-dark f-14">'. $count.'</span></center>';
                    })->escapeColumns('approveCount')
                 ->editColumn('rejectCount', function ($row) 
                {
                    $count="";
                    $count = Application::all()->where('status','Rejected')
                                                ->where('user_id',$row->id)
                                                ->count();
                    return '<center>
                    <span class="badge rounded-circle badge-p-space border  border-danger text-dark f-14">'. $count.'</span></center>';
                    })->escapeColumns('rejectCount')

                    ->editColumn('date', function ($row) 
                {
                    
                    $row2 = DB::table('applications')->select('created_at')
                                                ->where('user_id',$row->id)->first();             
                    return  $row2->created_at;
                    })->escapeColumns('date')
                
            ->addIndexColumn()->make(true);

            }
        return view('admin.activities')  
                ->with(compact('notifications'))
                ->with(compact('notifycount'));
    }

    public function school(Request $request){
        // 
        if ($request->ajax()) {

           $app_count = 0;
           $app_approve = 0;
           $app_reject = 0;

           $data = School::all();
           return Datatables($data)

           ->editColumn('appcount', function ($row) {
               $count="";
               $count = Application::all()->where('school_id',$row->id)->count();
                   return  '<center>
                   <span class="badge rounded-circle badge-p-space border  border-info  text-dark f-14">'. $count.'</span></center>';
               })->escapeColumns('appcount')
           ->editColumn('approveCount', function ($row) 
               {
                   $count="";
                   $count = Application::all()->where('status','Approved')
                                           ->where('school_id',$row->id)
                                           ->count();
                   return  '<center>
                   <span class="badge rounded-circle badge-p-space border  border-success    text-dark f-14">'. $count.'</span></center>';
                   })->escapeColumns('approveCount')
                ->editColumn('rejectCount', function ($row) 
               {
                   $count="";
                   $count = Application::all()->where('status','Rejected')
                                               ->where('school_id',$row->id)
                                               ->count();
                   return '<center>
                   <span class="badge rounded-circle badge-p-space border  border-danger text-dark f-14">'. $count.'</span></center>';
                   })->escapeColumns('rejectCount')
               
           ->addIndexColumn()->make(true);

           }
       return view('admin.activities')  
               ->with(compact('notifications'))
               ->with(compact('notifycount'));
   }
}
