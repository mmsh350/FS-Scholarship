<?php

namespace App\Http\Controllers\Action;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mail\ApprovalMail;
use App\Mail\disburseMail;
use App\Mail\DueMail;
use App\Mail\RejectMail;
use App\Mail\UpcommingMail;
use App\Models\App_Notification;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Approval;
use App\Models\Countries;
use App\Models\Lga;
use App\Models\Repayment;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\School;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class ApplicationController extends Controller
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
                    $approve_count = 0;
                    $reject_count = 0;
                    $notifycount =0;
                    
                    $applications = Application::all()->where('user_id', $loginUserId)
                    ->sortByDesc('id')
                    ->take(5);

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

                 $balance=0;
                //Check if wallet existed 
                if (Wallet::where('userid', $loginUserId)->exists()) {
                  //get requested user Wallet Balance information
                  $wallet = Wallet::where('userid', $loginUserId)->first();
                  $balance = $wallet->balance ;
                 }
                 
                    return view('application')
                    ->with(compact('applications'))
                    ->with(compact('notifications'))
                    ->with(compact('notifycount'))
                    ->with(compact('approve_count'))
                    ->with(compact('reject_count'))
                    ->with(compact('balance'));

               
                  
            
            }else if(Auth::user()->role == 'staff') 
            {
                $notifycount =0;
                $notifications =0;

                   //Fetch State Name
                   $getName = State::select('stateName')
                   ->where('id', $stateId)->first();
                    $stateName =  $getName->stateName;

                $notifications = App_Notification::all()->where('user_id', $loginUserId)
                ->sortByDesc('id')
                ->where('status', 'unread')
                ->take(3);

                $notifycount = App_Notification::all()
                                            ->where('user_id', $loginUserId)
                                            ->where('status', 'unread')
                                            ->count();

                if ($request->ajax()) {
                    
                    $data = Application::select(
                             'id',
                             'created_at',
                             'names',
                             'phone',
                             'ramount', 
                             'app_status',
                            )
                  
                     ->where('location_id',$stateId )
                     ->where('app_verify','0' )
                     ->where('app_status','Open' );
                    return Datatables($data)

                    ->editColumn('ramount', function ($row) {
                        return  "&#8358;".number_format($row->ramount ,2);
                       
                          })->escapeColumns('ramount')

                    ->editColumn('created_at', function ($row) {
                        
                        return  date("M j, Y", strtotime($row->created_at) );
                          })

                          ->editColumn('app_status', function ($row) {
                        
                            return  "<span class='badge badge-success'>".$row->app_status."</span>";
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
                    }) ->rawColumns(['action']) 
                    ->make(true);
        
                    }


                  return view('staff.application') 
                  ->with(compact('notifications'))
                  ->with(compact('notifycount'))
                  ->with(compact('stateName'));
            }
            else if(Auth::user()->role == 'agent') {
                $approve_count = 0;
                $reject_count = 0;
                $notifycount =0;

                $getName = State::select('stateName')->where('id', $stateId)->first();
                $stateName =  $getName->stateName;
                
                $applications = Application::all()->where('user_id', $loginUserId)
                ->sortByDesc('id')
                ->take(5);

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

             $balance=0;
            //Check if wallet existed 
            if (Wallet::where('userid', $loginUserId)->exists()) {
              //get requested user Wallet Balance information
              $wallet = Wallet::where('userid', $loginUserId)->first();
              $balance = $wallet->balance ;
             }
             
                return view('agent.application')
                ->with(compact('applications'))
                ->with(compact('notifications'))
                ->with(compact('notifycount'))
                ->with(compact('approve_count'))
                ->with(compact('reject_count'))
                ->with(compact('stateName'))
                ->with(compact('balance'));

            }
            else if(Auth::user()->role == 'admin') {
                $notifycount = 0;
                $notifications = 0;


                $notifications = App_Notification::all()->where('user_id', $loginUserId)
                ->sortByDesc('id')
                ->where('status', 'unread')
                ->take(3);

                $notifycount = App_Notification::all()
                                            ->where('user_id', $loginUserId)
                                            ->where('status', 'unread')
                                            ->count();

                if ($request->ajax()) {
                    
                    $data = Application::select(
                             'id',
                             'created_at',
                             'names',
                             'phone',
                             'ramount', 
                             'app_verify',
                            )
                  
                     ->where('status','Pending' )
                     ->where('app_verify','1' )
                     ->where('app_status','Open' );

                    return Datatables($data)

                    ->editColumn('ramount', function ($row) {
                        return  "&#8358;".number_format($row->ramount ,2);
                       
                          })->escapeColumns('ramount')

                    ->editColumn('created_at', function ($row) {
                        
                        return  date("M j, Y", strtotime($row->created_at) );
                          })

                          ->editColumn('app_verify', function ($row) {
                              if($row->app_verify == 1)
                                  return  "<span class='badge badge-success'> Pass </span>";
                             else if($row->app_verify == 0)
                             return  "<span class='badge badge-success'>Failed</span>";
                             else
                                return  "<span class='badge badge-success'>Pending</span>";
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
                    }) ->rawColumns(['action']) 
                    ->make(true);
        
                    }


                  return view('admin.applications') 
                  ->with(compact('notifications'))
                  ->with(compact('notifycount'));
            }
            else{
                Auth::logout();
                return view('error') ;
            }
            
        }
    }
    
    public function approvedlist(Request $request){
        $loginUserId = Auth::user()->id;
        
        if ($request->ajax()) {
                        
            $data = Application::select(
                     'id',
                     'created_at',
                     'names',
                     'phone',
                     'ramount', 
                     'status', 
                     'disbursed',
                    )
          
              ->where('disbursed','0' )
             ->where('status', 'Approved');
            return Datatables($data)
    
            ->editColumn('ramount', function ($row) {
                return  "&#8358;".number_format($row->ramount ,2);
               
                  })->escapeColumns('ramount')
    
            ->editColumn('created_at', function ($row) {
                
                return  date("M j, Y", strtotime($row->created_at) );
                  })
    
                  ->editColumn('disbursed', function ($row) {
                     if($row->disbursed == 0)
                         return  "<span class='badge badge-danger'>Pending</span>";
                        else
                        return  "<span class='badge badge-success'>Pending</span>";
                      })->escapeColumns('disbursed')
             
                   
              ->addIndexColumn()
              ->addColumn('action', function($row){
                    
                // Button Customizations
                $btn = "
                    <a 
                    class='btn btn-pill btn-dark btn-air-primary btn-xs'
                     data-bs-toggle='modal' data-bs-target='.bd-example-modal-xl' data-id=$row->id>
                    Look up<i class='icofont icofont-look'> </i> </a>";
                return $btn;
            }) ->rawColumns(['action']) 
            ->make(true);
    
            }
    
            
          return view('admin.applications');
      }

      public function pendingdismt(Request $request){
        $loginUserId = Auth::user()->id;
        
        if ($request->ajax()) {
                        
            $data = DB::table('applications')
            ->select(
                          'applications.id',
                          'applications.created_at',
                          'applications.names',
                          'applications.ramount',
                          'applications.phone',                    
                          'approvals.status')
            ->leftJoin('approvals', 'applications.id', '=', 'approvals.app_id')
            ->where('approvals.status','Ongoing' );

            return Datatables($data)
    
            ->editColumn('ramount', function ($row) {
                return  "&#8358;".number_format($row->ramount ,2);
               
                  })->escapeColumns('ramount')
    
             ->editColumn('created_at', function ($row) {
                
                return  date("M j, Y", strtotime($row->created_at) );
                  })
    
                  ->editColumn('status', function ($row) {
                        return  "<span class='badge badge-warning'>".$row->status."</span>";
                   })->escapeColumns('status')
             
                   
              ->addIndexColumn()
              ->addColumn('action', function($row){
                    
                // Button Customizations
                $btn = "
                    <a 
                    class='btn btn-pill btn-dark btn-air-primary btn-xs'
                     data-bs-toggle='modal' data-bs-target='.bd-example-modal-xl' data-id=$row->id>
                    Look up<i class='icofont icofont-look'> </i> </a>";
                return $btn;
            }) ->rawColumns(['action']) 
            ->make(true);
    
            }
    
            
          return view('admin.applications');
      }

      public function pendingdismt2(Request $request){
        $loginUserId = Auth::user()->id;
         $stateId =  Auth::user()->state_id;
        
        if ($request->ajax()) {
                        
            $data = DB::table('applications')
            ->select(
                          'applications.id',
                          'applications.created_at',
                          'applications.names',
                          'applications.ramount',
                          'applications.phone',                    
                          'approvals.status')
            ->leftJoin('approvals', 'applications.id', '=', 'approvals.app_id')
            ->where('location_id',$stateId )
            ->where('applications.verify_id',$loginUserId)
            ->where('approvals.status','Ongoing' ); 

            return Datatables($data)
    
            ->editColumn('ramount', function ($row) {
                return  "&#8358;".number_format($row->ramount ,2);
               
                  })->escapeColumns('ramount')
    
             ->editColumn('created_at', function ($row) {
                
                return  date("M j, Y", strtotime($row->created_at) );
                  })
    
                  ->editColumn('status', function ($row) {
                        return  "<span class='badge badge-warning'>".$row->status."</span>";
                   })->escapeColumns('status')
             
                   
              ->addIndexColumn()
              ->addColumn('action', function($row){
                    
                // Button Customizations
                $btn = "
                    <a 
                    class='btn btn-pill btn-dark btn-air-primary btn-xs'
                     data-bs-toggle='modal' data-bs-target='.bd-example-modal-xl' data-id=$row->id>
                    Look up<i class='icofont icofont-look'> </i> </a>";
                return $btn;
            }) ->rawColumns(['action']) 
            ->make(true);
    
            }
    
            
          return view('staff.application');
      }

      public function completed(Request $request){
        $loginUserId = Auth::user()->id;
        
        if ($request->ajax()) {

            $data = DB::table('applications')
            ->select(
                          'applications.id',
                          'applications.created_at',
                          'applications.names',
                          'applications.ramount',
                          'applications.phone',                    
                          'approvals.status')
            ->leftJoin('approvals', 'applications.id', '=', 'approvals.app_id')
            ->where('approvals.status','Completed' );

            return Datatables($data)
    
            ->editColumn('ramount', function ($row) {
                return  "&#8358;".number_format($row->ramount ,2);
               
                  })->escapeColumns('ramount')
    
             ->editColumn('created_at', function ($row) {
                
                return  date("M j, Y", strtotime($row->created_at) );
                  })
    
                  ->editColumn('status', function ($row) {
                        return  "<span class='badge badge-success'>".$row->status."</span>";
                   })->escapeColumns('status')
             
                   
              ->addIndexColumn()
              ->addColumn('action', function($row){
                    
                // Button Customizations
                $btn = "
                    <a 
                    class='btn btn-pill btn-dark btn-air-primary btn-xs'
                     data-bs-toggle='modal' data-bs-target='.bd-example-modal-xl' data-id=$row->id>
                    Look up<i class='icofont icofont-look'> </i> </a>";
                return $btn;
            }) ->rawColumns(['action']) 
            ->make(true);
    
            }
    
            
          return view('admin.applications');
      }

      public function completed2(Request $request){
        $loginUserId = Auth::user()->id;
         $stateId =  Auth::user()->state_id;
        
        if ($request->ajax()) {

            $data = DB::table('applications')
            ->select(
                          'applications.id',
                          'applications.created_at',
                          'applications.names',
                          'applications.ramount',
                          'applications.phone',                    
                          'approvals.status')
            ->leftJoin('approvals', 'applications.id', '=', 'approvals.app_id')
            ->where('location_id',$stateId )
            ->where('applications.verify_id',$loginUserId)
            ->where('approvals.status','Completed' );

            return Datatables($data)
    
            ->editColumn('ramount', function ($row) {
                return  "&#8358;".number_format($row->ramount ,2);
               
                  })->escapeColumns('ramount')
    
             ->editColumn('created_at', function ($row) {
                
                return  date("M j, Y", strtotime($row->created_at) );
                  })
    
                  ->editColumn('status', function ($row) {
                        return  "<span class='badge badge-success'>".$row->status."</span>";
                   })->escapeColumns('status')
             
                   
              ->addIndexColumn()
              ->addColumn('action', function($row){
                    
                // Button Customizations
                $btn = "
                    <a 
                    class='btn btn-pill btn-dark btn-air-primary btn-xs'
                     data-bs-toggle='modal' data-bs-target='.bd-example-modal-xl' data-id=$row->id>
                    Look up<i class='icofont icofont-look'> </i> </a>";
                return $btn;
            }) ->rawColumns(['action']) 
            ->make(true);
    
            }
    
            
          return view('staff.applications');
      }


      

  public function verifiedlist(Request $request){
    $loginUserId = Auth::user()->id;
    $stateId =  Auth::user()->state_id;
    if ($request->ajax()) {
                    
        $data = Application::select(
                 'id',
                 'created_at',
                 'names',
                 'phone',
                 'ramount', 
                 'status', 
                 'app_status',
                )
      
         ->where('location_id',$stateId )
         ->where('verify_id', $loginUserId);
        return Datatables($data)

        ->editColumn('ramount', function ($row) {
            return  "&#8358;".number_format($row->ramount ,2);
           
              })->escapeColumns('ramount')

        ->editColumn('created_at', function ($row) {
            
            return  date("M j, Y", strtotime($row->created_at) );
              })

              ->editColumn('app_status', function ($row) {
                 if($row->app_status == 'Close')
                     return  "<span class='badge badge-danger'>".$row->app_status."</span>";
                    else
                    return  "<span class='badge badge-success'>".$row->app_status."</span>";
                  })->escapeColumns('app_status')
         
               
          ->addIndexColumn()
          ->addColumn('action', function($row){
                
            // Button Customizations
            $btn = "
                <a 
                class='btn btn-pill btn-dark btn-air-primary btn-xs'
                 data-bs-toggle='modal' data-bs-target='.bd-example-modal-xl' data-id=$row->id>
                Look up<i class='icofont icofont-look'> </i> </a>";
            return $btn;
        }) ->rawColumns(['action']) 
        ->make(true);

        }

        
      return view('staff.application');
  }
    public function store(Request $request)
    {
        $request->validate([


            //Document Upload
            'file' => 'required|mimes:pdf|max:1048',
            //Head Of School
            'hos_address' => ['required','string','max:255'],
            'hos_city' => ['required','string','max:255'],
            'hos_state' => 'required','numeric',
            'hos_phone' => 'required|numeric|digits:11',
            'hos_name' => ['required','string','max:255'], 
            'hos_email' => ['required','string','email','max:255'], 
           
            
            //guarantor
             'gaddress2' => ['required','string','max:255'],
             'gphone2' => 'required|numeric|digits:11',
             'grelationship2' => ['required','string','max:255'],
             'gname2' => ['required','string','max:255'], 

             'gaddress' => ['required','string','max:255'],
             'gphone' => 'required|numeric|digits:11',
             'grelationship' => ['required','string','max:255'],
             'gname' => ['required','string','max:255'], 

            //School                     
             'ramount' => 'required|numeric|min:5000|max:1000000',
             'no_of_years' => 'required|numeric|digits:1|min:1|max:1',
             'course' => ['required','string','max:255'],
             'section' => ['required','string','max:255'],
             'school_name' => ['required','string','max:255'],
             'schl_category' => ['required','string','max:255'],
             
            //Next of kin'
            'nok_bus_stop' => ['required', 'string','max:65','min:15'],
            'nok_address' => ['required', 'string','max:65','min:15'],
            'nok_lga' => 'required','numeric',
            'nok_state' => 'required','numeric',
            'nok_phone' => 'required|numeric|digits:11',
            'nok_dob' => 'required|date|before:9 years ago',
            'nok_gender' => ['required','string','max:7'],
            'nok_fname' => ['required','string','max:255'],
            'nok_sname' => ['required','string','max:255'],
            'nok_rel' => ['required','string','max:10'],
            'title' => ['required','string','max:7'],
            
            //Application 
            'caddress' => ['required', 'string','max:65','min:15'],
            'nbus_address' => ['required', 'string','max:65','min:15'],
            'image' => 'required|image|mimes:jpeg,png,jpg|max:500',
            'nationality' => 'required','numeric',
            'lga' => 'required','numeric',
            'state' => 'required','numeric',
            'phone_no' => 'required|numeric|digits:11',
            'country' => 'required','numeric',
            'category' => ['required','string','max:20'],
            

        ],
        [
            //Application
            'category.required'    => 'Application Category is Required',

            //Nerest Bus stop Addres
            'nbus_address.required'    => 'Nearest Bus Stop Address is Required',
            'nbus_address.max'    => 'Nearest Bus Stop Address cannot be more than 65 Character ',
            'nbus_address.min'    => 'Nearest Bus Stop Address cannot be less than 15 character ',

            //Current Home Address
            'caddress.required'    => 'Current Home Address is Required',
            'caddress.max'    => 'Current Home Address cannot be more than 65 Character ',
            'caddress.min'    => 'Current Home Address cannot be less than 15 character ',

            //Passport
            'image.required'    => 'Your Recent Passport is Required',
            'image.image'    => 'The Passport must be a file of type: jpeg, png, jpg.',
            'image.mimes'    => 'The Passport must be a file of type: jpeg, png, jpg.',

            //Next of Kin
            'title.required'    => 'Next of Kin Title is Required',
            'nok_rel.required'    => 'Next of Kin Relationship is Required',
            'nok_sname.required'    => 'Next of Kin Surname is Required',
            'nok_fname.required'    => 'Next of Kin Firstname is Required',
            'nok_gender.required'    => 'Next of Kin Gender is Required',
            'nok_dob.required'    => 'Next of Kin Date of Birth is Required',
            'nok_dob.before'    => 'Next of Kin Date of Birth Must be 10 years or Above',
            'nok_phone.required'    => 'Next of Kin Phone Number is Required',
            'nok_phone.numeric'    => ' The Next of Kin phone must be a number',
            'nok_phone.digits'    => ' The phone Number must be 11 digits.',

            'nok_state.required'    => 'Next of Kin State is Required',
            'nok_lga.required'    => 'Next of Kin LGA is Required',
            'nok_address.required'    => 'Next of Kin Current Home Address is Required',
            'nok_bus_stop.required'    => 'Next of Kin Nearest Bus Stop is Required',

            //school
            'ramount.required'    => 'Request  amount is Required',
            'ramount.min'    => 'Request amount cannot be less than 5000 Thousand Naira',
            'ramount.max'    => 'Request amount cannot be greater than 1 Million Naira',
            'schl_category.required'    => 'School Category is Required',


            //Gurantor
            'gaddress.required'    => 'Gurantor 1 Address is Required',
            'grelationship.required'    => 'Guarantor 1 Relationship is Required',
            'gname.required'    => 'Guarantor 1 Name is Required',

            'gphone.required'    => 'Gurantor 1  Phone Number is Required',
            'gphone.numeric'    => ' Gurantor 1  phone must be a number',
            'gphone.digits'    => ' Gurantor 1 Phone Number must be 11 digits.',

            'gaddress2.required'    => 'Gurantor 2 Address is Required',
            'grelationship2.required'    => 'Guarantor 2 Relationship is Required',
            'gname2.required'    => 'Guarantor 2 Names is Required',

            'gphone2.required'    => 'Gurantor 2  Phone Number is Required',
            'gphone2.numeric'    => ' Gurantor 2  phone must be a number',
            'gphone2.digits'    => ' Gurantor 2  Phone Number must be 11 digits.',
             
            //Head of School
           
            'hos_name.required'    => 'Head of School Name is Required',
            'hos_address.required'    => 'Head of School Address is Required',
            'hos_city.required'    => 'Head of School City is Required',
            'hos_state.required'    => 'Head of School State is Required',

            'hos_phone.required'    => 'Head of School Phone Number is Required',
            'hos_phone.numeric'    => ' Head of School phone must be a number',
            'hos_phone.digits'    => '  Head of School Phone Number must be 11 digits.',

            'hos_email.required'    => 'Head of School Email Address is Required',
            'hos_email.email'    => 'Invalid Head of School Email Address',
             
            //Doucmecnt 
 
            'file.required'    => 'Please upload supporting documents',
            'file.mimes'    => 'Required Documents must be in PDF format',
 
        ]);

        

        if(( $request->flexRadioDefault == 'Yes')){

            $request->validate([
                'intl_phone'   => 'required|numeric|digits:11',
                'intl_address' => ['required','string','max:65','min:15'],
            ],
            [
                'intl_phone.required'    => 'International Phone Number is Required',
                'intl_address.required'    => 'International Home Address is Required',
                'intl_address.max'    => 'International Home Address cannot be more than 65 Character ',
                'intl_address.min'    => 'International Home Address cannot be less than 15 character ',
                
            ]);
        }

        //Insert into db
       
        //Get default values
        $userid = auth()->user()->id; //Login User
        $applicant_names = '';
        $dob = '';
        $gender = '';
        $email = '';

        if(auth()->user()->role =='agent'){
            //Do some validation 

            $request->validate([
                'applicant_Names' => ['required','string','max:255','regex:/^[\pL\s\-]+$/u'],
                'phone_no' => 'required|numeric|digits:11',
                'gender' => ['required', 'string'],
                'email_id' => ['required', 'string', 'email', 'max:255'],
            ]);

            $dobObject = new DateTime(date("Y-m-d", strtotime($request->dob)));
            $nowObject = new DateTime();
         
            if($dobObject->diff($nowObject)->y < 10 || $dobObject->diff($nowObject)->y >50){
                return response()->json([
                    "message"=> "Age limit must be between 10 and 50 Years",
                    "errors"=>array("Date of Birth"=> "Age limit must be between 10 and 50 Years")
                ], 422);
            }

            $applicant_names = $request->applicant_Names;
            $dob =  $request->dob;
            $gender =  $request->gender;
            $email = $request->email_id;
        }
        else{
           
            $applicant_names = auth()->user()->first_name." ".auth()->user()->middle_name." ".auth()->user()->last_name;
            $dob =  auth()->user()->dob;
            $gender =  auth()->user()->gender;
            $email =  auth()->user()->email;
        }


        if($request->file('image'))
        {
            $path = $request->file('image');
            $data = file_get_contents($path);
            $image_path = base64_encode($data); 
        }

        //Check if a pending application existed

        if(auth()->user()->role =='agent'){

            if (Application::where('user_id', $userid)->where('status','Pending')->where('app_status','Open')->count() > 10)
            {
                return response()->json([
                    "message"=> "Application Limit Reached",
                    "errors"=>array("Application Limit"=> "Sorry you have a pending application")
                ], 422);
    
            }else{
    
                //get location, state id
                $school = School::where('id', $request->school_name)->first();
                $location_id =  $school->state_id;
    
                //Insert intO Application
                $app = Application::create([
                        'user_id' =>  $userid,
                        'category' => $request->category,
                        'school_id' => $request->school_name,
                        'names' => $applicant_names,
                        'dob' => $dob,
                        'gender' => $gender,
                        'phone' => $request->phone_no,
                        'email' => $email,
                        'country' => $request->country,
                        'nationality' => $request->nationality,
                        'state_id' => $request->state,
                        'lga_id' => $request->lga,
                        'home_address' => ucwords(strtolower($request->caddress)),
                        'busstop_address' => ucwords(strtolower($request->nbus_address)),
                        'passport' => $image_path,
                        'dysabroad' => $request->flexRadioDefault,
                        'intl_phone' => $request->intl_phone,
                        'intl_address' => ucwords(strtolower($request->intl_address)),
                        'ramount' => $request->ramount,
                        'location_id' =>  $location_id,
                    ]);
    
                    //insert into next of kin
                     
                    $kin = DB::table('next_kins')->insert([
                        'application_id'=>$app->id,
                        'nok_title' => $request->title,
                        'nok_relationship' => $request->nok_rel,
                        'nok_surname' =>ucwords(strtolower($request-> nok_sname)),
                        'nok_middle_name' => ucwords(strtolower($request->nok_mname)),
                        'nok_firstname' => ucwords(strtolower($request->nok_fname)),
                        'nok_gender' => $request->nok_gender,
                        'nok_dob' => $request->nok_dob,
                        'nok_phone' => $request->nok_phone,
                        'nok_email' => $request->nok_email,
                        'nok_state' => $request->nok_state,
                        'nok_lga' => $request->nok_lga,
                        'nok_busstop' => ucwords(strtolower($request->nok_bus_stop)),
                        'nok_address' => ucwords(strtolower($request->nok_address)),
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now(),
                        ]);
    
                        //insert into Education
                           $edu = DB::table('educations')->insert([
                            'application_id'=>$app->id,
                            'school_category' => $request->schl_category,
                            'school_name' => $request->school_name,
                            'school_section' =>$request->section,
                            'school_course' => ucwords(strtolower($request->course)),
                            'school_no_of_years' => $request->no_of_years,
                            'school_ramount' => $request->ramount,
                            'created_at'=>Carbon::now(),
                            'updated_at'=>Carbon::now(),
                            ]);
    
                            //Guarantor add 
                            $gua = DB::table('guarantors')->insert([
                                'application_id'=>$app->id,
                                'gf_names' => ucwords(strtolower($request->gname)),
                                'gf_relationship' => $request->grelationship,
                                'gf_phone' =>$request->gphone,
                                'gf_email' => $request->gemail,
                                'gf_address' => ucwords(strtolower($request->gaddress)),
                                'gs_names' => ucwords(strtolower($request->gname2)),
                                'gs_relationship' => $request->grelationship2, 
                                'gs_phone' => $request->gphone2, 
                                'gs_email' => $request->gemail2, 
                                'gs_address' => ucwords(strtolower($request->gaddress2)),
                                'created_at'=>Carbon::now(),
                                'updated_at'=>Carbon::now(),
                                ]);       
                              
                            //Head of school 
                            $hos = DB::table('head_of_schools')->insert([
                                'application_id'=>$app->id,
                                'name' => ucwords(strtolower($request->hos_name)),
                                'phone' => $request->hos_phone,
                                'email' =>$request->hos_email,
                                'state' => $request->hos_state,
                                'city' => ucwords(strtolower($request->hos_city)),
                                'address' => ucwords(strtolower($request->hos_address)),
                                'created_at'=>Carbon::now(),
                                'updated_at'=>Carbon::now(),
                                ]);  
    
             
            //Upload Document
            $fileName = $request->file->getClientOriginalName();
            $filePath = 'uploads/' . $fileName;
     
            $path = Storage::disk('public')->put($filePath, file_get_contents($request->file));
            $path = Storage::disk('public')->url($path);
    
            //Upload Files
                            $uploads = DB::table('uploads')->insert([
                                'application_id'=>$app->id,
                                'path' => $filePath,
                                'created_at'=>Carbon::now(),
                                'updated_at'=>Carbon::now(),
                                ]);  
    
    
            }
        }
        
    else{
        if (Application::where('user_id', $userid)->where('status','Pending')->where('app_status','Open')->count() > 0)
        {
            return response()->json([
                "message"=> "Application Limit Reached",
                "errors"=>array("Application Limit"=> "Sorry you have a pending application")
            ], 422);

        }else{

            //get location, state id
            $school = School::where('id', $request->school_name)->first();
            $location_id =  $school->state_id;

            //Insert intO Application
            $app = Application::create([
                    'user_id' =>  $userid,
                    'category' => $request->category,
                    'school_id' => $request->school_name,
                    'names' => $applicant_names,
                    'dob' => $dob,
                    'gender' => $gender,
                    'phone' => $request->phone_no,
                    'email' => $email,
                    'country' => $request->country,
                    'nationality' => $request->nationality,
                    'state_id' => $request->state,
                    'lga_id' => $request->lga,
                    'home_address' => ucwords(strtolower($request->caddress)),
                    'busstop_address' => ucwords(strtolower($request->nbus_address)),
                    'passport' => $image_path,
                    'dysabroad' => $request->flexRadioDefault,
                    'intl_phone' => $request->intl_phone,
                    'intl_address' => ucwords(strtolower($request->intl_address)),
                    'ramount' => $request->ramount,
                    'location_id' =>  $location_id,
                ]);

                //insert into next of kin
                 
                $kin = DB::table('next_kins')->insert([
                    'application_id'=>$app->id,
                    'nok_title' => $request->title,
                    'nok_relationship' => $request->nok_rel,
                    'nok_surname' =>ucwords(strtolower($request-> nok_sname)),
                    'nok_middle_name' => ucwords(strtolower($request->nok_mname)),
                    'nok_firstname' => ucwords(strtolower($request->nok_fname)),
                    'nok_gender' => $request->nok_gender,
                    'nok_dob' => $request->nok_dob,
                    'nok_phone' => $request->nok_phone,
                    'nok_email' => $request->nok_email,
                    'nok_state' => $request->nok_state,
                    'nok_lga' => $request->nok_lga,
                    'nok_busstop' => ucwords(strtolower($request->nok_bus_stop)),
                    'nok_address' => ucwords(strtolower($request->nok_address)),
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                    ]);

                    //insert into Education
                       $edu = DB::table('educations')->insert([
                        'application_id'=>$app->id,
                        'school_category' => $request->schl_category,
                        'school_name' => $request->school_name,
                        'school_section' =>$request->section,
                        'school_course' => ucwords(strtolower($request->course)),
                        'school_no_of_years' => $request->no_of_years,
                        'school_ramount' => $request->ramount,
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now(),
                        ]);

                        //Guarantor add 
                        $gua = DB::table('guarantors')->insert([
                            'application_id'=>$app->id,
                            'gf_names' => ucwords(strtolower($request->gname)),
                            'gf_relationship' => $request->grelationship,
                            'gf_phone' =>$request->gphone,
                            'gf_email' => $request->gemail,
                            'gf_address' => ucwords(strtolower($request->gaddress)),
                            'gs_names' => ucwords(strtolower($request->gname2)),
                            'gs_relationship' => $request->grelationship2, 
                            'gs_phone' => $request->gphone2, 
                            'gs_email' => $request->gemail2, 
                            'gs_address' => ucwords(strtolower($request->gaddress2)),
                            'created_at'=>Carbon::now(),
                            'updated_at'=>Carbon::now(),
                            ]);       
                          
                        //Head of school 
                        $hos = DB::table('head_of_schools')->insert([
                            'application_id'=>$app->id,
                            'name' => ucwords(strtolower($request->hos_name)),
                            'phone' => $request->hos_phone,
                            'email' =>$request->hos_email,
                            'state' => $request->hos_state,
                            'city' => ucwords(strtolower($request->hos_city)),
                            'address' => ucwords(strtolower($request->hos_address)),
                            'created_at'=>Carbon::now(),
                            'updated_at'=>Carbon::now(),
                            ]);  

         
        //Upload Document
        $fileName = $request->file->getClientOriginalName();
        $filePath = 'uploads/' . $fileName;
 
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->file));
        $path = Storage::disk('public')->url($path);

        //Upload Files
                        $uploads = DB::table('uploads')->insert([
                            'application_id'=>$app->id,
                            'path' => $filePath,
                            'created_at'=>Carbon::now(),
                            'updated_at'=>Carbon::now(),
                            ]);  


        } 
    }  
             
           
    }

    
    public function  rejectOffer(Request $request)
    {
        //Mark Application has paid
        $affected = Application::where('id', $request->appid)
        ->update([
                'app_status' =>'close',
                'app_accept' =>'2'
                ]);

    }
    
    public function  initialFee(Request $request)
    {
        $request->validate([
            'account_name' => ['required','string','max:255'],
            'account_number' => 'required|numeric|digits:10',
            'bank_name' => ['required','string','max:255'],
        ]);

         $loginUserId = Auth::user()->id;//login user

         //get requested user Wallet Balance information
         $wallet = Wallet::where('userid', $loginUserId)->first();
         

         //Application Details
         $trans_amount = Application::where('id', $request->appid)->first();
          
         //check if wallet balance is sufficient
         if($wallet->balance < $trans_amount->initial_fee ){

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

                
                $availbal = $wallet->balance -  $trans_amount->initial_fee;
               
                //Update Wallet
                $affected = Wallet::where('userid', $loginUserId)
                            ->update(['balance' =>$availbal]);

                $payer_name = Auth::user()->first_name.' '. Auth::user()->last_name;
                $payer_email = auth()->user()->email;
                $payer_phone = auth()->user()->phone_number;

                //update transaction history
                $user = Transaction::create([
                    'userid' => $loginUserId,
                    //'payerid' => '',
                    'payer_name' =>  $payer_name,
                    'payer_email' => $payer_email,
                    'payer_phone' => $payer_phone,
                    'referenceId' => strtoupper($referenno),
                    'service_type' => '2',
                    'service_description' => "Initial 1% Payment Fee",  
                    'amount' => $trans_amount->initial_fee,
                    'type' => 'minnus',
                    'gateway' => 'Wallet',
                    'status' => 'Approved',
                ]);

               //Mark Application has paid
               $affected = Application::where('id', $request->appid)
                            ->update([
                                    'pay_status' =>'paid',
                                    'acct_name' =>ucwords(strtolower($request->account_name)),
                                    'acct_number' =>$request->account_number,
                                    'acct_bankname' =>$request->bank_name,
                                    'app_accept' =>'1'
                                    ]);
         }
                  
    }

    public function getApplicationDetails(Request $request)
    {
        $id = $request->input('id');

        //Get application details
        $appDetails = Application::all()->where('id',$id)->first();
        
        $userid = $appDetails->user_id;
        $usersData = User::select('role','phone_number','first_name')->where('id',$userid)->first();

        //Request amount
        $amt = number_format($appDetails->ramount ,2);
        //Get state and lga
        $state = State::select('stateName')->where('id',$appDetails->state_id)
            ->first();
        $lga = Lga::select('lgaName')->where('id',$appDetails->lga_id)
            ->first();
        //Get country & Nationality
        $country = Countries::select('CountryName')->where('id',$appDetails->country)->first();

        $approvalDataStatus = "Pending";
        $approvalData = Approval::select('status')->where('app_id', $id)->first();
        if( $approvalData !=null){
            $approvalDataStatus = $approvalData->status;
        }
        
        $nationality = Countries::select('CountryName')->where('id',$appDetails->nationality)->first();
        //Update dob 
        $dob = date("d-m-Y", strtotime($appDetails->dob) );

          //Update requeste amount 
          $appamount = number_format($appDetails->approved_amount ,2);
          $initamount = number_format($appDetails->initial_fee ,2);

        //get next ok kin information
         $kinDetails = DB::table('next_kins')->where('application_id',$id)->first();

          //Get state and lga
        $kin_state = State::select('stateName')->where('id',$kinDetails->nok_state)
        ->first();
        $kin_lga = Lga::select('lgaName')->where('id',$kinDetails->nok_lga)
        ->first();

         //Update kin dob 
         $nokdob = date("d-m-Y", strtotime($kinDetails->nok_dob) );


         //get next ok Education information
         $eduDetails = DB::table('educations')->where('application_id',$id)->first();
         //get school name
         $schlname = School::select('schl_name')->where('id',$eduDetails->school_name)
         ->first();

          //get Education information
          $GuaDetails = DB::table('guarantors')->where('application_id',$id)->first();

           //get Head of School information
           $HosDetails = DB::table('head_of_schools')->where('application_id',$id)->first();

            //get Head of school state
            $hos_state = State::select('stateName')->where('id',$HosDetails->state)
            ->first();
            //get Head of School information
            $UploadsDetails = DB::table('uploads')->where('application_id',$id)->first();
        
         $data2 = array(  "dateofBirth" => $dob ,
                         "state" => $state,
                         "lga" => $lga ,
                         "country_name" => $country,
                         "nationality_name"=>$nationality,
                         "amount"=>$amt,
                         "kin_state"=>$kin_state,
                         "kin_lga"=>$kin_lga,
                         "nok_dob"=>$nokdob,
                         "school"=>$schlname,
                         "hoss" => $hos_state,
                        "appamount"=>$appamount,
                        "initamount"=>$initamount,
                        'approvalDataStatus' =>$approvalDataStatus,
                         );


       $data3 = array("kin"=>$kinDetails);
       $data4 = array("edu" =>$eduDetails);
       $data5 = array("gua" =>$GuaDetails);
       $data6 = array("hos" =>$HosDetails);
       $data7 = array("upload" =>$UploadsDetails);
       $data8 = array("initiator" =>$usersData);
       

        $array = array_merge($appDetails->toArray(), $data2);
        $array = array_merge($array,$data3,$data4,$data5, $data6,$data7, $data8);
        return response()->json($array);
    }


    public function getApplicationData(Request $request)
    {
        $id = $request->input('id');

        //Get application details
        $appDetails = Application::all()->where('id',$id)->first();
        
        $userid = $appDetails->user_id;
        $usersData = User::select('role','phone_number','first_name')->where('id',$userid)->first();

        //Request amount
        $amt = number_format($appDetails->ramount ,2);
        //Get state and lga
        $state = State::select('stateName')->where('id',$appDetails->state_id)
            ->first();
        $lga = Lga::select('lgaName')->where('id',$appDetails->lga_id)
            ->first();
        //Get country & Nationality
        $country = Countries::select('CountryName')->where('id',$appDetails->country)->first();

        $approvalDataStatus = "Pending";
        $approvalData = Approval::select('status')->where('app_id', $id)->first();
        if( $approvalData !=null){
            $approvalDataStatus = $approvalData->status;
        }

        $nationality = Countries::select('CountryName')->where('id',$appDetails->nationality)->first();
        //Update dob 
        $dob = date("d-m-Y", strtotime($appDetails->dob) );

          //Update requeste amount 
          $appamount = number_format($appDetails->approved_amount ,2);
          $initamount = number_format($appDetails->initial_fee ,2);

        //get next ok kin information
         $kinDetails = DB::table('next_kins')->where('application_id',$id)->first();

          //Get state and lga
        $kin_state = State::select('stateName')->where('id',$kinDetails->nok_state)
        ->first();
        $kin_lga = Lga::select('lgaName')->where('id',$kinDetails->nok_lga)
        ->first();

         //Update kin dob 
         $nokdob = date("d-m-Y", strtotime($kinDetails->nok_dob) );


         //get next ok Education information
         $eduDetails = DB::table('educations')->where('application_id',$id)->first();
         //get school name
         $schlname = School::select('schl_name')->where('id',$eduDetails->school_name)
         ->first();

          //get Education information
          $GuaDetails = DB::table('guarantors')->where('application_id',$id)->first();

           //get Head of School information
           $HosDetails = DB::table('head_of_schools')->where('application_id',$id)->first();

            //get Head of school state
            $hos_state = State::select('stateName')->where('id',$HosDetails->state)
            ->first();
            //get Head of School information
            $UploadsDetails = DB::table('uploads')->where('application_id',$id)->first();
        
         $data2 = array(  "dateofBirth" => $dob ,
                         "state" => $state,
                         "lga" => $lga ,
                         "country_name" => $country,
                         "nationality_name"=>$nationality,
                         "amount"=>$amt,
                         "kin_state"=>$kin_state,
                         "kin_lga"=>$kin_lga,
                         "nok_dob"=>$nokdob,
                         "school"=>$schlname,
                         "hoss" => $hos_state,
                        "appamount"=>$appamount,
                        "initamount"=>$initamount,
                        'approvalDataStatus' =>$approvalDataStatus,
                         );


       $data3 = array("kin"=>$kinDetails);
       $data4 = array("edu" =>$eduDetails);
       $data5 = array("gua" =>$GuaDetails);
       $data6 = array("hos" =>$HosDetails);
       $data7 = array("upload" =>$UploadsDetails);
       $data8 = array("initiator" =>$usersData);
       

        $array = array_merge($appDetails->toArray(), $data2);
        $array = array_merge($array,$data3,$data4,$data5, $data6,$data7, $data8);
        return response()->json($array);
    }


    public function  verifyApp(Request $request)
    {
            $appid = $request->appid;
            $status = $request->status;
            $loginUserId = Auth::user()->id;//login staff or admin

           if(Auth::user()->role == 'admin'){
             
            //Get userid from application
             //Get application details
             $appUserId = Application::all()->where('id',$appid)->first();

             $appName =  $appUserId->names;
             $email = $appUserId->email;
             $apptype =  $appUserId->category;

             $Monthly_Repay = $request->Monthly_Repayment;
              
             if($status == 'approved'){
                  //Check if Scholarship
                if($apptype == 'Scholarship'){
                        $request->validate([
                            'Approve_Amount' =>  'required|numeric|min:5000|max:1000000',
                            'Initial_Fee' =>     'required|numeric',
                            'Monthly_Repayment'=>'required|numeric|min:0|max:0',
                        ]);
                        $Monthly_Repay = 0;
                 }else{
                    $request->validate([
                        'Approve_Amount' =>  'required|numeric|min:5000|max:1000000',
                        'Initial_Fee' =>     'required|numeric|min:1000|max:1000000',
                        'Monthly_Repayment'=>  'required|numeric|min:500|max:1000000',
                    ]);
                 }
                 Application::where('id', $appid)->update(['status' => 'Approved',
                                                           'approved_amount'=>$request->Approve_Amount,
                                                         'initial_fee'=>$request->Initial_Fee,
                                                         'monthly_repayment'=> $Monthly_Repay]);
 
                    //Approval Record
                    Approval::create([
                        'app_id' =>  $request->appid,
                        'approved_amount' => $request->Approve_Amount,
                        'initial_fee' => $request->Initial_Fee,
                        'monthly_repayment' => $request->Monthly_Repayment,
                    ]);
                     //update notification history
                     App_Notification::create([
                         'user_id' =>  $appUserId->user_id,
                         'message_title' => 'Approval',
                         'messages' => 'Congratulations! Your application has been approved, Proceed to accept your offer',
                     ]);

                     //Send Mail
                     $appdata=[
                        'Name' => ucwords(strtolower($appName)),
                        'approved' => $request->Approve_Amount,
                        'initial_fee' => $request->Initial_Fee,
                        'monthly_repayment' => $request->Monthly_Repayment,
                     ];
            
                     try {
                             //Send mail to User
                             $send = Mail::to($email)->send(new ApprovalMail($appdata));
                          } catch (TransportExceptionInterface $e) {
                            return response()->json([
                              "message"=> "Email Failed",
                              "errors"=>array("Email Not Sent"=> "Sorry Error sending Mail, check your Mail Settings")
                          ], 422);
                       }
               
             }
             else{

                if(empty($request->reason) || $request->reason == null )
                {
                        return response()->json([
                            "message"=> "Error",
                            "errors"=>array("Error"=> "Please Enter Approval Reason")
                        ], 422);
    
                 }
                 Application::where('id', $appid)->update(['status' => 'Rejected',
                                                           'app_status' => 'Close',
                                                           'comments'=>$request->reason ]);
 
                      //update notification history
                      App_Notification::create([
                         'user_id' =>  $appUserId->user_id,
                         'message_title' => 'Approval',
                         'messages' => 'Sorry, Your Application has been rejected, see reason why rejected on the application page.',
                     ]);

                 //Send Mail
                 $appdata=[
                    'Name' => ucwords(strtolower($appName)),
                    'reason' => $request->reason,
                 ];
        
                 try {
                         //Send mail to User
                         $send = Mail::to($email)->send(new RejectMail($appdata));
                      } catch (TransportExceptionInterface $e) {
                        return response()->json([
                          "message"=> "Email Failed",
                          "errors"=>array("Email Not Sent"=> "Sorry Error sending Mail, check your Mail Settings")
                      ], 422);
                   }
             }

          }
          else if(Auth::user()->role == 'staff'){
                //Get userid from application
             //Get application details
            $appUserId = Application::select('user_id')->where('id',$appid)->first();
          
           

            if(empty($request->reason) || $request->reason == null )
            {
                    return response()->json([
                        "message"=> "Error",
                        "errors"=>array("Error"=> "Please Enter verification Reason")
                    ], 422);

             }

            if($status == 'approved'){
                Application::where('id', $appid)->update(['app_verify' => '1', 
                                                         'verify_id' => $loginUserId,
                                                         'comments'=>$request->reason]);

                    //update notification history
                    App_Notification::create([
                        'user_id' =>  $appUserId->user_id,
                        'message_title' => 'Verification',
                        'messages' => 'Congratulations! Your application has passed the verification stage.',
                    ]);
              
            }
            else{
                Application::where('id', $appid)->update(['app_verify' => '0', 
                                                          'verify_id' => $loginUserId,
                                                          'status' => 'Rejected',
                                                          'app_status' => 'Close',
                                                          'comments'=>$request->reason
                                                        ]);

                     //update notification history
                     App_Notification::create([
                        'user_id' =>  $appUserId->user_id,
                        'message_title' => 'Verification',
                        'messages' => 'Sorry, Your Application did not passed the verification stage.',
                    ]);
            }

          }
           else{
                Auth::logout();
                return view('error') ;
            }            
    }

    public function  approvalData(Request $request)
    {
        $id = $request->input('appid');

        //Get application details
        $ApprovalDetails = Approval::all()->where('app_id',$id)->first(); 

         $approved_amount = number_format($ApprovalDetails->approved_amount,2);
         $initial_fee = number_format($ApprovalDetails->initial_fee,2);
         $monthly_repayment = number_format($ApprovalDetails->monthly_repayment,2);
         $created_at = date("M j, Y", strtotime($ApprovalDetails->created_at) );
         $interest =  number_format( $ApprovalDetails->approved_amount * 0.1,2);

         //$checkdate = str_replace('/', '-', );
         $d1 = date("Y-m-d",strtotime('+30 days')); 
         $d2 = date('Y-m-d',strtotime('+30 days',strtotime($d1)));
         $d3 = date('Y-m-d',strtotime('+30 days',strtotime($d2)));
         $d4 = date('Y-m-d',strtotime('+30 days',strtotime($d3)));
         $d5 = date('Y-m-d',strtotime('+30 days',strtotime($d4)));
         $d6 = date('Y-m-d',strtotime('+30 days',strtotime($d5)));
         $d7 = date('Y-m-d',strtotime('+30 days',strtotime($d6)));
         $d8 = date('Y-m-d',strtotime('+30 days',strtotime($d7)));
         $d9 = date('Y-m-d',strtotime('+30 days',strtotime($d8)));
         $d10 = date('Y-m-d',strtotime('+30 days',strtotime($d9)));
         $d11 = date('Y-m-d',strtotime('+30 days',strtotime($d10)));
         $d12 = date('Y-m-d',strtotime('+30 days',strtotime($d11)));
       
        $data = array( "approved_amount"=> $approved_amount, 
                       "initial_fee"=> $initial_fee, 
                       "monthly_repayment"=>  $monthly_repayment,
                       "created_at"=>  $created_at,
                       "d1"=>$d1,"d2"=>$d2,"d3"=>$d3,
                       "d4"=>$d4,"d5"=>$d5,"d6"=>$d6,
                       "d7"=>$d7,"d8"=>$d8,"d9"=>$d9,
                       "d10"=>$d10,"d11"=>$d11,"d12"=>$d12,
                       "interest"=>$interest
                    );
         $array = array_merge($ApprovalDetails->toArray(), $data);
         
           return response()->json($array);

    }

    public function  disburse(Request $request)
    {
        $appid = $request->input('app_id');
         

        //Validation
         
         //get approval details
         $appDetails = Application::all()->where('id',$appid)->first(); 

        //update disbursed status
        Application::where('id', $appid)->update(['disbursed' => '1']);
        
        //get approval details
        $ApprovalDetails = Approval::all()->where('app_id',$appid)->first(); 

       
       // $initial_fee = number_format($ApprovalDetails->initial_fee,2);
        $monthly_repayment = $ApprovalDetails->monthly_repayment;    

        //applicant details
        $user_id = $appDetails->user_id;
        $appname =   $appDetails->names;
        $email =   $appDetails->email;
        $apptype = $appDetails->category;

        if($apptype == 'Scholarship'){

            $interest =   0;
            $disbursed_amount =  $ApprovalDetails->approved_amount;
    
            //update approval
            Approval::where('app_id', $appid)->update(['status' => 'Completed',
                                                       'disbursed_date' => Carbon::now(),
                                                       'disbursed_amount' =>  $disbursed_amount,
                                                       'disbursed_interest'=>   $interest,
                                                      ]);
             
    
             //Generate random reference number 
                   //Convert to function later
                   $referenno = "";
                   $data = "123456123456789071234567890890";
                   $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz"; // if you need alphabatic also
    
                   for ($i = 0; $i < 12; $i++) {
                           $referenno .= substr($data, (rand() % (strlen($data))), 1);}
    
                   $loginUserId = Auth::user()->id;//login staff or admin
                   $payer_name = Auth::user()->first_name.' '. Auth::user()->last_name;
                   $payer_email = auth()->user()->email;
                   $payer_phone = auth()->user()->phone_number;
                   
                   //update transaction history
                    Transaction::create([
                       'userid' => $user_id,
                       'payerid' =>   $loginUserId,
                       'payer_name' =>  $payer_name,
                       'payer_email' => $payer_email,
                       'payer_phone' => $payer_phone,
                       'referenceId' => strtoupper($referenno),
                       'service_type' => '3',
                       'service_description' => "Loan Disbursement-FS",  
                       'amount' =>  $disbursed_amount,
                       'type' => 'plus',
                       'gateway' => 'FS-TRANSACT',
                       'status' => 'Approved',
                   ]);
    
                    //update notification history
                    App_Notification::create([
                        'user_id' =>  $user_id,
                        'message_title' => 'Loan Disbursement',
                        'messages' => "We're pleased to inform you that your approved loan amount has been successfully disbursed to your designated account.",
                    ]);
    
                    //Send Mail
                    $appdata=[
                       'Name' => ucwords(strtolower($appname)),
                    ];
           
                    try {
                            //Send mail to User
                            $send = Mail::to($email)->send(new disburseMail($appdata));
                         } catch (TransportExceptionInterface $e) {
                           return response()->json([
                             "message"=> "Email Failed",
                             "errors"=>array("Email Not Sent"=> "Sorry Error sending Mail, check your Mail Settings")
                         ], 422);
                      }
        }
        else{
            $interest =   $ApprovalDetails->approved_amount * 0.1;
            $disbursed_amount =  $ApprovalDetails->approved_amount -  $interest;
             $diff = $ApprovalDetails->approved_amount -  ($monthly_repayment *12) ;
            //update approval
            Approval::where('app_id', $appid)->update(['status' => 'Ongoing',
                                                       'disbursed_date' => Carbon::now(),
                                                       'disbursed_amount' =>  $disbursed_amount,
                                                       'disbursed_interest'=>  $interest,
                                                      ]);
            //repayment details
            
            Repayment::insert([
                [
                'app_id' =>  $appid,
                'repayment_amount' =>  $monthly_repayment+ $diff,
                'status' =>'Pending',
                'repayment_date' =>$request->mt1
               ],
               [
                'app_id' =>  $appid,
                'repayment_amount' =>  $monthly_repayment,
                'status' =>'Pending',
                'repayment_date' =>$request->mt2
               ],
               [
                'app_id' =>  $appid,
                'repayment_amount' =>  $monthly_repayment,
                'status' =>'Pending',
                'repayment_date' =>$request->mt3
               ],
               [
                'app_id' =>  $appid,
                'repayment_amount' =>  $monthly_repayment,
                'status' =>'Pending',
                'repayment_date' =>$request->mt4
               ],
               [
                'app_id' =>  $appid,
                'repayment_amount' =>  $monthly_repayment,
                'status' =>'Pending',
                'repayment_date' =>$request->mt5
               ],
               [
                'app_id' =>  $appid,
                'repayment_amount' =>  $monthly_repayment,
                'status' =>'Pending',
                'repayment_date' =>$request->mt6
               ],
               [
                'app_id' =>  $appid,
                'repayment_amount' =>  $monthly_repayment,
                'status' =>'Pending',
                'repayment_date' =>$request->mt7
               ],
               [
                'app_id' =>  $appid,
                'repayment_amount' =>  $monthly_repayment,
                'status' =>'Pending',
                'repayment_date' =>$request->mt8
               ],
               [
                'app_id' =>  $appid,
                'repayment_amount' =>  $monthly_repayment,
                'status' =>'Pending',
                'repayment_date' =>$request->mt9
               ],
               [
                'app_id' =>  $appid,
                'repayment_amount' =>  $monthly_repayment,
                'status' =>'Pending',
                'repayment_date' =>$request->mt10
               ],
               [
                'app_id' =>  $appid,
                'repayment_amount' =>  $monthly_repayment,
                'status' =>'Pending',
                'repayment_date' =>$request->mt11
               ],
               [
                'app_id' =>  $appid,
                'repayment_amount' =>  $monthly_repayment,
                'status' =>'Pending',
                'repayment_date' =>$request->mt12
               ],
    
    
             ]);
    
             //Generate random reference number 
                   //Convert to function later
                   $referenno = "";
                   $data = "123456123456789071234567890890";
                   $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz"; // if you need alphabatic also
    
                   for ($i = 0; $i < 12; $i++) {
                           $referenno .= substr($data, (rand() % (strlen($data))), 1);}
    
                   $loginUserId = Auth::user()->id;//login staff or admin
                   $payer_name = Auth::user()->first_name.' '. Auth::user()->last_name;
                   $payer_email = auth()->user()->email;
                   $payer_phone = auth()->user()->phone_number;
    
                   //update transaction history
                    Transaction::create([
                       'userid' => $user_id,
                       'payerid' =>   $loginUserId,
                       'payer_name' =>  $payer_name,
                       'payer_email' => $payer_email,
                       'payer_phone' => $payer_phone,
                       'referenceId' => strtoupper($referenno),
                       'service_type' => '3',
                       'service_description' => "Loan Disbursement-FS",  
                       'amount' =>  $disbursed_amount,
                       'type' => 'plus',
                       'gateway' => 'FS-TRANSACT',
                       'status' => 'Approved',
                   ]);
    
                    //update notification history
                    App_Notification::create([
                        'user_id' =>  $user_id,
                        'message_title' => 'Loan Disbursement',
                        'messages' => "We're pleased to inform you that your approved loan amount has been successfully disbursed to your designated account.",
                    ]);
    
                    //Send Mail
                    $appdata=[
                       'Name' => ucwords(strtolower($appname)),
                    ];
           
                    try {
                            //Send mail to User
                            $send = Mail::to($email)->send(new disburseMail($appdata));
                         } catch (TransportExceptionInterface $e) {
                           return response()->json([
                             "message"=> "Email Failed",
                             "errors"=>array("Email Not Sent"=> "Sorry Error sending Mail, check your Mail Settings")
                         ], 422);
                      }
        }          

    }
 
    public function repaylist(Request $request){
        
        $appid = $request->input('appid');
       
        if ($request->ajax()) {
                        
            $data = Repayment::select(
                     'id',
                     'repayment_amount',
                     'repayment_date',
                     'status', 
            )->where('app_id', $appid);
            return Datatables($data)
    
            ->editColumn('repayment_amount', function ($row) {
                return  "&#8358;".number_format($row->repayment_amount ,2);
               
                  })->escapeColumns('repayment_amount')
    
            ->editColumn('repayment_date', function ($row) {
                
                return  date("M j, Y", strtotime($row->repayment_date) );
                  })
    
                  ->editColumn('status', function ($row) {
                    if($row->status == 'Paid')
                         return  "<span class='badge badge-success'>".$row->status."</span>";
                    else
                         return  "<span class='badge badge-warning'>".$row->status."</span>";
                    })->escapeColumns('status')

                 ->editColumn('metadata', function ($row) {
                    
                        $date = Carbon::parse($row->repayment_date);
                        $now = Carbon::now();
                        $diff = $date->diffInDays($now->toDateString());
                        if($row->status != 'Paid')
                        {
                            if( $date->isPast()){
                                    //Check if its due date
                                    if($date->eq($now->toDateString()))
                                        return  "<span class='badge badge-warning'> Due Today</span>";
                                    else
                                        return  "<span class='badge badge-danger'>".'Overdue for ('.$diff." days) </span>";
                            }
                            else
                            {
                                return  "<span class='badge badge-success'>".'Due in ('.$diff." days) </span>";
                            }
                        }
                   
    
                          })->escapeColumns('status')
             
                   
              ->addIndexColumn()
              ->addColumn('action', function($row){
                    $btn='';
                    if($row->status != 'Paid')
                    {
                        // Button Customizations
                        $btn = "
                        <a id='remind' class='btn btn-pill btn-primary btn-air-primary btn-xs remind'><i class='icofont icofont-email'> </i> Send Reminder</a>
                        &nbsp;<a id='paynow' class='btn btn-pill btn-dark btn-air-dark btn-xs paynow'><i class='icofont icofont-pay'> </i> Pay</a>
                        ";
                        return $btn;
                    }else{ return $btn;}

            }) ->rawColumns(['action']) 
            ->make(true);
    
            } 
          return view('admin.applications');
        }

        public function repaylist2(Request $request){
        
            $appid = $request->input('appid');
           
            if ($request->ajax()) {
                            
                $data = Repayment::select(
                         'id',
                         'repayment_amount',
                         'repayment_date',
                         'status', 
                )->where('app_id', $appid);
                return Datatables($data)
        
                ->editColumn('repayment_amount', function ($row) {
                    return  "&#8358;".number_format($row->repayment_amount ,2);
                   
                      })->escapeColumns('repayment_amount')
        
                ->editColumn('repayment_date', function ($row) {
                    
                    return  date("M j, Y", strtotime($row->repayment_date) );
                      })
        
                      ->editColumn('status', function ($row) {
                        if($row->status == 'Paid')
                             return  "<span class='badge badge-success'>".$row->status."</span>";
                        else
                             return  "<span class='badge badge-warning'>".$row->status."</span>";
                        })->escapeColumns('status')
    
                     ->editColumn('metadata', function ($row) {
                        
                            $date = Carbon::parse($row->repayment_date);
                            $now = Carbon::now();
                            $diff = $date->diffInDays($now->toDateString());
                            if($row->status != 'Paid')
                            {
                                if( $date->isPast()){
                                        //Check if its due date
                                        if($date->eq($now->toDateString()))
                                            return  "<span class='badge badge-warning'> Due Today</span>";
                                        else
                                            return  "<span class='badge badge-danger'>".'Overdue for ('.$diff." days) </span>";
                                }
                                else
                                {
                                    return  "<span class='badge badge-success'>".'Due in ('.$diff." days) </span>";
                                }
                            }
                       
        
                              })->escapeColumns('status')
                 
                       
                  ->addIndexColumn()
                  ->addColumn('action', function($row){
                        $btn='';
                        if($row->status != 'Paid')
                        {
                            // Button Customizations
                            $btn = "
                            <a id='remind' class='btn btn-pill btn-primary btn-air-primary btn-xs remind'><i class='icofont icofont-email'> </i> Send Reminder</a>";
                            return $btn;
                        }else{ return $btn;}
    
                }) ->rawColumns(['action']) 
                ->make(true);
        
                } 
              return view('staff.application');
            }


       public function reminder(Request $request)
       {
             $id = $request->input('id');

            //Get Repayment details
            $planDetails = Repayment::all()->where('id',$id)->first(); 

            //Get application details
            $appDetails = Application::select('user_id','email','names')->where('id',$planDetails->app_id)->first(); 
            $date = Carbon::parse($planDetails->repayment_date);

            if( $date->isPast()){
              
                       //update notification history
              App_Notification::create([
                  'user_id' =>  $appDetails->user_id,
                  'message_title' => 'Missed Payment Alert',
                  'messages' => "We hope you're well. We noticed that your recent loan payment of ₦ ".
                  number_format( $planDetails->repayment_amount,2)." due on ". 
                  date("M j, Y", strtotime($planDetails->repayment_date))." has not been received.",
               ]);

            //Send Mail
            $appdata=[
               'Name' => ucwords(strtolower($appDetails->names)),
               'Due_date' => date("M j, Y", strtotime($planDetails->repayment_date)),
               'Amount' => "₦". number_format( $planDetails->repayment_amount,2),
            ];

            
            try {
                    //Send mail to User
                    $send = Mail::to($appDetails->email)->send(new DueMail($appdata));
                 } catch (TransportExceptionInterface $e) {
                   return response()->json([
                     "message"=> "Email Failed",
                     "errors"=>array("Email Not Sent"=> "Sorry Error sending Mail, check your Mail Settings")
                 ], 422);
              }
               

            }else{
                    //update notification history
              App_Notification::create([
                'user_id' =>  $appDetails->user_id,
                'message_title' => 'Upcoming Payment Reminders',
                'messages' => "A friendly reminder that your next loan payment of ₦ ".
                    number_format( $planDetails->repayment_amount,2)." is due on ".
                    date("M j, Y", strtotime($planDetails->repayment_date)),
               ]);

            //Send Mail
            $appdata=[
               'Name' => ucwords(strtolower($appDetails->names)),
               'Due_date' => date("M j, Y", strtotime($planDetails->repayment_date)),
               'Amount' => "₦". number_format( $planDetails->repayment_amount,2),
            ];

            
            try {
                    //Send mail to User
                    $send = Mail::to($appDetails->email)->send(new UpcommingMail($appdata));
                 } catch (TransportExceptionInterface $e) {
                   return response()->json([
                     "message"=> "Email Failed",
                     "errors"=>array("Email Not Sent"=> "Sorry Error sending Mail, check your Mail Settings")
                 ], 422);
              }
               
                
            }         
    }

    public function convert(Request $request)
    {
        $id = $request->input('appid');
        Application::where('id',$id)->update(['category' => 'Scholarship']);
    }


}
