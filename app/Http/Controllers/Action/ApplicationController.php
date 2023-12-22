<?php

namespace App\Http\Controllers\Action;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Countries;
use App\Models\Lga;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\School;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\map;

class ApplicationController extends Controller
{
    public function show(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $stateId =  Auth::user()->state_id;

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
                    
                    $applications = Application::all()->where('user_id', $loginUserId)
                    ->sortByDesc('id')
                    ->take(5);

                    $approve_count = Application::all() 
                                    ->where('user_id', $loginUserId)
                                    ->where('status', 'Approved')->count();
                    $reject_count = Application::all()
                                ->where('user_id', $loginUserId)
                                ->where('status', 'Rejected')->count();
                    
                    return view('application')
                            ->with(compact('applications'))
                            ->with(compact('approve_count'))
                            ->with(compact('reject_count'));
            
            }else if(Auth::user()->role == 'staff') 
            {
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
                        
                        return  date("d-m-Y H:i:s", strtotime($row->created_at) );
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


                  return view('staff.application');
            }
            
        }
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
                 'app_status',
                )
      
         ->where('location_id',$stateId )
         ->where('verify_id', $loginUserId);
        return Datatables($data)

        ->editColumn('ramount', function ($row) {
            return  "&#8358;".number_format($row->ramount ,2);
           
              })->escapeColumns('ramount')

        ->editColumn('created_at', function ($row) {
            
            return  date("d-m-Y H:i:s", strtotime($row->created_at) );
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
            'file' => 'required|mimes:pdf|max:2048',
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
        $applicant_names = auth()->user()->first_name." ".auth()->user()->middle_name." ".auth()->user()->last_name;
        $dob =  auth()->user()->dob;
        $gender =  auth()->user()->gender;
        $email =  auth()->user()->email;


        if($request->file('image'))
        {
            $path = $request->file('image');
            $data = file_get_contents($path);
            $image_path = base64_encode($data); 
        }

        //Check if a pending application existed
        
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

   
    public function  initialFee(Request $request)
    {
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

                //update transaction history
                $user = Transaction::create([
                    'userid' => $loginUserId,
                    'payerid' => '',
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
                            ->update(['pay_status' =>'paid']);
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
                        "initamount"=>$initamount
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
            $loginUserId = Auth::user()->id;//login staff

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
            }
            else{
                Application::where('id', $appid)->update(['app_verify' => '0', 
                                                          'verify_id' => $loginUserId,
                                                          'status' => 'Rejected',
                                                          'app_status' => 'Close',
                                                          'comments'=>$request->reason
                                                        ]);
            }
    }
}
