<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{
    use HasFactory;
    protected $fillable  =[
        'app_id',  
        'repayment_amount',  
        'status',
        'repayment_date',
    ];
}
