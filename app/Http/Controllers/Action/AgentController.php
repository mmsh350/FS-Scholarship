<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Mail\NewAgentNotify;
use App\Models\App_Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Application;
use App\Models\State;
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
             
          $notifycount =0;
          $notifications =0;

            //Fetch State Name
            $getName = State::select('stateName')
                           ->where('id', $stateId)->first();
             $stateName =  $getName->stateName;

          $notifications = App_Notification::all()->where('user_id', $loginUserId)
          ->sortByDesc('id')
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
                $app_count=0;
                $app_count = Application::all()->where('user_id',$row->id)->count();

                $app_reject = Application::all()->where('user_id',$row->id)
                ->where('status','Rejected')
                ->count();

                $app_approve = Application::all()->where('user_id',$row->id)
                ->where('status','Approved')
                ->count();
                
                // Button Customizations
                $btn = "
                    <a 
                    class='btn btn-pill btn-dark btn-air-primary btn-xs'
                     data-bs-toggle='modal' data-bs-target='.bd-example-modal-xl' data-id=$row->id 
                     data-approve=$app_approve data-reject=$app_reject data-app_count= $app_count>
                    Look up<i class='icofont icofont-look'> </i> </a>";
                return $btn;
            }) ->rawColumns(['action']) ->make(true);

            }
          return view('staff.agent')  
                  ->with(compact('notifications'))
                  ->with(compact('stateName'))
                  ->with(compact('notifycount'));

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
            'user_state' => 'required','numeric',
             'user_image' => 'required|image|mimes:jpeg,png,jpg|max:500',
             'user_bvn' => 'required|numeric|digits:11',
             'phone_number' => 'required|numeric|digits:11|unique:users',
            'firstname' => ['required','string','max:255','regex:/^[\pL\s\-]+$/u'],
            'lastname' => ['required','string','max:255','regex:/^[\pL\s\-]+$/u'],
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

           $image_path = '';

           if($request->file('user_image'))
           {
               $path = $request->file('user_image');
               $data = file_get_contents($path);
               $image_path = base64_encode($data); 
           }

         $user = User::create([
          'first_name' => ucwords($request->firstname),
          'last_name' => ucwords($request->lastname),
          'middle_name' => ucwords($request->middlename),
          'email' => strtolower($request->email),
          'phone_number' => $request->phone_number,
          'password' => Hash::make($password),
          'registeredby' => 'staff',
          'is_active' => 1,
          'registrar_id' => $loginUserId, 
          'state_id'=>$stateId,
          'role'=>'agent',
          'id_cards'=>$image_path,
          'bvn'=>$request->user_bvn,
          'state_id'=>$request->user_state,
        ]);

        $lastInsertedId = $user->id;

        //update notification history
        App_Notification::create([
           'user_id' =>  $lastInsertedId,
           'message_title' => 'Welcome Message',
           'messages' => "Welcome to FS-Scholarship Student Loan/Scholarship Application Portal",
       ]);
      
    }

    public function getAgentDetails(Request $request)
    {
           $id = $request->input('id');
           $agentDetails = User::all()->where('id',$id)->first();
  
           $dob = date("d-m-Y", strtotime($agentDetails->dob) );
           $reg_on = date("F j, Y", strtotime($agentDetails->created_at) );
           $regid = User::select(['first_name', 'last_name'])
                      ->where('id',$agentDetails->registrar_id)->first();

           $data = array( "dateofBirth" => $dob ,
                           "reg_on" => $reg_on,
                           "registrar" => $regid->first_name.' '.$regid->last_name );
           $array = array_merge($agentDetails->toArray(), $data);
         
           return response()->json($array);
    }


}
