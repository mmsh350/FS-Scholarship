<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Mail\NewAgentNotify;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class AgentController extends Controller
{
    

    //Return view
    public function index(Request $request)
    {
          $loginUserId =  Auth::user()->id;
          $stateId =  Auth::user()->state_id;

        if(Auth::user()->gender == '' || Auth::user()->dob == '')
        {
               return view('profile.edit');
        }
        else
        {  
                 // 
        if ($request->ajax()) {
            
            $data = DB::table('users')->select(
            DB::raw('CONCAT(first_name, " ", middle_name, " ", last_name ) AS full_name'),
                     'users.id',
                     'users.is_active', 
                     'users.phone_number',
                     'users.state_id',
                     'users.registrar_id',
                     'users.role',
                    )
            // ->rightJoin('applications', 'users.id', '=', 'applications.user_id')
             ->where('users.state_id',$stateId )
             ->where('users.registrar_id', $loginUserId)
             ->where('users.role', 'agent')->get();
            return Datatables($data)
        

            ->editColumn('status', function ($row) {
                $active = $row->is_active;
                if( $active == 1)
                    return "<span class='badge badge-success'>Active</span>";
                 else
                    return "<span class='badge badge-danger'>Not Active</span>";
                  })
             ->escapeColumns('status')

             ->editColumn('appcount', function ($row) {
                   $count="";
                   $count = Application::all()->where('user_id',$row->id)->count();
                     return  '<center>
                     <span class="badge rounded-circle badge-p-space border  border-info badge-dark  text-light f-14">'. $count.'</span></center>';
                  })
             ->editColumn('approveCount', function ($row) 
                  {
                    $count="";
                    $count = Application::all()->where('user_id',$row->id)
                                               ->where('status','Approved')
                                               ->count();
                      return  '<center>
                      <span class="badge rounded-circle badge-p-space border  border-success badge-dark  text-lght f-14">'. $count.'</span></center>';
                      })
               ->editColumn('rejectCount', function ($row) 
                   {
                     $count="";
                     $count = Application::all()->where('user_id',$row->id)
                                                ->where('status','Rejected')
                                                ->count();
                       return '<center>
                       <span class="badge rounded-circle badge-p-space border  border-danger badge-dark  text-lght f-14">'. $count.'</span></center>';
                    })
                   
              ->addIndexColumn()
              ->addColumn('action', function($row){
                    
                // Button Customizations
                $btn = "
                    <a 
                    class='btn btn-pill btn-dark btn-air-primary btn-xs'
                     data-bs-toggle='modal' data-bs-target='.bd-example-modal-xl' data-id=$row->id>
                    Look up<i class='icofont icofont-look'> </i> </a>";
                return $btn;
            }) ->rawColumns(['action']) ->make(true);

            }
          return view('staff.agent');

     }   
    
  }
  public function save(Request $request)
    {
          $loginUserId =  Auth::user()->id;
          $stateId =  Auth::user()->state_id;
         
          // String of all alphanumeric character
          $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
          
          // Shuffle the $str_result and returns substring
          // of specified length
          $password = substr(str_shuffle($str_result), 0, 8);
          $request->validate([
            'firstname' => ['required','string','max:255','regex:/^[\pL\s\-]+$/u'],
            'lastname' => ['required','string','max:255','regex:/^[\pL\s\-]+$/u'],
            'phone_number' => 'required|numeric|digits:11|unique:users',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
          ]);

         $agentData=[
            'agentName' => ucwords(strtolower($request->firstname)),
            'password' => $password,
            'email' => strtolower($request->email),
         ];

         try {
                 //Send mail to agaent
                 $send = Mail::to($request->email)->send(new NewAgentNotify($agentData));
              } catch (TransportExceptionInterface $e) {
                return response()->json([
                  "message"=> "Email Failed",
                  "errors"=>array("Email Not Sent"=> "Sorry account could not be createdm check your Mail Settings")
              ], 422);
           }

         $user = User::create([
          'first_name' => ucwords($request->firstname),
          'last_name' => ucwords($request->lastname),
          'middle_name' => ucwords($request->middlename),
          'email' => strtolower($request->email),
          'phone_number' => $request->phone_number,
          'password' => Hash::make($password),
          'registeredby' => 'staff',
          'is_active' => 0,
          'registrar_id' => $loginUserId, 
          'state_id'=>$stateId,
          'role'=>'agent',
        ]);
      

        
    }


}
