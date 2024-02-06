<?php

namespace App\Http\Controllers\action;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\App_Notification;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
class WalletController extends Controller
{
    //
    
    public function show(Request $request)
    {
        $loginUserId = Auth::user()->id;
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
        else if(Auth::user()->role == 'applicant')
        {  
                if (Wallet::where('userid', $loginUserId)->exists()) {

                    $notifycount =0;
                    $notifications = 0;

                    $notifications = App_Notification::all()->where('user_id', $loginUserId)
                    ->sortByDesc('id')
                    ->take(3);

                    $notifycount = App_Notification::all()
                                                ->where('user_id', $loginUserId)
                                                ->where('status', 'unread')
                                                ->count();
                    
                        //get requested user Wallet Balance information
                        $wallet = Wallet::where('userid', $loginUserId)->first();                   
                        
                        //Defauls values
                        $deposit =0;
                        $balance = 0;

                        //Fetch Transactions
                        $transactions = Transaction::all()->where('userid', $loginUserId)
                        ->where('service_type','!=', '3')
                        ->sortByDesc('id')
                        ->take(10);
                        
             
                        if( $wallet != null )
                        {                     
                            //If the Wallet is not null get the data and fetch Transaction histories
                            $balance = $wallet->balance;
                            $deposit = $wallet->deposit;
                        }
                        if( $transactions == null || $transactions->count() == 0)
                        {                     
                            $transactions = null;
                        }
                        
                        return view('wallet') 
                                        ->with(compact('balance'))
                                        ->with(compact('deposit'))
                                        ->with(compact('notifications'))
                                        ->with(compact('notifycount'))
                                        ->with(compact('transactions'));
                                    
                }else
                {
                    //Defaults if Wallet is not created
                    $deposit = 0;
                    $balance = 0;
                    $transactions = null;
                    $notifycount =0;
                    $notifications = 0;

                    $notifications = App_Notification::all()->where('user_id', $loginUserId)
                    ->sortByDesc('id')
                    ->take(3);

                    $notifycount = App_Notification::all()
                                                ->where('user_id', $loginUserId)
                                                ->where('status', 'unread')
                                                ->count();

                    return view('wallet',compact('balance'))
                    ->with(compact('balance'))
                    ->with(compact('deposit'))
                    ->with(compact('notifications'))
                    ->with(compact('notifycount'))
                    ->with(compact('transactions'));
                }
        }
        else if(Auth::user()->role == 'agent') {

        }
        else if(Auth::user()->role == 'admin') {

            if (Wallet::where('userid', $loginUserId)->exists()) {

                $notifycount =0;
                $notifications = 0;

                $notifications = App_Notification::all()->where('user_id', $loginUserId)
                ->sortByDesc('id')
                ->take(3);

                $notifycount = App_Notification::all()
                                            ->where('user_id', $loginUserId)
                                            ->where('status', 'unread')
                                            ->count();
                
                    //get requested user Wallet Balance information
                    $wallet = Wallet::where('userid', $loginUserId)->first();                   
                    
                    //Defauls values
                    $deposit =0;
                    $balance = 0;

                    //Fetch Transactions
                    $transactions = Transaction::all()->where('userid', $loginUserId)
                    ->where('service_type','!=', '3')
                    ->sortByDesc('id')
                    ->take(10);
                    
         
                    if( $wallet != null )
                    {                     
                        //If the Wallet is not null get the data and fetch Transaction histories
                        $balance = $wallet->balance;
                        $deposit = $wallet->deposit;
                    }
                    if( $transactions == null || $transactions->count() == 0)
                    {                     
                        $transactions = null;
                    }
                    
                    return view('admin.wallet') 
                                    ->with(compact('balance'))
                                    ->with(compact('deposit'))
                                    ->with(compact('notifications'))
                                    ->with(compact('notifycount'))
                                    ->with(compact('transactions'));
                                
            }else
            {
                //Defaults if Wallet is not created
                $deposit = 0;
                $balance = 0;
                $transactions = null;
                $notifycount =0;
                $notifications = 0;

                $notifications = App_Notification::all()->where('user_id', $loginUserId)
                ->sortByDesc('id')
                ->take(3);

                $notifycount = App_Notification::all()
                                            ->where('user_id', $loginUserId)
                                            ->where('status', 'unread')
                                            ->count();

                return view('admin.wallet',compact('balance'))
                ->with(compact('balance'))
                ->with(compact('deposit'))
                ->with(compact('notifications'))
                ->with(compact('notifycount'))
                ->with(compact('transactions'));
            }
            
        }
        else{
            Auth::logout();
            return view('error') ;
        }
    }

    public function verify(Request $request)
    {

            $pmethod = $request->pmethod;
            // Paystack Channel
            if($pmethod == 'paystack')
            {
                $reference = $request->ref;

                //Verify Reference Number
                $curl = curl_init();
                curl_setopt_array($curl, array(
                
                CURLOPT_URL => "https://api.paystack.co/transaction/verify/{$reference}",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_test_3eba8ee86d736052cbc46a91bd16ea7fd754bce8",
                "Cache-Control: no-cache",
                ), 
            ));
    
            $result = array();
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            
                if ($err) 
                {
                    
                    return response()->json(['code'=>'201','err'=>$err]);

                } else 
                {
                    //Decode Json Received
                    $result = json_decode($response, true);  
                    
                    if($result['status'] == false)
                    {
                        return response()->json([
                            'code'=>'201',
                            'err'=>$result['message']
                        ]);
                    }
                    else
                    {
                        $amount = $result['data']['amount']/ 100;

                        $userid = auth()->user()->id;
                        $payer_name = Auth::user()->first_name.' '. Auth::user()->last_name;
                        $payer_email = auth()->user()->email;
                        $payer_phone = auth()->user()->phone_number;

                        $user = Transaction::create([
                            'userid' => $userid,
                            'payer_name' =>  $payer_name,
                            'payer_email' => $payer_email,
                            'payer_phone' => $payer_phone,
                            'referenceId' => $reference,
                            'service_type' => '1',
                            'service_description' => $request->desc,  
                            'amount' => $amount,
                            'type' => 'plus',
                            'gateway' => 'Paystack',
                            'status' => 'Approved',
                        ]);

                          //Update Wallet balance
                          $wallet = Wallet::where('userid', $userid)->first();  
                          $balance = $wallet->balance + $amount;
                          $deposit = $wallet->deposit + $amount;
                  
                          $affected = DB::table('wallets')->where('userid', $userid)
                            ->update(['balance' =>$balance,
                                      'deposit' => $deposit]);
                        //notification
                        //update notification history
                            App_Notification::create([
                                'user_id' =>  $userid,
                                'message_title' => 'Top Up',
                                'messages' => 'Wallet TopUp of ₦'.$amount." Was Successful",
                            ]);

                            return response()->json(['code'=>'200']);

                    }
                }

        }
        //Monie Point Channel
        else  if($pmethod == 'moniepoint')
        {

                        $userid = auth()->user()->id;
                        $payer_name = Auth::user()->first_name.' '. Auth::user()->last_name;
                        $payer_email = auth()->user()->email;
                        $payer_phone = auth()->user()->phone_number;

                        $user = Transaction::create([
                            'userid' => $userid,
                            //'payerid' => '',
                            'payer_name' =>  $payer_name,
                            'payer_email' => $payer_email,
                            'payer_phone' => $payer_phone,
                            'referenceId' => $request->ref,
                            'service_type' => '1',
                            'service_description' => $request->desc,  
                            'amount' => $request->amt,
                            'type' => 'plus',
                            'gateway' => 'Monnify',
                            'status' => 'Approved',
                        ]);

                          //Update Wallet balance
                          $wallet = Wallet::where('userid', $userid)->first();  
                          $balance = $wallet->balance + $request->amt;
                          $deposit = $wallet->deposit + $request->amt;
                  
                          $affected = DB::table('wallets')->where('userid', $userid)
                            ->update(['balance' =>$balance,
                                      'deposit' => $deposit]);

                         //notification
                        //update notification history
                        App_Notification::create([
                            'user_id' =>  $userid,
                            'message_title' => 'Top Up',
                            'messages' => 'Wallet TopUp of ₦'.$request->amt." Was Successful",
                        ]);

                            return response()->json(['code'=>'200']);
        }  
    }

    public function topup(Request $request)
    {

            $type = $request->type;
            $userid = $request->userid;
            $amount = $request->amt;
            $request->validate([
                'amt'   => 'required|numeric|min:10|max:100000',
            ],
            [
                'amt.required'    => 'Amount Field is Required',
                'amt.numeric'    => 'Amount Field Must be a Number',
            ]);

            // Add Channel
           
                if (Wallet::where('userid', $userid)->exists()) {

                       //Update Wallet balance
                       $wallet = Wallet::where('userid', $userid)->first();  
                        
                       $balance = 0; $deposit = 0;
                       $referenceno = "";
                       srand((double) microtime() * 1000000);
                       $data = "123456123456789071234567890890";
                       $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz"; // if you need alphabatic also
                       $ddesc ="";
                       for ($i = 0; $i < 12; $i++) { $referenceno .= substr($data, (rand() % (strlen($data))), 1);}

                       if($type == 'Add'){
                                $ddesc = "Wallet TopUp";
                                $balance = $wallet->balance + $amount;
                                $deposit = $wallet->deposit + $amount;

                                $affected = DB::table('wallets')->where('userid', $userid)
                                ->update(['balance' =>$balance,
                                          'deposit' => $deposit]);
                         
         
                                 $payer = auth()->user()->id;
                                 $payer_name = Auth::user()->first_name.' '. Auth::user()->last_name;
                                 $payer_email = auth()->user()->email;
                                 $payer_phone = auth()->user()->phone_number;
         
                                 $user = Transaction::create([
                                     'userid' => $userid,
                                     'payerid'=>$payer,
                                     'payer_name' =>  $payer_name,
                                     'payer_email' => $payer_email,
                                     'payer_phone' => $payer_phone,
                                     'referenceId' => strtoupper($referenceno),
                                     'service_type' => '1',
                                     'service_description' => 'Wallet Top Up',  
                                     'amount' => $amount,
                                     'type' => 'plus',
                                     'gateway' => 'FS-TRANSACT',
                                     'status' => 'Approved',
                                 ]);
                       }
                       else{
                                $ddesc = "Wallet Adjustment";
                                if($wallet->balance < $amount){
                                    return response()->json([
                                        "message"=> "Error",
                                        "errors"=>array("Wallet Error"=> "Sorry Wallet Not Sufficient for Transaction !")
                                    ], 422);

                                }
                                else{
                                    $balance = $wallet->balance - $amount;
                                    
                                }
                                
                               
                                $affected = DB::table('wallets')->where('userid', $userid)
                                ->update(['balance' =>$balance]);
                         
         
                                 $payer = auth()->user()->id;
                                 $payer_name = Auth::user()->first_name.' '. Auth::user()->last_name;
                                 $payer_email = auth()->user()->email;
                                 $payer_phone = auth()->user()->phone_number;
         
                                 $user = Transaction::create([
                                     'userid' => $userid,
                                     'payerid'=>$payer,
                                     'payer_name' =>  $payer_name,
                                     'payer_email' => $payer_email,
                                     'payer_phone' => $payer_phone,
                                     'referenceId' => strtoupper($referenceno),
                                     'service_type' => '1',
                                     'service_description' => 'Wallet Adjustment',  
                                     'amount' => $amount,
                                     'type' => 'minus',
                                     'gateway' => 'FS-TRANSACT',
                                     'status' => 'Approved',
                                 ]);
                       }
                     
                        //notification
                        //update notification history
                            App_Notification::create([
                                'user_id' =>  $userid,
                                'message_title' => 'Top Up',
                                'messages' =>  $ddesc .' of ₦'.$amount." Was Successful",
                            ]);

                            return response()->json(['code'=>'200']);
                    

                    }else{
                        return response()->json([
                            "message"=> "Error",
                            "errors"=>array("Wallet Error"=> "Sorry Wallet Does not Exist!")
                        ], 422);
                    }
                

        }

}
