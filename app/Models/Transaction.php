<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'amount',
        'referenceId',
        'service_type',
        'status', 
        'type', 
        'gateway', 
        'service_description',          
    ];

}
