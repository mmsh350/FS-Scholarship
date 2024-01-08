<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;
    protected $fillable  =[
        'app_id',  
        'approved_amount',  
        'initial_fee',
        'monthly_repayment',
        'status',
        'disbursed_date', 
    ];
}
