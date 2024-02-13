<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Models\App_Notification;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\State;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{
    public function fetchSchools(Request $request)
    {

            $id = $request->input('getId');
             
            $results = School::where('schl_category', $id)
                            ->where('is_active',1)
                            ->orderby("schl_name","asc")
                            ->select(['id','schl_name'])->get();
                            
            return response()->json($results);
    }
    public function index(Request $request)
    {
        //Check if role is applicant
        $loginUserId = Auth::user()->id;
        $stateId =  Auth::user()->state_id;

        if(Auth::user()->role == 'admin') 
        {
            $notifycount =0;
            $notifications =0;

            $notifications = App_Notification::all()->where('user_id', $loginUserId)
            ->sortByDesc('id')
            ->take(3);

            $notifycount = App_Notification::all()
                                        ->where('user_id', $loginUserId)
                                        ->where('status', 'unread')
                                        ->count();

            if ($request->ajax()) {
                
               $data = DB::table('schools')
                      ->select(
                              'schools.id',
                              'schools.schl_category',
                              'schools.schl_name',
                              'schools.state_id',
                              'schools.is_active',                    
                              'schools.created_at',
                             
                              'states.stateName'
                              )
                ->leftJoin('states', 'schools.state_id', '=', 'states.id');
               
                return Datatables($data)

               

                ->editColumn('is_active', function ($row) {
                    if($row->is_active == 1 )
                        return  "<span class='badge badge-success'><i class='fa fa-eye'></i> Active </span>";
                    else
                         return  "<span class='badge badge-danger'><i class='fa fa-eye-slash'></i> In active </span>";
                 })->escapeColumns('is_active')

                      ->editColumn('created_at', function ($row) {
                            return  date("M j, Y", strtotime($row->created_at) );
                          })
                       
                  ->addIndexColumn()
                  ->addColumn('action', function($row){
                        
                    // Button Customizations
                    $btn = "
                    <center>
                       <ul class='action'> 
                        <li class='edit' title='Edit profile'> 
                            <a href='#' data-bs-toggle='modal' data-bs-target='.bd-example-modal-xl' data-id=$row->id><i class='icon-pencil-alt txt-primary'></i></a>
                        </li>
                         </ul> </center>";
                      return $btn;
                }) ->rawColumns(['action']) 
                ->make(true);
                }

              return view('admin.schools') 
              ->with(compact('notifications'))
              ->with(compact('notifycount'));
              
        } 
        else if(Auth::user()->role == 'staff') 
        {
            $notifycount =0;
            $notifications =0;

            $notifications = App_Notification::all()->where('user_id', $loginUserId)
            ->sortByDesc('id')
            ->take(3);

            $notifycount = App_Notification::all()
                                        ->where('user_id', $loginUserId)
                                        ->where('status', 'unread')
                                        ->count();
             //Fetch State Name
                   $getName = State::select('stateName')
                   ->where('id', $stateId)->first();
                    $stateName =  $getName->stateName;

            if ($request->ajax()) {
                
               $data = DB::table('schools')
                     ->where('state_id',$stateId)
                      ->select(
                              'schools.id',
                              'schools.schl_category',
                              'schools.schl_name',
                              'schools.state_id',
                              'schools.is_active',                    
                              'schools.created_at',
                              'states.stateName',
                              )
                ->leftJoin('states', 'schools.state_id', '=', 'states.id')
              ;
               
                return Datatables($data)

               

                ->editColumn('is_active', function ($row) {
                    if($row->is_active == 1 )
                        return  "<span class='badge badge-success'><i class='fa fa-eye'></i> Active </span>";
                    else
                         return  "<span class='badge badge-danger'><i class='fa fa-eye-slash'></i> In active </span>";
                 })->escapeColumns('is_active')

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

              return view('staff.schools') 
              ->with(compact('notifications'))
              ->with(compact('notifycount'))
              ->with(compact('stateName'));
        }
        else{
            Auth::logout();
            return view('error') ;
        }
        
    }

    public function enableDisableSchool(Request $request)
    {
        $school_id = $request->input('userid');
        $status = $request->input('status');

        if($status  == 1) $updt = 0; else $updt=1;

        School::where('id', $school_id)->update(['is_active' => $updt]);
    }
    public function updateSchool(Request $request)
    {
       
        //Get user role 
        $school_id = $request->school_id;

          $request->validate([
            'category' => ['required',Rule::in(['University','Polytechnics/Monotechnics/Colleges','Secondary Schools'])],
            'schl_name' => ['required','string','max:255'],
            'schl_location' => 'required','numeric',
        
         ]);      
          
        School::where('id', $school_id)
        ->update([
            'schl_category' => $request->category,
            'schl_name' => ucwords(strtolower($request->schl_name)),
            'state_id' => $request->schl_location,
             ]);


    }

    //Save User
    public function save(Request $request)
    {
          
            $request->validate([
                'schl_category' => ['required',Rule::in(['University','Polytechnics/Monotechnics/Colleges','Secondary Schools'])],
                'school_name' => ['required','string','max:255'],
                'location' => 'required','numeric',
                
            ]);
          
            School::create([
            'schl_category' => $request->schl_category,
            'schl_name' => ucwords(strtolower($request->school_name)),
            'state_id' => $request->location,
            ]);

       
    }
    public function getSchoolDetails(Request $request)
    {
        $id = $request->input('id');

        //Get application details
        $schoolDetails = School::all()->where('id',$id)->first(); 
        return response()->json($schoolDetails);
         
    }

}
