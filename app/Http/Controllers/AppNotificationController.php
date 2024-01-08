<?php

namespace App\Http\Controllers;

use App\Models\App_Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppNotificationController extends Controller
{
    public function read(Request $request){
        $loginUserId = Auth::user()->id;

        App_Notification::where('user_id', $loginUserId)->update(['status' => 'read']);
    }
}
