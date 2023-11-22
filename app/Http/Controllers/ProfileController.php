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

        $requestid = auth()->user()->id;

        $image_path = $request->oldpic;

        if($request->file('image')){

            $path = $request->file('image');
            $data = file_get_contents($path);
            $image_path = base64_encode($data); 
        }

        $affected = User::where('id', $requestid)
        ->update([
            'first_name' => ucwords($request->firstname),
            'middle_name' =>  ucwords($request->middlename),
            'last_name' =>  ucwords($request->surname),
            'dob' => $request->dob,
            'gender' => $request->gender,
            'phone_number' => $request->phone,
            'address' => ucwords($request->address),
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
                 'balance' => 0,
                 'deposit' => 0,
                 'created_at'=> Carbon::now(),
                 'updated_at'=> Carbon::now()]
            );
         }

        

       

        // $request->user()->save();
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
