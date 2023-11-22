<?php

namespace App\Http\Controllers\Action;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
class WalletController extends Controller
{
    //
    
    public function show(Request $request)
    {
        $loginUserId = Auth::user()->id;
        if (DB::table('wallets')->where('userid', '=', $loginUserId)->exists()) {
                      
            //get requested user Wallet Balance information
            $user = DB::table('wallets')->find($loginUserId);
            $balance = $user->balance;
            $deposit = $user->deposit;

            //Fetch Transactions
            $transactions = Transaction::all()->where('userid', $loginUserId)
                            ->sortByDesc('id')
                            ->take(10);
            
            return view('wallet') 
                            ->with(compact('balance'))
                            ->with(compact('deposit'))
                            ->with(compact('transactions'));

                           
       }else
       {
           $deposit =0;
           $balance = 0;

           return view('wallet',compact('balance'))
           ->with(compact('balance'))
           ->with(compact('deposit')); 
       }
       
    }

    public function verifyIndividual(Request $request)
    {

            $pmethod = $request->pmethod;

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
            
                if ($err) {
                    
                    return response()->json(['code'=>'201','err'=>$err]);

                } else {
                
                    //Decode Json Received
                    $result = json_decode($response, true);  
                    
                    if($result['status'] == false){
                        return response()->json([
                            'code'=>'201',
                            'err'=>$result['message']
                        ]);
                    }
                    else{
                        $amount = $result['data']['amount']/ 100;

                        $userid = auth()->user()->id;

                        $user = Transaction::create([
                            'userid' => $userid,
                            'payerid' => '',
                            'referenceId' => $reference,
                            'service_type' => '1',
                            'service_description' => $request->desc,  
                            'amount' => $amount,
                            'type' => 'plus',
                            'status' => 'Approved',
                        ]);
                          //Update Wallet balance

                          $wallet = DB::table('wallets')->find($userid);

                          $balance = $wallet->balance + $amount;
                          $deposit = $wallet->deposit + $amount;
                  
                          $affected = DB::table('wallets')->where('userid', $userid)
                            ->update(['balance' =>$balance,
                                      'deposit' => $deposit]);

                            return response()->json(['code'=>'200']);

                    }
                    
                
                }
                           
            

        }
        else  if($pmethod == 'monnify'){


        }
         
        
    }

}
