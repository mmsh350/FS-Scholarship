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
            'dob' => ['required'],
            'phone_number' => 'required|numeric|digits:11',
            'gender' => ['required', 'string'],
            'image' => 'image|mimes:jpeg,png,jpg|max:500',
        ]);

       

      
        $checkdate = str_replace('/', '-', $request->dob);
        $entered_date = date('Y-m-d', strtotime($checkdate));
       
        $date = Carbon::parse($entered_date);
        $now = Carbon::now();
        $diff = $date->diffInYears($now);

        if(($diff < 10 || $diff > 50)){
                return response()->json([
                    "message"=> "Age limit must be between 10 and 50 Years",
                    "errors"=>array("Date of Birth"=> "Age limit must be between 10 and 50 Years")
                ], 422);
        }

        //Reset Date 
        $checkdate = str_replace('/', '-', $request->dob);
        $correct_dob = date('Y-m-d', strtotime($checkdate));
         


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
            'dob' => $correct_dob,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
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
