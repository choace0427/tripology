<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'first_name',
        'last_name',
        'phone_number',
        'email', 
        'start_date',
        'end_date'
    ];
}
