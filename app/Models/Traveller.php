<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traveller extends Model
{
    protected $fillable = [
        'traveller_name',
        'traveller_email',
        'traveller_phone',
        'traveller_country',
        'traveller_address',
        'traveller_state',
        'traveller_city',
        'traveller_zip',
        'traveller_password',
        'traveller_token',
        'traveller_stauts'
    ];
}
