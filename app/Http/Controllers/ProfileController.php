<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->validate([
            'firstname' => ['required','string','max:255','regex:/^[\pL\s\-]+$/u'],
            'surname' => ['required','string','max:255','regex:/^[\pL\s\-]+$/u'],
            'dob' => ['required','date'],
            'phone' => 'required|numeric|digits:11',
            'gender' => ['required', 'string'],
            'image' => 'image|mimes:jpeg,png,jpg|max:500',
        ]);

        $date = Carbon::parse( $request->dob);
        $now = Carbon::now();
        $diff = $date->diffInYears($now);

        if(($diff < 10 || $diff > 50)){
                return response()->json([
                    "message"=> "Age limit must be between 10 and 50 Years",
                    "errors"=>array("Date of Birth"=> "Age limit must be between 10 and 50 Years")
                ], 422);
        }

        //Check if state and lga exist
           //Assign Values
            // $state =  $request->state;
            // $lga =  $request->lga;

            // //Old values
            // $oldstate =  $request->oldstate;
            // $oldlga =  $request->oldlga;

           

            // if($state == null)
            // {
            //     if($oldstate == null)
            //     {
            //         $request->validate([
            //             'lga' => 'required','numeric',
            //             'state' => 'required','numeric',
            //         ]);

            //     }else
            //     {
            //         $state =  $request->oldstate;
            //         $lga =  $request->oldlga;
            //     }
            // }
            // 'state_id' => $state,
            // 'lga_id' => $lga,
           
            

        $requestid = auth()->user()->id;

        $image_path = $request->oldpic;

        if($request->file('image'))
        {
            $path = $request->file('image');
            $data = file_get_contents($path);
            $image_path = base64_encode($data); 
        }

        $affected = User::where('id', $requestid)
        ->update([
            'first_name' => ucwords(strtolower($request->firstname)),
            'middle_name' =>  ucwords(strtolower($request->middlename)),
            'last_name' =>  ucwords(strtolower($request->surname)),
            'dob' => $request->dob,
            'gender' => $request->gender,
            'phone_number' => $request->phone,
            'address' => ucwords(strtolower($request->address)),
            'profile_pic' => $image_path ,
             ]);

        $image_path = $request->oldpic;

        if($request->file('image')){

            $path = $request->file('image');
            $data = file_get_contents($path);
            $image_path = base64_encode($data); 
        }
        
        //create Wallet
        if (DB::table('wallets')->where('userid', '=', $requestid)->exists()) {
            // Wallet Already Exist
         }else{

            DB::table('wallets')->insert(
                ['userid' => $requestid, 
                 'created_at'=> Carbon::now(),
                 'updated_at'=> Carbon::now()]
            );
         }
         return response()->json(['code'=>'200']);
       
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
