<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
     

    protected $fillable = [
        'user_id',
        'category',
        'school_id',
        'dob',
        'gender',
        'phone',
        'email',
        'country',
        'nationality',
        'state_id',
        'lga_id',
        'home_address',
        'busstop_address',
        'passport',
        'dysabroad', 
        'intl_phone', 
        'intl_address',
        'ramount',
        'approved_amount',
        'initial_fee',
        'verify_id',
    ];

}
