<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App_Notification extends Model
{
    use HasFactory;
    protected $table = 'app_notification'; 
    protected $fillable  =[
        'user_id',  
        'message_title',  
        'messages',
    ];
}
