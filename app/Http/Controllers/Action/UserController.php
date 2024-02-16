<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Mail\NewUserNotify;
use App\Models\App_Notification;
use App\Models\Application;
use App\Models\State;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class UserController extends Controller
{
    public function show(Request $request)
    {
        //Check if role is applicant
            $loginUserId = Auth::user()->id;
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

                if ($request->ajax()) {
                    
                    $data = User::all()->where('role','!=', 'admin')
                    ->sortByDesc('asc');
                  
                    
                    return Datatables($data)

                    ->editColumn('fullname', function ($row) {
                        return  $row->first_name.' '. $row->middle_name.' '.$row->last_name;
                       
                    })->escapeColumns('fullname')

                    ->editColumn('is_active', function ($row) {
                        if($row->is_active == 1 )
                            return  "<span class='badge badge-success'><i class='fa fa-eye'></i> Active </span>";
                        else
                             return  "<span class='badge badge-danger'><i class='fa fa-eye-slash'></i> In active </span>";
                     })

                          ->editColumn('created_at', function ($row) {
                                return  date("M j, Y", strtotime($row->created_at) );
                              })

                          ->editColumn('role', function ($row) {
                                return '<span class="badge badge-dark-primary bg-primary">'.ucwords(strtolower($row->role)).'</span>';
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
                            <li class='edit'>
                            &nbsp; 
                            </li>
                            <li class='edit' title='View profile'> 
                            <a href='#' data-bs-toggle='modal' data-bs-target='.view' data-id=$row->id><i class='icon-zoom-in txt-warning'></i></a>
                        </li>
                          </ul> </center>";

                          if($row->role == 'super admin') return '';else return $btn;
                    }) ->rawColumns(['action']) 
                    ->make(true);
        
                    }


                  return view('admin.users') 
                  ->with(compact('notifications'))
                  ->with(compact('notifycount'));
                  
            }
            else{
                Auth::logout();
                return view('error') ;
            }
            
        
    }

    public function getUserDetails(Request $request)
    {
        $id = $request->input('id');

        //Get application details
        $userDetails = User::all()->where('id',$id)->first(); 

        $created_at = date("M j, Y", strtotime($userDetails->created_at) );
        $updated_at = date("M j, Y", strtotime($userDetails->updated_at) );
       
        $walletDetails = Wallet::select('balance')->where('userid', $id)->first();
        
        $userStatedata = State::select('stateName')->where('id',$userDetails->state_id)->first(); 

        $userState = "N/A";
        if(!empty($userStatedata) || $userStatedata != null){
            $userState = $userStatedata->stateName;
        }
        $Wbalance = 0;
        if(!empty($walletDetails) || $walletDetails != null){
            $Wbalance = number_format($walletDetails->balance);
        }

        $tnx = 0;
        $getTransaction = Transaction::where('userid',$id)->orderBy('id', 'desc')->take(3)->get();
        
        if(!empty($getTransaction))
            $tnx = $getTransaction;
           
        $data = array( "created_at" => $created_at, "updated_at" => $updated_at,"statename"=>  $userState , 
        "Wbalance" =>   $Wbalance, "Transaction"=>$tnx);

        $array = array_merge($userDetails->toArray(), $data);
         
           return response()->json($array);

         
    }
    public function verifyEmail(Request $request)
    {
        $id = $request->input('userid');
        User::where('id', $id)->update(['email_verified_at' => Carbon::now()]);
    }

    public function enableDisableUser(Request $request)
    {
        $id = $request->input('userid');
        $status = $request->input('status');

        if($status  == 1) $updt = 0; else $updt=1;

        User::where('id', $id)->update(['is_active' => $updt]);
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'first_name' => ['required','string','max:255','regex:/^[\pL\s\-]+$/u'],
            'last_name' => ['required','string','max:255','regex:/^[\pL\s\-]+$/u'],
            'middle_name' => ['nullable','string','max:255','regex:/^[\pL\s\-]+$/u'],
            'dob' => ['required'],
            'phone_no' => 'required|numeric|digits:11',
            'gender' => ['required', 'string'],
            'address' => ['nullable', 'string'],
        ]);
 
        //Get user role 
        $requestid = $request->userid;
          $userDetails = User::select('role')->where('id',$requestid)->first(); 


          //only for agent and staff
          if($userDetails->role == 'staff')
          {
                $request->validate([
                    'state' => 'required','numeric',
                ]);
          }
          else if($userDetails->role == 'agent')
          {
                $request->validate([
                    'state' => 'required','numeric',
                    'image' => 'image|mimes:jpeg,png,jpg|max:500',
                    'bvn' => 'required|numeric|digits:11',
                ]);
          }
          else {
                    $request->validate([
                        'state' => 'nullable','numeric',
                        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:500',
                        'bvn' => 'nullable|numeric|digits:11',
                    ]);
        }
    
        $image_path =  $request->oldpath;

        if($request->file('image'))
        {
            $path = $request->file('image');
            $data = file_get_contents($path);
            $image_path = base64_encode($data); 
        }
        
         $dobObject = new DateTime(date("Y-m-d", strtotime($request->dob)));
         $nowObject = new DateTime();
         
         if($dobObject->diff($nowObject)->y < 10 || $dobObject->diff($nowObject)->y >50){
            return response()->json([
                "message"=> "Age limit must be between 10 and 50 Years",
                "errors"=>array("Date of Birth"=> "Age limit must be between 10 and 50 Years")
            ], 422);
         }
          
         User::where('id', $requestid)
        ->update([
            'first_name' => ucwords(strtolower($request->first_name)),
            'middle_name' =>  ucwords(strtolower($request->middle_name)),
            'last_name' =>  ucwords(strtolower($request->last_name)),
            'dob' => $request->dob,
            'gender' => $request->gender,
            'phone_number' => $request->phone_no,
            'address' => ucwords(strtolower($request->address)),
            'state_id' => $request->state ,
            'id_cards'=>$image_path,
            'bvn'=>$request->bvn,
             ]);


    }
    //Save User
    public function save(Request $request)
    {
          
          $loginUserId = Auth::user()->id;//login staff

          // String of all alphanumeric character
          $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
          
          // Shuffle the $str_result and returns substring
          // of specified length
          $password = substr(str_shuffle($str_result), 0, 8);

          $request->validate([
            'firstname' => ['required','string','max:255','regex:/^[\pL\s\-]+$/u'],
            'lastname' => ['required','string','max:255','regex:/^[\pL\s\-]+$/u'],
            'middlename' => ['nullable','string','max:255','regex:/^[\pL\s\-]+$/u'],
            'phone_number' => 'required|numeric|digits:11|unique:users',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'account_type' => ['required', 'string'],
          ]);
           
          //only for agent and staff
          if($request->account_type == 'Staff')
          {
                $request->validate([
                    'user_state' => 'required','numeric',
                ]);
          }
          else if($request->account_type == 'Agent')
          {
                $request->validate([
                    'user_state' => 'required','numeric',
                    'user_image' => 'required|image|mimes:jpeg,png,jpg|max:500',
                    'user_bvn' => 'required|numeric|digits:11',
                ]);
          }
          else {//Do nothing!
        }

         $image_path = '';

        if($request->file('user_image'))
        {
            $path = $request->file('user_image');
            $data = file_get_contents($path);
            $image_path = base64_encode($data); 
        }
          
         $userData=[
            'Name' => ucwords(strtolower($request->firstname)),
            'password' => $password,
            'email' => strtolower($request->email),
            'type' =>$request->account_type,
         ];

         try {
                 //Send mail to User
                 $send = Mail::to($request->email)->send(new NewUserNotify($userData));
              } catch (TransportExceptionInterface $e) {
                return response()->json([
                  "message"=> "Email Failed",
                  "errors"=>array("Email Not Sent"=> "Sorry account could not be created check your Mail Settings")
              ], 422);
           }

         $user = User::create([
          'first_name' => ucwords($request->firstname),
          'last_name' => ucwords($request->lastname),
          'middle_name' => ucwords($request->middlename),
          'email' => strtolower($request->email),
          'phone_number' => $request->phone_number,
          'password' => Hash::make($password),
          'registeredby' => 'admin',
          'is_active' => 0,
          'registrar_id' => $loginUserId, 
          'state_id'=>$request->user_state,
          'role'=>strtolower($request->account_type),
          'id_cards'=>$image_path,
          'bvn'=>$request->user_bvn,
        ]);

        $lastInsertedId = $user->id;

        //update notification history
        App_Notification::create([
           'user_id' =>  $lastInsertedId,
           'message_title' => 'Welcome Message',
           'messages' => "Welcome to FS-Scholarship Student Loan/Scholarship Application Portal",
       ]);
      

        
    }

    
     
}
